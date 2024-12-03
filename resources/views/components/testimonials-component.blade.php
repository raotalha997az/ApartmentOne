<section class="home-sec-07">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="align-two-things">
                    <div class="text">
                        <h3>Testimonials</h3>
                        <h2>Client Experiences That<br> Speak Volumes</h2>
                        <p>Lorem Ipsum is simply dummy text</p>
                    </div>

                    {{-- <a href="#" class="t-btn t-btn-blue">See All Properties</a> --}}

                </div>
                <div class="main-testi-box-flex">
                    @foreach ($value->slice(0, 6) as $testimonial)
                    <div class="parent-box-testi">
                        <img src="assets/images/testi-img.png" alt="">
                        <h5>{{ $testimonial->name }}</h5>
                        <p>{{ $testimonial->testimonial }}</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</section>
