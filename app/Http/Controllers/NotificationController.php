<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
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

    public function notifications()
    {
        $notifications = Auth::user()->unreadNotifications;

        return response()->json(['notifications' => $notifications]);
    }

}
