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
                        <h6>Latest Listings</h6>
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
                <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                </div>
                <div class="tab-pane p-3" id="tabs-2" role="tabpanel">
                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>
                </div>
                <div class="tab-pane p-3" id="tabs-3" role="tabpanel">
                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>
                </div>
                <div class="tab-pane p-3" id="tabs-4" role="tabpanel">
                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
                        </div>

                    </div>

                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>St. Crystal</h5>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                    <h4>$2,400</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-01.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>Jeff Bezos</h5>
                                    <p>Listed On 20 January 2024</p>
                                </div>
                            </div>
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/admin-properties-img-person-02.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Tenant</h6>
                                    <h5>Sofia Strom</h5>
                                    <p>Applied On 30 January 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="two-btns-inline">
                            <button>Approve</button>
                            <button>Decline</button>
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
