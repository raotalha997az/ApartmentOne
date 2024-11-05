<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment One</title>
    <link rel="icon" href="assets/images/apartment-one-favicon.png" type="favicon.png" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('assets/style-folder/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/images/header-logo.png') }}" alt=""></a>
                    </div>  
                </div>
                <div class="col-lg-10">
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li class="drop-down-menu"><a href="{{ route('services') }}">Services <i class="fa-solid fa-chevron-down"></i></a>
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
            <div class="row">
                <div class="col-md-12"> 
                    <div class="two-things-header-mb">
                        <div class="header-logo">
                            <a href="index.php"><img src="{{ asset('assets/images/header-logo.png') }}" alt=""></a>
                        </div>
                        <div class="hamburger-menu">
                            <input id="menu__toggle" type="checkbox" />
                            <label class="menu__btn" for="menu__toggle">
                              <span></span>
                            </label>
                        
                            <ul class="menu__box">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li class="drop-down-menu"><a href="{{ route('services') }}">Services <i class="fa-solid fa-chevron-down"></i></a>
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
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/images/footer-logo.png') }}" alt=""></a>
                    </div>
                    <div class="text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
                            <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i>About</a></li>
                            <li><a href="{{ route('services') }}"><i class="fa-solid fa-chevron-right"></i>Services</a></li>
                            <li><a href="{{ route('blog') }}"><i class="fa-solid fa-chevron-right"></i>Blogs</a></li>
                            <li><a href="{{ route('faqs') }}" ><i class="fa-solid fa-chevron-right"></i>FAQs</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i>Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-links">
                        <h5>Company</h5>
                        <ul>
                            <li><a  href="{{ route('info') }}"><i class="fa-solid fa-chevron-right"></i>Privacy Policy</a></li>
                            <li><a href="{{ route('info') }}"><i class="fa-solid fa-chevron-right"></i>Terms Of Use</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i>Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2024 | All Rights Reserved By <a href="#">Apartment One</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/custom-js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>