<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index(){
        $testimonals = Testimonial::orderBy('id', 'desc')->get();
        return view('Dashboard.admin.testimonial.index', compact('testimonals'));
    }


    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string|max:255',
            'testimonial' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save the testimonial to the database
        Testimonial::create([
            'name' => $request->input('client_name'),
            'testimonial' => $request->input('testimonial'),
        ]);

        // Redirect back with success message
        return back()->with('success', 'Testimonial added successfully!');
    }



            // Edit Method
            public function edit($id)
            {
                // Find the testimonial by id
                $testimonial = Testimonial::findOrFail($id);
                // dd($testimonial);
                // Return the testimonial data as JSON
                return response()->json($testimonial);
            }



// Update Method
public function update(Request $request, $id)
{
    // Define validation rules
    $validator = Validator::make($request->all(), [
        'client_name' => 'required|string|max:255',
        'testimonial' => 'required|string',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    // Find the testimonial by id
    $testimonial = Testimonial::findOrFail($id);

    // Update the testimonial data
    $testimonial->update([
        'name' => $request->input('client_name'),
        'testimonial' => $request->input('testimonial'),
    ]);

    // Redirect back with success message
    return redirect()->route('admin.testimonial')->with('success', 'Testimonial updated successfully!');
}


    public function destroy($id)
{
    // Find the testimonial by id and delete it
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->delete();

    // Redirect back with a success message
    return back()->with('success', 'Testimonial deleted successfully!');
}


}
