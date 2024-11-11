<?php

namespace App\Http\Controllers\tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantPropertiesController extends Controller
{
    public function screening()
    {
        // $user = Auth::user();
        return view('Dashboard.tenant.screening');
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
