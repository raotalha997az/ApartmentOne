<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::orderBy('id', 'DESC')->get(); // Fetch all categories ordered by 'created_at' in descending order
        return view('Dashboard.admin.category.index', compact('categorys')); // Return the view with pets data
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048', // Validating the image
        ]);

        // Handle the image upload
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('categories', 'public'); // Save to storage/app/public/categories
        //     $imageUrl = asset('storage/' . $imagePath); // Generate URL for the stored image
        // }
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = 'category_' . Str::random(40) . '.' . $extension;

            // Define the destination path for storing the image
            $destinationPath = public_path('assets/categories');

            // Generate the public URL for the image
            $imageUrl = asset($destinationPath);
        }

        // Create the category
        $category = Category::create([
            'name' => $request->name,
            'image' => $imagePath ?? null, // Save the path or null if no image
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
            'image_url' => $imageUrl ?? null, // Return the image URL
        ], 201);
    }


    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Include the full URL of the image
        $category->image_url = $category->image ? Storage::url($category->image) : null;

        return response()->json(['category' => $category], 200);
    }



    // Update an existing category
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the name
        $category->name = $request->name;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($category->image && Storage::disk('public')->exists('categories/' . $category->image)) {
                Storage::disk('public')->delete('categories/' . $category->image);
            }

            $imagePath = $request->file('image')->store('categories', 'public'); // Save to storage/app/public/categories
            $imageUrl = asset($imagePath); // Generate URL for the stored image
            $category->image = $imageUrl;
        }
        // Save the changes
        $category->save();

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category,
        ], 200);
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $properties = Property::where('cat_id', $id)->get();

        // Check if there are any properties associated with the category
        if ($properties->isNotEmpty()) {
            return response()->json(['error' => 'You cannot delete this category because it includes properties!'], 200);
        }

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
