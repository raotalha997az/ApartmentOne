<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use PropertyApproved;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PropertyApprovedNotification;

class PropertyController extends Controller
{
    public function propertiesdetails($id)
    {
        $property = Property::with('user', 'media','pets.pet', 'features.feature')->findOrFail($id);
        return view('Dashboard.admin.propertiesdetails', compact('property'));
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
        $landlord = User::findOrFail($userId);

        // Update property status
        $property->approve = 1;
        $property->save();

        // Send notification and email
        $landlord->notify(new PropertyApprovedNotification($property));

        // Trigger real-time broadcast
        event(new PropertyApproved($userId, 'Your property "' . $property->name . '" has been approved.'));

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
