@extends('Website.layouts.master')
@section('content')

<section class="home-sec-01" style="background-image: url({{ asset('assets/images/contact-us-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Contact Us </h2>
                    <h1>Lets Collaborate With<br> Each Other</h1>      
                </div>
            </div>
        </div>
    </div>  
</section>

<section class="contact-us-sec-01">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="iframe-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1473.7515500282457!2d-71.11903947886567!3d42.374427909127924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e377427d7f0199%3A0x5937c65cee2427f0!2sHarvard%20University!5e0!3m2!1sen!2s!4v1725925469583!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text">
                    <h2>Lets Discuss a dream<br> together</h2>
                </div>
                <div class="form-box">
                    <form action="">
                        <div class="two-input-align">
                            <input type="text" placeholder="Full Name">
                            <input type="text" placeholder="Email Address">
                        </div>
                        <input type="tel"  placeholder="Contact Number">
                        <textarea placeholder="Type Here"></textarea>
                        <button>Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection