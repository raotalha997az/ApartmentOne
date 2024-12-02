<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Jobs\ContactFormMailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class WebController extends Controller
{
    public function index()
{
    $properties = Property::with(['user', 'media'])
        ->orderBy('id', 'desc')
        ->get();

    $properties_new = Property::with(['user', 'media'])
        ->whereDate('created_at', Carbon::today())
        ->orderBy('id', 'desc')
        ->get();

        $properties_sold = Property::with(['user', 'media'])
        ->where('available_status', 0) // Add the condition here
        ->orderBy('id', 'desc')
        ->get();


    $counterData = [
        'counterValue' => $properties->count(),
        'propertiesTodayCount' => $properties_new->count(),
        'properties_sold' => $properties_sold->count(),
    ];

    return view('Website.index', compact( 'counterData', 'properties'));
}



    public function about()
    {
        $properties = Property::with(['user', 'media'])
        ->orderBy('id', 'desc')
        ->get();

    $properties_new = Property::with(['user', 'media'])
        ->whereDate('created_at', Carbon::today())
        ->orderBy('id', 'desc')
        ->get();

        $properties_sold = Property::with(['user', 'media'])
        ->where('available_status', 0) // Add the condition here
        ->orderBy('id', 'desc')
        ->get();


    $counterData = [
        'counterValue' => $properties->count(),
        'propertiesTodayCount' => $properties_new->count(),
        'properties_sold' => $properties_sold->count(),
    ];
        return view('Website.about',compact('counterData', 'properties'));
    }

    public function help()
    {
        $properties = Property::with(['user', 'media'])
        ->orderBy('id', 'desc')
        ->get();
        return view('Website.help', compact('properties'));
    }


    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('Website.blog')->with(compact('blogs'));
    }

    public function faqs()
    {
        return view('Website.faqs');
    }

    public function contact()
    {
        return view('Website.contact');
    }

    public function contact_store(Request $request)
{
    // Validate the input fields
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email',
        'phone_number' => 'required|digits:10',  // Ensure exactly 10 digits
        'message' => 'required|string',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        // Redirect back with input data and validation errors
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Validation passed, send the email
    try {

        ContactFormMailJob::dispatch($request->all());
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    } catch (\Exception $e) {
        // Handle error if email fails to send
        return redirect()->back()->with('error', 'Something went wrong, please try again.');
    }
}

    public function services()
    {
        return view('Website.services');
    }

    public function seekingahome()
    {
        $properties = Property::with(['user', 'media'])
        ->orderBy('id', 'desc')
        ->get();

        return view('Website.seekingahome', compact('properties'));
    }

    public function rentahome()
    {
        return view('Website.rentahome');
    }

    public function info()
    {
        return view('Website.info');
    }

    public function login()
    {
        return view('Website.login');
    }

    public function register()
    {
        return view('Website.register');
    }


    public function blogDetails($id)
    {

        $blog = Blog::where('id', $id)->first();
        return view('Website.blogdescription')->with(compact('blog'));

    }

}
