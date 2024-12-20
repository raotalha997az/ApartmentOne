@extends('Dashboard.Layouts.master_dashboard')
@section('content')
    <style>
        /* Optional: some basic styling for the select box */
        .select2-container {
            width: 100% !important;
            /* Make Select2 full width */
        }

        .image-preview {
            display: inline-block;
            margin: 5px;
            position: relative;
        }

        .image-preview img {
            width: 100px;
            /* Adjust as needed */
            height: 100px;
            /* Adjust as needed */
            object-fit: cover;
        }

        .close-btn {
            position: absolute;
            top: 0;
            right: 0;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            padding: 2px 5px;
        }

        .paren-check-box.eviction-custom-style {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }


        div#existingImagesContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }


        .selection-boxex-true {
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 20px;
            margin: 20px 0;
        }

        .radio-item {
            position: relative;
            display: block;
        }

        .radio-item input {
            /* display: none; */
            position: absolute;
            height: 100%;
            width: 100%;
            opacity: 0;
        }

        .selection-boxex-true .selection-content-true,
        .selection-boxex-true .radio-item label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 20px 40px;
            border: 5px solid #CCCCCC;
            border-radius: 20px;
            transition: .3s;
        }

        .selection-boxex-true .selection-content-true span,
        .selection-boxex-true .radio-item label {
            color: #777777;
            font-size: 20px;
        }

        .radio-item input {
            position: absolute !important;
            height: 100% !important;
            width: 100% !important;
            opacity: 0 !important;
        }

        .radio-item label:hover,
        .radio-item label.active {
            transition: .3s !important;
            border-color: #0077B6 !important;
        }

        #activeNonActive12 .activeNonActive12,
        #activeNonActive180 .activeNonActive18 {
            position: relative;
        }

        select,
        textarea,
        textarea,
        input,
        #activeNonActive12 .activeNonActive12 label,
        #activeNonActive180 .activeNonActive18 label {
            background-color: #E5E5E5;
            border-radius: 10px;
            padding: 15px 20px;
            color: #999999;
            border: 1px solid #999999;
            width: 100%;
            margin-bottom: 10px;
        }

        #activeNonActive12 .activeNonActive12 input,
        #activeNonActive180 .activeNonActive18 input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
        }

        #activeNonActive12 .activeNonActive12 label.active,
        #activeNonActive180 .activeNonActive18 label.active {
            border-color: #414141;
            color: #414141 !important;
        }
    </style>
    <div class="add-property-form-sec">
        <div class="row">
            <div class="col-md-12">
                <form id="uploadForm" action="{{ route('landlord.properties.update', $property->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <p>Minimum 3 images, Maximum 50 images</p>
                    <div class="main-file-upload-box">
                        <div id="imageContainer">
                            <label for="fileInput">
                                <img src="{{ asset('assets/images/file-upload-img.png') }}" alt="">
                            </label>
                            <input type="file" id="fileInput" accept="image/*" multiple name="images[]">
                            <!-- Display existing images -->
                            <div id="existingImagesContainer">
                                @foreach ($property->media as $image)
                                    <div class="image-preview">
                                        {{-- <img src="{{ Storage::url($image->img_path) }}" alt="Image" /> --}}
                                        <img src="{{ asset($image->img_path) }}" alt="Image" />
                                        <input type="hidden" name="existing_images[]" value="{{ $image->img_path }}">
                                        <button type="button" class="close-btn"
                                            onclick="removeImage(this, '{{ $image->img_path }}')">X</button>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="many-forms-fields-box">
                        <div class="input-box">
                            <label for="">Property Name</label>
                            <input type="text" placeholder="Type Here" name="name"
                                value="{{ old('name', $property->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box simple-select mt-3">
                            <label for="country">State</label>
                            <select name="country" id="country">
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="Australia">Australia</option>
                                <option value="Germany">Germany</option>
                                <option value="France">France</option>
                                <option value="India">India</option>
                                <option value="Japan">Japan</option>
                                <option value="China">China</option>

                            </select>
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-box">
                            <label for="address">Street Address</label>
                            <textarea id="address" name="address" placeholder="Enter your street address" cols="100" rows="10">{{ old('address', $property->address) }}</textarea>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-box simple-select">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label for="category">Category</label>
                                @if (Auth::user()->hasRole('admin'))
                                    <button type="button" id="create-category"
                                        class="fa fa-plus btn btn-primary btn-sm px-3 py-2" style="white-space: nowrap"
                                        data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
                                @endif
                            </div>
                            <select name="category" id="category" placeholder="Type Here">
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $property->cat_id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="many-forms-fields-box">

                            <div class="input-box">

                                {{-- <h6>Parking</h6> --}}
                                <label for="parking">Parking</label>
                                <p>Does the property have designated parking?</p>

                                <div class="selection-boxex-true">

                                    <div class="radio-item" onclick="boxActive10(1)" id="boxactive10">
                                        <input type="radio" id="parkingYes" name="parking" value="1"
                                            {{ $property->parking == 1 ? 'checked' : '' }}>
                                        <label class="parking {{ $property->parking == 1 ? 'active' : '' }}"
                                            for="parkingYes" id="parkingYesLabel">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>


                                    <div class="radio-item" onclick="boxActive10(0)" id="boxnunactive10">
                                        <input type="radio" id="parkingNo" name="parking" value="0"
                                            {{ $property->parking == 0 ? 'checked' : '' }}>
                                        <label class="parking {{ $property->parking == 0 ? 'active' : '' }}"
                                            for="parkingNo" id="parkingNoLabel">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>

                                    @error('parking')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>
                                <div class="active-non-active" id="activeNonActive10">
                                    <div class="box">
                                        <label>What kind of parking is offered?</label>
                                        <input type="text" name="kind_of_parking" placeholder="Type here"
                                            value="{{ old('kind_of_parking', $property->kind_of_parking) }}">
                                        @error('kind_of_parking')
                                            <div class="error-message">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="box">
                                        <label>How many vehicles can be accommodated?</label>
                                        {{-- <textarea name="no_of_vehicle" id="" cols="30" rows="10" placeholder="Description">{{ old('no_of_vehicle') }}</textarea> --}}
                                        <input type="number" name="no_of_vehicle" placeholder="Type here"
                                            value="{{ old('no_of_vehicle', $property->no_of_vehicle) }}">
                                        @error('no_of_vehicle')
                                            <div class="error-message">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>



                                </div>

                                <div class="tab" id="tab-3">
                                    <p>Are pets allowed in the property?</p>

                                    <div class="selection-boxex-true">
                                        <div class="radio-item" onclick="boxActive3(1)" id="boxactive3">
                                            <label
                                                class="selection-content-true {{ $property->pets != null ? 'active' : '' }}"
                                                id="selectionYesLabel">
                                                <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                                <span>Yes</span>
                                            </label>
                                        </div>

                                        <div class="radio-item" onclick="boxActive3(0)" id="boxnonactive3">
                                            <label
                                                class="selection-content-true {{ $property->pets == null ? 'active' : '' }}"
                                                id="selectionNoLabel">
                                                <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="active-non-active" id="activeNonActive3">
                                        <!-- Allowed Pets Section -->
                                        <div class="input-box mt-3">
                                            <label for="pets">Allowed Pets</label>
                                            <select class="js-example-basic-multiple" multiple="multiple"
                                                style="width: 100%;" name="pets[]">
                                                @foreach ($pets as $pet)
                                                    <option value="{{ $pet->id }}"
                                                        {{ in_array($pet->id, $property->pets->pluck('pet_id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $pet->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pets')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <p>Is smoking of cigarettes allowed in the property?</p>

                                    <div class="selection-boxex-true">
                                        <div class="radio-item">
                                            <input type="radio" class="smokingYes" id="smokingYes" name="smoking"
                                                value="1" onclick="setActiveSmoking(this)"
                                                {{ $property->smoking == 1 ? 'checked' : '' }}>
                                            <label class="smokingYesLabel " for="smokingYes">
                                                <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="radio-item">
                                            <input type="radio" class="smokingNo" id="smokingNo" name="smoking"
                                                value="0" onclick="setActiveSmoking(this)"
                                                {{ $property->smoking == 0 ? 'checked' : '' }}>
                                            <label class="smokingNoLabel" for="smokingNo">
                                                <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    @error('smoking')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror




                                    <p>Are waterbeds allowed in the property</p>

                                    <div class="selection-boxex-true">
                                        <div class="radio-item">
                                            <input type="radio" class="propertyYes" id="propertyYes" name="waterbed"
                                                value="1" onclick="setActiveProperty(this)"
                                                {{ $property->waterbed == 1 ? 'checked' : '' }}>
                                            <label class="propertyYesLabel" for="propertyYes">
                                                <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="radio-item">
                                            <input type="radio" class="propertyNo" id="propertyNo" name="waterbed"
                                                value="0" onclick="setActiveProperty(this)"
                                                {{ $property->waterbed == 0 ? 'checked' : '' }}>
                                            <label class="propertyNoLabel" for="propertyNo">
                                                <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    @error('waterbed')
                                        <div class="error-available_status">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror



                                </div>
                            </div>
                            <div class="tab" id="availability_date">

                                <h6>Availability Date</h6>
                                <p>Is the property already available for rent?</p>

                                <div class="selection-boxex-true">
                                    <!-- "Yes" Option -->
                                    <div class="radio-item" onclick="boxActive11(1)" id="boxactive11">
                                        <input type="radio" id="availability_yes" name="availability_check"
                                            value="1" {{ $property->availability_check == 1 ? 'checked' : '' }}>
                                        <label class="availability_check" for="availability_yes"
                                            id="availabilityYesLabel">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>

                                    <!-- "No" Option -->
                                    <div class="radio-item" onclick="boxActive11(0)" id="boxnonactive11">
                                        <input type="radio" id="availability_no" name="availability_check"
                                            value="0" {{ $property->availability_check == 0 ? 'checked' : '' }}>
                                        <label class="availability_check" for="availability_no" id="availabilityNoLabel">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Box for Date Input -->
                                <div class="box" id="activeNonActive11">
                                    <p>When will the property be available?</p>
                                    <input type="date" name="date_availability"
                                        value="{{ old('date_availability', $property->date_availability) }}"
                                        placeholder="DD MM YYYY">
                                    @error('date_availability')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="tab" id="availability_date">
                                <h6>Section 8 Housing Choice Voucher</h6>

                                <p>Does this property accept Section 8 Housing Choice Voucher?</p>
                                <div class="selection-boxex-true">
                                    <!-- "Yes" Option -->
                                    <div class="radio-item">
                                        <input type="radio" class="choice_voucherYes" id="choice_voucherYes" name="choice_voucher" value="1"
                                            onclick="boxActive21(this)"
                                            {{ old('choice_voucher', $selectedchoice_voucher ?? '') == 1 ? 'checked' : '' }}>
                                        <label
                                            class="choice_voucherYesLabel {{ old('choice_voucher', $selectedchoice_voucher ?? '') == 1 ? 'active' : '' }}"
                                            for="choice_voucherYes">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>

                                    <!-- "No" Option -->
                                    <div class="radio-item">
                                        <input type="radio" class="choice_voucherNo" id="choice_voucherNo" name="choice_voucher" value="0"
                                            onclick="boxActive21(this)"
                                            {{ old('choice_voucher', $selectedchoice_voucher ?? '') == 0 ? 'checked' : '' }}>
                                        <label
                                            class="choice_voucherNoLabel {{ old('choice_voucher', $selectedchoice_voucher ?? '') == 0 ? 'active' : '' }}"
                                            for="choice_voucherNo">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>
                                </div>



                            </div>

                            <div class="tab" id="lease_details">

                                <h6>Lease Details</h6>
                                <p>Would you like to include details about the lease term, rent, and security deposit? </p>

                                <div class="selection-boxex-true">
                                    <!-- Yes Option -->
                                    <div class="radio-item" onclick="boxActive12(1)" id="boxactive12">
                                        <input type="radio" id="lease_check_yes" name="lease_check" value="1"
                                            {{ $property->lease_check == 1 ? 'checked' : '' }}>
                                        <label class="lease_check {{ $property->lease_check == 1 ? 'active' : '' }}"
                                            for="lease_check_yes" id="leaseYesLabel">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>

                                    <!-- No Option -->
                                    <div class="radio-item" onclick="boxActive12(0)" id="boxnonactive12">
                                        <input type="radio" id="lease_check_no" name="lease_check" value="0"
                                            {{ $property->lease_check == 0 ? 'checked' : '' }}>
                                        <label class="lease_check {{ $property->lease_check == 0 ? 'active' : '' }}"
                                            for="lease_check_no" id="leaseNoLabel">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>
                                </div>


                                <div class="active-non-active" id="activeNonActive12">

                                    <div class="box activeNonActive12">
                                        <label for="" id="Short_term_label" class="">Short Term</label>
                                        <input type="radio" name="lease_type" value="1" placeholder="Short Term"
                                            onclick="boxNonActive13('Short_term')">
                                    </div>

                                    <div class="box activeNonActive12">
                                        <label for="" id="Fixed_term_label" class="">Fixed Term</label>
                                        <input type="radio" name="lease_type" value="2" placeholder="Fixed Term"
                                            onclick="boxNonActive13('Fixed_term')">
                                    </div>

                                    <div class="box activeNonActive12">
                                        <label for="" id="Month_to_Month_label"
                                            class="">Month-to-Month</label>
                                        <input type="radio" name="lease_type" value="3"
                                            placeholder="Month-to-Month" onclick="boxNonActive13('Month-to-Month')">
                                    </div>

                                    <div class="box activeNonActive12">
                                        <label for="" id="Year_to_Year_label" class="">Year-to-Year</label>
                                        <input type="radio" name="lease_type" value="4"
                                            placeholder="Year-to-Year" onclick="boxNonActive13('Year-to-Year')">
                                    </div>

                                    @error('lease_type')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror



                                    <div class="box active-non-active" id="activeNonActive13">
                                        <label for="">What is the minimum length of the lease?</label>
                                        <input type="text" name="lease_period"
                                            placeholder="Minimum Length  (6 mon , 1 yr)"
                                            value="{{ $property->lease_period }}">
                                        @error('lease_period')
                                            <div class="error-message">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>



                                </div>


                            </div>
                            <div class="tab" id="rent_detail">

                                <h6>Rent</h6>
                                <div id="activeNonActive180">
                                    <div class="box activeNonActive18">
                                        <label for="" id="Weekly_label">Weekly</label>
                                        <input type="radio" name="rent_type" value="1"
                                            onclick="handleRentSelection('Weekly')"
                                            {{ $property->rent_type == 1 ? 'checked' : '' }}>
                                    </div>
                                    <div class="box activeNonActive18">
                                        <label for="" id="Monthly_label">Monthly</label>
                                        <input type="radio" name="rent_type" value="2"
                                            onclick="handleRentSelection('Monthly')"
                                            {{ $property->rent_type == 2 ? 'checked' : '' }}>
                                    </div>
                                    <div class="box activeNonActive18">
                                        <label for="" id="Yearly_label">Yearly</label>
                                        <input type="radio" name="rent_type" value="3"
                                            onclick="handleRentSelection('Yearly')"
                                            {{ $property->rent_type == 3 ? 'checked' : '' }}>
                                    </div>
                                    <div class="box activeNonActive18">
                                        <label for="" id="Specific_Terms_label">Specific Terms</label>
                                        <input type="radio" name="rent_type" value="4"
                                            onclick="handleRentSelection('Specific Terms')"
                                            {{ $property->rent_type == 4 ? 'checked' : '' }}>
                                    </div>

                                    @error('rent_type')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                    <div class="box active-non-active" id="Weekly">
                                        <label for="">Amount</label>
                                        <input type="number" name="price_rent_weekly" placeholder="Weekly Amount"
                                            value="{{ $property->price_rent ?? '' }}">
                                    </div>
                                    <div class="box active-non-active" id="activeNonActive18">
                                        <label for="">Amount</label>
                                        <input type="number" name="price_rent_monthly" placeholder="Monthly Amount"
                                            value="{{ $property->price_rent ?? '' }}">
                                    </div>

                                    <div class="box active-non-active" id="Yearly">
                                        <label for="">Amount</label>
                                        <input type="number" name="price_rent_yearly" placeholder="Yearly Amount"
                                            value="{{ $property->price_rent ?? '' }}">
                                    </div>
                                    <div class="box active-non-active" id="payment_frequency">
                                        <label for="">Payment Frequency</label>
                                        <input type="number" name="payment_frequency"
                                            placeholder="Payment Frequency Amount"
                                            value="{{ $property->payment_frequency ?? '' }}">
                                        @error('payment_frequency')
                                            <div class="error-message">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="box active-non-active" id="specificTerm">
                                        <label for="">Amount</label>
                                        <input type="number" name="price_rent_specific"
                                            placeholder="Specific Term Amount" value="{{ $property->price_rent ?? '' }}">
                                    </div>
                                </div>
                                @error('price_rent')
                                    <div class="error-message">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror


                            </div>
                            <div class="tab" id="security_deposit">

                                <h6>Security Deposit</h6>
                                <p>What background check will you do to screen your applicant?</p>

                                <div class="selection-boxex-true">

                                    <div class="radio-item" onclick="boxActive20(1)" id="boxactive20">
                                        <input type="radio" id="security_deposit_yes" name="security_deposit"
                                            value="1" {{ $property->security_deposit == 1 ? 'checked' : '' }}>
                                        <label
                                            class="security_deposit {{ $property->security_deposit == 1 ? 'active' : '' }}"
                                            for="security_deposit_yes" id="securitydepositYeslable">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>


                                    <div class="radio-item" onclick="boxActive20(0)" id="boxnunactive20">
                                        <input type="radio" id="security_deposit_yes_no" name="security_deposit"
                                            value="0" {{ $property->security_deposit == 0 ? 'checked' : '' }}>
                                        <label
                                            class="security_deposit {{ $property->security_deposit == 0 ? 'active' : '' }}"
                                            for="security_deposit_yes_no" id="securitydepositNolable">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>
                                    @error('security_deposit')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>

                                <div class="active-non-active" id="activeNonActive20">

                                    <div class="box">
                                        <p>Security Deposit</p>
                                        <input type="number" name="deposit_amount" placeholder="$1500"
                                            value="{{ old('deposit_amount', $property->deposit_amount) }}">
                                    </div>
                                    @error('deposit_amount')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>

                            </div>



                            <div class="tab" id="tab-3">

                                <h6>Eviction Terms</h6>

                                <p style="margin-top: 20px !important;">Would you like to accept applicants with a history
                                    of eviction?</p>

                                <div class="selection-boxex-true">
                                    <!-- Yes Option -->
                                    <div class="radio-item" onclick="boxActive1(1)" id="boxactive1">
                                        <input type="radio" id="eviction_yes" name="eviction" value="1"
                                            {{ $property->eviction == 1 ? 'checked' : '' }}>
                                        <label class="evction {{ $property->eviction == 1 ? 'active' : '' }}"
                                            for="eviction_yes" id="evictionYesLabel">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>

                                    <!-- No Option -->
                                    <div class="radio-item" onclick="boxActive1(0)" id="boxnonactive1">
                                        <input type="radio" id="eviction_no" name="eviction" value="0"
                                            {{ $property->eviction == 0 ? 'checked' : '' }}>
                                        <label class="evction {{ $property->eviction == 0 ? 'active' : '' }}"
                                            for="eviction_no" id="evictionNoLabel">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>

                                    @error('eviction')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Hidden Box -->
                                <div class="active-non-active" id="activeNonActive1">
                                    <div class="box">
                                        <p>How many are allowed?</p>
                                        <input type="number" placeholder="00" name="many_time_evicted"
                                            value="{{ old('many_time_evicted', $property->many_time_evicted) }}">
                                    </div>
                                    @error('many_time_evicted')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                    <div class="box">
                                        <p>How far back should the eviction be considered?</p>
                                        <div class="flex-input">
                                            <input type="date" placeholder="dd-mm-yy" name="when_evicted"
                                                value="{{ old('when_evicted', $property->when_evicted) }}">
                                        </div>
                                    </div>
                                    @error('when_evicted')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="tab" id="conviction">

                                <h6>Felony Convictions</h6>

                                <p style="margin-top: 30px !important;">Would you like to accept applicants with a felony
                                    conviction in their
                                    past?</p>

                                <div class="selection-boxex-true">
                                    <div class="radio-item" onclick="boxActive100(1)" id="boxactive100">
                                        <input type="radio" class="Convictions" id="convictions_yes" name="conviction"
                                            value="1" {{ $property->conviction == 1 ? 'checked' : '' }}>
                                        <label class="Convictions {{ $property->conviction == 1 ? 'active' : '' }}"
                                            for="Convictions_yes" id="ConvictionsYesLabel">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                                            Yes
                                        </label>
                                    </div>

                                    <div class="radio-item" onclick="boxActive100(0)" id="boxnunactive100">
                                        <input type="radio" class="ConvictionsNo" id="convictions_no"
                                            name="conviction" value="0"
                                            {{ $property->conviction == 0 ? 'checked' : '' }}>
                                        <label class="ConvictionsNoLabel {{ $property->conviction == 0 ? 'active' : '' }}"
                                            for="convictions_no" id="ConvictionsNoLabel">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                                            No
                                        </label>
                                    </div>

                                    @error('conviction')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="active-non-active" id="activeNonActive100">

                                    <div class="box">
                                        <p>Specify</p>
                                        {{-- <textarea name="conviction_pecify" placeholder="Type Here" id="" cols="30" rows="10">  {{ old('conviction_pecify') }} </textarea> --}}

                                        <select name="conviction_pecify" id="">
                                            <option value="Murder "
                                                {{ old('conviction_pecify') == 'Murder ' ? 'selected' : '' }}>Murder
                                            </option>
                                            <option value="Assault with a deadly weapon "
                                                {{ old('conviction_pecify', $property->conviction_pecify) == 'Assault with a deadly weapon ' ? 'selected' : '' }}>
                                                Assault
                                                with a deadly weapon </option>
                                            <option value="Aggravated Assault "
                                                {{ old('conviction_pecify', $property->conviction_pecify) == 'Aggravated Assault ' ? 'selected' : '' }}>
                                                Aggravated Assault
                                            </option>
                                            <option value="Kidnapping "
                                                {{ old('conviction_pecify', $property->conviction_pecify) == 'Kidnapping ' ? 'selected' : '' }}>
                                                Kidnapping </option>
                                            <option value="Robbery  "
                                                {{ old('conviction_pecify', $property->conviction_pecify) == 'Robbery  ' ? 'selected' : '' }}>
                                                Robbery
                                            </option>
                                            <option value="Domestic Violence "
                                                {{ old('conviction_pecify', $property->conviction_pecify) == 'Domestic Violence ' ? 'selected' : '' }}>
                                                Domestic Violence
                                            </option>
                                            <option value="Drug Trafficking "
                                                {{ old('conviction_pecify', $property->conviction_pecify) == 'Drug Trafficking ' ? 'selected' : '' }}>
                                                Drug Trafficking
                                            </option>

                                        </select>


                                    </div>
                                    @error('conviction_pecify')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>



                            </div>
                            <div class="tab" id="credit_score">
                                <h6>Credit Score</h6>
                                <p>Do you require applicants to meet a minimum credit score threshold?</p>

                                <div class="selection-boxex-true">
                                    <!-- Yes Option -->
                                    <div class="radio-item" onclick="boxActive110(1)">
                                        <input type="radio" id="credit_check_yes" name="credit_check" value="1"
                                            {{ $property->credit_check == 1 ? 'checked' : '' }}>
                                        <label for="credit_check_yes" id="credit_check_yes_label"
                                            class="{{ $property->credit_check == 1 ? 'active' : '' }}">
                                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes"> Yes
                                        </label>
                                    </div>

                                    <!-- No Option -->
                                    <div class="radio-item" onclick="boxActive110(0)">
                                        <input type="radio" id="credit_check_no" name="credit_check" value="0"
                                            {{ $property->credit_check == 0 ? 'checked' : '' }}>
                                        <label for="credit_check_no" id="credit_check_no_label"
                                            class="{{ $property->credit_check == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('assets/images/cancel.png') }}" alt="No"> No
                                        </label>
                                    </div>

                                    @error('credit_check')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Hidden Box -->
                                <div class="active-non-active" id="activeNonActive110" style="display: none;">
                                    <div class="box">
                                        <p>What is the minimum required FICO credit score?</p>
                                        <input type="number" name="credit_point" placeholder="Enter Credit Score"
                                            value="{{ old('credit_point', $property->credit_point) }}">
                                    </div>
                                    @error('credit_point')
                                        <div class="error-message">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>



                        <div class="input-box">
                            <label for="contact deatail">Your Contact Details</label>
                            <label for="contact_name">Cotact Name</label>
                            <input type="text" placeholder="contact name" name="contact_name"
                                value="{{ old('contact_name', $property->contact_name) }}">
                            @error('contact_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box">
                            <label for="address">Cotact Phone</label>
                            <input type="text" placeholder="contact phone number" name="contact_phone_number"
                                value="{{ old('contact_phone_number', $property->contact_phone_number) }}">
                            @error('contact_phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-box">
                            <label for="address">Cotact Email</label>
                            <input type="text" placeholder="contact_ mail" name="contact_email"
                                value="{{ old('contact_email', $property->contact_email) }}">
                            @error('contact_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>




                        <!-- Rooms & Features Section -->
                        <div class="many-check-box">
                            <p>Rooms & Features</p>
                            @foreach ($allFeatures as $feature)
                                @if ($property->features && $feature)
                                    <!-- Ensure both property features and current feature exist -->
                                    <div class="paren-check-box">
                                        <div>
                                            <input type="checkbox" id="feature-{{ $feature->id }}" name="features[]"
                                                value="{{ $feature->id }}"
                                                {{ $property->features->pluck('feature_id')->contains($feature->id) ? 'checked' : '' }}
                                                onchange="toggleQuantityInput(this, '{{ $feature->id }}')">
                                            <label for="feature-{{ $feature->id }}">{{ $feature->name }}</label>
                                        </div>

                                        <div class="quantity-input" id="quantity-container-{{ $feature->id }}"
                                            style="display: {{ $property->features->pluck('feature_id')->contains($feature->id) ? 'block' : 'none' }};">
                                            <input type="number" id="quantity-{{ $feature->id }}"
                                                name="quantities[{{ $feature->id }}]" placeholder="Quantity"
                                                min="1"
                                                value="{{ optional($property->features->where('feature_id', $feature->id)->first())->quantity ?? '' }}">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>






                        <!-- Rent To Who Section -->
                        <div class="many-check-box mt-3">
                            <label for="rent_whos">Rent to Who</label>
                            <div class="paren-check-box">
                                @foreach ($rentWhos as $rentWho)
                                    <input type="checkbox" id="rentWho-{{ $rentWho->id }}" name="rent_whos[]"
                                        value="{{ $rentWho->id }}"
                                        {{ $property->RentToWhoDetails->pluck('rent_to_who_id')->contains($rentWho->id) ? 'checked' : '' }}
                                        class="mt-3">
                                    <label for="rentWho-{{ $rentWho->id }}"
                                        class="mt-3">{{ $rentWho->name }}</label>
                                @endforeach
                                @error('rent_whos')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-box textarea">
                            <label for="other_details">Other Details</label>
                            <textarea placeholder="Type Here" name="other_details">{{ old('other_details', $property->other_details) }}</textarea>
                        </div>

                        <div class="input-box simple-select">
                            <label for="availability">Availability</label>
                            <select name="availability" id="availability" placeholder="Type Here">
                                <option value="0" {{ $property->available_status == 0 ? 'selected' : '' }}>Booked
                                </option>
                                <option value="1" {{ $property->available_status == 1 ? 'selected' : '' }}>Available
                                </option>
                            </select>
                            @error('availability')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="two-btn-inline">
                            <button id="saveChangesBtn" type="button" class="t-btn">Save Changes</button>
                        </div>

                    </div>
                </form>

                <!-- Modal for adding a new category -->
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="categoryForm">
                                    <div class="mb-3">
                                        <label for="new-category" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="new-category"
                                            placeholder="Enter category name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load jQuery -->
@endsection

@section('scripts')
    <script>
        function boxActive10(show) {
            var box = document.getElementById('activeNonActive10');

            if (show == 1) {
                box.style.display = 'block';
                document.getElementById('parkingYesLabel').classList.add('active');
                document.getElementById('parkingNoLabel').classList.remove('active');

            } else {
                box.style.display = 'none';
                document.getElementById('parkingNoLabel').classList.add('active');
                document.getElementById('parkingYesLabel').classList.remove('active');
            }

        }
        // Initially hide the active-non-active div
        var parking = "{{ $property->parking }}";
        if (parking == 1) {
            document.getElementById('activeNonActive10').style.display = 'block';

        } else {

            document.getElementById('activeNonActive10').style.display = 'none';
        }

        function boxActive3(show) {
            var box = document.getElementById('activeNonActive3');

            if (show == 1) {
                box.style.display = 'block';
                document.getElementById('selectionYesLabel').classList.add('active');
                document.getElementById('selectionNoLabel').classList.remove('active');
            } else {
                box.style.display = 'none';
                document.getElementById('selectionNoLabel').classList.add('active');
                document.getElementById('selectionYesLabel').classList.remove('active');
            }
        }

        // Initially hide the active-non-active div
        var selection = "{{ $property->pets }}";
        if (selection != null) {
            document.getElementById('activeNonActive3').style.display = 'block';
        } else {

            document.getElementById('activeNonActive3').style.display = 'none';
        }


        function setActiveSmoking(element) {
            console.log('Clicked element:', element);
            // Reset all labels
            document.querySelectorAll('.smokingYesLabel, .smokingNoLabel').forEach(label => {
                label.classList.remove('active');
            });

            // Add 'active' to the corresponding label
            if (element.classList.contains('smokingYes')) {
                document.querySelector('.smokingYesLabel').classList.add('active');
            } else if (element.classList.contains('smokingNo')) {
                document.querySelector('.smokingNoLabel').classList.add('active');
            }

            // Check the radio button
            element.checked = true;
        }

        var smoking = "{{ $property->smoking }}";
        if (smoking == 1) {
            document.querySelector('.smokingYesLabel').classList.add('active');
        } else {
            document.querySelector('.smokingNoLabel').classList.add('active');
        }


        function setActiveProperty(element) {
            console.log('Clicked element:', element);

            // Reset all labels
            document.querySelectorAll('.propertyYesLabel, .propertyNoLabel').forEach(label => {
                label.classList.remove('active');
            });

            // Add 'active' to the corresponding label
            if (element.classList.contains('propertyYes')) {
                document.querySelector('.propertyYesLabel').classList.add('active');
            } else if (element.classList.contains('propertyNo')) {
                document.querySelector('.propertyNoLabel').classList.add('active');
            }

            // Check the radio button
            element.checked = true;
        }

        var smoking = "{{ $property->waterbed }}";
        if (smoking == 1) {
            document.querySelector('.propertyYesLabel').classList.add('active');
        } else {
            document.querySelector('.propertyNoLabel').classList.add('active');
        }

        function boxActive21(element) {
            console.log('Clicked element:', element);

            // Reset all labels
            document.querySelectorAll('.choice_voucherYesLabel, .choice_voucherNoLabel').forEach(label => {
                label.classList.remove('active');
            });

            // Add 'active' to the corresponding label
            if (element.value === "1") {
                document.querySelector('.choice_voucherYesLabel').classList.add('active');
            } else if (element.value === "0") {
                document.querySelector('.choice_voucherNoLabel').classList.add('active');
            }

            // Check the radio button
            element.checked = true;
        }
        var choice_voucher = "{{ $property->choice_voucher }}";
        if (choice_voucher == 1) {
            document.querySelector('.choice_voucherYesLabel').classList.add('active');
        } else {
            document.querySelector('.choice_voucherNoLabel').classList.add('active');
        }

        function boxActive11(show) {
            var box = document.getElementById('activeNonActive11');

            if (show == 0) {
                box.style.display = 'block';
                document.getElementById('availabilityNoLabel').classList.add('active');
                document.getElementById('availabilityYesLabel').classList.remove('active');

            } else {
                box.style.display = 'none';
                document.getElementById('availabilityYesLabel').classList.add('active');
                document.getElementById('availabilityNoLabel').classList.remove('active');
            }
        }

        // Initially hide the availability box
        var availability = "{{ $property->availability_check }}";
        console.log( 'gjhghh',availability);
        if (availability == 1) {
            document.getElementById('availabilityYesLabel').classList.add('active');
            document.getElementById('activeNonActive11').style.display = 'none';
        } else {
            document.getElementById('activeNonActive11').style.display = 'block';
            document.getElementById('availabilityNoLabel').classList.add('active');
        }

        function boxActive12(show) {
            var box = document.getElementById('activeNonActive12');

            if (show == 1) {
                box.style.display = 'block';
                document.getElementById('leaseYesLabel').classList.add('active');
                document.getElementById('leaseNoLabel').classList.remove('active');
            } else {
                box.style.display = 'none';
                document.getElementById('leaseNoLabel').classList.add('active');
                document.getElementById('leaseYesLabel').classList.remove('active');
            }
        }
        var lease = "{{ $property->lease_check }}";
        if (lease == 1) {
            document.getElementById('activeNonActive12').style.display = 'block';
        } else {
            document.getElementById('activeNonActive12').style.display = 'none';
        }

        function boxNonActive13(name) {
            if (name == 'Short_term') {
                document.getElementById('activeNonActive13').style.display = 'none';

                document.getElementById('Short_term_label').classList.add('active');
                document.getElementById('Fixed_term_label').classList.remove('active');
                document.getElementById('Month_to_Month_label').classList.remove('active');
                document.getElementById('Year_to_Year_label').classList.remove('active');

            }
            if (name == 'Fixed_term') {
                document.getElementById('activeNonActive13').style.display = 'block';

                document.getElementById('Short_term_label').classList.remove('active');
                document.getElementById('Fixed_term_label').classList.add('active');
                document.getElementById('Month_to_Month_label').classList.remove('active');
                document.getElementById('Year_to_Year_label').classList.remove('active');
            }
            if (name == 'Month-to-Month') {
                document.getElementById('activeNonActive13').style.display = 'none';

                document.getElementById('Short_term_label').classList.remove('active');
                document.getElementById('Fixed_term_label').classList.remove('active');
                document.getElementById('Month_to_Month_label').classList.add('active');
                document.getElementById('Year_to_Year_label').classList.remove('active');
            }
            if (name == 'Year-to-Year') {
                document.getElementById('activeNonActive13').style.display = 'none';

                document.getElementById('Short_term_label').classList.remove('active');
                document.getElementById('Fixed_term_label').classList.remove('active');
                document.getElementById('Month_to_Month_label').classList.remove('active');
                document.getElementById('Year_to_Year_label').classList.add('active');
            }

        }

        var availabilitytype = "{{ $property->lease_type }}";
        if (availabilitytype == 1) {
            document.getElementById('Short_term_label').classList = 'active';
        } else if (availabilitytype == 2) {
            document.getElementById('Fixed_term_label').classList = 'active';
        } else if (availabilitytype == 3) {
            document.getElementById('Month_to_Month_label').classList = 'active';
        } else if (availabilitytype == 4) {
            document.getElementById('Year_to_Year_label').classList = 'active';
        }

        var rent = "{{ $property->rent_type }}";

        // Reset all labels and sections to default state
        document.getElementById('Weekly_label').classList.remove('active');
        document.getElementById('Monthly_label').classList.remove('active');
        document.getElementById('Yearly_label').classList.remove('active');
        document.getElementById('Specific_Terms_label').classList.remove('active');

        document.getElementById('Weekly').style.display = 'none';
        document.getElementById('activeNonActive18').style.display = 'none';
        document.getElementById('Yearly').style.display = 'none';
        document.getElementById('payment_frequency').style.display = 'none';
        document.getElementById('specificTerm').style.display = 'none';

        if (rent == 1) {
            document.getElementById('Weekly_label').classList.add('active');
            document.getElementById('Weekly').style.display = 'block';
        } else if (rent == 2) {
            document.getElementById('Monthly_label').classList.add('active');
            document.getElementById('activeNonActive18').style.display = 'block';
        } else if (rent == 3) {
            document.getElementById('Yearly_label').classList.add('active');
            document.getElementById('Yearly').style.display = 'block';
        } else if (rent == 4) {
            document.getElementById('Specific_Terms_label').classList.add('active');
            document.getElementById('payment_frequency').style.display = 'block';
            document.getElementById('specificTerm').style.display = 'block';

            // Hide other sections specific to rent types
            document.getElementById('activeNonActive18').style.display = 'none';
            document.getElementById('Weekly').style.display = 'none';
            document.getElementById('Yearly').style.display = 'none';
        }



        function handleRentSelection(selection) {
            // Hide all fields
            const fields = document.querySelectorAll('.active-non-active');
            fields.forEach(field => field.style.display = 'none');

            // Show the relevant fields based on the selected radio button
            if (selection === 'Monthly') {
                document.getElementById('activeNonActive18').style.display = 'block';
                document.getElementById('Weekly_label').classList.remove('active');
                document.getElementById('Monthly_label').classList.add('active');
                document.getElementById('Yearly_label').classList.remove('active');
                document.getElementById('Specific_Terms_label').classList.remove('active');

            } else if (selection === 'Weekly') {
                document.getElementById('Weekly').style.display = 'block';

                document.getElementById('Weekly_label').classList.add('active');
                document.getElementById('Monthly_label').classList.remove('active');
                document.getElementById('Yearly_label').classList.remove('active');
                document.getElementById('Specific_Terms_label').classList.remove('active');
            } else if (selection === 'Yearly') {
                document.getElementById('Yearly').style.display = 'block';
                document.getElementById('Weekly_label').classList.remove('active');
                document.getElementById('Monthly_label').classList.remove('active');
                document.getElementById('Yearly_label').classList.add('active');
                document.getElementById('Specific_Terms_label').classList.remove('active');
            } else if (selection === 'Specific Terms') {
                document.getElementById('payment_frequency').style.display = 'block';
                document.getElementById('specificTerm').style.display = 'block';
                document.getElementById('Weekly_label').classList.remove('active');
                document.getElementById('Monthly_label').classList.remove('active');
                document.getElementById('Yearly_label').classList.remove('active');
                document.getElementById('Specific_Terms_label').classList.add('active');
            }
        }

        function boxActive20(show) {
            var box = document.getElementById('activeNonActive20');
            if (show == 1) {
                box.style.display = 'block';
                document.getElementById('securitydepositYeslable').classList.add('active');
                document.getElementById('securitydepositNolable').classList.remove('active');
            } else {
                box.style.display = 'none';
                document.getElementById('securitydepositNolable').classList.add('active');
                document.getElementById('securitydepositYeslable').classList.remove('active');
            }
        }

        var securitydeposit = "{{ $property->security_deposit }}";

        if (securitydeposit == 1) {
            document.getElementById('securitydepositYeslable').classList.add('active');
            document.getElementById('activeNonActive20').style.display = 'block';
        } else {
            document.getElementById('securitydepositYeslable').classList.add('active');
            document.getElementById('activeNonActive20').style.display = 'none';

        }

        function boxActive1(show) {
            var box = document.getElementById('activeNonActive1');
            if (show == 1) {
                // Show the box
                box.style.display = 'block';
                document.getElementById('evictionYesLabel').classList.add('active');
                document.getElementById('evictionNoLabel').classList.remove('active');
            } else {
                // Hide the box
                box.style.display = 'none';
                document.getElementById('evictionNoLabel').classList.add('active');
                document.getElementById('evictionYesLabel').classList.remove('active');
            }
        }

        // Initially hide the box
        var eviction = "{{ $property->eviction }}";
        if (eviction == 1) {
            document.getElementById('evictionNoLabel').classList.remove('active');
            document.getElementById('activeNonActive1').style.display = 'block';

        } else {
            document.getElementById('evictionYesLabel').classList.remove('active');
            document.getElementById('activeNonActive1').style.display = 'none';
        }

        function boxActive100(show) {
            var box = document.getElementById('activeNonActive100');
            if (show == 1) {
                // Show the box
                box.style.display = 'block';
                document.getElementById('ConvictionsYesLabel').classList.add('active');
                document.getElementById('ConvictionsNoLabel').classList.remove('active');
            } else {
                // Hide the box
                box.style.display = 'none';
                document.getElementById('ConvictionsNoLabel').classList.add('active');
                document.getElementById('ConvictionsYesLabel').classList.remove('active');
            }
        }
        var convictions = "{{ $property->conviction }}";
        if (convictions == 1) {
            document.getElementById('ConvictionsNoLabel').classList.remove('active');
            document.getElementById('activeNonActive100').style.display = 'block';
        } else {
            document.getElementById('ConvictionsYesLabel').classList.remove('active');
            document.getElementById('activeNonActive100').style.display = 'none';
        }

        function boxActive110(show) {
            var box = document.getElementById('activeNonActive110');
            var yesLabel = document.getElementById('credit_check_yes_label');
            var noLabel = document.getElementById('credit_check_no_label');

            if (show == 1) {
                // Show the box and highlight Yes label
                box.style.display = 'block';
                yesLabel.classList.add('active');
                noLabel.classList.remove('active');
            } else {
                // Hide the box and highlight No label
                box.style.display = 'none';
                noLabel.classList.add('active');
                yesLabel.classList.remove('active');
            }
        }

        // Initially hide the box on page load
        var creditCheck = "{{ $property->credit_check }}";
        if (creditCheck == 1)
            document.getElementById('activeNonActive110').style.display = 'block';
        else {

            document.getElementById('activeNonActive110').style.display = 'none';

        }


        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Select Allowed Pets",
                allowClear: true
            });

            var progressInput = document.getElementById('progress_points');
            const progress = parseInt(progressInput.value);
            updateProgress(progress);
            changeBarColor(progressInput.value);
            changeInputColors(progress);
        });

        // check work feature
        function toggleQuantityInput(checkbox, featureId) {
            const quantityContainer = document.getElementById('quantity-container-' + featureId);
            quantityContainer.style.display = checkbox.checked ? 'block' : 'none';
        }
        const fileInput = document.getElementById('fileInput');
        const imageContainer = document.getElementById('imageContainer');
        const existingImagesContainer = document.getElementById('existingImagesContainer');
        let selectedImages = [];

        // Function to handle file input change
        fileInput.addEventListener('change', (event) => {
            const files = Array.from(event.target.files);

            // Check for max images
            if (selectedImages.length + files.length > 50) {
                toastr.error("You can only upload a maximum of 50 images.");
                return;
            }

            files.forEach(file => {
                if (file.type.startsWith('image/')) {
                    if (selectedImages.length < 50) {
                        selectedImages.push(file);
                        displayImage(file);
                    }
                } else {
                    toastr.error("Only image files are allowed.");
                }
            });

            checkImageCount();
        });

        // Function to display uploaded images
        function displayImage(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.createElement('div');
                imagePreview.classList.add('image-preview');

                const img = document.createElement('img');
                img.src = e.target.result;

                const closeButton = document.createElement('button');
                closeButton.classList.add('close-btn');
                closeButton.innerHTML = 'X';
                closeButton.onclick = function() {
                    imageContainer.removeChild(imagePreview);
                    selectedImages = selectedImages.filter(img => img !== file);
                    checkImageCount();
                };

                imagePreview.appendChild(img);
                imagePreview.appendChild(closeButton);
                imageContainer.appendChild(imagePreview);
            };
            reader.readAsDataURL(file);
        }

        // Function to check the number of images
        function checkImageCount() {
            const totalImages = selectedImages.length + existingImagesContainer.children.length;
            if (totalImages < 3) {
                toastr.error('You need to upload at least 3 images.');
            }
        }

        // Function to remove existing images
        function removeImage(button, imagePath) {
            const imagePreview = button.parentElement; // Get the parent div
            existingImagesContainer.removeChild(imagePreview);

            // You may also want to handle the removal from the server-side or store the path for deletion
            // For example, you might send an AJAX request to delete the image from the server here
            // e.g. deleteImageFromServer(imagePath);

            checkImageCount(); // Check the image count after removal
        }

        var deletedImages = [];

        function removeImage(button, imgPath) {
            $(button).closest('.image-preview').remove();
            deletedImages.push(imgPath);
        }

        $('#saveChangesBtn').click(function(e) {
            e.preventDefault();

            var formData = new FormData($('#uploadForm')[0]);

            // Append deleted images to the FormData
            deletedImages.forEach(function(image) {
                formData.append('deleted_images[]', image);
            });

            // Proceed with the AJAX request as before
            $.ajax({
                url: "{{ route('landlord.properties.update', $property->id) }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#uploadForm')[0].reset();
                    toastr.success('Property updated successfully!');
                    window.location.href = "{{ route('landlord.properties') }}";
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        console.log("xhr",xhr);
                        $.each(errors, function(key, value) {
                            var input = $('[name="' + key + '"]');
                            input.addClass('is-invalid');
                            input.after('<span class="error-message text-danger">' + value[0] +
                                '</span>');
                                toastr.error(key + ": " + value[0]);
                        });
                    } else {
                        toastr.error('Error occurred while updating property.');
                    }
                }
            });
        });
    </script>
@endsection
