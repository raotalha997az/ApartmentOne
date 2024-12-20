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

<section class="home-sec-01" style="background-image: url({{ asset('assets/images/blog-main-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Blogs </h2>
                    <h1>Latest News & Updates</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                    <div class="main-blog-section-grid">
                        @foreach ($blogs as $blog)
                    <div class="blog-parent-box">



                        <div class="img-box">

                    <img src="{{ asset('assets/images/blog/' . $blog->image) }}" alt="" >
                        @if ($blog->is_popular == 1)
                            <h6>Popular</h6>
                            @elseif ($blog->is_trending == 1)
                            <h6>Trending</h6>
                            @elseif ($blog->is_latest == 1)
                            <h6>Latest</h6>
                        @endif

                   </div>
                    <div class="text">
                        <h5>{{ $blog->title }}</h5>
                        <p title="{{ $blog->short_description }}">{{ \Illuminate\Support\Str::words($blog->short_description, 5, '...') }}</p>
                        <a href="{{ route('blog-details',['id' => $blog->id]) }}" class="t-btn t-btn-blue">Read More</a>
                    </div>
                </div>
                    @endforeach
                    </div>

            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="pagination-box">
                    <ul>
                        <li><a href="#" class="pagi-btn right-left-btn">&lt;</a></li>
                        <li><a href="#" class="pagi-btn normal-box-pagi active-pagi">1</a></li>
                        <li><a href="#" class="pagi-btn normal-box-pagi">2</a></li>
                        <li><a href="#" class="pagi-btn normal-box-pagi a">...</a></li>
                        <li><a href="#" class="pagi-btn normal-box-pagi">9</a></li>
                        <li><a href="#" class="pagi-btn normal-box-pagi">10</a></li>
                        <li><a href="#" class="pagi-btn right-left-btn" > &gt;</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="pagination-box">
                    <ul>
                        <!-- Previous Page Link -->
                        @if ($blogs->onFirstPage())
                            <li><a href="#" class="pagi-btn right-left-btn disabled" aria-disabled="true">&lt;</a></li>
                        @else
                            <li><a href="{{ $blogs->previousPageUrl() }}" class="pagi-btn right-left-btn">&lt;</a></li>
                        @endif

                        <!-- Pagination Elements -->
                        @foreach ($blogs->links()->elements as $element)
                            @if (is_string($element))
                                <li><a href="#" class="pagi-btn normal-box-pagi disabled">{{ $element }}</a></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $blogs->currentPage())
                                        <li><a href="#" class="pagi-btn normal-box-pagi active-pagi">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}" class="pagi-btn normal-box-pagi">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($blogs->hasMorePages())
                            <li><a href="{{ $blogs->nextPageUrl() }}" class="pagi-btn right-left-btn">&gt;</a></li>
                        @else
                            <li><a href="#" class="pagi-btn right-left-btn disabled" aria-disabled="true">&gt;</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>

</section>



<x-testimonials-component :value="$testimonials" />




@endsection
