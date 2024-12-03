@extends('Dashboard.Layouts.master_dashboard')
<style>
    .propertieslistings-page .properties_details_main .properties-icons-details ul {
    display: flex;
    gap: 20px;
    margin-bottom: 30px !important;
    flex-wrap: wrap;
}

.reports-listings-property-table .three-box-table .box.img-box-property {
    width: 25% !important;
}

.reports-listings-property-table .three-box-table .box {
    width: 25% !important;
    margin-right: 20px;
}


.propertieslistings-page.propertiesdetails-page .three-headings-align h3 {
    width: 25% !important;
}

.reports-listings-property-table .three-headings-align {
    justify-content: flex-start;
    gap: 30px;
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
                        {{-- <div class="add">
                            <a href="{{ route('landlord.properties.edit', $property->id) }}"><svg width="20"
                                    height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33336 17.5C3.39979 17.508 3.46694 17.508 3.53336 17.5L6.8667 16.6667C7.01457 16.6315 7.15001 16.5566 7.25837 16.45L17.5 6.17501C17.8105 5.86274 17.9847 5.44032 17.9847 5.00001C17.9847 4.5597 17.8105 4.13728 17.5 3.82501L16.1834 2.50001C16.0286 2.34505 15.8448 2.22212 15.6424 2.13824C15.4401 2.05437 15.2232 2.0112 15.0042 2.0112C14.7852 2.0112 14.5683 2.05437 14.366 2.13824C14.1636 2.22212 13.9798 2.34505 13.825 2.50001L3.58336 12.7417C3.47569 12.8505 3.39815 12.9855 3.35836 13.1333L2.52503 16.4667C2.49508 16.5745 2.48715 16.6873 2.50172 16.7982C2.51629 16.9092 2.55306 17.016 2.60983 17.1125C2.66661 17.2089 2.74222 17.2929 2.83217 17.3595C2.92212 17.4261 3.02455 17.4739 3.13336 17.5C3.19979 17.508 3.26694 17.508 3.33336 17.5ZM15 3.67501L16.325 5.00001L15 6.32501L13.6834 5.00001L15 3.67501ZM4.92503 13.7583L12.5 6.17501L13.825 7.50001L6.2417 15.0833L4.48336 15.5167L4.92503 13.7583Z"
                                        fill="white" />
                                </svg>

                            </a>

                            <a href="#" class="Delet-btn" data-id="{{ $property->id }}" onclick="deleteProperty(this)">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.00806 25.5818C7.00806 26.2448 7.27145 26.8807 7.74029 27.3496C8.20913 27.8184 8.84502 28.0818 9.50806 28.0818H22.0081C22.6711 28.0818 23.307 27.8184 23.7758 27.3496C24.2447 26.8807 24.5081 26.2448 24.5081 25.5818V10.5818H27.0081V8.08179H22.0081V5.58179C22.0081 4.91875 21.7447 4.28286 21.2758 3.81402C20.807 3.34518 20.1711 3.08179 19.5081 3.08179H12.0081C11.345 3.08179 10.7091 3.34518 10.2403 3.81402C9.77145 4.28286 9.50806 4.91875 9.50806 5.58179V8.08179H4.50806V10.5818H7.00806V25.5818ZM12.0081 5.58179H19.5081V8.08179H12.0081V5.58179ZM10.7581 10.5818H22.0081V25.5818H9.50806V10.5818H10.7581Z" fill="white" />
                                    <path d="M12.0081 13.0818H14.5081V23.0818H12.0081V13.0818ZM17.0081 13.0818H19.5081V23.0818H17.0081V13.0818Z" fill="white" />
                                </svg>
                            </a>
                        </div> --}}
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
                    <div class="properties-content-style properties-owner">
                        <div class="prop-owner-with-img-align">
                         <div class="content">
                             <h6>Owner</h6>
                             <h2>{{ $property->user->name }}</h2>
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
                                 {{ $property->user->phone }}</a></li>
                             <li><a href="mailto:michel@example.com"><svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M23 0H3C1.62125 0 0.5 1.12125 0.5 2.5V17.5C0.5 18.8787 1.62125 20 3 20H23C24.3787 20 25.5 18.8787 25.5 17.5V2.5C25.5 1.12125 24.3787 0 23 0ZM23 2.5V3.13875L13 10.9175L3 3.14V2.5H23ZM3 17.5V6.305L12.2325 13.4862C12.4514 13.6582 12.7217 13.7516 13 13.7516C13.2783 13.7516 13.5486 13.6582 13.7675 13.4862L23 6.305L23.0025 17.5H3Z" fill="#777777"/>
                                 </svg>
                                 {{ $property->user->email }}</a></li>
                         </ul>
                        </div>
                     </div>
                    <div class="properties-content-style properties-other-details">
                        <h6>Tenant</h6>
                        <div class="reports-listings-property-table">
                            <div class="three-headings-align">
                                <h3>Name</h3>
                                <h3>Applied Date</h3>
                                <h3>Contact Number</h3>
                                <h3>Email Address</h3>
                            </div>

                            <div class="three-box-table">
                                @foreach ($tenants as $tenant)
                                    <span>
                                        <div class="box img-box-property">
                                            <img src="{{ Storage::url($tenant->profile_img) }}" alt="{{ $tenant->name }}" class="tenant-image" width="60" height="60" style="border-radius: 50%;">
                                            <div class="content">
                                                <h4>{{ $tenant->name }}</h4> <!-- Tenant's name -->
                                            </div>
                                        </div>

                                        <div class="box date-box">
                                            <p>{{ $tenant->created_at->format('d M Y') }}</p> <!-- Tenant's application date -->
                                        </div>

                                        <div class="box number-box">
                                            <a href="tel:{{ $tenant->phone}}"> <!-- Assuming tenant has a phone number field -->
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- SVG code for phone icon -->
                                                </svg>
                                                {{ $tenant->phone}}</a>
                                        </div>

                                        <div class="box email-box-parent">
                                            <a href="mailto:{{ $tenant->email }}">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- SVG code for email icon -->
                                                </svg>
                                                {{ $tenant->email }}</a>
                                        </div>
                                    </span>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteProperty(element) {
            const propertyId = element.getAttribute('data-id');

            // SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with deletion
                    fetch(`{{ route('landlord.properties.delete', '') }}/${propertyId}`, { // Adjusted route
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is included
                        },
                        body: JSON.stringify({}) // If you need to send any data
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Show success message
                        Swal.fire(
                            'Deleted!',
                            data.message,
                            'success'
                        ).then(() => {
                            // Redirect to the properties route after the alert is closed
                            window.location.href = '{{ route('landlord.properties') }}';
                        });
                    })
                    .catch(error => {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the property.',
                            'error'
                        );
                        console.error('Error:', error);
                    });
                }
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endsection
