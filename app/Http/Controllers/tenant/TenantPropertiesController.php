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

        $applyPropertyHistory = ApplyPropertyHistory::where('property_id', $propertyId)
        ->where('user_id', $tenantId)
        ->first();

        if ($applyPropertyHistory) {
            session()->flash('error', 'You have already applied for this property.');
            return redirect()->route('tenant.propertiesdetails', ['id' => $property->id]);
        }



        $applyPropertyHistory = new ApplyPropertyHistory();
        $applyPropertyHistory->user_id = $tenantId;
        $applyPropertyHistory->property_id = $propertyId;
        $applyPropertyHistory->save();

        // Send notification to landlord and save it in the database
        $landlord->notify(new PropertyApplicationNotification($property, $tenant));

        // Retrieve the most recent notification ID for the landlord
        $notification = DB::table('notifications')
        ->where('notifiable_id', $userId)
        ->orderBy('created_at', 'desc')
        ->first();

        $notificationId = $notification->id;
        // Trigger real-time broadcast with the notification ID for the landlord
        event(new PropertyApplicationEvent($landlord->id, 'Your property "' . $property->name . '" has been applied by ' . $tenant->name . '.', $notificationId));
        session()->flash('success', 'Application submitted successfully!');

        // Redirect to messages blade
        return redirect()->route('tenant.propertiesdetails', ['id' => $property->id]);
    }


}
