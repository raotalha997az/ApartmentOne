@extends('Website.layouts.master')
@section('content')

<section class="home-sec-01" style="background-image: url({{ asset('assets/images/blog-details-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Blogs </h2>
                    <h1>{{ $blog->page_title }}</h1>
                    {{-- <h1>Real estate and property<br> management</h1> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-sec-02 home-sec-04 blog-des-sec-01 ">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">
                <div class="img-box">
                    <img src="{{Storage::url('blog/' . $blog->image)}}" alt="">
                </div>

            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text text-left-pading">
                    <h2>{{ $blog->page_title }}</h2>
                    <p>{{ $blog->short_description }}</p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text content-box">
                    <h2>{{ $blog->title }} </h2>
                    <p>{{ strip_tags($blog->long_description) }}</p>

                </div>

            </div>
        </div>
    </div>

</section>

<section class="home-sec-07 blog-sec-01  blog-des-sec-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="align-two-things">
                    <div class="text">
                        <h3>Related Blogs</h3>
                        <h2>More News Related To<br> This One</h2>
                    </div>

                    <a href="{{ route('blog') }}" class="t-btn t-btn-blue">See All Blogs</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="blog-parent-box">
                   <div class="img-box">
                    <img src="{{ asset('assets/images/blog-parent-img.png')}}" alt="">
                    <h6>Latest</h6>
                   </div>
                    <div class="text">
                        <h5>Real estate and property management</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                        {{-- <a href="{{ route('blogdescription') }}" class="t-btn t-btn-blue">Read More</a> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="blog-parent-box">
                   <div class="img-box">
                    <img src="{{ asset('assets/images/blog-parent-img.png')}}" alt="">
                    <h6>Latest</h6>
                   </div>
                    <div class="text">
                        <h5>Real estate and property management</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                        {{-- <a href="{{ route('blogdescription') }}" class="t-btn t-btn-blue">Read More</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="blog-parent-box">
                   <div class="img-box">
                    <img src="{{ asset('assets/images/blog-parent-img.png')}}" alt="">
                    <h6>Latest</h6>
                   </div>
                    <div class="text">
                        <h5>Real estate and property management</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                        {{-- <a href="{{ route('blogdescription') }}" class="t-btn t-btn-blue">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>



@endsection
