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
<div class="properties-page admin-properties">
    <div class="row">
        <div class="col-lg-12">
            <div class="top-listing-parent-box">
                <div class="two-things-align">
                    <div class="box">
                        <h6>Latest Listings Of Properties</h6>
                    </div>
                    <div class="box">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Apartments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Houses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Luxury Apartments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Luxury Houses</a>
                            </li>
                        </ul><!-- Tab panes -->
                    </div>
                </div>
            </div>

            <div class="tab-content">
                @foreach ( $properties as $property)
                <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    {{-- <img src="{{ optional($property->media)->img_path ? Storage::url($property->media['img_path'])) }}" alt="" width="150px" height="100" style="object-fit: contain"> --}}
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>{{ $property->name }}</h5>
                                    <p>{{ $property->other_details }}</p>
                                    <h4>{{ $property->price_rent }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ Storage::url($property->user->profile_img ?? '') }}" alt="" width="150px" height="100" style="object-fit: contain">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>{{ $property->user->name }}</h5>
                                    {{ $property->created_at->format('d-m-Y') }}
                                </div>
                            </div>

                        </div>
                        <div class="two-btns-inline">
                            <a href="{{ route('admin.properties.approve', $property->id) }}"  class="t-btn t-btn-blue">Approve</a>
                            <a href="{{ route('admin.propertiesdetails', $property->id) }}"  class="t-btn t-btn-blue">Details</a>
                        </div>

                    </div>


                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>
@endsection
