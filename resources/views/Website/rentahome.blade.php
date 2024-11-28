@extends('Website.layouts.master')
@section('content')


<section class="home-sec-01" style="background-image: url({{ asset('assets/images/rent-a-home-bg.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Service </h2>
                    <h1>Find Your Perfect Tenant<br> With Ease</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-sec-02 service-sec-01">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="text text-right-pading">
                    <h3>Seeking A Dream Home</h3>
                    <h2>Find your perfect Home with a single click</h2>
                    <p>Welcome to our platform that connects landlords with renters. Submit your rental application and let landowners view and evaluate them. Start your search</p>
                    @if (Auth::user())
                    @if (Auth::user()->hasRole('tenant'))
                        <a href="{{ route('tenant.dashboard') }}" class="t-btn t-btn-blue">Get Started</a>
                    @elseif(Auth::user()->hasRole('land_lord'))
                        <a href="{{ route('landlord.dashboard') }}" class="t-btn t-btn-blue">Get Started</a>
                    @elseif(Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.dashboard') }}" class="t-btn t-btn-blue">Get Started</a>
                    @endif
        @else
            <a href="{{ route('register') }}" class="t-btn t-btn-blue">Get Started</a>
        @endif
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="img-box">
                    <img src="{{ asset('assets/images/rent-a-home-bg-img-01.png')}}" alt="">
                </div>

            </div>
        </div>
    </div>

</section>

<section class="home-sec-02 home-sec-04 service-sec-02 ">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">
                <div class="img-box">
                    <img src="{{ asset('assets/images/rent-a-home-bg-img-02.png')}}" alt="">
                </div>

            </div>

            <div class="col-lg-6 col-md-12">
                <div class="text text-left-pading">
                    <h2>No Matter Of category Every Category Is Here</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.</p>
                    <div class="tick-true">
                        <ul>
                            <li><img src="{{ asset('assets/images/tick-true.png')}}" alt="">Lorem Ipsum is simply dummy text.</li>
                            <li><img src="{{ asset('assets/images/tick-true.png')}}" alt="">Lorem Ipsum is simply dummy text.</li>
                            <li><img src="{{ asset('assets/images/tick-true.png')}}" alt="">Lorem Ipsum is simply dummy text.</li>
                            <li><img src="{{ asset('assets/images/tick-true.png')}}" alt="">Lorem Ipsum is simply dummy text.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<x-easiest-way-to-commute />

<section class="service-sec-04">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="text number-box">
                    <h6>01</h6>
                    <h5>Register a new land lord Account/Login</h5>
                    <p>Welcome to our platform that connects landlords with renters. Submit your rental application and let landowners view and evaluate them. Start your search</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text number-box">
                    <h6>02</h6>
                    <h5>List Property with you requirements</h5>
                    <p>Welcome to our platform that connects landlords with renters. Submit your rental application</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text number-box">
                    <h6>03</h6>
                    <h5>Get 100% matched and interested profiles messages </h5>
                    <p>Welcome to our platform that connects landlords with renters. Submit your rental application</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text number-box">
                    <h6>04  </h6>
                    <h5>Select A tenant and get your property rented</h5>
                    <p>Welcome to our platform that connects landlords</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    @if (Auth::user())
                    @if (Auth::user()->hasRole('tenant'))
                        <a href="{{ route('tenant.dashboard') }}" class="t-btn t-btn-blue">Start Listing Your Property Today</a>
                    @elseif(Auth::user()->hasRole('land_lord'))
                        <a href="{{ route('landlord.dashboard') }}" class="t-btn t-btn-blue">Start Listing Your Property Today</a>
                    @elseif(Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.dashboard') }}" class="t-btn t-btn-blue">Start Listing Your Property Today</a>
                    @endif
        @else
            <a href="{{ route('register') }}" class="t-btn t-btn-blue">Start Listing Your Property Today</a>
        @endif

                </div>
            </div>
        </div>
    </div>

</section>

@endsection
