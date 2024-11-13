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
                            {{-- {{ dd($wishlist->contains($property->id)) }} --}}
                                {{-- {{ dd($property);}} --}}
                                <div class="child-place-box">
                                    <a href="{{ route('tenant.propertiesdetails', $property->id) }}">
                                        <div class="img-box">
                                            <img src="{{ Storage::url($property->media[0]->img_path ?? '') }}"
                                                alt="">
                                        </div>
                                    </a>
                                    <div class="some-align">
                                        <div class="content-box">
                                            <div class="price-month">
                                                <h6>$ {{ $property->price_rent }}</h6>
                                                {{-- <p>/month</p> --}}
                                            </div>
                                            <a href="#">
                                                <div class="place-name">
                                                    <h5>{{ $property->name }}</h5>
                                                </div>
                                            </a>
                                            <div class="place-location">
                                                <p>{{ $property->address }} </p>
                                            </div>
                                        </div>
                                        <div class="heart-box">
                                            <a href="#" class="heart-link {{ in_array($property->id, $wishlist) ? 'heart-active' : '' }}" id="heart-link"
                                                data-property-id="{{ $property->id }}">
                                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.35372 5.43081C4.01618 5.7704 3.74843 6.17356 3.56576 6.61727C3.38308 7.06097 3.28906 7.53653 3.28906 8.01679C3.28906 8.49705 3.38308 8.97261 3.56576 9.41632C3.74843 9.86002 4.01618 10.2632 4.35372 10.6028L10.5589 16.8459L16.7641 10.6028C17.4458 9.91693 17.8288 8.98672 17.8288 8.01679C17.8288 7.04686 17.4458 6.11665 16.7641 5.43081C16.0824 4.74496 15.1579 4.35966 14.1938 4.35966C13.2298 4.35966 12.3052 4.74496 11.6235 5.43081L10.5589 6.50194L9.49429 5.43081C9.15676 5.09121 8.75604 4.82182 8.31503 4.63803C7.87402 4.45425 7.40135 4.35965 6.924 4.35965C6.44666 4.35965 5.97398 4.45425 5.53297 4.63803C5.09196 4.82182 4.69125 5.09121 4.35372 5.43081V5.43081Z"
                                                        stroke="#0077B6" stroke-width="1.62044" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>


                                    </div>
                                    {{-- <div class="place-details-three"> --}}
                                    <div class="properties-icons-details">
                                        <strong class="">Features : </strong>
                                        <ul>

                                            @foreach ($property->features->take(3) as $featureDetail)
                                                <li>

                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
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
    @endsection

    @section('scripts')
    <script>
        document.querySelectorAll('.heart-link').forEach(item => {
            console.log("object");
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const propertyId = this.dataset.propertyId;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch("{{ route('tenant.wishlist.add') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            property_id: propertyId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'added') {
                            // alert("Added to wishlist!");
                            toastr.success('Added to wishlist!');
                            // Add toast notification here if needed
                        } else if (data.status === 'already_added') {
                            // alert("Already in wishlist!");
                            toastr.success('Already in wishlist!');

                            // Add toast notification here if needed
                        } else if (data.status === 'removed') {
                            // alert("Removed from wishlist!");
                            toastr.success('Removed from wishlist!');
                            
                            // Add toast notification here if needed
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
