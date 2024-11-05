<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all(); // Fetch all pets from the database
        return view('Dashboard.admin.category.index', compact('categorys')); // Return the view with pets data
    }
}
