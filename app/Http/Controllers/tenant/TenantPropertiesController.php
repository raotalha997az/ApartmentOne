<?php

namespace App\Http\Controllers\tenant;

use App\Models\Pet;
use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use App\Models\Wishlist;
use App\Models\Screening;
use Illuminate\Http\Request;
use App\Models\ExpTenantVantage4;
use App\Models\CrimnalRecordModel;
use Illuminate\Support\Facades\DB;
use App\Models\EvictionReportModel;
use App\Models\ExpTenantFico9Model;
use App\Http\Controllers\Controller;
use App\Models\ApplyPropertyHistory;
use Illuminate\Support\Facades\Auth;
use App\Events\PropertyApplicationEvent;
use App\Notifications\PropertyApplicationNotification;

class TenantPropertiesController extends Controller
{

    public function screening()
    {
        $user = Auth::user()->load('bank','screening');
        $categories =  Category::all();
        $pets = Pet::select('name','id')->get();

        return view('Dashboard.tenant.screening', compact('pets','user','categories'));
    }

    public function properties()
    {
        $userId = Auth::id();
        $user = User::find($userId, ['*', 'payment_status']);

        if ($user->payment_status == 1) {
            // Retrieve the user's screening preferences
            $screening = Screening::where('user_id', $userId)->with('pets')->latest()->first();

            if (!$screening) {
                return view('Dashboard.tenant.properties', [
                    'properties' => collect([]),
                    'categories' => Category::all(),
                    'wishlist' => Wishlist::where('user_id', $userId)->pluck('property_id')->toArray(),
                    'user' => $user,
                ]);
            }

            // Retrieve all approved properties
            $properties = Property::where('approve', 1)->with('category')->get();

            foreach ($properties as $property) {
                $property->hide = 0; // Default: do not hide

                // Eviction conditions
                $evictionCount = $this->getEvictionCount($userId);
                $recentEvictionDate = $this->getRecentEvictionDate($userId);

                if ($property->eviction == 1) {
                    if ($property->many_time_evicted < $evictionCount || $property->when_evicted < $recentEvictionDate) {
                        $property->hide = 1;
                    }
                }

                // Credit score condition
                $score = $this->getCreditScore($userId);
                if ($score < $property->credit_point) {
                    $property->hide = 1;
                }

                // Criminal record condition
                $criminalCount = $this->getCriminalCount($userId);
                if ($property->criminal_records == 1 && $criminalCount > 0) {
                    $property->hide = 1;
                }

                // Screening preferences
                if ($screening->cat_id && $property->cat_id != $screening->cat_id) {
                    $property->hide = 1;
                }

                // Check if the property does not allow pets
                if ($property->pets->isEmpty()) {
                    // If pets are not allowed and tenant has pets, hide the property
                    if ($screening->pets->isNotEmpty()) {
                        $property->hide = 1;
                        continue; // Skip further checks for this property
                    }
                } else {
                    // Property allows pets
                    if ($screening->pets->isNotEmpty()) {
                        $matchedPet = false;

                        // Loop through tenant's pets to check for a match with allowed pets
                        foreach ($screening->pets as $screeningPet) {
                            // Check if the pet is allowed by the landlord
                            if ($property->pets->contains('pet_id', $screeningPet->pet_id)) {
                                $matchedPet = true;
                                break; // Exit loop as soon as a match is found
                            }
                        }
                        // If no pets match and tenant has pets, hide the property
                        if (!$matchedPet) {
                            $property->hide = 1;
                        }
                    }
                }
                if ($screening->smoke && !$property->smoking) {
                    $property->hide = 1;
                }

                if ($screening->waterbed && !$property->waterbed) {
                    $property->hide = 1;
                }
                if ($screening->lease_short_term && !($property->lease_type == 1) == $screening->lease_short_term) {
                    $property->hide = 1;
                }


                if ($property->security_deposit  && $screening->deposit_amount < $property->deposit_amount) {
                    $property->hide = 1;
                }
            }

            // Filter properties to exclude hidden ones
            $properties = $properties->filter(function ($property) {
                return $property->hide == 0;
            });
        } else {
            $properties = collect([]);
        }

        $categories = Category::all();
        $wishlist = Wishlist::where('user_id', $userId)->pluck('property_id')->toArray();

        return view('Dashboard.tenant.properties', compact('properties', 'categories', 'wishlist', 'user'));
    }

