@extends('Website.layouts.master')
@section('content')

<section class="login-register-sec" style="background-image: url({{ asset('assets/images/login-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h3>Get Started</h3>
                    <h2>Login To Your Account </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the<br> industry's standard dummy text ever since the 1500s.</p>
                </div>
                <div class="form-box">
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
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <input type="email" placeholder="Email Address" required name="email">
                        <input type="password" placeholder="Password" required name="password" id="password">

                        <div class="input-check-box">
                            <input type="checkbox" id="show-password" onclick="togglePassword()">
                            <label for="show-password">Show Password</label>
                        </div>


                        <div class="forms-btns-inline">
                            <button>Login</button>
                            <a href="{{ route('register') }}">Create a New Account</a>
                            <a href="{{ route('password.request') }}">Forget Password</a>
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
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>


@endsection
