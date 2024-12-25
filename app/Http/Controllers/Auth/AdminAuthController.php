<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Feature;
use App\Models\Payment;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PropertyApprovedNotification;

class AdminAuthController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Listed and sold properties count
        $listedPropertiesCount = Property::where('available_status', 1)->count();
        $soldPropertiesCount = Property::where('available_status', 0)->count();
        $RevenueTotal = Payment::sum('amount');
        // Fetch current month's 10 most recently created users
        $currentMonthUsers = User::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->latest()
            ->take(10)
            ->get();

        // Monthly payments data for the chart
        $monthlyPayments = Payment::selectRaw('MONTH(paid_at) as month, SUM(amount) as total')
            ->whereYear('paid_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Format data for chart
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyPayments[$i] ?? 0; // Default to 0 if no payments
        }


        $currentMonth = now()->format('Y-m');
        $lastMonth = now()->subMonth()->format('Y-m');

        // Payments for the current month
        $currentMonthPayments = Payment::whereYear('paid_at', now()->year)
            ->whereMonth('paid_at', now()->month)
            ->sum('amount');
        // Payments for the last month
        $lastMonthPayments = Payment::whereYear('paid_at', now()->subMonth()->year)
            ->whereMonth('paid_at', now()->subMonth()->month)
            ->sum('amount');
        // Calculate percentage change
        $percentageChange = $lastMonthPayments > 0
            ? round((($currentMonthPayments - $lastMonthPayments) / $lastMonthPayments) * 100, 2)
            : 100; // Default to 100% if no payments last month





        return view('Dashboard.admin.dashboard', compact(
            'user',
            'listedPropertiesCount',
            'soldPropertiesCount',
            'currentMonthUsers',
            'chartData',
            'RevenueTotal','currentMonthPayments','lastMonthPayments','percentageChange'
        ));
    }

    public function searchUsers(Request $request)
    {
        // dd($request);
        $query = $request->input('search');
        $currentMonthUsers = User::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('country', 'LIKE', "%$query%")
            ->orWhere('phone', 'LIKE', "%$query%");
        })
        ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->latest()
            ->take(10)
        ->get();

        foreach ($currentMonthUsers as $user) {
            $user->roles = $user->roles->pluck('name')->toArray();
        }

        return response()->json($currentMonthUsers);
    }




    public function notifications()
    {
        return view('Dashboard.tenant.notifications');
    }




    public function income_reports()
    {
        return view('Dashboard.admin.income_reports');
    }

    public function user_reports()
    {
        return view('Dashboard.admin.user_reports');
    }


    public function pricing()
    {
        return view('Dashboard.admin.pricing');
    }


    public function edit_pricing()
    {
        return view('Dashboard.admin.edit_pricing');
    }

    public function users()
    {
        return view('Dashboard.admin.users');
    }


    public function updateProfile(Request $request)
{
    $user = auth()->user();
    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'phone' => 'nullable|digits:10',
        'city' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'postal_code' => 'nullable|digits_between:2,5',
        'date_of_birth' => 'nullable|date',
        'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
    ]);
    if($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update user fields
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->city = $request->city;
    $user->country = $request->country;
    $user->state = $request->state;
    $user->postal_code = $request->postal_code;
    $user->date_of_birth = $request->date_of_birth;

    // Update password only if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
        $user->save();
    }

    // Handle profile image upload
    if ($request->hasFile('profile_img')) {
        // Delete old profile image if it exists
        if ($user->profile_img) {
            // Define the path to the old image
            $oldImagePath = public_path('assets/' . $user->profile_img);
            // Check if the old image exists and delete it
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Generate a unique name for the new image
        $extension = $request->file('profile_img')->getClientOriginalExtension();
        $uniqueName = 'profile_' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('assets/profile_images');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Store new image in the public directory
        $request->file('profile_img')->move($destinationPath, $uniqueName);
        // Update user's profile_img attribute
        $user->profile_img = 'profile_images/' . $uniqueName; // Store relative path
    }

    // Save the updated user
    $user->save();

    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
}
    public function profile()
    {   $user = auth()->user();
        return view('Dashboard.admin.profile',compact('user'));
    }


    public function room_features(){

        return view('Dashboard.admin.roomFeature.room_features');
    }

    public function features_store(Request $request)
    {
        // dd($request->all());
        // Validate the input (optional but recommended)
        $request->validate([
            'room_features' => 'required|string',
         // Validate each feature string
        ]);


        // dd($request->room_features);
    // Loop through the room_features array and create a new feature for each entry
    // foreach ($request->room_features as $feature) {
        Feature::create([
            'name' => $request->room_features,
        ]);
    // }
    // Redirect or return success response
    return response()->json([
        'message' => 'Room Features created successfully',
         // Return the image URL
    ], 201);
    // return redirect()->route('admin.features.show')->with('success', 'Features added successfully!');
    }

    public function features_show()
    {
        $features = Feature::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('Dashboard.admin.roomFeature.show', compact('features'));
    }
    public function edit($id)
    {
        // dd($id);
        $feature = Feature::findOrFail($id);

        if (!$feature) {
            return response()->json(['message' => 'Room & Feature not found'], 404);
        }

        return response()->json(['feature' => $feature], 200);

        // return view('Dashboard.admin.roomFeature.room_features', compact('feature'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $feature = Feature::findOrFail($id);

        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
        ]);

        $feature->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Feature updated successfully',
            'feature' => $feature,
        ], 200);
        // return redirect()->route('admin.features.show')->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.features.show')->with('success', 'Feature deleted successfully!');
    }

}
