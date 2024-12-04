<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use Spatie\Permission\Models\Role;
use App\Jobs\SendVerificationEmail;
use App\Http\Controllers\Controller;
use App\Jobs\SendPasswordResetEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendVerificationCodeJob;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuhController extends Controller
{




    public function register(Request $request)
    {
        // Validate the form data
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'c_password' => 'required|string|min:8|same:password',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable|string|max:255',
            'house_number' => 'nullable|integer|digits_between:1,5',
            'role' => 'required|in:tenant,land_lord',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get validated data
        $data = $validator->validated();

        // Generate a verification token
        $verificationToken = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

        // Create the new user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'house_number' => $data['house_number'],
            'verification_token' => $verificationToken,
        ]);

        // Assign role
        $role = Role::firstOrCreate(['name' => $request->role]);
        $user->assignRole($role);

        // Dispatch the email job
        SendVerificationEmail::dispatch($user);

        return redirect()->route('login')->with('success', 'Registration successful! Please verify your email to activate your account.');
    }




    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::validate($credentials)) {
        // Get the user
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if (!$user->hasVerifiedEmail()) {
            return back()->withErrors(['email' => 'Your email is not verified.']);
        }

        // Generate and store verification code
        $verificationCode = rand(100000, 999999);
        session(['verification_code' => $verificationCode]);
        session(['temp_user_id' => $user->id]); // Store user ID temporarily

        // Dispatch job to send the verification code
        SendVerificationCodeJob::dispatch($user, $verificationCode);

        return redirect()->route('verify.code')
            ->with('message', 'A verification code has been sent to your email.');
    }

    return back()->withErrors(['email' => 'Invalid credentials.']);
}


public function logout(Request $request)
{
    // Clear two-factor verification session data
    $request->session()->forget('two_factor_verified');
    Auth::logout();

    return redirect('/login');
}


    public function showLinkRequestForm()
    {
        return view('Website.resetPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $token = Password::createToken($user);

        // $user->notify(new ResetPasswordNotification($token));
        $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));
        SendPasswordResetEmail::dispatch($user->email, $resetUrl);

        return back()->with('success', 'Password reset link sent check your email inbox!');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('Website.reset-password-form')->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = bcrypt($request->password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Password reset successfully!');
        }

        return back()->withErrors(['email' => [__($status)]]);
    }


    public function verifyCodeView()
    {
        return view('auth.verify-code'); // Create this blade file
    }



    public function verify($token)
    {
        // User find using the token
        $user = User::where('verification_token', $token)->first();
        if ($user) {
            $user->verification_token = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('login')->with('success', 'Email successfully verified! You can now login.');
        }

        return redirect()->route('login')->with('error', 'Invalid verification token.');
    }


    public function CodeVerify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric',
        ]);

        $storedCode = session('verification_code');
        $tempUserId = session('temp_user_id');

        if ($request->verification_code == $storedCode && $tempUserId) {
            // Log in the user fully
            Auth::loginUsingId($tempUserId);

            // Clear temporary session data
            session()->forget('verification_code');
            session()->forget('temp_user_id');

            // Redirect based on user role
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('tenant')) {
                return redirect()->route('tenant.dashboard');
            } elseif ($user->hasRole('land_lord')) {
                return redirect()->route('landlord.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['verification_code' => 'Invalid verification code.']);
    }


    public function resentVerifyCode(Request $request)
    {
        // Retrieve the temporary user ID from the session
        $tempUserId = session('temp_user_id');

        if (!$tempUserId) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Retrieve the user based on the temporary user ID
        $user = User::find($tempUserId);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Generate a new verification code
        $verificationCode = rand(100000, 999999);

        // Store the code in the session
        session(['verification_code' => $verificationCode]);

        // Dispatch the job to send the verification code
        SendVerificationCodeJob::dispatch($user, $verificationCode);

        return response()->json(['message' => 'Verification code has been resent.'], 200);
    }



}
