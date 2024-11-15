<?php

namespace App\Http\Controllers\tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplyPropertyHistory;
use Illuminate\Support\Facades\Auth;

class ApplyPropertyHistoryController extends Controller
{
    public function applyhistory()
    {

        $userId = Auth::id();
        $Applyproperties =ApplyPropertyHistory::where('user_id', $userId)->with('property')->get();
        // dd($Applyproperties);

        return view('Dashboard.tenant.applyhistory', compact('Applyproperties'));
    }
}
