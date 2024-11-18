@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.dashboard-active {
        background-color: white;
        color: #414141;
    }
    .dashboard-main .left-panel .left-panel-menu ul li a.dashboard-active svg path {
    fill: #414141 !important;
}




</style>
@section('content')
<div class="landlord-dashboard">
    <div class="row">
        <div class="col-md-12">
             <div class="basic-reports-box">
                <div class="text">
                    <h5>Basic Reports</h5>
                </div>
                <div class="reports-fours-box-align">
                    <div class="parent-box">
                        <div class="content">
                            <h5>{{ $properties->count() }}</h5>
                            <p>Total Properties</p>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('assets/images/Basic-Reports-img-01.png') }}" alt="">
                        </div>
                    </div>
                    {{-- <div class="parent-box">
                        <div class="content">
                            <h5>12</h5>
                            <p>New Property Listings</p>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('assets/images/Basic-Reports-img-02.png') }}" alt="">
                        </div>
                    </div> --}}
                    <div class="parent-box">
                        <div class="content">
                            <h5>{{ $totalApplications}}</h5>
                            <p>New Tenant Requests</p>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('assets/images/Basic-Reports-img-03.png') }}" alt="">
                        </div>
                    </div>
                    {{-- <div class="parent-box">
                        <div class="content">
                            <h5>10</h5>
                            <p>Messages</p>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('assets/images/Basic-Reports-img-04.png') }}" alt="">
                        </div>
                    </div> --}}
                </div>

                <div class="two-things-align">
                    <div class="box">
                        {{-- <h6>Top Listings</h6> --}}
                    </div>
                    <div class="box">
                        <a href="{{ route('landlord.properties') }}" class="t-btn t-btn-blue t-btn-svg">See All
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z" fill="white"></path>
                                </svg>

                        </a>
                    </div>
                </div>


                <div class="reports-listings-property-table">
                    <div class="three-headings-align">
                        <h3>Property</h3>
                        <h3>Tenants Applied</h3>
                        <h3># Applications</h3>
                    </div>

                        @foreach ($propertiesWithTenants as $propertyWithTenants)
                        <div class="three-box-table">
                            <a href="#">
                                <div class="box img-box-property">
                                    @if (!empty($propertyWithTenants['property']['media']) && count($propertyWithTenants['property']['media']) > 0)
                                    {{-- Show the first image from the media array --}}
                                    <img src="{{ Storage::url($propertyWithTenants['property']['media'][0]['img_path']) }}" alt="Property Image">
                                @else
                                    {{-- Show a placeholder image if no media exists --}}
                                    <img src="{{ asset('assets/images/placeholder.png') }}" alt="No Image Available">
                                @endif
                                    <div class="content">
                                        <h4>{{ $propertyWithTenants['property']->name }}</h4>
                                        <p>{{ $propertyWithTenants['property']->address }}</p>
                                    </div>
                                </div>

                                <div class="box gallery-box-imges">
                                    @php
                                        $maxImages = 5; // Maximum number of tenant images to show
                                    @endphp

                                    @foreach ($propertyWithTenants['tenants'] as $index => $tenant)
                                        @if ($index < $maxImages)
                                            <img src="{{ Storage::url($tenant->profile_img) }}" alt="{{ $tenant->name }}" class="tenant-image" width="60" height="60" style="border-radius: 50%;">
                                        @else
                                            @break
                                        @endif
                                    @endforeach

                                    @if (count($propertyWithTenants['tenants']) > $maxImages)
                                        <span class="more-tenants">...and {{ count($propertyWithTenants['tenants']) - $maxImages }} more</span>
                                    @endif
                                </div>


                                <div class="box numbers-of-applications">
                                    <p>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z" fill="#414141"/>
                                            <path d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z" fill="#414141"/>
                                        </svg>
                                        {{ isset($propertyWithTenants['tenants']) ? count($propertyWithTenants['tenants']) : 0 }} Applicants
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endforeach

                </div>

             </div>
        </div>
    </div>
</div>


@endsection
