<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            // Retrieve the uploaded file
            $file = $request->file('image');

            // Generate a unique name for the image
            $uniqueName = 'category_' . Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Define the destination path within the public directory
            $destinationPath = public_path('assets/categories');

            // Ensure the directory exists; create it if it doesn't
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the image to the destination path
            $file->move($destinationPath, $uniqueName);

            // Store the relative path for saving in the database or elsewhere
            $imagePath = 'assets/categories/' . $uniqueName;

            // Generate the public URL for the image
            $imageUrl = asset($imagePath);
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
        // $category->image_url = $category->image ? Storage::url($category->image) : null;
        $category->image_url = $category->image ? asset($category->image) : null;


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
        // if ($request->hasFile('image')) {
        //     // Delete the old image from storage if it exists
        //     if ($category->image && Storage::disk('public')->exists('categories/' . $category->image)) {
        //         Storage::disk('public')->delete('categories/' . $category->image);
        //     }

        //     $imagePath = $request->file('image')->store('categories', 'public'); // Save to storage/app/public/categories
        //     $imageUrl = asset($imagePath); // Generate URL for the stored image
        //     $category->image = $imageUrl;
        // }
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($category->image && file_exists(public_path('assets/categories/' . basename($category->image)))) {
                unlink(public_path('assets/categories/' . basename($category->image)));
            }

            // Retrieve the uploaded file
            $file = $request->file('image');

            // Generate a unique name for the new image
            $uniqueName = 'category_' . Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Define the destination path
            $destinationPath = public_path('assets/categories');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the image to the destination path
            $file->move($destinationPath, $uniqueName);

            // Update the image path in the database
            $category->image = 'assets/categories/' . $uniqueName;
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

        if ($category->image) {
            // Construct the full path to the image
            $imagePath = public_path($category->image);

            // Verify if the image file exists
            if (File::exists($imagePath)) {
                // Delete the image file
                File::delete($imagePath);
            }
        }
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
