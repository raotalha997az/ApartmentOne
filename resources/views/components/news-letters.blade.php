<section class="home-sec-08" style="background-image: url({{ asset('assets/images/home-sec-08-img.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text ">
                    <h3>News Letter</h3>
                    <h2>Connect with us For<br> Latest News & Updates</h2>
                    <p>Lets get connect to know more about the new launching projects in  United States</p>
                </div>
                {{-- <div class="form-box">
                    <form action="">
                        <input type="email" placeholder="Enter Email Address">
                        <button>Submit</button>
                    </form>
                </div> --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                <div class="form-box">
                    <form id="newsletter-form">
                        @csrf
                        <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
                        <span id="error-message" style="color:red;"></span>
                        <button type="submit">Submit</button>
                    </form>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>

