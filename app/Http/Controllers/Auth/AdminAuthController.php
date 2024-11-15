<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Feature;
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
        $listedPropertiesCount = Property::where('available_status', 1)->count();
        $soldPropertiesCount = Property::where('available_status', 0)->count();

        $landlordsCount = User::role('land_lord')->count();
        $tenantsCount = User::role('tenant')->count();

        return view('Dashboard.admin.dashboard', compact('user', 'listedPropertiesCount', 'soldPropertiesCount', 'landlordsCount', 'tenantsCount'));
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
            $oldImagePath = storage_path('app/public/' . $user->profile_img);
            // Check if the old image exists and delete it
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Generate a unique name for the new image
        $extension = $request->file('profile_img')->getClientOriginalExtension();
        $uniqueName = 'profile_' . Str::random(40) . '.' . $extension;
        // Store new image in the public directory
        $request->file('profile_img')->storeAs('public/profile_images', $uniqueName);
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
        // Validate the input (optional but recommended)
        $request->validate([
            'room_features' => 'required|array',
            'room_features.*' => 'required|string|max:255', // Validate each feature string
        ]);


        // dd($request->room_features);
    // Loop through the room_features array and create a new feature for each entry
    foreach ($request->room_features as $feature) {
        Feature::create([
            'name' => $feature,
        ]);
    }
    // Redirect or return success response
    return redirect()->route('admin.features.show')->with('success', 'Features added successfully!');
    }

    public function features_show()
    {
        $features = Feature::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('Dashboard.admin.roomFeature.show', compact('features'));
    }
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('Dashboard.admin.roomFeature.room_features', compact('feature'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_features' => 'required|array',
            'room_features.*' => 'required|string|max:255',
        ]);

        $feature = Feature::findOrFail($id);
        $feature->update([
            'name' => $request->room_features[0],
        ]);
        return redirect()->route('admin.features.show')->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.features.show')->with('success', 'Feature deleted successfully!');
    }

}
