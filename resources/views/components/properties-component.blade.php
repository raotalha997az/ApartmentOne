<style>

.properties-main-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.properties-main-box a.properties-main-box-child {
    width: 300px;
}
</style>
<section class="home-sec-07">


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="align-two-things">
                    <div class="text">
                        <h3>Rentals</h3>
                        <h2>Explore Today’s Top Listings</h2>
                        <p>Lorem Ipsum is simply dummy text</p>
                    </div>
                    @if (Auth::user())
                        @if (Auth::user()->hasRole('tenant'))
                            <a href="{{ route('tenant.dashboard') }}" class="t-btn t-btn-blue">See All Lisitings</a>
                        @elseif(Auth::user()->hasRole('land_lord'))
                            <a href="{{ route('landlord.dashboard') }}" class="t-btn t-btn-blue">See All Lisitings</a>
                        @elseif(Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}" class="t-btn t-btn-blue">See All Lisitings</a>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="t-btn t-btn-blue">See All Lisitings</a>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-lg-12">
                <div class="properties-main-box">
                    {{-- {{ dd($value) }} --}}
                    @foreach ($value->take(4) as $property)
                        {{-- {{ dd($property) }} --}}
                        @php
                            $dashboardUrl = route('register'); // Default route

                            if (Auth::user()) {
                                if (Auth::user()->hasRole('tenant')) {
                                    $dashboardUrl = route('landlord.dashboard');
                                } elseif (Auth::user()->hasRole('land_lord')) {
                                    $dashboardUrl = route('landlord.dashboard');
                                } elseif (Auth::user()->hasRole('admin')) {
                                    $dashboardUrl = route('admin.dashboard');
                                }
                            }
                        @endphp

                        <a href="{{ $dashboardUrl }}" class="properties-main-box-child">
                            <div class="img-box">
                                <img src="{{ asset($property->media[0]->img_path ?? '') }}" alt="">
                                <div class="arrow-box">
                                    <img src="{{ asset('assets/images/right-arrow.png') }}" alt="">
                                </div>
                            </div>
                            <div class="content-box">
                                <h6>{{ $property->name ?? 'Property Name' }}</h6> {{-- Use property data --}}
                                <p>${{ $property->price_rent ?? '0.00' }}</p>
                            </div>
                        </a>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

</section>
