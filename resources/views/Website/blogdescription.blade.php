@extends('Website.layouts.master')
<style>
    .main-blog-section-grid .blog-parent-box img {
    object-fit: cover;
    border-radius: 20px;
}

.main-blog-section-grid {
    display: flex;
    flex-direction: row;
    justify-content: center;
    column-gap: 20px;
    row-gap: 20px;
    flex-wrap: wrap;
}
        .apartment-blog-active::after {
    content: "";
    width: 8px;
    height: 5px;
    position: absolute;
    background-color: #0077B6;
    bottom: -5px;
    left: 45%;
    border-radius: 20px;
}

.header-menu li {
    position: relative;
}
</style>
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
                    <img src="{{ asset('assets/images/blog/' . $blog->image) }}" alt="">
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
            @foreach ($blogs_all->take(4) as $blog)
            <div class="col-lg-3 col-md-6">
                <div class="blog-parent-box">
                   <div class="img-box">
                    <img src="{{ asset('assets/images/blog/' . $blog->image) }}" alt="">
                    <h6>Latest</h6>
                   </div>
                    <div class="text">
                        <h5>{{ $blog->title }}</h5>
                        <p title="{{ $blog->short_description }}">{{ \Illuminate\Support\Str::words($blog->short_description, 5, '...') }}</p>
                        {{-- <a href="{{ route('blogdescription') }}" class="t-btn t-btn-blue">Read More</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section>



@endsection
