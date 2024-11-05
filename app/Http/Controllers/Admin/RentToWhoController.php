<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RentToWho;
use Illuminate\Http\Request;

class RentToWhoController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $rentToWhos = RentToWho::all();
        return view('Dashboard.admin.rentToWho.index', compact('rentToWhos'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('Dashboard.admin.rentToWho.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'rent_to_who' => 'required|string|max:255',
        ]);
        RentToWho::create([
            'name' => $request->rent_to_who,
        ]);
        return redirect()->route('admin.rent-to-who.index')->with('success', 'Rent To Who added successfully.');
    }
    // Show the form for editing the specified resource.
    public function edit($id)
    {   $rentToWho = RentToWho::findOrFail($id);
        return view('Dashboard.admin.rentToWho.edit', compact('rentToWho'));
    }

    // Update the specified resource in storage.
    public function update(Request $request,$id)
    {

        $request->validate([
            'rent_to_who' => 'required|string|max:255',
        ]);

        RentToWho::where('id', $id)->update([
            'name' => $request->rent_to_who,
        ]);

        return redirect()->route('admin.rent-to-who.index')->with('success', 'RentToWho updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $rentToWho = RentToWho::findOrFail($id);
        $rentToWho->delete(); // This will soft delete the record
        return redirect()->route('admin.rent-to-who.index')->with('success', 'RentToWho soft deleted successfully.');
    }
}

