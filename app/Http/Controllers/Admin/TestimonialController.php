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
    $validator = Validator::make($request->all(), [
        'client_name' => 'required|string|max:255',
        'testimonial' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    Testimonial::create([
        'name' => $request->input('client_name'),
        'testimonial' => $request->input('testimonial'),
    ]);

    return response()->json(['success' => 'Testimonial added successfully!']);
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
    $validator = Validator::make($request->all(), [
        'client_name' => 'required|string|max:255',
        'testimonial' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $testimonial = Testimonial::findOrFail($id);
    $testimonial->update([
        'name' => $request->input('client_name'),
        'testimonial' => $request->input('testimonial'),
    ]);

    return response()->json(['success' => 'Testimonial updated successfully!']);
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
