<?php

namespace App\Http\Controllers\tenant;

use App\Models\Property;
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
        $properties = Property::where('approve', 1)->get();
        return view('Dashboard.tenant.properties', compact('properties'));
    }

    public function propertieslistings()
    {
        return view('Dashboard.tenant.propertieslistings');
    }

    public function propertiesdetails($id)
    {
        // Retrieve the specific property with its media, pets, and related features and feature details
        $properties = Property::with(['media', 'pets.pet', 'features.feature' ,'RentToWhoDetails.rentToWho','category'])->findOrFail($id);

        return view('Dashboard.tenant.wishlist', compact('properties'));
    }
}
