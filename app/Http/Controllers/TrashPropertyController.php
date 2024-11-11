<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class TrashPropertyController extends Controller
{ public function index(){
    // $users = User::onlyTrashed()->orderBy('id', 'updated_at')->paginate(10);
    $properties = Property::onlyTrashed()
                    ->orderByDesc('updated_at')
                    ->paginate(10);
    return view('Dashboard.landlord.TrashProperties', compact('properties'));
   }
/*************  ✨ Codeium Command 🌟  *************/
   public function undo($id){
    $propertie = Property::withTrashed()->find($id);
    if ($propertie) {
        $propertie->restore(); // Restore the user
    }
    return redirect()->route('landlord.trash.index')->with('success', 'Prorety Reverted successfully!');

}
/******  51c7b581-c8b7-4a1e-8ebe-d18ca9886bfc  *******/
}
