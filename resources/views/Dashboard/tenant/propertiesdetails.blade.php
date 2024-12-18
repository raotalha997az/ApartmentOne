@extends('Dashboard.Layouts.master_dashboard')
<style>
    .propertieslistings-page .properties_details_main .properties-icons-details ul {
        display: flex;
        gap: 20px;
        margin-bottom: 30px !important;
        flex-wrap: wrap;
    }


    .propertieslistings-page .properties_details_main .properties_name_add .add a {
        background-color: #0077B6 !important;
        width: fit-content !important;
        padding: 10px 30px !important;
        border-radius: 30px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: #fff !important;
        transition: .3s !important;
    }

    .propertieslistings-page .properties_details_main .properties_name_add .add a svg path {
    fill: white;
}
</style>
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <div class="propertieslistings-page propertiesdetails-page">
        <div class="row">
            @if (session('success'))
            {{-- {{ dd($property) }} --}}

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Success!',
                            html: `
                    <p>{{ session('success') }}</p>
                    <p>
                        <a href="{{ route('tenant.go.chat') }}"
                           style="color: #3085d6; text-decoration: underline;">Go to Chat</a>
                    </p>
                `,
                            icon: 'success',
                            confirmButtonText: 'Close'
                        });
                    });
                </script>
            @endif


            <div class="col-lg-4">
                <div class="place-gallery-box">
                    <div class="large-gallery-box">
                        @if ($property->media->isNotEmpty())
                            <a href="{{ Storage::url($property->media[0]->img_path ?? '') }}" data-fancybox="gallery"
                                data-caption="Caption Images 1">
                                <img src="{{ Storage::url($property->media[0]->img_path ?? '') }}" alt="Image Gallery">
                            </a>
                        @endif
                    </div>
                    <div class="small-gallery-box">
                        {{-- Check if the property has media --}}
                        @if ($property->media->isNotEmpty())
                            @foreach ($property->media->skip(1) as $media)
                                <a href="{{ Storage::url($media->img_path) }}" style="box-shadow: 0px 0px 11px 0px black;"
                                    data-fancybox="gallery" data-caption="Property Image {{ $loop->iteration }}">
                                    <img src="{{ Storage::url($media->img_path) }}" alt="Image Gallery">
                                </a>
                            @endforeach
                        @else
                            <p>No images available for this property.</p>
                        @endif


                    </div>
                    <div class="proper-list-price">
                        <h3>$ {{ $property->price_rent }}</h3>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="properties_details_main">
                    <div class="properties_name_add">
                        <div class="name">
                            <h5>{{ $property->name }}</h5>
                            <h6>{{ $property->category->name ?? '' }}</h6>
                        </div>
                        <div class="add">
                            @if (in_array($property->id, $AppliedProperies))
                            <a href="{{ route('tenant.go.chat') }}" class="messages"><svg width="30" height="31" viewBox="0 0 30 31"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.25 3C4.87125 3 3.75 4.12125 3.75 5.5V20.5C3.75 21.8787 4.87125 23 6.25 23H10.7325L15 27.2675L19.2675 23H23.75C25.1287 23 26.25 21.8787 26.25 20.5V5.5C26.25 4.12125 25.1287 3 23.75 3H6.25ZM23.75 20.5H18.2325L15 23.7325L11.7675 20.5H6.25V5.5H23.75V20.5Z"
                                    fill="#777777" />
                                <path
                                    d="M8.75 9.25H21.25V11.75H8.75V9.25ZM8.75 14.25H17.5V16.75H8.75V14.25Z"
                                    fill="#777777" />
                            </svg>
                           <span> Messages</span></a>

                                <a href="{{ route('tenant.applyhistory') }}">
                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.3787 10.7325C25.3195 10.5968 25.2365 10.4728 25.1338 10.3663L17.6337 2.86625C17.5272 2.76348 17.4032 2.68051 17.2675 2.62125C17.23 2.60375 17.19 2.59375 17.15 2.58C17.0454 2.54441 16.9365 2.52297 16.8262 2.51625C16.8 2.51375 16.7762 2.5 16.75 2.5H8C6.62125 2.5 5.5 3.62125 5.5 5V25C5.5 26.3788 6.62125 27.5 8 27.5H23C24.3788 27.5 25.5 26.3788 25.5 25V11.25C25.5 11.2238 25.4862 11.2 25.4837 11.1725C25.4776 11.0621 25.4562 10.9532 25.42 10.8487C25.4075 10.8087 25.3962 10.77 25.3787 10.7325ZM21.2325 10H18V6.7675L21.2325 10ZM8 25V5H15.5V11.25C15.5 11.5815 15.6317 11.8995 15.8661 12.1339C16.1005 12.3683 16.4185 12.5 16.75 12.5H23L23.0025 25H8Z"
                                            fill="white" />
                                        <path
                                            d="M10.5 15H20.5V17.5H10.5V15ZM10.5 20H20.5V22.5H10.5V20ZM10.5 10H13V12.5H10.5V10Z"
                                            fill="white" />
                                    </svg>
                                    <span>Applied</span>
                                </a>
                            @else
                                <a
                                    href="{{ route('tenant.applyForProperty', ['property' => $property->id, 'user' => auth()->user()->id]) }}">
                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.3787 10.7325C25.3195 10.5968 25.2365 10.4728 25.1338 10.3663L17.6337 2.86625C17.5272 2.76348 17.4032 2.68051 17.2675 2.62125C17.23 2.60375 17.19 2.59375 17.15 2.58C17.0454 2.54441 16.9365 2.52297 16.8262 2.51625C16.8 2.51375 16.7762 2.5 16.75 2.5H8C6.62125 2.5 5.5 3.62125 5.5 5V25C5.5 26.3788 6.62125 27.5 8 27.5H23C24.3788 27.5 25.5 26.3788 25.5 25V11.25C25.5 11.2238 25.4862 11.2 25.4837 11.1725C25.4776 11.0621 25.4562 10.9532 25.42 10.8487C25.4075 10.8087 25.3962 10.77 25.3787 10.7325ZM21.2325 10H18V6.7675L21.2325 10ZM8 25V5H15.5V11.25C15.5 11.5815 15.6317 11.8995 15.8661 12.1339C16.1005 12.3683 16.4185 12.5 16.75 12.5H23L23.0025 25H8Z"
                                            fill="white" />
                                        <path
                                            d="M10.5 15H20.5V17.5H10.5V15ZM10.5 20H20.5V22.5H10.5V20ZM10.5 10H13V12.5H10.5V10Z"
                                            fill="white" />
                                    </svg>
                                    <span>Apply</span>
                                </a>
                            @endif

                        </div>
                    </div>

                    <div class="properties-icons-details">
                        <strong class="">Features : </strong>
                        <ul>
                            @foreach ($property->features as $featureDetail)
                                <li>
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25 11.9462V3.75H22.5V6.25H7.5V3.75H5V11.9462C3.5125 12.8125 2.5 14.4062 2.5 16.25V21.25C2.5 21.5815 2.6317 21.8995 2.86612 22.1339C3.10054 22.3683 3.41848 22.5 3.75 22.5H5V27.5H7.5V22.5H22.5V27.5H25V22.5H26.25C"
                                            fill="#666666" />
                                    </svg>
                                    {{ $featureDetail->feature->name ?? '' }} <!-- Accessing the feature name here -->
                                    <div class="quantity">{{ $featureDetail->quantity ?? '' }}</div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="properties-content-style properties-street-address">
                        <h6> Country</h6>
                        <p>{{ $property->country ?? '' }}</p>
                    </div>
                    <div class="properties-content-style properties-street-address">
                        <h6> Address</h6>
                        <p>{{ $property->address ?? '' }}</p>
                    </div>
                    <div class="properties-content-style properties-street-address">
                        <h6>Credit Score:</h6>
                        <p>{{ $property->credit_point ?? '' }}</p>
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Pets</h6>
                        @if ($property->pets && $property->pets->count())
                        @foreach ($property->pets as $petDetail)
                            <p>{{ $petDetail->pet->name ?? '' }}</p>
                        @endforeach
                    @else
                        <p>Not Allowed</p>
                    @endif
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Eviction</h6>
                        <p>{{ $property->eviction ? 'Required' : 'Not Required' }}</p>
                        @if ($property->eviction)
                        <p>Numer of Times {{ $property->many_time_evicted }}</p>
                        <p>Eviction last Time: {{ $property->when_evicted }}</p>
                    @endif
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Crimanal Report</h6>
                        <p>{{ $property->criminal_records ? 'Required' : 'Not Required' }}</p>
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Amoking Allowed</h6>
                        <p>{{ $property->smoking ? 'Yes Allowed' : 'Not Allowed' }}</p>
                    </div>


                    <div class="properties-content-style properties-other-details">
                        <h6> Credit history check</h6>
                        <p>{{ $property->credit_history_check ? 'Yes check' : 'Not check' }}</p>
                    </div>

                    <div class="properties-content-style properties-other-details">
                        <h6> Bankruptcy check</h6>
                        <p>{{ $property->bankruptcy ? 'Yes check' : 'Not check' }}</p>
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Rent to Who</h6>
                        @foreach ($property->RentToWhoDetails as $Details)
                            <p>{{ $Details->rentToWho->name ?? '' }}</p>
                        @endforeach
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Other Details</h6>
                        <p>{{ $property->other_details }}</p>
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Cotact Details</h6>
                        <div class="reports-listings-property-table">
                            <div class="three-headings-align">
                                <h3>Contact Name</h3>
                                <h3>Contact Number</h3>
                                <h3>Email Address</h3>
                            </div>

                            <div class="three-box-table">
                                <span>

                                    <div class="box date-box">
                                        <p>{{ $property->contact_name ?? '' }}</p>
                                        <!-- Tenant's application date -->
                                    </div>

                                    <div class="box number-box">
                                        <a href="tel:{{ $property->contact_phone_number ?? '' }}">
                                            <!-- Assuming tenant has a phone number field -->
                                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG code for phone icon -->
                                            </svg>
                                            {{ $property->contact_phone_number ?? '' }}</a>
                                    </div>

                                    <div class="box email-box-parent">
                                        <a href="mailto:{{ $property->contact_email ?? '' }}">

                                            {{ $property->contact_email ?? '' }}</a>
                                    </div>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
