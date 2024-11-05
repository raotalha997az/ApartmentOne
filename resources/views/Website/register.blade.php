@extends('Website.layouts.master')
@section('content')
    <section class="login-register-sec" style="background-image: url({{ asset('assets/images/login-banner.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h3>Welcome To Apartment One</h3>
                        <h2>Please Fill The Details To Get Stated </h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the<br> industry's standard dummy text ever since the 1500s.</p>
                            <div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                    </div>
                    <div class="form-box">
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Full Name" required name="name">
                            <input type="email" placeholder="Email Address" required name="email">
                            <input type="tel" placeholder="Contact Number" required name="phone">
                            <textarea placeholder="Address" required name="address"></textarea>
                            <input type="password" placeholder="Password" required name="password">
                            <input type="password" placeholder="Confirm Password" required name="c_password">
                            <select name="role">
                                <option disabled>Select Role</option>
                                <option value="tenant">Tenant</option>
                                <option value="land_lord">Landlord</option>
                            </select>
                            {{-- <input type="text" placeholder="Social Security Number" required name="ssn"> --}}
                            <div class="forms-btns-inline">
                                <button type="submit" class="mt-5">Create An Account</button>
                                <a href="{{ route('login') }}">Back To Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
