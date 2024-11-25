<?php

namespace App\Http\Controllers;

use App\Models\NewsLatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(){
        $newslatter = NewsLatter::all();
    }


    public function store(Request $request)
{
    // Validate the input
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:255|unique:newslatters',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        // Return validation errors as JSON response
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ]);
    }

    // Validate passed, save the email to the database
    NewsLatter::create([
        'email' => $request->email,
    ]);

    // Return success message
    return response()->json([
        'success' => true,
        'message' => 'Thank you for subscribing!'
    ]);
}
    // public function store(Request $request)
    // {
    //     // Validate the input
    //     $validator = Validator::make($request->all(),[
    //         'email' => 'required|string|email|max:255|unique:newslatters',
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     $data = $validator->validated();
    //     // Save the email to the database
    //     NewsLatter::create([
    //         'email' => $data['email'], // Use the validated email,
    //     ]);

    //     // Redirect with a success message
    //     return redirect()->back()->with('success', 'Thank you for subscribing!');
    // }



}
