<?php

namespace App\Http\Controllers\tenant;

use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use App\Models\Wishlist;
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
        $user = Auth::user()->load('bank');
        return view('Dashboard.tenant.screening', compact('user'));
    }

    public function properties()
    {
        $userId = Auth::id();
        $user = User::find($userId, ['*','payment_status']);

        if ($user->payment_status == 1) {
            // Credit Point
            $scoreApi = ExpTenantFico9Model::where('user_id', $userId)->select('data')->latest()->first();
            $scoreApiJson = json_decode($scoreApi->data);
            $score = $scoreApiJson->riskModel[0]->score;
            // Credit Point

            // Eviction
            $eviction = EvictionReportModel::where('user_id', $userId)->select('data')->latest()->first();
            $evictionApi = json_decode($eviction->data);
            $evictionCount = 0;
            $recentEvictionDate = null;

            // Loop through candidates
            if (isset($evictionApi->response->candidate)) {
                foreach ($evictionApi->response->candidate as $candidate) {
                    $activity = $candidate->activity;
                    if (!empty($activity->judgement)) {
                        $evictionCount++;
                        $currentDate = $activity->judgementDate;
                        // Update recent eviction date if it's later
                        if ($recentEvictionDate === null || $currentDate > $recentEvictionDate) {
                            $recentEvictionDate = $currentDate;
                        }
                    }
                }
            }
            $formattedApiDate = \DateTime::createFromFormat('m-d-Y', $recentEvictionDate);
            // Format the date to 'Y-m-d' (Database format)
            $formattedApiDate = $formattedApiDate->format('Y-m-d');
            // Eviction

            // Crimnal
            $crimnal_record = CrimnalRecordModel::where('user_id', $userId)->select('data')->latest()->first();
            $crimnalApi = json_decode($crimnal_record->data);

            // Check if there are any criminal records
            if (isset($crimnalApi->cicCriminal->candidates->count) && $crimnalApi->cicCriminal->candidates->count > 0) {
                $criminalCount = $crimnalApi->cicCriminal->candidates->count;
            } else {
                $criminalCount = 0;
            }
            // Crimnal

            //old data

            $properties = Property::where('approve', 1)->with('category')->get();
            
            foreach ($properties as $property) {
                $property->hide = 0;  // Set the default value to not hide

                // // Eviction condition
                if ($property->eviction == 1) {
                    // if condition true prperty hide
                    if ($property->many_time_evicted < $evictionCount) {
                        $property->hide = 1;  // Hide if eviction conditions match
                    }

                    // if condition true prperty hide
                    if ($property->when_evicted < $formattedApiDate) {
                        $property->hide = 1;
                    }
                }
                
                // // Credit score condition
                if ($score < $property->credit_point) {
                    $property->hide = 1;  // Hide if credit score is insufficient
                }
                
                // // Criminal record condition
                if ($property->criminal_records == 1) {
                    if ($criminalCount > 0) {
                        $property->hide = 1;  // Hide if criminal count is greater than 0
                    }
                }
            }

            $properties = $properties->filter(function ($property) {
                return $property->hide == 0;
            });
        }else{
            $properties = [];
        }


        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)
            ->pluck('property_id')
            ->toArray();

        $categories = Category::all();
        return view('Dashboard.tenant.properties', compact('properties','user', 'wishlist', 'categories'));
    }

    public function fluterproperty($id)
    {
        $userId = Auth::id();
        $user = User::find($userId, ['*','payment_status']);

        if ($user->payment_status == 1) {
            // Credit Point
            $scoreApi = ExpTenantFico9Model::where('user_id', $userId)->select('data')->latest()->first();
            $scoreApiJson = json_decode($scoreApi->data);
            $score = $scoreApiJson->riskModel[0]->score;
            // Credit Point

            // Eviction
            $eviction = EvictionReportModel::where('user_id', $userId)->select('data')->latest()->first();
            $evictionApi = json_decode($eviction->data);
            $evictionCount = 0;
            $recentEvictionDate = null;

            // Loop through candidates
            if (isset($evictionApi->response->candidate)) {
                foreach ($evictionApi->response->candidate as $candidate) {
                    $activity = $candidate->activity;
                    if (!empty($activity->judgement)) {
                        $evictionCount++;
                        $currentDate = $activity->judgementDate;
                        // Update recent eviction date if it's later
                        if ($recentEvictionDate === null || $currentDate > $recentEvictionDate) {
                            $recentEvictionDate = $currentDate;
                        }
                    }
                }
            }
            $formattedApiDate = \DateTime::createFromFormat('m-d-Y', $recentEvictionDate);
            // Format the date to 'Y-m-d' (Database format)
            $formattedApiDate = $formattedApiDate->format('Y-m-d');
            // Eviction

            // Crimnal
            $crimnal_record = CrimnalRecordModel::where('user_id', $userId)->select('data')->latest()->first();
            $crimnalApi = json_decode($crimnal_record->data);

            // Check if there are any criminal records
            if (isset($crimnalApi->cicCriminal->candidates->count) && $crimnalApi->cicCriminal->candidates->count > 0) {
                $criminalCount = $crimnalApi->cicCriminal->candidates->count;
            } else {
                $criminalCount = 0;
            }
            // Crimnal

            //old data

            $properties = Property::where('approve', 1)->where('cat_id', $id)->with('category')->get();
            
            foreach ($properties as $property) {
                $property->hide = 0;  // Set the default value to not hide

                // // Eviction condition
                if ($property->eviction == 1) {
                    // if condition true prperty hide
                    if ($property->many_time_evicted < $evictionCount) {
                        $property->hide = 1;  // Hide if eviction conditions match
                    }

                    // if condition true prperty hide
                    if ($property->when_evicted < $formattedApiDate) {
                        $property->hide = 1;
                    }
                }
                
                // // Credit score condition
                if ($score < $property->credit_point) {
                    $property->hide = 1;  // Hide if credit score is insufficient
                }
                
                // // Criminal record condition
                if ($property->criminal_records == 1) {
                    if ($criminalCount > 0) {
                        $property->hide = 1;  // Hide if criminal count is greater than 0
                    }
                }
            }

            $properties = $properties->filter(function ($property) {
                return $property->hide == 0;
            });
        }else{
            $properties = [];
        }


        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)
            ->pluck('property_id')
            ->toArray();

        $categories = Category::all();
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
