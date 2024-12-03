@extends('Website.layouts.master')
@section('content')

<section class="home-sec-01" style="background-image: url({{ asset('assets/images/info-bg.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Privacy Policy </h2>
                    <h1>Privacy Policies + Terms<br> & Conditions</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="info-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>How to Avail Apartment One’s Management Services </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h2>What Is The Main Criteria to get paid for rentals</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h2>Lorem Is Simply A Dummy Text</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h2>Lorem Is Simply</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h2>Lorem Is Simply A Dummy Text</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h2>Lorem Is Simply</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h2>What Is The Main Criteria to get paid for rentals</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="service-sec-03 info-sec-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">

                    <img src="{{ asset('assets/images/info-img.png')}}" alt="">
                    <h3>Rentals Management</h3>
                    <h2>Get Notified Before The date decided </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the<br> industry's standard dummy text ever since the 1500s.</p>
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