    private function getEvictionCount($userId)
    {
        $eviction = EvictionReportModel::where('user_id', $userId)->select('data')->latest()->first();
        $evictionApi = json_decode($eviction->data);
        $count = 0;

        if (isset($evictionApi->response->candidate)) {
            foreach ($evictionApi->response->candidate as $candidate) {
                if (!empty($candidate->activity->judgement)) {
                    $count++;
                }
            }
        }

        return $count;
    }

    private function getRecentEvictionDate($userId)
    {
        $eviction = EvictionReportModel::where('user_id', $userId)->select('data')->latest()->first();
        $evictionApi = json_decode($eviction->data);
        $recentDate = null;

        if (isset($evictionApi->response->candidate)) {
            foreach ($evictionApi->response->candidate as $candidate) {
                $date = $candidate->activity->judgementDate ?? null;
                if ($date && ($recentDate === null || $date > $recentDate)) {
                    $recentDate = $date;
                }
            }
        }

        return $recentDate ? \DateTime::createFromFormat('m-d-Y', $recentDate)->format('Y-m-d') : null;
    }

    private function getCreditScore($userId)
    {
        $scoreApi = ExpTenantFico9Model::where('user_id', $userId)->select('data')->latest()->first();
        $scoreApiJson = json_decode($scoreApi->data);
        return $scoreApiJson->riskModel[0]->score ?? 0;
    }

    private function getCriminalCount($userId)
    {
        $criminalRecord = CrimnalRecordModel::where('user_id', $userId)->select('data')->latest()->first();
        $criminalApi = json_decode($criminalRecord->data);

        return $criminalApi->cicCriminal->candidates->count ?? 0;
    }

    public function fluterproperty($id)
    {
        // $userId = Auth::id();
        // $user = User::find($userId, ['*','payment_status']);

        // $properties = Property::where('approve', 1)->where('cat_id', $id)->where('deleted_at', null)->with('media', 'pets.pet', 'features.feature' ,'RentToWhoDetails.rentToWho','category')->get();

        // $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        // $wishlist = Wishlist::where('user_id', Auth::user()->id)
        //     ->pluck('property_id')
        //     ->toArray();

        // $categories = Category::all();
        $userId = Auth::id();
        $user = User::find($userId, ['*', 'payment_status']);

                if ($user->payment_status == 1) {
                    // Retrieve screening preferences
                    $screening = Screening::where('user_id', $userId)->with('pets')->latest()->first();

                    // Retrieve all approved properties
                    $properties = Property::where('approve', 1)
                        ->where('cat_id', $id)
                        ->whereNull('deleted_at')
                        ->with('media', 'pets.pet', 'features.feature', 'RentToWhoDetails.rentToWho', 'category')
                        ->get();

                    foreach ($properties as $property) {
                        $property->hide = 0; // Default: not hidden

                        // Eviction conditions
                        $evictionCount = $this->getEvictionCount($userId);
                        $recentEvictionDate = $this->getRecentEvictionDate($userId);

                        if ($property->eviction == 1) {
                            if ($property->many_time_evicted < $evictionCount || $property->when_evicted < $recentEvictionDate) {
                                $property->hide = 1;
                            }
                        }

                        // Credit score condition
                        $score = $this->getCreditScore($userId);
                        if ($score < $property->credit_point) {
                            $property->hide = 1;
                        }

                        // Criminal record condition
                        $criminalCount = $this->getCriminalCount($userId);
                        if ($property->criminal_records == 1 && $criminalCount > 0) {
                            $property->hide = 1;
                        }

                        // Screening preferences
                        if ($screening && $screening->cat_id && $property->cat_id != $screening->cat_id) {
                            $property->hide = 1;
                        }

                        // Pets condition
                        if ($property->pets->isEmpty()) {
                            if ($screening && $screening->pets->isNotEmpty()) {
                                $property->hide = 1;
                                continue;
                            }
                        } else {
                            if ($screening && $screening->pets->isNotEmpty()) {
                                $matchedPet = false;

                                foreach ($screening->pets as $screeningPet) {
                                    if ($property->pets->contains('pet_id', $screeningPet->pet_id)) {
                                        $matchedPet = true;
                                        break;
                                    }
                                }

                                if (!$matchedPet) {
                                    $property->hide = 1;
                                }
                            }
                        }

                        // Smoking condition
                        if ($screening && $screening->smoke && !$property->smoking) {
                            $property->hide = 1;
                        }

                        // Waterbed condition
                        if ($screening && $screening->waterbed && !$property->waterbed) {
                            $property->hide = 1;
                        }

                        // Lease term condition
                        if ($screening && $screening->lease_short_term && $property->lease_type != 1) {
                            $property->hide = 1;
                        }

                        // Security deposit condition
                        if ($screening && $property->security_deposit && $screening->deposit_amount < $property->deposit_amount) {
                            $property->hide = 1;
                        }
                    }

                    // Exclude hidden properties
                    $properties = $properties->filter(function ($property) {
                        return $property->hide == 0;
                    });
                } else {
                    $properties = collect([]); // Empty collection if payment status is not valid
                }

                // Retrieve categories and wishlist
                $categories = Category::all();
                $wishlist = Wishlist::where('user_id', $userId)
                    ->pluck('property_id')
                    ->toArray();


        return view('Dashboard.tenant.properties', compact('user','properties', 'wishlist', 'categories'));
    }

