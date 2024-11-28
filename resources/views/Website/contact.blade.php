@extends('Website.layouts.master')
<style>
    .apartment-contact-active::after {
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
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="two-input-align">

                            <div style="width: 100%">
                                <input type="text" placeholder="Full Name" name="name" value="{{ old('name') }}">

                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div style="width: 100%">
                                <input type="text" placeholder="Email Address" name="email" value="{{ old('email') }}">

                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                        </div>
                        <input type="tel" placeholder="Contact Number" name="phone_number" value="{{ old('phone_number') }}">
                        @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <textarea placeholder="Type Here" name="message">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection
