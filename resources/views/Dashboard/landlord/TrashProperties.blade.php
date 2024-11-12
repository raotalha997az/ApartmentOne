@extends('Dashboard.Layouts.master_dashboard')
<style>

    .dashboard-main .left-panel .left-panel-menu ul li a.propertiestrash-active {
        background-color: white;
        color: #414141;
    }


    .dashboard-main .left-panel .left-panel-menu ul li a.propertiestrash-active svg path {
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
                            <div class="parent-box">
                                <div class="content">
                                    <h5>12</h5>
                                    <p>Homes</p>
                                </div>
                            </div>
                            <div class="parent-box">
                                <div class="content">
                                    <h5>150</h5>
                                    <p>Apartments</p>
                                </div>
                            </div>
                            <div class="parent-box">
                                <div class="content">
                                    <h5>10</h5>
                                    <p>Lands</p>
                                </div>
                            </div>
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


                    <div class="tab-content">

                        <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel" aria-expanded="true">
                            <div class="reports-listings-property-table">
                                <div class="three-headings-align">
                                    <h3>Property</h3>
                                    <h3>Tenants Applied</h3>
                                    <h3>Action</h3>
                                </div>

                                <div class="three-box-table">
                                    @foreach ($properties as $property)
                                        {{-- <a href="{{route('landlord.trash.undo',$property->id) }}"> --}}
                                            <a href="#">
                                            <div class="box img-box-property">
                                                    <img src="{{ Storage::url($property->media[0]->img_path ?? '') }}"
                                                        alt="">
                                                <div class="content">
                                                    <h4>{{ $property->name ?? ''}}</h4>
                                                    <p>
                                                        @if (strlen($property->other_details) > 20)
                                                            <abbr
                                                                title="{{ $property->other_details ?? ''}}">{{ substr($property->other_details, 0, 20) }}...</abbr>
                                                        @else
                                                            {{ $property->other_details ?? ''}}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="box gallery-box-imges">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                    alt="">

                                            </div>
                                        {{-- </a> --}}

                                            <div class="box numbers-of-applications">
                                                <p>
                                                    <form id="deleteForm{{ $property->id }}" action="{{route('landlord.trash.undo',$property->id) }}" method="post" style="display:inline-block;">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="button" class="btn btn-sm btn-warning" onclick="undo({{ $property->id }})">Undo</button>
                                                    </form>

                                                </p>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>


                        </div>

                        <div class="tab-pane p-3" id="tabs-2" role="tabpanel" aria-expanded="false">
                            <div class="reports-listings-property-table">
                                <div class="three-headings-align">
                                    <h3>Property</h3>
                                    <h3>Tenants Applied</h3>
                                    <h3># Applications</h3>
                                </div>
                                <div class="three-box-table">

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment-02</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                </div>
                            </div>



                        </div>

                        <div class="tab-pane p-3" id="tabs-3" role="tabpanel" aria-expanded="false">

                            <div class="reports-listings-property-table">
                                <div class="three-headings-align">
                                    <h3>Property</h3>
                                    <h3>Tenants Applied</h3>
                                    <h3>Action</h3>
                                </div>
                                <div class="three-box-table">

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment-03</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                </div>
                            </div>



                        </div>

                        <div class="tab-pane p-3" id="tabs-4" role="tabpanel" aria-expanded="false">

                            <div class="reports-listings-property-table">
                                <div class="three-headings-align">
                                    <h3>Property</h3>
                                    <h3>Tenants Applied</h3>
                                    <h3># Applications</h3>
                                </div>
                                <div class="three-box-table">

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment-04</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box img-box-property">
                                            <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}"
                                                alt="">
                                            <div class="content">
                                                <h4>Apartment</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>
                                        </div>

                                        <div class="box gallery-box-imges">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                alt="">
                                            <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                alt="">

                                        </div>

                                        <div class="box numbers-of-applications">
                                            <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.5855 7.155C16.546 7.06455 16.4907 6.98187 16.4222 6.91083L11.4222 1.91083C11.3511 1.84232 11.2685 1.78701 11.178 1.7475C11.153 1.73583 11.1263 1.72916 11.0997 1.72C11.0299 1.69627 10.9574 1.68198 10.8838 1.6775C10.8663 1.67583 10.8505 1.66666 10.833 1.66666H4.99967C4.08051 1.66666 3.33301 2.41416 3.33301 3.33333V16.6667C3.33301 17.5858 4.08051 18.3333 4.99967 18.3333H14.9997C15.9188 18.3333 16.6663 17.5858 16.6663 16.6667V7.5C16.6663 7.4825 16.6572 7.46666 16.6555 7.44833C16.6514 7.37476 16.6371 7.30212 16.613 7.2325C16.6047 7.20583 16.5972 7.18 16.5855 7.155ZM13.8213 6.66666H11.6663V4.51166L13.8213 6.66666ZM4.99967 16.6667V3.33333H9.99967V7.5C9.99967 7.72101 10.0875 7.93297 10.2438 8.08925C10.4 8.24553 10.612 8.33333 10.833 8.33333H14.9997L15.0013 16.6667H4.99967Z"
                                                        fill="#414141" />
                                                    <path
                                                        d="M6.66699 10H13.3337V11.6667H6.66699V10ZM6.66699 13.3333H13.3337V15H6.66699V13.3333ZM6.66699 6.66666H8.33366V8.33333H6.66699V6.66666Z"
                                                        fill="#414141" />
                                                </svg>
                                                1k Appliacants</p>
                                        </div>
                                    </a>

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

<script>
    function undo(propertId) {
    console.log(propertId);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert Property!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, revert Property!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + propertId).submit();
            }
        })
    }
</script>
