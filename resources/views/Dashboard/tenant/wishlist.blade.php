@extends('Dashboard.Layouts.master_dashboard')

<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active svg path {
        fill: #414141 !important;
    }


    .lock-access-box-top {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .lock-access-box-top .box {
        text-align: center;
        width: 40%;
    }

    .lock-access-box-top .box h6 {
        color: #414141;
        font-size: 40px;
        margin-bottom: 20px;
    }

    .propertieslistings-page .properties_details_main .properties-icons-details ul {
        display: flex;
        gap: 20px;
        margin-bottom: 30px !important;
        flex-wrap: wrap;
    }
</style>


@section('content')
    <div class="properties-page">

        <div class="row" style="position: relative">
            <div class="col-lg-12">
                <div class="top-listing-parent-box">
                    <div class="two-things-align">
                        <div class="box">
                            <h6>Top Listings</h6>
                            <p>Based On Your Profile</p>
                        </div>
                        <div class="box">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1"
                                        role="tab">Apartments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Houses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Luxury
                                        Apartments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Luxury Houses</a>
                                </li>
                            </ul><!-- Tab panes -->
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
                        <div class="main-parent-place-box">
                            @foreach ($properties as $property)

                                    {{-- {{ dd($property);}} --}}
                                    <div class="child-place-box">
                                        <a href="{{ route('tenant.propertiesdetails', $property->property->id) }}">
                                            <div class="img-box">
                                                <img src="{{ Storage::url($property->property->media[0]->img_path ?? '') }}"
                                                    alt="">
                                            </div>
                                        </a>
                                        <div class="some-align">
                                            <div class="content-box">
                                                <div class="price-month">
                                                    <h6>$ {{ $property->property->price_rent }}</h6>
                                                    {{-- <p>/month</p> --}}
                                                </div>
                                                <a href="#">
                                                    <div class="place-name">
                                                        <h5>{{ $property->property->name }}</h5>
                                                    </div>
                                                </a>
                                                <div class="place-location">
                                                    <p>{{ $property->property->address }} </p>
                                                </div>
                                            </div>
                                            <div class="heart-box">
                                                <button class="remove-wishlist-btn" data-property-id="{{ $property->property->id }}">Remove From Wishlist</button>
                                            </div>


                                        </div>
                                        {{-- <div class="place-details-three"> --}}
                                        <div class="properties-icons-details">
                                            <strong class="">Features : </strong>
                                            <ul>

                                                @foreach ($property->property->features->take(3) as $featureDetail)
                                                    <li>

                                                        <svg width="30" height="30" viewBox="0 0 30 30"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M25 11.9462V3.75H22.5V6.25H7.5V3.75H5V11.9462C3.5125 12.8125 2.5 14.4062 2.5 16.25V21.25C2.5 21.5815 2.6317 21.8995 2.86612 22.1339C3.10054 22.3683 3.41848 22.5 3.75 22.5H5V27.5H7.5V22.5H22.5V27.5H25V22.5H26.25C"
                                                                fill="#666666" />
                                                        </svg>
                                                        {{ $featureDetail->feature->name ?? '' }}
                                                        <!-- Accessing the feature name here -->
                                                        <div class="quantity">{{ $featureDetail->quantity ?? '' }}</div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>

                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

            {{-- <div class="lock-access-box-top" style="background-image: url({{asset('assets/images/Rectangle-400.png')}})">
            <div class="box">
                <h6>Apply For Screening To Get Full Access</h6>
            <a href="{{route('tenant.screening')}}" class="t-btn t-btn-blue t-btn-svg">Apply Now<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z" fill="white"></path>
                </svg></a>
            </div>
        </div> --}}
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script>
       document.querySelectorAll('.remove-wishlist-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const propertyId = this.getAttribute('data-property-id');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch("{{ route('tenant.wishlist.remove') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ property_id: propertyId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'removed') {
                alert("Removed from wishlist!");
                // Optionally, add a toast notification or update the UI to reflect the removal
                
            } else {
                alert("Error removing from wishlist.");
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

    </script>
@endsection



