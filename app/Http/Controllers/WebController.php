<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Jobs\ContactFormMailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

        $testimonials = Testimonial::orderBy('id', 'desc')->get();


    $counterData = [
        'counterValue' => $properties->count(),
        'propertiesTodayCount' => $properties_new->count(),
        'properties_sold' => $properties_sold->count(),
    ];

    return view('Website.index', compact( 'counterData', 'properties', 'testimonials'));
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
        $testimonials = Testimonial::orderBy('id', 'desc')->get();

    $counterData = [
        'counterValue' => $properties->count(),
        'propertiesTodayCount' => $properties_new->count(),
        'properties_sold' => $properties_sold->count(),
    ];
        return view('Website.about',compact('counterData', 'properties', 'testimonials'));
    }

    public function help()
    {
        $properties = Property::with(['user', 'media'])
        ->orderBy('id', 'desc')
        ->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('Website.help', compact('properties', 'testimonials'));
    }


    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('Website.blog')->with(compact('blogs', 'testimonials'));
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

    public function privacy_policy()
    {
        return view('Website.privacy_policy');
    }

    public function terms_and_conditions()
    {
        return view('Website.terms_and_conditions');
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
        $blogs_all = Blog::orderBy('id', 'DESC')->get();
        return view('Website.blogdescription')->with(compact('blog', 'blogs_all'));

    }

}
