@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.applyhistory-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.applyhistory-active svg path {
        fill: #414141 !important;
    }

    .main-parent-place-box .child-place-box .img-box img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    object-position: center;
}

.main-parent-place-box .child-place-box .properties-icons-details {
    padding: 0px 15px 15px 15px;
}

.main-parent-place-box .child-place-box .properties-icons-details ul li {
    font-size: 14px;margin-top: 5px;
}

.main-parent-place-box .child-place-box .properties-icons-details ul li svg {
    width: 25px;
    height: 25px;
}
</style>
@section('content')
    <div class="properties-page">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-listing-parent-box">
                    <div class="two-things-align">
                        <div class="box">
                            <h6>Applied Property History</h6>
                            {{-- <p>Based On Your Profile</p> --}}
                        </div>
                        {{-- <div class="box">
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
                        </div> --}}
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
                        <div class="main-parent-place-box">
                              @foreach ($Applyproperties as $property)

                                    {{-- {{ dd($property);}} --}}
                                    {{-- {{ dd($property->property);}} --}}
                                    {{-- {{ dd($property->property->id);}} --}}
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
                                            {{-- <div class="heart-box">
                                                <a href="#" class="heart-link"
                                                    data-property-id="{{ $property->property->id }}">
                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.35372 5.43081C4.01618 5.7704 3.74843 6.17356 3.56576 6.61727C3.38308 7.06097 3.28906 7.53653 3.28906 8.01679C3.28906 8.49705 3.38308 8.97261 3.56576 9.41632C3.74843 9.86002 4.01618 10.2632 4.35372 10.6028L10.5589 16.8459L16.7641 10.6028C17.4458 9.91693 17.8288 8.98672 17.8288 8.01679C17.8288 7.04686 17.4458 6.11665 16.7641 5.43081C16.0824 4.74496 15.1579 4.35966 14.1938 4.35966C13.2298 4.35966 12.3052 4.74496 11.6235 5.43081L10.5589 6.50194L9.49429 5.43081C9.15676 5.09121 8.75604 4.82182 8.31503 4.63803C7.87402 4.45425 7.40135 4.35965 6.924 4.35965C6.44666 4.35965 5.97398 4.45425 5.53297 4.63803C5.09196 4.82182 4.69125 5.09121 4.35372 5.43081V5.43081Z"
                                                            stroke="#0077B6" stroke-width="1.62044" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div> --}}

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
                                                        {{ $featureDetail->quantity ?? '' }}
                                                        <!-- Accessing the feature name here -->
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="tabs-2" role="tabpanel">
                        <div class="main-parent-place-box">
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal-02</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="tabs-3" role="tabpanel">
                        <div class="main-parent-place-box">
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal-03</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="tabs-4" role="tabpanel">
                        <div class="main-parent-place-box">
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal-04</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="child-place-box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/main-place-img.png') }}" alt="">
                                    </div>
                                </a>
                                <div class="some-align">
                                    <div class="content-box">
                                        <div class="price-month">
                                            <h6>$2,400</h6>
                                            <p>/month</p>
                                        </div>
                                        <a href="#">
                                            <div class="place-name">
                                                <h5>St. Crystal</h5>
                                            </div>
                                        </a>
                                        <div class="place-location">
                                            <p>210 US Highway, Highland Lake, FL </p>
                                        </div>
                                    </div>
                                    <div class="heart-box">
                                        <a href="#" class="heart-link">
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
                                <div class="place-details-three">
                                    <ul>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.6518 7.62157V5.73884C14.6518 4.62139 13.7431 3.70711 12.6324 3.70711H9.93988C9.42157 3.70711 8.95038 3.91028 8.59362 4.23536C8.23686 3.91028 7.76567 3.70711 7.24736 3.70711H4.55483C3.44416 3.70711 2.53544 4.62139 2.53544 5.73884V7.62157C2.12483 7.99405 1.8623 8.52908 1.8623 9.12505V13.1885H3.20857V11.834H13.9787V13.1885H15.3249V9.12505C15.3249 8.52908 15.0624 7.99405 14.6518 7.62157ZM9.93988 5.06159H12.6324C13.0026 5.06159 13.3055 5.36635 13.3055 5.73884V7.09332H9.26675V5.73884C9.26675 5.36635 9.56966 5.06159 9.93988 5.06159ZM3.8817 5.73884C3.8817 5.36635 4.18461 5.06159 4.55483 5.06159H7.24736C7.61758 5.06159 7.92049 5.36635 7.92049 5.73884V7.09332H3.8817V5.73884ZM3.20857 10.4795V9.12505C3.20857 8.75257 3.51148 8.44781 3.8817 8.44781H13.3055C13.6758 8.44781 13.9787 8.75257 13.9787 9.12505V10.4795H3.20857Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            4 Beds</li>
                                        <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2514 7.0935H4.82757V5.06177C4.82757 4.31477 5.43137 3.70728 6.17383 3.70728C6.9163 3.70728 7.5201 4.31477 7.5201 5.06177H8.86636C8.86636 3.56777 7.65876 2.3528 6.17383 2.3528C4.68891 2.3528 3.48131 3.56777 3.48131 5.06177V7.0935H2.13505C1.95652 7.0935 1.78531 7.16485 1.65907 7.29186C1.53283 7.41887 1.46191 7.59112 1.46191 7.77074V9.12523C1.46191 10.8901 2.58874 12.3916 4.15444 12.9516V15.2204H5.5007V13.1887H10.8858V15.2204H12.232V12.9516C13.7977 12.3916 14.9245 10.8901 14.9245 9.12523V7.77074C14.9245 7.59112 14.8536 7.41887 14.7274 7.29186C14.6012 7.16485 14.4299 7.0935 14.2514 7.0935ZM13.5783 9.12523C13.5783 10.6192 12.3707 11.8342 10.8858 11.8342H5.5007C4.01577 11.8342 2.80818 10.6192 2.80818 9.12523V8.44798H13.5783V9.12523Z"
                                                    fill="#0077B6" />
                                            </svg>
                                            2 Bathrooms</li>
                                        <li> <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_1253)">
                                                    <path
                                                        d="M7.85007 12.9531L3.50823 8.58472C3.01679 8.09027 3.01679 7.17988 3.50823 6.68543L7.85007 2.31707C8.34152 1.82262 9.24638 1.82262 9.73783 2.31707L14.0797 6.68543C14.5711 7.17988 14.5711 8.09027 14.0797 8.58472L9.73783 12.9531C9.24638 13.4475 8.34152 13.4475 7.85007 12.9531V12.9531Z"
                                                        stroke="#0077B6" stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.33203 11.0253L5.85686 14.5717" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7319 14.5716L15.2568 11.0252" stroke="#0077B6"
                                                        stroke-width="1.21533" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_1253">
                                                        <rect width="16.1552" height="16.2538" fill="white"
                                                            transform="translate(0.716797 0.321068)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            6x8 m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
