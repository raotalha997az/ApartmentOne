<?php

namespace App\Http\Controllers\LandLord;

use App\Models\Pet;
use App\Models\Media;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Property;
use App\Models\Wishlist;
use App\Models\RentToWho;
use App\Models\PetDetails;
use Illuminate\Http\Request;
use App\Models\FeatureDetails;
use App\Models\RentToWhoDetails;
use App\Http\Controllers\Controller;
use App\Models\ApplyPropertyHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function properties()
    {
        $userId = Auth::id();
        // Get property applications with tenants limited to 4 per property
        $applyPropertyHistory = ApplyPropertyHistory::with(['property.media', 'user'])
            ->whereHas('property', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get()
            ->groupBy('property_id');

        // Limit tenants to 4 per property
        $propertiesWithTenants = $applyPropertyHistory->mapWithKeys(function ($applications, $propertyId) {
            return [
                $propertyId => [
                    'property' => $applications->first()->property,
                    'tenants' => $applications->take(4)->pluck('user')
                ],
            ];
        });
        // Get all properties for the landlord
        $properties = Property::where('user_id', $userId)->where('approve', 1)->where('deleted_at', null)
            ->with('media')
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($property) use ($propertiesWithTenants) {
                $propertyId = $property->id;
                $tenants = $propertiesWithTenants[$propertyId]['tenants'] ?? collect();
                return [
                    'property' => $property,
                    'tenants' => $tenants,
                ];
            });

        $totalApplications = $applyPropertyHistory->flatten()->count();
        return view('Dashboard.landlord.properties', compact('properties', 'totalApplications'));
    }

    public function add_property()
    {
        $categories = Category::select('name','id','image')->get();
       $features = Feature::select('name','id')->get();
       $pets = Pet::select('name','id')->get();
       $rentWhos = RentToWho::select('name','id')->get();
        return view('Dashboard.landlord.addProperty' ,compact('features','pets','rentWhos','categories'));
    }

    public function profile()
    {
    $user = Auth::user()->load('bank');

    return view('Dashboard.tenant.profile' ,compact('user'));
    }

    public function store(Request $request)
    {
            // dd($request->all());
        $id = Auth::user()->id;
        // Validate the request data
        $validated = $request->validate([
            'images' => 'required|array|max:50',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'category' => 'required|integer',
            'country' => 'required|string|max:255',
            'credit_point' => 'required|integer|min:10|max:2500',
            'features' => 'required|array',
            'features.*' => 'integer',
            'quantities' => 'required|array',
            'pets' => 'nullable|array',
            'rent_whos' => 'required|array',
            'other_details' => 'nullable|string',
            'many_time_evicted' => 'nullable|string',
            'contact_name' => 'required|string',
            'contact_phone_number' => 'required|digits:10',
            'contact_email' => 'required|email',
            'when_evicted' => 'nullable|string',
            'price_rent' => 'required|numeric',
            'eviction' => 'nullable|boolean',
            'smoking' => 'nullable|boolean',
            'bankruptcy' => 'nullable|boolean',
            'credit_history_check' => 'nullable|boolean',
            'criminal_records' => 'nullable|boolean',
            'parking' => 'nullable|boolean',
            'kind_of_parking'=>'nullable|string',
            'no_of_vehicle'=>'nullable|integer',
            'waterbed'=>'nullable|boolean',
            'availability_check'=>'nullable|boolean',
            'date_availability'=>'nullable|date',
            'lease_check'=>'nullable|boolean',
            'lease_type'=>'nullable|integer',
            'lease_period'=>'nullable|integer',
            'rent_type'=>'nullable|integer',
            'payment_frequency'=>'nullable|integer',
            'security_deposit'=>'nullable|boolean',
            'deposit_amount'=>'nullable|numeric',
            'conviction'=>'nullable|boolean',
            'conviction_pecify'=>'nullable|string',
            'credit_check'=>'nullable|boolean',



        ]);
        // Create the new property
        $property = Property::create([
            'user_id' => $id,
            'name' => $validated['name'],
            'address' => $validated['address'],
            'cat_id' => $validated['category'],
            'credit_point' => $validated['credit_point'],
            'other_details' => $validated['other_details'] ?? null,
            'available_status' => 1,
            'price_rent' => $validated['price_rent'],
            'when_evicted' => $validated['when_evicted'] ?? null,
            'contact_name' => $validated['contact_name'] ?? null,
            'contact_phone_number' => $validated['contact_phone_number'] ?? null,
            'contact_email' => $validated['contact_email'] ?? null,
            'eviction' => $validated['eviction'] ?? false,
            'criminal_records' => $validated['criminal_records'] ?? false,
            'country' => $validated['country'],
            'smoking' => $validated['smoking'] ?? false,
            'bankruptcy' => $validated['bankruptcy'] ?? false,
            'credit_history_check' => $validated['credit_history_check'] ?? false,

            'parking' => $validated['parking'] ?? false,
            'kind_of_parking' => $validated['kind_of_parking'] ?? null,
            'no_of_vehicle' => $validated['no_of_vehicle'] ?? null,
            'waterbed' => $validated['waterbed'] ?? false,
            'availability_check' => $validated['availability_check'] ?? false,
            'date_availability' => $validated['date_availability'] ?? null,
            'lease_check' => $validated['lease_check'] ?? false,
            'lease_type' => $validated['lease_type'] ?? null,
            'lease_period' => $validated['lease_period'] ?? null,
            'rent_type' => $validated['rent_type'] ?? null,
            'payment_frequency' => $validated['payment_frequency'] ?? null,
            'security_deposit' => $validated['security_deposit'] ?? false,
            'deposit_amount' => $validated['deposit_amount'] ?? null,
            'conviction' => $validated['conviction'] ?? false,
            'conviction_pecify' => $validated['conviction_pecify'] ?? null,
            'credit_check' => $validated['credit_check'] ?? false,

        ]);

        // Handle image upload and store paths in the Media model
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('image/property', 'public');
                Media::create([
                    'property_id' => $property->id,
                    'img_path' => $imagePath,
                ]);
            }
        }

        // Handle the rent_to_who relationship
        if ($request->has('rent_whos') && is_array($request->rent_whos)) {
            foreach ($request->rent_whos as $rentWhoId) {
                RentToWhoDetails::create([
                    'property_id' => $property->id,
                    'rent_to_who_id' => $rentWhoId,
                ]);
            }
        }

        // Handle the pets relationship
        if ($request->has('pets') && is_array($request->pets)) {
            foreach ($request->pets as $petId) {
                PetDetails::create([
                    'property_id' => $property->id,
                    'pet_id' => $petId,
                ]);
            }
        }

        // Handle the features relationship with quantities
        // Handle the features relationship with quantities
        if ($request->has('features') && is_array($request->features)) {
            foreach ($request->features as $featureId) {
                $quantity = $request->quantities[$featureId] ?? 1; // Default to 1 if not set
                FeatureDetails::create([
                    'property_id' => $property->id,
                    'feature_id' => $featureId,
                    'quantity' => $quantity, // Use the quantity input from the form
                ]);
            }
        }


        // Return a success response
        return redirect()->route('landlord.properties')->with(['success' => 'Property created successfully!'], 201);
    }

    public function category_store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        // Create the new category
        $category = Category::create([
            'name' => $validated['name']
        ]);

        // Return the newly created category as a JSON response
        return response()->json([
            'success' => true,
            'category' => $category
        ]);
    }
    public function propertiesdetails($id)
    {
        // Retrieve the specific property with its media, pets, and related features and feature details
        $property = Property::with(['media', 'pets.pet', 'features.feature' ,'RentToWhoDetails.rentToWho','category'])->findOrFail($id);
        $this->authorize('show', $property);
        $tenants = ApplyPropertyHistory::with('user')  // Assuming user is the tenant
        ->where('property_id', $id)
        ->get()
        ->pluck('user');

        return view('Dashboard.landlord.propertiesdetails', compact('tenants','property'));
    }

        public function properties_edit($id)
        {
            $property = Property::with(['category', 'media', 'pets', 'features', 'RentToWhoDetails.rentToWho'])->findOrFail($id);

            // Ensure that the user is authorized to edit this property
            $this->authorize('edit', $property);

            // Continue with fetching other data
            $allFeatures = Feature::all();
            $categories = Category::all();
            $pets = Pet::all();
            $rentWhos = RentToWho::all();

            return view('Dashboard.landlord.properties_edit', compact('property', 'categories', 'pets', 'rentWhos', 'allFeatures'));
        }


        public function properties_update(Request $request, $id)
{
        $property = Property::findOrFail($id);
        $this->authorize('update', $property);
        $validated = $request->validate([
            'images' => 'sometimes|array|max:50', // 'sometimes' means it's optional, unlike 'required'
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'existing_images' => 'sometimes|array', // Array of existing images being retained
            'deleted_images' => 'sometimes|array', // Array of images to be deleted
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'category' => 'required|integer',
            'progress_points' =>'required',
            'features' => 'required|array',
            'quantities' => 'required|array',
            'pets' => 'nullable|array',
            'rent_whos' => 'required|array',
            'other_details' => 'nullable|string',
            'availability' => 'required|boolean',
            'price' => 'required|numeric',
            'eviction' => 'nullable|boolean',
            'criminal_records' => 'nullable|boolean',
            'smoking' => 'nullable|boolean',
            'credit_history_check' => 'nullable|boolean',
            'bankruptcy' => 'nullable|boolean',
            'contact_name' => 'required|string',
            'contact_phone_number' => 'required|digits:10',
            'contact_email' => 'required|email',
            'country' => 'required|string|max:255',
            'many_time_evicted' => 'nullable|string',
            'when_evicted' => 'nullable|string',



        ]);
        if($validated['eviction']==0){
            $validated['many_time_evicted'] = null;
            $validated['when_evicted'] = null;
        }

        $property->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'cat_id' => $validated['category'],
            'credit_point' => $request['progress_points'],
            'other_details' => $validated['other_details'],
            'available_status' => $validated['availability'],
            'price_rent' => $validated['price'],
            'eviction' => $validated['eviction'] ?? false,
            'criminal_records' => $validated['criminal_records'] ?? false,
            'smoking' => $validated['smoking'] ?? false,
            'credit_history_check' => $validated['credit_history_check'] ?? false,
            'bankruptcy' => $validated['bankruptcy'] ?? false,
            'contact_name' => $validated['contact_name'] ?? null,
            'contact_phone_number' => $validated['contact_phone_number'] ?? null,
            'contact_email' => $validated['contact_email'] ?? null,
            'country' => $validated['country'],
            'many_time_evicted' => $validated['many_time_evicted'] ?? null,
            'when_evicted' => $validated['when_evicted'] ?? null,
        ]);

        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imgPath) {
                // Soft delete the image or remove the media record
                $media = Media::where('property_id', $property->id)
                            ->where('img_path', $imgPath)
                            ->first();
                if ($media) {
                    $media->delete(); // Soft delete
                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('image/property', 'public');
                Media::create([
                    'property_id' => $property->id,
                    'img_path' => $imagePath,
                ]);
            }
        }

        if ($request->has('rent_whos') && is_array($request->rent_whos)) {
            RentToWhoDetails::where('property_id', $property->id)->delete();
            foreach ($request->rent_whos as $rentWhoId) {
                RentToWhoDetails::create([
                    'property_id' => $property->id,
                    'rent_to_who_id' => $rentWhoId,
                ]);
            }
        }

        if ($request->has('pets') && is_array($request->pets)) {
            PetDetails::where('property_id', $property->id)->delete();
            foreach ($request->pets as $petId) {
                PetDetails::create([
                    'property_id' => $property->id,
                    'pet_id' => $petId,
                ]);
            }
        }

        if ($request->has('features') && is_array($request->features)) {
            // FeatureDetails::where('property_id', $property->id)->delete();
            foreach ($request->features as $featureId) {
                if (isset($request->quantities[$featureId]) && $request->quantities[$featureId] !== null) {
                    FeatureDetails::create([
                        'property_id' => $property->id,
                        'feature_id' => $featureId,
                        'quantity' => $request->quantities[$featureId],
                    ]);
                }
        }
        }

        return response()->json(['success' => 'Property updated successfully!'], 200);
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
                $this->authorize('delete', $property);
                $property->delete();

                return response()->json([
                    'message' => 'Property deleted successfully.',
                ]);
            }
        }

        }
