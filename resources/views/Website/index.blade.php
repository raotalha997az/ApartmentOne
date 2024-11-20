    @extends('Website.layouts.master')
    @section('content')


    <section class="home-sec-01" style="background-image: url({{ asset('assets/images/hero-banner.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text">
                        <h2>Apartment One</h2>
                        <h1>Connect with landlords<br> and renters</h1>
                        <p> Find your perfect home today!</p>
                    </div>
                    {{-- <div class="form-box">
                        <form action="">
                            <input type="search" placeholder="Enter Location / ZIP Code">
                            <button>Search</button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>

    </section>

    <section class="home-sec-02">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="text text-right-pading">
                        <h3>Overview</h3>
                        <h2>Find your perfect tenant with ease</h2>
                        <p>Welcome to our platform that connects landlords with renters. Submit your rental application and let landowners view and evaluate them. Start your search</p>
                        <a href="#" class="t-btn t-btn-blue">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="img-box">
                        <img src="{{ asset('assets/images/home-sec-02-img.png')}}" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>




    <section class="home-sec-03">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="parent-box">
                        <div class="text">
                            <h3>Seamless</h3>
                            <h2>Landlord-R</h2>
                            <p>Our platform provides a seamless application process for landlords and renters. Landlords can easily view</p>
                        </div>
                        <h6>01</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="parent-box">
                        <div class="text">
                            <h3>Applications    </h3>
                            <h2>Landowners</h2>
                            <p>Landowners can easily view and manage rental applications submitted by renters, making the process efficient and convenient.</p>
                        </div>
                        <h6>02</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="parent-box">
                        <div class="text">
                            <h3>Connects</h3>
                            <h2>Landlord-Renter</h2>
                            <p>Our platform connects landlords with renters by providing a seamless application process. Landlords can easily view and manage rental applications submitted by renters.</p>
                        </div>
                        <h6>03</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="parent-box">
                        <div class="text">
                            <h3>Application</h3>
                            <h2>Easy Application Submission</h2>
                            <p>Renters can login to our platform and easily submit rental applications, making the process quick</p>
                        </div>
                        <h6>04</h6>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="home-sec-02 home-sec-04 ">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-12">
                    <div class="img-box">
                        <img src="{{ asset('assets/images/home-sec-04-img.png')}}" alt="">
                    </div>

                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="text text-left-pading">
                        <h3>Service</h3>
                        <h2>Tailored Real Estate Solutions</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <a href="#" class="t-btn t-btn-blue">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <x-counter-component />

    <section class="home-sec-02 home-sec-04 home-sec-06 ">
        <div class="container">
            <div class="row align-items-center">



                <div class="col-lg-6 col-md-12">
                    <div class="text text-right-pading">
                        <h3>About</h3>
                        <h2>Here Luxury Meets Lifestyle</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <a href="#" class="t-btn t-btn-blue">Learn More</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="img-box">
                        <img src="{{ asset('assets/images/home-sec-06-img.png')}}" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>

    <x-properties-component />


    <x-news-letters/>


    <x-testimonials-component />



    @endsection
