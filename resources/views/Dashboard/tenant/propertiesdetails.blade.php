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
    padding: 5px 20px !important;
    border-radius: 20% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #fff !important;
    transition: .3s !important;
}
</style>
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <div class="propertieslistings-page propertiesdetails-page">
        <div class="row">

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
                                <a href="{{ Storage::url($media->img_path) }}" style="box-shadow: 0px 0px 11px 0px black;" data-fancybox="gallery"
                                    data-caption="Property Image {{ $loop->iteration }}">
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
                            <a href="{{ route('tenant.applyForProperty', ['property' => $property->id, 'user' => auth()->user()->id]) }}">
                                <span>Apply</span>
                                <svg width="31" height="30"
                                viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25.3787 10.7325C25.3195 10.5968 25.2365 10.4728 25.1338 10.3663L17.6337 2.86625C17.5272 2.76348 17.4032 2.68051 17.2675 2.62125C17.23 2.60375 17.19 2.59375 17.15 2.58C17.0454 2.54441 16.9365 2.52297 16.8262 2.51625C16.8 2.51375 16.7762 2.5 16.75 2.5H8C6.62125 2.5 5.5 3.62125 5.5 5V25C5.5 26.3788 6.62125 27.5 8 27.5H23C24.3788 27.5 25.5 26.3788 25.5 25V11.25C25.5 11.2238 25.4862 11.2 25.4837 11.1725C25.4776 11.0621 25.4562 10.9532 25.42 10.8487C25.4075 10.8087 25.3962 10.77 25.3787 10.7325ZM21.2325 10H18V6.7675L21.2325 10ZM8 25V5H15.5V11.25C15.5 11.5815 15.6317 11.8995 15.8661 12.1339C16.1005 12.3683 16.4185 12.5 16.75 12.5H23L23.0025 25H8Z"
                                    fill="white" />
                                <path
                                    d="M10.5 15H20.5V17.5H10.5V15ZM10.5 20H20.5V22.5H10.5V20ZM10.5 10H13V12.5H10.5V10Z"
                                    fill="white" />
                            </svg>
                            </a>
                        </div>
                    </div>

                    <div class="properties-icons-details">
                        <strong class="">Features :  </strong>
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
                        <h6>Street Address</h6>
                        <p>{{ $property->address ?? '' }}</p>
                    </div>
                    <div class="properties-content-style properties-street-address">
                        <h6>Credit Score:</h6>
                        <p>{{ $property->credit_point ?? '' }}</p>
                    </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Pets</h6>
                        @foreach ($property->pets as $petDetail)
                            <p>{{ $petDetail->pet->name ?? '' }}</p>
                        @endforeach
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

                </div>
            </div>
        </div>
    </div>

@endsection
