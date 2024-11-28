<section class="about-sec-03" style="background-image: url({{ asset('assets/images/about-us-sec-03-bg.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h3>Easiest Way To Commute With Land Lords</h3>
                    <h2>Secure and fast chatting algorithm</h2>
                    <p>Lorem Ipsum  is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s.</p>
                    @if (Auth::user())
                    @if (Auth::user()->hasRole('tenant'))
                        <a href="{{ route('tenant.dashboard') }}" class="t-btn t-btn-blue">Get Started</a>
                    @elseif(Auth::user()->hasRole('land_lord'))
                        <a href="{{ route('landlord.dashboard') }}" class="t-btn t-btn-blue">Get Started</a>
                    @elseif(Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.dashboard') }}" class="t-btn t-btn-blue">Get Started</a>
                    @endif
        @else
            <a href="{{ route('register') }}" class="t-btn t-btn-blue">Get Started</a>
        @endif
                    <img src="{{ asset('assets/images/about-us-sec-03-img-01.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
