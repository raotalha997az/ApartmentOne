@extends('Dashboard.Layouts.master_dashboard')
@section('content')
<style>
    .propertieslistings-page .properties_details_main .properties-icons-details ul {
  display: flex;
  gap: 30px;
  margin-bottom: 30px !important;
  flex-wrap: wrap;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<div class="propertieslistings-page">
    <div class="row">
        <div>
            <a href="{{ route('admin.properties') }}" class="t-btn t-btn-blue mb-3">back</a>
        </div>
        <div class="col-lg-4">
            <div class="place-gallery-box">
                <div class="large-gallery-box">
                    @if ($property->media->isNotEmpty())
                        <a href="{{ asset($property->media[0]->img_path ?? '') }}" data-fancybox="gallery" data-caption="Caption Image 1">
                            <img src="{{ asset($property->media[0]->img_path ?? '') }}" alt="Image Gallery">
                        </a>
                    @endif
                </div>

                <div class="small-gallery-box">
                    @if ($property->media->isNotEmpty())
                        @foreach ($property->media->skip(1) as $media)
                            <a href="{{ asset($media->img_path) }}" style="box-shadow: 0px 0px 11px 0px black;" data-fancybox="gallery" data-caption="Property Image {{ $loop->iteration }}">
                                <img src="{{ asset($media->img_path) }}" alt="Image Gallery">
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
                            </li>
                            <li class="quantity">{{ $featureDetail->quantity ?? '' }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="properties-content-style properties-street-address">
                    <h6> Country</h6>
                    <p>{{ $property->country ?? '' }}</p>
                </div>
                <div class="properties-content-style properties-street-address">
                    <h6> Address</h6>
                    <p>{{ $property->address }}</p>
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
                <div class="properties-content-style properties-owner">
                   <div class="prop-owner-with-img-align">
                    <div class="content">
                        <h6>Owner</h6>
                        <h2>{{ $property->contact_name ?? '' }}</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> --}}

                    </div>
                    <div class="img-box">
                        <img src="{{ Storage::url($property->user->profile_img ?? '') }}" alt="owner">
                    </div>
                   </div>
                   <div class="owner-details-links">
                    <ul>
                        <li><a href="tel:+921 0055 1122336"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.1337 13.3663C19.0177 13.2501 18.8799 13.1579 18.7283 13.095C18.5767 13.0321 18.4141 12.9997 18.2499 12.9997C18.0858 12.9997 17.9232 13.0321 17.7716 13.095C17.6199 13.1579 17.4822 13.2501 17.3662 13.3663L15.3737 15.3587C14.4499 15.0837 12.7262 14.4587 11.6337 13.3663C10.5412 12.2738 9.91618 10.55 9.64118 9.62625L11.6337 7.63375C11.7499 7.51776 11.842 7.38001 11.9049 7.22837C11.9678 7.07672 12.0002 6.91417 12.0002 6.75C12.0002 6.58583 11.9678 6.42328 11.9049 6.27163C11.842 6.11999 11.7499 5.98223 11.6337 5.86625L6.63368 0.86625C6.51769 0.750067 6.37994 0.657895 6.2283 0.595007C6.07665 0.532118 5.9141 0.499748 5.74993 0.499748C5.58576 0.499748 5.42321 0.532118 5.27156 0.595007C5.11992 0.657895 4.98216 0.750067 4.86618 0.86625L1.47618 4.25625C1.00118 4.73125 0.733679 5.38375 0.743679 6.05C0.772429 7.83 1.24368 14.0125 6.11618 18.885C10.9887 23.7575 17.1712 24.2275 18.9524 24.2575H18.9874C19.6474 24.2575 20.2712 23.9975 20.7437 23.525L24.1337 20.135C24.2499 20.019 24.342 19.8813 24.4049 19.7296C24.4678 19.578 24.5002 19.4154 24.5002 19.2512C24.5002 19.0871 24.4678 18.9245 24.4049 18.7729C24.342 18.6212 24.2499 18.4835 24.1337 18.3675L19.1337 13.3663ZM18.9749 21.7562C17.4149 21.73 12.0774 21.3113 7.88368 17.1162C3.67618 12.9088 3.26868 7.5525 3.24368 6.02375L5.74993 3.5175L8.98243 6.75L7.36618 8.36625C7.21926 8.51306 7.11123 8.69417 7.05187 8.89321C6.99251 9.09225 6.98368 9.30294 7.02618 9.50625C7.05618 9.65 7.78993 13.0587 9.86493 15.1337C11.9399 17.2087 15.3487 17.9425 15.4924 17.9725C15.6956 18.0162 15.9065 18.0081 16.1057 17.9489C16.305 17.8897 16.4861 17.7813 16.6324 17.6337L18.2499 16.0175L21.4824 19.25L18.9749 21.7562Z" fill="#777777"/>
                            </svg>
                            {{ $property->contact_phone_number ?? '' }}</a></li>
                        <li><a href="mailto:michel@example.com"><svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 0H3C1.62125 0 0.5 1.12125 0.5 2.5V17.5C0.5 18.8787 1.62125 20 3 20H23C24.3787 20 25.5 18.8787 25.5 17.5V2.5C25.5 1.12125 24.3787 0 23 0ZM23 2.5V3.13875L13 10.9175L3 3.14V2.5H23ZM3 17.5V6.305L12.2325 13.4862C12.4514 13.6582 12.7217 13.7516 13 13.7516C13.2783 13.7516 13.5486 13.6582 13.7675 13.4862L23 6.305L23.0025 17.5H3Z" fill="#777777"/>
                            </svg>
                            {{ $property->contact_email ?? '' }}</a></li>
                    </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endsection
