<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function applyhistory()
    {
        return view('Dashboard.tenant.applyhistory');
    }

    public function profile()
    {    $user = auth()->user();
        return view('Dashboard.tenant.profile',compact('user'));
    }

    public function wishlist()
    {
        return view('Dashboard.tenant.wishlist');
    }


    public function notifications()
    {
        return view('Dashboard.tenant.notifications');
    }

}


