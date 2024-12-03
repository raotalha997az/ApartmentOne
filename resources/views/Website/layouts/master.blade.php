<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    {{-- <title>Apartment One</title> --}}
    <link rel="icon" href="assets/images/apartment-one-favicon.png" type="favicon.png" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('assets/style-folder/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {!!htmlScriptTagJsApi()!!}
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        li.user-login-dropdown {}

        header li.user-login-dropdown {
            position: relative;
            transition: .3s;
        }

        header li.user-login-dropdown ul {
            position: absolute;
            background-color: red;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
            border-radius: 10px;
            background-color: white;
            width: 240px;
            padding: 20px !important;
            right: 0;
            left: 0;
            margin: auto !important;
            border: 1px solid #0077b6;
            display: none;
            transition: .3s;
        }

        header li.user-login-dropdown ul li a {
            font-size: 14px;
        }

        header li.user-login-dropdown:hover ul {
            display: flex !important;
        }

        .user-login-dropdown a.user-profile-link {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .user-login-dropdown a.user-profile-link img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 3px solid #80808059;
        }

        header .header-menu ul {
    align-items: center;
}
    </style>
</head>

<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/images/header-logo.png') }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{ route('index') }}" class="apartment-active">Home</a></li>
                            <li><a href="{{ route('about') }}" class="apartment-about-active">About</a></li>
                            <li class="drop-down-menu"><a href="{{ route('services') }}" class="apartment-sevices-active">Services <i
                                        class="fa-solid fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('rentahome') }}">Rentals Management</a></li>
                                    <li><a href="{{ route('seekingahome') }}">Seeking A Dream Home</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('blog') }}" class="apartment-blog-active">Blogs</a></li>
                            <li><a href="{{ route('help') }}" class="apartment-help-active">Help</a></li>
                            <li><a href="{{ route('contact') }}" class="apartment-contact-active">Contact</a></li>

                            <li class="user-login-dropdown">

                                @if (Auth::user())
                                    <a href="http://127.0.0.1:8000/landlord/profile" class="user-profile-link">
                                        <img src="{{ Storage::url(Auth::user()->profile_img ?? '') }}" alt="">{{ Auth::user()->name }}
                                    </a>
                                    <ul>
                                        <li>
                                            @if (Auth::user()->hasRole('tenant'))
                                                <a href="{{ route('tenant.dashboard') }}">Dashboard</a>
                                            @elseif(Auth::user()->hasRole('land_lord'))
                                                <a href="{{ route('landlord.dashboard') }}">Dashboard</a>
                                            @elseif(Auth::user()->hasRole('admin'))
                                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                            @endif
                                        </li>

                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="t-btn t-btn t-btn-svg">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                @else
                                    <a href="{{ route('login') }}" class="t-btn t-btn-header">Login</a>
                                @endif



                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="two-things-header-mb">
                        <div class="header-logo">
                            <a href="index.php"><img src="{{ asset('assets/images/header-logo.png') }}"
                                    alt=""></a>
                        </div>
                        <div class="hamburger-menu">
                            <input id="menu__toggle" type="checkbox" />
                            <label class="menu__btn" for="menu__toggle">
                                <span></span>
                            </label>

                            <ul class="menu__box">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li class="drop-down-menu"><a href="{{ route('services') }}">Services <i
                                            class="fa-solid fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{ route('rentahome') }}">Rentals Management</a></li>
                                        <li><a href="{{ route('seekingahome') }}">Seeking A Dream Home</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('blog') }}">Blogs</a></li>
                                <li><a href="{{ route('help') }}">Help</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('login') }}" class="t-btn t-btn-header">Login / Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    @yield('content')


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer-logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/footer-logo.png') }}"
                                alt=""></a>
                    </div>
                    <div class="text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                    <div class="footer-social-links">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="{{ route('index') }}"><i class="fa-solid fa-chevron-right"></i>Home</a></li>
                            <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i>About</a>
                            </li>
                            <li><a href="{{ route('services') }}"><i
                                        class="fa-solid fa-chevron-right"></i>Services</a></li>
                            <li><a href="{{ route('blog') }}"><i class="fa-solid fa-chevron-right"></i>Blogs</a></li>
                            <li><a href="{{ route('faqs') }}"><i class="fa-solid fa-chevron-right"></i>FAQs</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i>Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-links">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="{{ route('info') }}"><i class="fa-solid fa-chevron-right"></i>Privacy
                                    Policy</a></li>
                            {{-- <li><a href="{{ route('info') }}"><i class="fa-solid fa-chevron-right"></i>Terms Of
                                    Use</a></li> --}}
                            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i>Contact
                                    Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2024 | All Rights Reserved By <a href="{{ url('/') }}">Apartment One</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/custom-js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
