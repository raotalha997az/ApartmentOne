<?php

namespace App\Http\Controllers\tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TenantPropertiesController extends Controller
{
    public function screening()
    {
        $user = Auth::user()->load('bank');
        return view('Dashboard.tenant.screening',compact('user'));
    }

    public function properties()
    {
        return view('Dashboard.tenant.properties');
    }

    public function propertieslistings()
    {
        return view('Dashboard.tenant.propertieslistings');
    }
}
