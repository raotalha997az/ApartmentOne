<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Display a listing of the pets
    public function index()
    {
        $pets = Pet::orderBy('id', 'DESC')->get(); // Fetch all pets from the database
        return view('Dashboard.admin.pets.index', compact('pets')); // Return the view with pets data
    }

    // Show the form for creating a new pet
    public function create()
    {
        return view('Dashboard.admin.pets.create'); // Return the pet creation form
    }

    // Store a newly created pet in the database
    public function store(Request $request)
    {
        $request->validate([
            'pet' => 'required|string|max:255',
        ]);

        Pet::create([
            'name' => $request->pet,
        ]);

        return redirect()->route('admin.pets.index')->with('success', 'Pet created successfully!');
    }

    // Show the form for editing the specified pet
    public function edit($id)
    {
        $pet = Pet::findOrFail($id); // Find the pet by ID
        return view('Dashboard.admin.pets.edit', compact('pet')); // Return the edit form with pet data
    }

    // Update the specified pet in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'pet' => 'required|string|max:255',
        ]);

        $pet = Pet::findOrFail($id); // Find the pet by ID

        $pet->update([
            'name' => $request->pet,
        ]);

        return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully!');
    }

    // Remove the specified pet from the database
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id); // Find the pet by ID
        $pet->delete(); // Delete the pet

        return redirect()->route('admin.pets.index')->with('success', 'Pet deleted successfully!');
    }
}
