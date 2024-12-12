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
                            <a href="{{ route('landlord.properties.edit', $property->id) }}"><svg width="20"
                                    height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33336 17.5C3.39979 17.508 3.46694 17.508 3.53336 17.5L6.8667 16.6667C7.01457 16.6315 7.15001 16.5566 7.25837 16.45L17.5 6.17501C17.8105 5.86274 17.9847 5.44032 17.9847 5.00001C17.9847 4.5597 17.8105 4.13728 17.5 3.82501L16.1834 2.50001C16.0286 2.34505 15.8448 2.22212 15.6424 2.13824C15.4401 2.05437 15.2232 2.0112 15.0042 2.0112C14.7852 2.0112 14.5683 2.05437 14.366 2.13824C14.1636 2.22212 13.9798 2.34505 13.825 2.50001L3.58336 12.7417C3.47569 12.8505 3.39815 12.9855 3.35836 13.1333L2.52503 16.4667C2.49508 16.5745 2.48715 16.6873 2.50172 16.7982C2.51629 16.9092 2.55306 17.016 2.60983 17.1125C2.66661 17.2089 2.74222 17.2929 2.83217 17.3595C2.92212 17.4261 3.02455 17.4739 3.13336 17.5C3.19979 17.508 3.26694 17.508 3.33336 17.5ZM15 3.67501L16.325 5.00001L15 6.32501L13.6834 5.00001L15 3.67501ZM4.92503 13.7583L12.5 6.17501L13.825 7.50001L6.2417 15.0833L4.48336 15.5167L4.92503 13.7583Z"
                                        fill="white" />
                                </svg>

                            </a>

                            <a href="#" class="Delet-btn" data-id="{{ $property->id }}"
                                onclick="deleteProperty(this)">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.00806 25.5818C7.00806 26.2448 7.27145 26.8807 7.74029 27.3496C8.20913 27.8184 8.84502 28.0818 9.50806 28.0818H22.0081C22.6711 28.0818 23.307 27.8184 23.7758 27.3496C24.2447 26.8807 24.5081 26.2448 24.5081 25.5818V10.5818H27.0081V8.08179H22.0081V5.58179C22.0081 4.91875 21.7447 4.28286 21.2758 3.81402C20.807 3.34518 20.1711 3.08179 19.5081 3.08179H12.0081C11.345 3.08179 10.7091 3.34518 10.2403 3.81402C9.77145 4.28286 9.50806 4.91875 9.50806 5.58179V8.08179H4.50806V10.5818H7.00806V25.5818ZM12.0081 5.58179H19.5081V8.08179H12.0081V5.58179ZM10.7581 10.5818H22.0081V25.5818H9.50806V10.5818H10.7581Z"
                                        fill="white" />
                                    <path
                                        d="M12.0081 13.0818H14.5081V23.0818H12.0081V13.0818ZM17.0081 13.0818H19.5081V23.0818H17.0081V13.0818Z"
                                        fill="white" />
                                </svg>
                            </a>
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
                        <p>{{ $property->other_details ?? '' }}</p>
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
                                            <img src="{{ Storage::url($tenant->profile_img) }}" alt="{{ $tenant->name }}"
                                                class="tenant-image" width="60" height="60"
                                                style="border-radius: 50%;">
                                            <div class="content">
                                                <h4>{{ $tenant->name }}</h4> <!-- Tenant's name -->
                                            </div>
                                        </div>

                                        <div class="box date-box">
                                            <p>{{ $tenant->created_at->format('d M Y') }}</p>
                                            <!-- Tenant's application date -->
                                        </div>

                                        <div class="box number-box">
                                            <a href="tel:{{ $tenant->phone }}">
                                                <!-- Assuming tenant has a phone number field -->
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <!-- SVG code for phone icon -->
                                                </svg>
                                                {{ $tenant->phone }}</a>
                                        </div>

                                        <div class="box email-box-parent">
                                            <a href="mailto:{{ $tenant->email }}">

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
