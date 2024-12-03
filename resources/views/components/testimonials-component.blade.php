<style>

.properties-main-box .img-box img {
    height: 200px;
    object-fit: cover;
    width: 100%;
    border-radius: 15px;
}

.properties-main-box .img-box .arrow-box img {
    height: auto;
    width: auto;
}

.properties-main-box .img-box .arrow-box {
    height: 50px;
    width: 50px;
}

.properties-main-box .img-box {
    width: 100%;
}
</style>
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