    public function propertieslistings()
    {
        return view('Dashboard.tenant.propertieslistings');
    }

    public function propertiesdetails($id)
    {
        // Retrieve the specific property with its media, pets, and related features and feature details
        $property = Property::with(['user', 'media', 'pets.pet', 'features.feature', 'RentToWhoDetails.rentToWho', 'category'])->findOrFail($id);
        // $this->authorize('show', $property);
        $AppliedProperies = ApplyPropertyHistory::where('user_id', Auth::user()->id)
            ->pluck('property_id')
            ->toArray();

        return view('Dashboard.tenant.propertiesdetails', compact('property', 'AppliedProperies'));
    }

    public function applyForProperty(Request $request, $id, $user)
    {
        $property = Property::findOrFail($id);
        $userId = $property->user_id; // Landlord's user ID
        $landlord = User::findOrFail($userId);
        $tenant = User::findOrFail($user);
        $propertyId = $property->id;
        $tenantId = $tenant->id;

        // Check if tenant already applied for the property
        $applyPropertyHistory = ApplyPropertyHistory::where('property_id', $propertyId)
            ->where('user_id', $tenantId)
            ->first();

        if ($applyPropertyHistory) {
            session()->flash('error', 'You have already applied for this property.');
            return redirect()->route('tenant.propertiesdetails', ['id' => $property->id]);
        }

        // Save application history
        $applyPropertyHistory = new ApplyPropertyHistory();
        $applyPropertyHistory->user_id = $tenantId;
        $applyPropertyHistory->property_id = $propertyId;
        $applyPropertyHistory->save();

        // Notify the landlord
        $landlord->notify(new PropertyApplicationNotification($property, $tenant));

        // Fetch admin users (assuming 'admin' is a role in your system)
        $admins = User::role('admin')->get(); // Use appropriate method to fetch admin users based on your implementation

        foreach ($admins as $admin) {
            $admin->notify(new PropertyApplicationNotification($property, $tenant));
        }

        // Retrieve the most recent notification ID for the landlord
        $notification = DB::table('notifications')
            ->where('notifiable_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        $notificationId = $notification->id;

        // Trigger real-time broadcast for landlord
        event(new PropertyApplicationEvent(
            $landlord->id,
            'Your property "' . $property->name . '" has been applied by ' . $tenant->name . '.',
            $notificationId
        ));

        // Trigger real-time broadcast for each admin
        foreach ($admins as $admin) {
            event(new PropertyApplicationEvent(
                $admin->id,
                'A new application for property "' . $property->name . '" by ' . $tenant->name . '.',
                $notificationId // Optional: You can create a unique notification ID for each admin
            ));
        }
        // Ensure the user is authenticated
        $userid = Auth::id();

        // Check if the property exists in the wishlist
        $wishlist = Wishlist::where('user_id', $userid)->where('property_id', $propertyId)->first();
        if ($wishlist) {
            $wishlist->delete();
        }

        session()->flash('success', 'Application submitted successfully!');

        // Redirect to property details page
        return redirect()->route('tenant.propertiesdetails', ['id' => $property->id]);
    }


}
