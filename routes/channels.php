<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notifications', function ($data) {
    return true;
});

// Broadcast::channel('messages', function ($data) {
//     return true;
// });



// Broadcast::channel('messages.{senderId}.{receiverId}', function ($user, $senderId, $receiverId) {
//     // Check if the user is authorized to listen to this channel
//     return $user->id === $senderId || $user->id === $receiverId;
// });

Broadcast::channel('messages_{senderId}', function ($user, $senderId) {
    // Check if the authenticated user is the sender
    return $user->id === (int) $senderId;
});

