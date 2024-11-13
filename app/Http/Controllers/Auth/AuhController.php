<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Jobs\SendPasswordResetEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuhController extends Controller
{
    public function register(Request $request)
{
    // Validate the form data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8', // `password` and `password_confirmation` fields
        'c_password' => 'required|string|min:8|same:password',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'role' => 'required|in:tenant,land_lord', // Ensure valid role selection
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create new user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    // Assign role based on the selected value
    if ($request->role === 'tenant') {
        $role = Role::firstOrCreate(['name' => 'tenant']);
    } else if ($request->role === 'land_lord') {
        $role = Role::firstOrCreate(['name' => 'land_lord']);
    }

    // Assign the selected role to the user
    $user->assignRole($role);

    return redirect()->route('login')->with('success', 'Registration successful!');
}

public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            } else if(Auth::user()->hasRole('tenant')) {
                return redirect()->route('tenant.dashboard');
            } else if(Auth::user()->hasRole('land_lord')) {
                return redirect()->route('landlord.dashboard');
            }
            else {
                Auth::logout(); // Log out if not an admin
                return redirect()->route('admin.login')->withErrors('Unauthorized access.');
            }
        }
        // If authentication fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
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

}
