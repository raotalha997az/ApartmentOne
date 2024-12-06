<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\NewsLatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(){
        $newslatters = NewsLatter::all();
        return view('Dashboard.admin.newslatters.index',compact('newslatters'));
    }

    public function payments(){
        $Payments = Payment::orderBy('id', 'desc')->with('user')->get();
        return view('Dashboard.admin.Payments.index',compact('Payments'));
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


}
