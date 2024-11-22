<?php

namespace App\Http\Controllers\tenant;

use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ApplyPropertyHistory;
use Illuminate\Support\Facades\Auth;
use App\Events\PropertyApplicationEvent;
use App\Notifications\PropertyApplicationNotification;

class TenantPropertiesController extends Controller
{
    public function screening()
    {
        $user = Auth::user()->load('bank');
        return view('Dashboard.tenant.screening',compact('user'));
    }

    public function properties()
    {
        $properties = Property::where('approve', 1)->with('category')->get();
        // dd($properties);
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();$wishlist = Wishlist::where('user_id', Auth::user()->id)
        ->pluck('property_id')
        ->toArray();

        $categories = Category::all();
        return view('Dashboard.tenant.properties', compact('properties','wishlist', 'categories'));
    }

        public function fluterproperty($id)
        {
            // dd($id);
            $properties = Property::where('approve', 1)
            ->with('category')
            ->where('cat_id', $id)
            ->get();

            $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();$wishlist = Wishlist::where('user_id', Auth::user()->id)
            ->pluck('property_id')
            ->toArray();

            $categories = Category::all();
            return view('Dashboard.tenant.properties', compact('properties','wishlist', 'categories'));
        }

    public function propertieslistings()
    {
        return view('Dashboard.tenant.propertieslistings');
    }

    public function propertiesdetails($id)
    {
        // Retrieve the specific property with its media, pets, and related features and feature details
        $property = Property::with(['user','media', 'pets.pet', 'features.feature' ,'RentToWhoDetails.rentToWho','category'])->findOrFail($id);

        $AppliedProperies = ApplyPropertyHistory::where('user_id', Auth::user()->id)
        ->pluck('property_id')
        ->toArray();

        return view('Dashboard.tenant.propertiesdetails', compact('property', 'AppliedProperies'));
    }

    public function applyForProperty(Request $request, $id, $user)
    {
        $property = Property::findOrFail($id);
        $userId = $property->user_id; // Landlord's user ID
        $landlord = User::findOrFail($userId);
        $tenant = User::findOrFail($user);
        $propertyId = $property->id;
        $tenantId = $tenant->id;

        // Check if tenant already applied for the property
        $applyPropertyHistory = ApplyPropertyHistory::where('property_id', $propertyId)
            ->where('user_id', $tenantId)
            ->first();

        if ($applyPropertyHistory) {
            session()->flash('error', 'You have already applied for this property.');
            return redirect()->route('tenant.propertiesdetails', ['id' => $property->id]);
        }

        // Save application history
        $applyPropertyHistory = new ApplyPropertyHistory();
        $applyPropertyHistory->user_id = $tenantId;
        $applyPropertyHistory->property_id = $propertyId;
        $applyPropertyHistory->save();

        // Notify the landlord
        $landlord->notify(new PropertyApplicationNotification($property, $tenant));

        // Fetch admin users (assuming 'admin' is a role in your system)
        $admins = User::role('admin')->get(); // Use appropriate method to fetch admin users based on your implementation

        foreach ($admins as $admin) {
            $admin->notify(new PropertyApplicationNotification($property, $tenant));
        }

        // Retrieve the most recent notification ID for the landlord
        $notification = DB::table('notifications')
            ->where('notifiable_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        $notificationId = $notification->id;

        // Trigger real-time broadcast for landlord
        event(new PropertyApplicationEvent(
            $landlord->id,
            'Your property "' . $property->name . '" has been applied by ' . $tenant->name . '.',
            $notificationId
        ));

        // Trigger real-time broadcast for each admin
        foreach ($admins as $admin) {
            event(new PropertyApplicationEvent(
                $admin->id,
                'A new application for property "' . $property->name . '" by ' . $tenant->name . '.',
                $notificationId // Optional: You can create a unique notification ID for each admin
            ));
        }

        session()->flash('success', 'Application submitted successfully!');

        // Redirect to property details page
        return redirect()->route('tenant.propertiesdetails', ['id' => $property->id]);
    }


}
