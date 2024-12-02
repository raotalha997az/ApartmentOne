@extends('Website.layouts.master')
<style>
    .apartment-sevices-active::after {
content: "";
width: 8px;
height: 5px;
position: absolute;
background-color: #0077B6;
bottom: -5px;
left: 45%;
border-radius: 20px;
}

.header-menu li {
position: relative;
}
</style>
@section('content')

<section class="home-sec-01" style="background-image: url({{ asset ('assets/images/seeking-a-home-bg.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Service: Seeking A Home </h2>
                    <h1>Find You Dream Home<br> With Ease</h1>

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
                    <img src="{{ asset('assets/images/seeking-a-home-img-01.png')}}" alt="">
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
                    <img src="{{ asset('assets/images/seeking-a-home-img-02.png')}}" alt="">
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

<x-properties-component :value="$properties" />

<section class="seeking-ahome-sec-01">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="text">
                    <h3>Rentals Notifications</h3>
                <h2>Get Notified Before The date decided </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
            <div class="col-lg-6 col-md-12">
                <div class="img-box text-right">
                    <img src="{{ asset('assets/images/cut-right-laptop.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<section class="seeking-ahome-sec-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h3>Steps Of Home Seeking</h3>
                    <h2>Everything must be in a secure and fast<br> way </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the<br> industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="text-box">
                    <h6>Step 01</h6>
                    <h5>Screening Tenant</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-box">
                    <h6>Step 02</h6>
                    <h5>Credit Report Base Listings</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-box">
                    <h6>Step 03</h6>
                    <h5>less declinable apply process</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-box">
                    <h6>Step 04</h6>
                    <h5>get a desired home!</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
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
        </div>
    </div>

</section>

@endsection
