<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

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
        $blogs = Blog::paginate(10);
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
