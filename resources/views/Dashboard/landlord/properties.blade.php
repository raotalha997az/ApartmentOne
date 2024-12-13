@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active svg path {
        fill: #414141 !important;
    }
</style>
@section('content')
    <div class="landlord-dashboard landlord-properties">
        <div class="row">
            <div class="col-md-12">
                <div class="basic-reports-box properties-page">

                    <div class="two-things-align">
                        <div class="reports-fours-box-align">
                            <div class="parent-box">
                                <div class="content">
                                    <h5>{{ $properties->count() }}</h5>
                                    <p>Total Properties</p>
                                </div>
                            </div>
                            {{-- <div class="parent-box">
                                <div class="content">
                                    <h5>12</h5>
                                    <p>Homes</p>
                                </div>
                            </div> --}}
                            {{-- <div class="parent-box">
                                <div class="content">
                                    <h5>150</h5>
                                    <p>Apartments</p>
                                </div>
                            </div> --}}
                            {{-- <div class="parent-box">
                                <div class="content">
                                    <h5>10</h5>
                                    <p>Lands</p>
                                </div>
                            </div> --}}
                        </div>
                        <a href="{{ route('landlord.add_property') }}" class="t-btn t-btn-blue t-btn-svg">Add Property
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z"
                                    fill="white"></path>
                            </svg>

                        </a>
                    </div>

                    <div class="two-things-align">
                        <div class="box">
                            <h6>All Your Properties</h6>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <div class="tab-content">

                        <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel" aria-expanded="true">
                            <div class="reports-listings-property-table">
                                <div class="three-headings-align">
                                    <h3>Property</h3>
                                    <h3>Tenants Applied</h3>
                                    <h3># Applications</h3>
                                </div>

                                <div class="three-box-table">
                                    @foreach ($properties as $propertyData)
                                        @php
                                            $property = $propertyData['property'];
                                            $tenants = $propertyData['tenants'];
                                        @endphp

                                        <a href="{{ route('landlord.propertiesdetails', $property->id) }}">
                                            <div class="box img-box-property">
                                                <img src="{{ Storage::url($property->media[0]->img_path ?? '') }}"
                                                    alt="">
                                                <div class="content">
                                                    <h4>{{ $property->name ?? '' }}</h4>
                                                    <p>
                                                        @if (strlen($property->other_details) > 20)
                                                            <abbr
                                                                title="{{ $property->other_details ?? '' }}">{{ substr($property->other_details, 0, 20) }}...</abbr>
                                                        @else
                                                            {{ $property->other_details ?? '' }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>

                                            @if ($tenants->isNotEmpty())
                                                <div class="box gallery-box-imges">
                                                    @foreach ($tenants as $tenant)
                                                        <img src="{{ Storage::url($tenant->profile_img ?? '') }}"
                                                            alt="">
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div class="box numbers-of-applications">
                                                <p>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="..." fill="#414141" />
                                                    </svg>
                                                    {{ $tenants->count() }} Applicants
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
@endsection
