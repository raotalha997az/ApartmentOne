<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PropertyApprovedNotification;

class PropertyController extends Controller
{
   public function propertiesdetails()
   {
       return view('Dashboard.admin.propertiesdetails');
   }

   public function propertieslistings()
    {
        return view('Dashboard.admin.propertieslistings');
    }

    public function properties()
    {
        $properties = Property::where('approve', 0)
        ->with('user', 'media')
        ->get();

        return view('Dashboard.admin.properties',compact('properties'));
    }

    public function propertyApprove(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $userId = $property->user_id;
        $landlord = User::find($userId); // Assuming `landlord_id` is the user ID of the landlord

        // Update property status
        $property->approve = 1;
        $property->save();

        // Send notification and email
        $landlord->notify(new PropertyApprovedNotification($property));

        return redirect()->back()->with('success', 'Property Approved Successfully');
    }

    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return response()->json(['success' => 'All notifications marked as read.']);
    }

    // Mark a single notification as read
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);

        if ($notification && !$notification->read_at) {
            $notification->markAsRead();
        }

        return response()->json(['success' => 'Notification marked as read.']);
    }
}
