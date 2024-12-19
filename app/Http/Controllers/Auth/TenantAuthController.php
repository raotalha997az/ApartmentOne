<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bank;
use App\Models\Wishlist;
use App\Models\Screening;
use App\Models\TenantPet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TenantAuthController extends Controller
{
    public function profile()
    {
        $user = Auth::user()->load('bank');
        return view('Dashboard.tenant.profile', compact('user'));
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
            'date_of_birth' => 'nullable|date|before_or_equal:today',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);
        if ($validator->fails()) {
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

        return redirect()->route('tenant.profile')->with('success', 'Profile updated successfully!');
    }
    public function updateScreening(Request $request)
    {


        $user = auth()->user();

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            // 'postal_code' => 'nullabl',
            'date_of_birth' => 'nullable|date|before_or_equal:today',
            'house_number' => 'nullable|integer|digits_between:1,5',
            'identity_card' => 'nullable|digits:9',
            'street_name' => 'nullable|string|max:255',
            'property_city' => 'nullable|string|max:255',
            'property_location' => 'nullable|string|max:255',
            'shifting_date' => 'nullable|date',
            'rent_type' => 'nullable|integer',
            'cat_id' => 'nullable|integer',
            'pets' => 'nullable|array',
            'pets.*' => 'integer|exists:pets,id',
            'smoke' => 'nullable|boolean',
            'waterbed' => 'nullable|boolean',
            'lease_short_term' => 'nullable|boolean',
            'security_deposit' => 'nullable|boolean',
            'deposit_amount' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user fields
        $validatedData = $validator->validated();
        $user->update([
            'name' => $validatedData['firstName'],
            'date_of_birth' => $validatedData['date_of_birth'] ?? $user->date_of_birth,
            'city' => $validatedData['city'] ?? $user->city,
            'country' => $validatedData['country'] ?? $user->country,
            'state' => $validatedData['state'] ?? $user->state,
            'postal_code' => $validatedData['postal_code'] ?? $user->postal_code,
            'house_number' => $validatedData['house_number'] ?? $user->house_number,
            'address' => $validatedData['street_name'] ?? $user->address,
        ]);

        // Update or create screening record
        $screening = Screening::updateOrCreate(
            ['user_id' => $user->id],
            [
                'property_city' => $validatedData['property_city'] ?? null,
                'property_location' => $validatedData['property_location'] ?? null,
                'shifting_date' => $validatedData['shifting_date'] ?? null,
                'rent_type' => $validatedData['rent_type'] ?? null,
                'cat_id' => $validatedData['cat_id'] ?? null,
                'pet' => $validatedData['pet'] ?? false,
                'smoke' => $validatedData['smoke'] ?? false,
                'waterbed' => $validatedData['waterbed'] ?? false,
                'lease_short_term' => $validatedData['lease_short_term'] ?? false,
                'security_deposit' => $validatedData['security_deposit'] ?? false,
                'deposit_amount' => $validatedData['deposit_amount'] ?? null,
            ]
        );

        // Update or create tenant pets
            if ($request->has('pets') && is_array($request->input('pets'))) {
                TenantPet::where('screening_id', $screening->id)->delete();
                foreach ($request->input('pets') as $petId) {
                    TenantPet::create([
                        'screening_id' => $screening->id,
                        'pet_id' => $petId,
                    ]);
                }
            }


        // Update or create bank record
        $bank = Bank::firstOrNew(['user_id' => $user->id]);
        $bank->identity_card = $validatedData['identity_card'] ?? $bank->identity_card;
        $bank->save();


        return redirect()->route('tenant.stripe')->with('success', 'Screening updated successfully!');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('Dashboard.tenant.dashboard', compact('user'));
    }

    public function bank(Request $request)
    {
        $user = Auth::user();

        // Validation
        $validator = Validator::make($request->all(), [
            'bank_name' => 'nullable|string|min:5|max:50|regex:/^[a-zA-Z\s]+$/',
            'branch_code' => 'nullable|string|min:3|max:5',
            'account_number' => 'nullable|digits_between:9,12',
            'identity_card' => 'nullable|digits:9',
        ]);

        if ($validator->fails()) {
            // Redirect back with errors and input data
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save validated data
        $validatedData = $validator->validated();
        $bank = Bank::firstOrNew(['user_id' => $user->id]);

        $bank->bank_name = $validatedData['bank_name'] ?? $bank->bank_name;
        $bank->branch_code = $validatedData['branch_code'] ?? $bank->branch_code;
        $bank->account_number = $validatedData['account_number'] ?? $bank->account_number;
        $bank->identity_card = $validatedData['identity_card'] ?? $bank->identity_card;

        $bank->save();

        return redirect()->back()->with('success', 'Bank information updated successfully.');
    }
    public function addToWishlist(Request $request)
{
    $propertyId = $request->input('property_id');
    $userId = Auth::id(); // Ensure the user is authenticated

    // Check if the property already exists in the wishlist
    $wishlist = Wishlist::where('user_id', $userId)->where('property_id', $propertyId)->first();

    if ($wishlist) {
        // If it exists, remove it
        $wishlist->delete();
        return response()->json(['status' => 'removed']);
    }

    // If it doesn't exist, add it to the wishlist
    Wishlist::create([
        'user_id' => $userId,
        'property_id' => $propertyId,
    ]);

    return response()->json(['status' => 'added']);
}
public function removeFromWishlist(Request $request)
{
    $propertyId = $request->input('property_id');
    $userId = Auth::id(); // Ensure the user is authenticated

    // Check if the property exists in the wishlist
    $wishlist = Wishlist::where('user_id', $userId)->where('property_id', $propertyId)->first();

    if ($wishlist) {
        // If it exists, remove it
        $wishlist->delete();
        return response()->json(['status' => 'removed']);
    }

    // If it doesn't exist, return an error message
    return response()->json(['status' => 'not_found']);
}

public function showWishlist()
{
    $userId = Auth::id(); // Get the authenticated user's ID

    // Retrieve all wishlist items for the authenticated user
    $properties = Wishlist::where('user_id', $userId)->with('property')->get();
// dd($properties);
    // Return the wishlist items in JSON format
    return view('Dashboard.tenant.wishlist', compact('properties'));
}

}
