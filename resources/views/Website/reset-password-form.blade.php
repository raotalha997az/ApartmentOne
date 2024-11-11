
@extends('Website.layouts.master')
<style>
        .main-box-navy2 {
            padding: 50px;
            background-color: #eeeeee;
            padding-top: 0;
            background: url(https://images.squarespace-cdn.com/content/v1/5a9eeefe3e2d09d0e23f795d/1521482986989-96M3DCV5UHODBFA0KQL3/golf-09.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg-white2 {
            background-color: #ffffff80 !important;
            backdrop-filter: blur(16px);
            border: #ccc 1px solid;
        }

        .col-md-6.offset-md-3.bg-white2.p-5 .register-btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .col-md-6.offset-md-3.bg-white2.p-5 .register-btn a {
            color: black;
            font-size: 18px;
            font-weight: 600;
            transition: .3s;
        }

        .col-md-6.offset-md-3.bg-white2.p-5 .register-btn a:hover {
            color: #4c4d4c;
        }

        .form-btm-content {
    text-align: center;
}

.form-btm-content p {
    margin: 20px 0 !important;
}

.vertical-align-box {padding: 100px 0;}
    </style>
@section('content')

<section class="new-form login-form" style="background-image: url({{ asset('./assets/images/new-login-bg.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="vertical-align-box">
                    <div class="logo-box">
                        <a href="{{ route('index') }}"><img src="{{ Storage::url($settings[0]->logo ?? '') }}"
                                alt=""></a>
                    </div>
                    <div class="form-box">
                        <div class="text">
                            <h2><center> Reset Your Passsword </center></h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <div class="single-input-box">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ request('email') }}">
                                </div>

                                <div class="single-input-box">
                                    <label>New Password</label>
                                    <input type="password" name="password" id="password" required autocomplete="new-password">
                                </div>

                                <div class="single-input-box">
                                    <label>Confirm Password</label>
                                    <input type="password" id="n-password" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>

                                <div class="input-check-box">
                                    <input type="checkbox" id="show-password" name="remember-me"
                                        onclick="togglePassword()">
                                    <label for="show-password">Show password</label>
                                </div>
                                <div class="form-btm-content">
                                    <button type="submit" style="position: relative;">Reset Password</button>
                                    <p>Remember your password? <a href="{{ route('login') }}">Log In</a></p>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<script>
    let success = {{ Session::has('success') }}
    $(document).on('ready', function() {
        if (success == true) {
            toastr.success('{{ Session::get('success') }}');
        }
    })

    function togglePassword() {
        var passwordField = document.getElementById("password");

        var checkbox = document.getElementById("show-password");

        if (checkbox.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>

@endsection
