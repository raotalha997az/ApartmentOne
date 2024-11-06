<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
        {
            $blogs = Blog::orderBy('id','DESC')->get();
            return view('Dashboard.admin.blogs.index' , compact('blogs'));
        }

        public function create(){
            return view('Dashboard.admin.blogs.create');
        }

        public function store(Request $request)
        {
            // Validate request data
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs',
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'page_title' => 'required|string|max:255',
                'meta_tag' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4048',
            ]);

            // Gather validated data
            $data = $request->only(['title', 'slug', 'short_description', 'long_description', 'page_title', 'meta_tag']);

            // Handle image upload if available
            if ($request->hasFile('image')) {
                // Get file extension
                $extension = $request->file('image')->getClientOriginalExtension();
                // Generate unique name with 'blog' prefix
                $uniqueName = 'blog' . Str::random(40) . '.' . $extension;
                // Store the image in the 'public' directory
                $request->file('image')->storeAs('public/blog', $uniqueName);
                // Save the image name in the $data array (without 'public/')
                $data['image'] =  $uniqueName;
            }

            // Create a new blog entry with the data
            Blog::create($data);

            return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
        }

        public function edit($id)
        {
            $blog = Blog::findOrFail($id);
            return view('Dashboard.admin.blogs.create')->with(compact('blog'));
        }

        public function update($id, Request $request)
        {
            // dd($request->all());
            $blog = Blog::findOrFail($id);

            // Validate the incoming request
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id, // Ignore current blog slug during validation
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'page_title' => 'required|string|max:255',
                'meta_tag' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4048',
            ]);

            // Prepare the data for update
            $data = $request->only(['title', 'slug', 'short_description', 'long_description', 'page_title', 'meta_tag','image']);

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($blog->image) {
                    $oldImagePath = storage_path('app/public/' . $blog->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Remove old image
                    }
                }

                if ($request->hasFile('image')) {
                    // Get file extension
                    $extension = $request->file('image')->getClientOriginalExtension();
                    // Generate unique name with 'blog' prefix
                    $uniqueName = 'blog' . Str::random(40) . '.' . $extension;
                    // Store the image in the 'public' directory
                    $request->file('image')->storeAs('public/blog', $uniqueName);
                    // Save the image name in the $data array (without 'public/')
                    $data['image'] =  $uniqueName;
                }
            }

            // Update the blog entry with the new data
            $blog->update($data);

            // Redirect with success message
            return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
        }

        public function destroy(Request $request, $id)
        {
            $blog = Blog::findOrFail($id);
            // Delete the image file if it exists
            if ($blog->image) {
               $imagePath = storage_path('app/public/' . $blog->image);
               if (file_exists($imagePath)) {
                   unlink($imagePath);
               }
           }
           $blog->delete();
           return response()->json(['success' => true, 'message' => 'Staff deleted successfully!']);
        }

}
