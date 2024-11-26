<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Jobs\ContactFormMailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index()
    {
        return view('Website.index');
    }

    public function about()
    {
        return view('Website.about');
    }

    public function help()
    {
        return view('Website.help');
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
        return view('Website.seekingahome');
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
