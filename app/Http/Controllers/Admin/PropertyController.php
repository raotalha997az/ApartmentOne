<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ApplyPropertyHistory;
use Illuminate\Support\Facades\Auth;
use App\Events\PropertyApprovedEvent;
use App\Notifications\PropertyApprovedNotification;

class PropertyController extends Controller
{
    public function propertiesdetails($id)
    {
        // $property = Property::with('user', 'media','pets.pet', 'features.feature')->findOrFail($id);

        $property = Property::with(['media', 'pets.pet', 'features.feature' ,'RentToWhoDetails.rentToWho','category'])->findOrFail($id);

        $tenants = ApplyPropertyHistory::with('user')  // Assuming user is the tenant
        ->where('property_id', $id)
        ->get()
        ->pluck('user');

        return view('Dashboard.admin.propertiesdetails', compact('property', 'tenants'));
    }
    public function propertiesdetailsApproval($id)
    {
        $property = Property::with('user', 'media','pets.pet', 'features.feature')->findOrFail($id);

        return view('Dashboard.admin.propertiesdetails_approval', compact('property', ));
    }

   public function propertieslistings()
    {
        return view('Dashboard.admin.propertieslistings');
    }

    public function properties()
    {
        $properties = Property::where('approve', 0)
        ->with('user', 'media', 'Category')
        ->get();

        return view('Dashboard.admin.properties',compact('properties'));
    }

    public function propertyApprove(Request $request, $id)
{
    $property = Property::findOrFail($id);
    $userId = $property->user_id;
    $landlord = User::findOrFail($userId);

    // Update property status
    $property->approve = 1;
    $property->save();

    // Send notification and email
    $landlord->notify(new PropertyApprovedNotification($property));

    // Retrieve the most recent notification ID for the landlord
    $notification = DB::table('notifications')
                      ->where('notifiable_id', $userId)
                      ->orderBy('created_at', 'desc')
                      ->first();
    $notificationId = $notification ? $notification->id : null;

    // Trigger real-time broadcast with notificationId
    event(new PropertyApprovedEvent($userId, 'Your property "' . $property->name . '" has been approved.', $notificationId));

    return redirect()->back()->with('success', 'Property Approved Successfully');
}


public function propertiesAll()
{
    // $userId = Auth::id();
    // $properties = Property::where('user_id',$userId)->with('user','media')->get();
    $properties = Property::with(['user', 'media'])
    ->orderBy('id', 'desc')
    ->get();

    $categories = Category::all();

    return view('Dashboard.admin.properties_all',compact('properties', 'categories'));
}



public function properties_delete($id)
{
    // Check if the property exists in any wishlist
    $wishlistItem = Wishlist::where('property_id', $id)->first();

    $applyhistory = ApplyPropertyHistory::where('property_id', $id)->first();

    if ($wishlistItem) {
        // If the property is found in a wishlist, prevent deletion
        return response()->json([
            'message' => 'Property is in a tenant\'s wishlist, so it cannot be deleted.',
        ]);
    }elseif($applyhistory){
        return response()->json([
            'message' => 'Property is in a tenant\'s Apply History, so it cannot be deleted.',
        ]);
    }
     else {
        // If the property is not found in any wishlist, proceed with deletion
        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json([
            'message' => 'Property deleted successfully.',
        ]);
    }
}


}
