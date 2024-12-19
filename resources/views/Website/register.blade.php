@extends('Website.layouts.master')

<style>
    .form-box form select{
        border: 2px solid #777777 !important;
        background-color: #e5e5e594 !important;
    }

    .form-box form select option{
        color: #777777
    }
</style>
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
                            <div class="text text-center" style="justify-self: center ; width: 580px;">
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
                            <input type="text" placeholder="Full Name"  name="name" value="{{ old('name') }}">
                            <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}">
                            <input type="tel" placeholder="Contact Number" name="phone" value="{{ old('phone') }}">
                            <select name="role">
                                <option disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
                                <option value="tenant" {{ old('role') == 'tenant' ? 'selected' : '' }}>Tenant</option>
                                <option value="land_lord" {{ old('role') == 'land_lord' ? 'selected' : '' }}>Landlord</option>
                            </select>
                            <textarea class="mt-4" placeholder="Street Name" name="address">{{ old('address') }}</textarea>
                            <input type="number" placeholder="House Number" name="house_number" value="{{ old('house_number') }}">
                            <input type="password" id="password" placeholder="Password" name="password">
                            <input type="password" id="c_password" placeholder="Confirm Password" name="c_password">
                            {{-- <input type="text" placeholder="Social Security Number" required name="ssn"> --}}

                            <div class="input-check-box">
                                <input type="checkbox" id="show-password" onclick="togglePassword()">
                                <label for="show-password">Show Password</label>
                            </div>

                            {!!htmlFormSnippet()!!}
                            {{-- @if ($errors->has('g-recaptcha-response'))

                                <div class="alert alert-danger">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </div>

                            @endif --}}


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

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const c_passwordField = document.getElementById('c_password');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                c_passwordField.type = "text";
            } else {
                passwordField.type = "password";
                c_passwordField.type = "password";
            }
        }
    </script>

@endsection
