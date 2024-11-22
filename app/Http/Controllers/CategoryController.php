<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::orderBy('id', 'DESC')->get(); // Fetch all categories ordered by 'created_at' in descending order
        return view('Dashboard.admin.category.index', compact('categorys')); // Return the view with pets data
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Category created successfully', 'category' => $category], 201);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

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
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Category updated successfully', 'category' => $category], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $properties = Property::where('cat_id', $id)->get();
        if($properties){
            return response()->json(['error' => ' You can not delete this category because it include in properties!'], 200);
        }

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
