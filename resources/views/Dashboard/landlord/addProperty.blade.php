@extends('Dashboard.Layouts.master_dashboard')



<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

    .tabs-container {
        width: 100%;
        height: auto;
        /* Make the height flexible */
        overflow: hidden;
        position: relative;
    }

    .tabs {
        padding: 10px 20px 15px 20px;
        /* Increased padding */
    }

    .tab-links {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .tab-link {
        background: none;
        border: 5px solid #999999;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        padding: 10px 40px;
        /* Increased padding for spacing */
        color: #999999;
        cursor: pointer !important;
        position: relative;
        transition: color 0.3s ease;
    }

    .tab-link.active,
    .tab-link:hover {
        color: #0077B6 !important;
        /* Gradient purple */
        border-color: #0077B6 !important;
    }

    .tab-link i {
        margin-right: 10px;
    }

    .tab-link.active::after {
        width: 100%;
        left: 0;
    }

    /* .tab-content {
  display: none;
  animation: fadeInUp 0.5s ease;
  padding: 45px 10px;
}

.tab-content.active {
  display: block;
} */

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Buttons */
    .cta-btn {
        display: inline-block;
        padding: 12px 25px;
        /* More padding */
        background: linear-gradient(45deg, #b84de5, #7d41ff);
        /* Purple gradient */
        color: white;
        border: none;
        border-radius: 50px;
        cursor: pointer !important;
        transition: background 0.4s ease;
        font-weight: 500;
        margin-top: 20px;
    }

    .cta-btn:hover {
        background: linear-gradient(45deg, #9c3bce, #6b3ee8);
        /* Darker gradient on hover */
    }

    /* Form Styles */
    .contact-form {
        display: flex;
        flex-direction: column;
    }

    .contact-form label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    .contact-form input,
    .contact-form textarea {
        padding: 12px 15px;
        /* Increased padding for inputs */
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: border 0.3s ease;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
        border-color: #b84de5;
        outline: none;
    }

    /* FAQ List */
    .faq-list {
        padding: 0;
        list-style: none;
    }

    .faq-list li {
        margin-bottom: 10px;
    }

    .faq-list li strong {
        font-weight: 600;
    }

    /* Responsive Design */
    @media screen and (max-width: 600px) {
        .tab-links {
            flex-direction: column;
            align-items: center;
        }

        .tab-link {
            text-align: center;
            width: 100%;
            padding: 15px 0;
        }
    }


    .picture-tabs {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 30px;
    }

    .radio-item label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 40px;
        border: 3px solid #E5E5E5;
        border-radius: 30px;
        transition: .3s;
        gap: 10px;
    }

    .radio-item label {
        color: #777777;
        font-size: 17px;
    }

    .radio-item label:hover,
    .radio-item label.active {
        transition: .3s !important;
        border-color: #0077B6 !important;
    }

    .form-action-btns {
        padding: 30px 0;
    }

    button.cancel-btn {
        color: #fff;
        background: #AAAAAA;
        border-radius: 100px;
        padding: 10px 30px;
        transition: .3s;
    }

    button.next-btn {
        padding: 10px 30px;
        border-radius: 100px;
        color: #fff;
        background: #0077B6;
        transition: .3s;
    }

    button.cancel-btn:hover {
        transition: .3s;
        background: #035581;
    }

    button.next-btn svg {
        transition: .3s;
        margin-left: 10px;
    }

    button.next-btn:hover svg {
        transition: .3s;
        margin-left: 20px;
    }

    #regForm h6 {
        font-size: 40px !important;
        color: #3A3A3A !important;
    }


    p,
    #regForm .box label {
        color: #777777 !important;
        font-size: 20px !important;
    }

    #regForm .box input[type="checkbox"] {
        width: 20px;
        margin-right: 5px;
    }

    .select-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
    }

    .select-box span {
        color: #414141;
        font-size: 20px;
    }

    #regForm .box {
        margin-top: 25px;
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
    }


    #activeNonActive12 .activeNonActive12 label.active,
    #activeNonActive180 .activeNonActive18 label.active {
        border-color: #414141;
        color: #414141 !important;
    }



    #activeNonActive12 .activeNonActive12,
    #activeNonActive180 .activeNonActive18 {
        position: relative;
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

    /* .section-content{
    display: none
}
.section-content.active{
    display: block;
} */


    .selection-boxex-true {
        display: flex;
        align-items: center;
        flex-direction: row;
        gap: 20px;
        margin: 20px 0;
    }

    .box p {
        margin-bottom: 10px !important;
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

    .selection-boxex-true .selection-content-true:hover,
    .selection-boxex-true .radio-item label:hover {
        border-color: #0077B6;
        transition: .3s;
    }

    .selection-boxex-true .selection-content-true span,
    .selection-boxex-true .radio-item label {
        color: #777777;
        font-size: 20px;
    }

    .box .flex-input {
        display: flex;
        gap: 30px;
    }

    .box p {
        font-size: 20px;
        margin: 20px 0 10px !important;
    }


    .display-room-feature {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        gap: 20px;
        margin: 30px 0;
    }

    .display-room-feature .paren-check-box {
        width: fit-content;
    }


    .main-file-upload-box {
        display: flex;
        gap: 20px;
        flex-direction: row;
        justify-content: flex-start;
        margin: 20px 0;
    }

    div#imageContainer {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;
    }

    input#fileInput {
        -webkit-appearance: none;
        box-shadow: none !important;
        display: none;
    }

    div#imageContainer .image-preview {
        background-color: #fafafa;
        border: 1px solid #0000001c;
        width: 135px;
        height: 108px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin: 0;
        border-radius: 15px;
    }

    div#imageContainer .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        max-width: 100%;
        min-height: 100%;
        border-radius: 15px;
        border: 1px solid #00000038;
    }

    div#imageContainer .image-preview button.close-btn {
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 100%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #489bc7;
        transition: .3s;
    }


    .numbers-main-bb {
        display: flex;
        justify-content: space-between;
        padding: 0px 100px;
        margin-top: -5px;
    }


    .many-forms-fields-box .input-box input {
        width: 100%;
        height: 50px;
        border-radius: 10px;
        border: 1px solid #00000033;
        padding: 20px;
        color: black;
        margin-bottom: 20px;
    }


    .numbers-main-bb {

        margin-top: 20px;

    }

    .numbers-main-bb input {
        width: 150px !important;
        margin: 0 !important;
        background: transparent !important;
    }


    .input-box label {
        font-size: 20px;
        color: #414141;
        width: 100%;
        display: block;
        margin: 10px 0;
    }

    .two-btn-inline.form-action-btns .cancel-btn:last-child {
        float: inline-end;
    }



    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
        margin-bottom: 50px
    }

    /* button {
        background-color: #04AA6D;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    } */

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }



    .radio-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* .radio-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid transparent;
    border-radius: 10px;
    padding: 10px;
    cursor: pointer;
    transition: border-color 0.3s;
  } */
    .radio-item input {
        /* display: none; */
        position: absolute;
        height: 100%;
        width: 100%;
        opacity: 0;
    }

    .radio-item {
        position: relative;
        display: block;
    }

    /* .radio-item img {
    width: 80px;
    height: 80px;
    object-fit: cover;
  } */
    /* .radio-item input:checked + img {
    border: 2px solid #007BFF;
    border-radius: 10px;
  }
  .radio-item:hover {
    border-color: #007BFF;
  } */

    .profile-page .profile-basic-info-form form .two-inputs-boxes-align .input-box label img {
        height: 80px;
        width: 80px;
        object-fit: cover;
    }
</style>


@section('content')
    {{-- <div id="steps_form">


    <div class="tabs-container">
        <div class="tabs">
          <div class="tab-links">
            <button class="tab-link active" data-tab="tab-1"> Get Started </button>
            <button class="tab-link" data-tab="tab-2"> Property</button>
            <button class="tab-link" data-tab="tab-3">Terms</button>
            <button class="tab-link" data-tab="tab-4">Contact Deatils </button>
          </div>
        </div>
    </div>
</div> --}}





    <div class="tabs-container">
        <div class="tabs">
            <div class="tab-links">
                <button class="tab-link active" data-tab="tab-1"> Get Started </button>
                <button class="tab-link" data-tab="tab-2"> Property</button>
                <button class="tab-link" data-tab="tab-3">Terms</button>
                <button class="tab-link" data-tab="tab-4">Contact Deatils </button>
            </div>
        </div>
    </div>


    {{-- main step form  --}}


    <form id="regForm" action="{{ route('landlord.store_property') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- first tab form  --}}

        <div class="tab" id="tab-1">

            <div class="get-started-content">
                <div class="picture-tabs">
                    @foreach ($categories as $category)
                        <div class="radio-item">
                            <input type="radio" id="category-{{ $category->id }}" name="category"
                                value="{{ $category->id }}" onclick="selectCategory(this)"
                                {{ old('category', $selectedCategory ?? '') == $category->id ? 'checked' : '' }}>
                            <label for="category-{{ $category->id }}"
                                class="select_box {{ old('category', $selectedCategory ?? '') == $category->id ? 'active' : '' }}">
                                {{-- <img src="{{ Storage::url($category->image ?? '') }}" alt="{{ $category->name }}"> --}}
                                {{-- <img src="{{ asset('assets/images/cat_') . ($loop->index + 1) . '.png' }}" --}}
                                <img src="{{ asset( ($category->image ?? 'default.png')) }}" alt="{{ $category->name }}">
                                <span>{{ $category->name }}</span>
                            </label>
                        </div>
                    @endforeach
                    <!-- Display validation error for category -->
                    @error('category')
                        <div class="error-message">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

            </div>

        </div>


        {{-- second tab form  --}}



        {{-- second tab form part 1 --}}

        <div class="tab" id="tab-2">
            <h6>Property Location</h6>
            <p>Where is the rental property located?</p>
            <div class="select-box">
                <span>State</span>
                <select name="country" id="">
                    <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                    <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                    <option value="Germany" {{ old('country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                    <option value="France" {{ old('country') == 'France' ? 'selected' : '' }}>France</option>
                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                    <option value="Japan" {{ old('country') == 'Japan' ? 'selected' : '' }}>Japan</option>
                    <option value="China" {{ old('country') == 'China' ? 'selected' : '' }}>China</option>
                </select>
                <!-- Display validation error for country -->
                @error('country')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>



        {{-- second tab form part 2 --}}

        <div class="tab" id="tab-2">
            <h6>Property Location</h6>
            <p>Where is the rental property located?</p>
            <div class="select-box">
                <span>Street Address</span>
                <textarea name="address" id="" cols="100" rows="10" placeholder="Type Here">{{ old('address') }}</textarea>
            </div>

        </div>



        {{-- third tab form  --}}


        {{-- third tab form part 1 --}}


        {{-- third tab form part 2 --}}




        <div class="tab" id="tab-3">

            <h6>Parking</h6>
            <p>Does the property have designated parking?</p>

            <div class="selection-boxex-true">

                <div class="radio-item" onclick="boxActive10(1)" id="boxactive10">
                    <input type="radio" id="parkingYes" name="parking" value="1"
                        {{ old('parking') == '1' ? 'checked' : '' }} >
                        <label class="parking {{ old('parking') == '1' ? 'active' : '' }}" for="parkingYes" id="parkingYesLabel">
                            <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                            Yes
                        </label>
                </div>


                <div class="radio-item" onclick="boxActive10(0)" id="boxnunactive10">
                    <input type="radio" id="parkingNo" name="parking" value="0"
                        {{ old('parking') == '0' ? 'checked' : '' }}>
                    <label class="parking {{ old('parking') == '0' ? 'active' : '' }}" for="parkingNo" id="parkingNoLabel">
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
                        value="{{ old('kind_of_parking') }}">
                    @error('kind_of_parking')
                        <div class="error-message">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>


                <div class="box">
                    <label>How many vehicles can be accommodated?</label>
                    {{-- <textarea name="no_of_vehicle" id="" cols="30" rows="10" placeholder="Description">{{ old('no_of_vehicle') }}</textarea> --}}
                    <input type="number" name="no_of_vehicle" placeholder="Type here" value="{{ old('no_of_vehicle') }}">
                    @error('no_of_vehicle')
                        <div class="error-message">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>



            </div>

        </div>

        <div class="tab" id="tab-3">

            <h6>Uses of Property</h6>
            <p>Are pets allowed in the property?</p>

            <div class="selection-boxex-true">
                <div class="radio-item" onclick="boxActive3(1)" id="boxactive3">
                    <input type="radio" id="petYes" name="pet" value="1"
                    {{ old('pet') == '1' ? 'checked' : '' }} >
                    <label class="selection-content-true {{ old('pet') == '1' ? 'active' : '' }}" id="selectionYesLabel" for="petYes">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        <span>Yes</span>
                    </label>
                </div>

                <div class="radio-item" onclick="boxActive3(0)" id="boxnonactive3">
                    <input type="radio" id="petNo" name="pet" value="0"
                    {{ old('pet') == '0' ? 'checked' : '' }} >
                    <label class="selection-content-true {{ old('pet') == '0' ? 'active' : '' }}" id="selectionNoLabel" for="petNo">
                        <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                        <span>No</span>
                    </label>
                </div>
            </div>

            <div class="active-non-active" id="activeNonActive3">
                <div class="input-box mt-3">
                    <label for="select_pets">Select pets</label>
                    <select class="js-example-basic-multiple" multiple="multiple" style="width: 300px;" name="pets[]">
                        @foreach ($pets as $pet)
                            <option value="{{ $pet->id }}"
                                {{ in_array($pet->id, old('pets', [])) ? 'selected' : '' }}>
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
                    <input type="radio" class="smokingYes" id="smokingYes" name="smoking" value="1"
                        onclick="setActiveSmoking(this)"
                        {{ old('smoking', $selectedSmoking ?? '') == 1 ? 'checked' : '' }}>
                    <label class="smokingYesLabel {{ old('smoking', $selectedSmoking ?? '') == 1 ? 'active' : '' }}"
                        for="smokingYes">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <div class="radio-item">
                    <input type="radio" class="smokingNo" id="smokingNo" name="smoking" value="0"
                        onclick="setActiveSmoking(this)"
                        {{ old('smoking', $selectedSmoking ?? '') == 0 ? 'checked' : '' }}>
                    <label class="smokingNoLabel {{ old('smoking', $selectedSmoking ?? '') == 0 ? 'active' : '' }}"
                        for="smokingNo">
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




            <p>Are waterbeds allowed in the property?</p>

            <div class="selection-boxex-true">
                <div class="radio-item">
                    <input type="radio" class="propertyYes" id="propertyYes" name="waterbed" value="1"
                        onclick="setActiveProperty(this)"
                        {{ old('waterbed', $selectedProperty ?? '') == 1 ? 'checked' : '' }}>
                    <label class="propertyYesLabel {{ old('waterbed', $selectedProperty ?? '') == 1 ? 'active' : '' }}"
                        for="propertyYes">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <div class="radio-item">
                    <input type="radio" class="propertyNo" id="propertyNo" name="waterbed" value="0"
                        onclick="setActiveProperty(this)"
                        {{ old('waterbed', $selectedProperty ?? '') == 0 ? 'checked' : '' }}>
                    <label class="propertyNoLabel {{ old('waterbed', $selectedProperty ?? '') == 0 ? 'active' : '' }}"
                        for="propertyNo">
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

        {{-- third tab form part 3 --}}

        {{-- <div class="tab" id="tab-3">

            <h6>Background Check Authorization</h6>
            <p>What background check will you do to screen your applicant?</p>


            <div class="box">
                <input type="checkbox" name="credit_history_check" value="1"
                    {{ old('credit_history_check') ? 'checked' : '' }}>
                <label for="">Credit history check</label>
            </div>

            <div class="box">
                <input type="checkbox" name="criminal_records" value="1"
                    {{ old('criminal_records') ? 'checked' : '' }}>
                <label for="">Criminal background check</label>
            </div>


            @error('criminal_records')
                <div class="error-message">
                    <span class="text-danger">{{ $message }}</span>
                </div>
            @enderror

        </div> --}}



        <div class="tab" id="availability_date">

            <h6>Availability Date</h6>
            <p>Is the property already available for rent?</p>

            <div class="selection-boxex-true">
                <!-- "Yes" Option -->
                <div class="radio-item" onclick="boxActive11(1)" id="boxactive11">
                    <input type="radio" id="availability_yes" name="availability_check" value="1"
                        {{ old('availability_check') == '1' ? 'checked' : '' }}>
                    <label class="availability_check_yes {{ old('availability_check') == '1' ? 'active' : '' }}" for="availability_yes" id="availabilityYesLabel">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <!-- "No" Option -->
                <div class="radio-item" onclick="boxActive11(0)" id="boxnonactive11">
                    <input type="radio" id="availability_no" name="availability_check" value="0"
                        {{ old('availability_check') == '0' ? 'checked' : '' }}>
                    <label class="availability_check_no {{ old('availability_check') == '0' ? 'active' : '' }}" for="availability_no" id="availabilityNoLabel">
                        <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                        No
                    </label>
                </div>
            </div>

            <!-- Box for Date Input -->
            <div class="box" id="activeNonActive11">
                <p>When will the property be available?</p>
                <input type="date" name="date_availability" placeholder="DD MM YYYY"
                    value="{{ old('date_availability') }}">
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
                        {{ old('lease_check') == '1' ? 'checked' : '' }}>
                    <label class="lease_check {{ old('lease_check') == '1' ? 'active' : '' }}" for="lease_check_yes" id="leaseYesLabel">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <!-- No Option -->
                <div class="radio-item" onclick="boxActive12(0)" id="boxnonactive12">
                    <input type="radio" id="lease_check_no" name="lease_check" value="0"
                        {{ old('lease_check') == '0' ? 'checked' : '' }}>
                    <label class="lease_check {{ old('lease_check') == '0' ? 'active' : '' }}" for="lease_check_no" id="leaseNoLabel">
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
                    <label for="" id="Month_to_Month_label" class="">Month-to-Month</label>
                    <input type="radio" name="lease_type" value="3" placeholder="Month-to-Month"
                        onclick="boxNonActive13('Month-to-Month')">
                </div>

                <div class="box activeNonActive12">
                    <label for="" id="Year_to_Year_label" class="">Year-to-Year</label>
                    <input type="radio" name="lease_type" value="4" placeholder="Year-to-Year"
                        onclick="boxNonActive13('Year-to-Year')">
                </div>

                @error('lease_type')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror



                <div class="box active-non-active" id="activeNonActive13">
                    <label for="">What is the minimum length of the lease?</label>
                    <input type="text" name="lease_period" placeholder="Minimum Length  (6 mon , 1 yr)">
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
                    <input type="radio" name="rent_type" value="1" onclick="handleRentSelection('Weekly')">
                </div>
                <div class="box activeNonActive18">
                    <label for="" id="Monthly_label">Monthly</label>
                    <input type="radio" name="rent_type" value="2" onclick="handleRentSelection('Monthly')">
                </div>
                <div class="box activeNonActive18">
                    <label for="" id="Yearly_label">Yearly</label>
                    <input type="radio" name="rent_type" value="3" onclick="handleRentSelection('Yearly')">
                </div>
                <div class="box activeNonActive18">
                    <label for="" id="Specific_Terms_label">Specific Terms</label>
                    <input type="radio" name="rent_type" value="4"
                        onclick="handleRentSelection('Specific Terms')">
                </div>

                @error('rent_type')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="box active-non-active" id="activeNonActive18">
                    <label for="">Amount</label>
                    <input type="number" name="price_rent_monthly" placeholder="Monthly Amount"
                        value="{{ old('price_rent_monthly') }}">
                </div>
                <div class="box active-non-active" id="Weekly">
                    <label for="">Amount</label>
                    <input type="number" name="price_rent_weekly" placeholder="Weekly Amount"
                        value="{{ old('price_rent_weekly') }}">
                </div>
                <div class="box active-non-active" id="Yearly">
                    <label for="">Amount</label>
                    <input type="number" name="price_rent_yearly" placeholder="Yearly Amount"
                        value="{{ old('price_rent_yearly') }}">
                </div>
                <div class="box active-non-active" id="payment_frequency">
                    <label for="">Payment Frequency</label>
                    <input type="number" name="payment_frequency" placeholder="Payment Frequency Amount"
                        value="{{ old('payment_frequency') }}">
                    @error('payment_frequency')
                        <div class="error-message">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="box active-non-active" id="specificTerm">
                    <label for="">Amount</label>
                    <input type="number" name="price_rent_specific" placeholder="Specific Term Amount"
                        value="{{ old('price_rent_specific') }}">
                </div>
            </div>
            @error('price_rent')
                <div class="error-message">
                    <span class="text-danger">{{ $message }}</span>
                </div>
            @enderror
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
                    <input type="radio" id="security_deposit_yes" name="security_deposit" value="1"
                    {{ old('security_deposit') == '1' ? 'checked' : '' }}>
                    <label class="security_deposit {{ old('security_deposit') == '1' ? 'active' : '' }}" for="security_deposit_yes" id="securitydepositYeslable">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>


                <div class="radio-item" onclick="boxActive20(0)" id="boxnunactive20">
                    <input type="radio" id="security_deposit_yes_no" name="security_deposit" value="0"
                    {{ old('security_deposit') == '0' ? 'checked' : '' }}>
                    <label class="security_deposit {{ old('security_deposit') == '0' ? 'active' : '' }}" for="security_deposit_yes_no" id="securitydepositNolable">
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
                        value="{{ old('deposit_amount') }}">
                </div>
                @error('deposit_amount')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror

            </div>

        </div>




        {{-- third tab form part 4 --}}

        <div class="tab" id="tab-3">

            <h6>Eviction Terms</h6>

            <p style="margin-top: 20px !important;">Would you like to accept applicants with a history of eviction?</p>

            <div class="selection-boxex-true">
                <!-- Yes Option -->
                <div class="radio-item" onclick="boxActive1(1)" id="boxactive1">
                    <input type="radio" id="eviction_yes" name="eviction" value="1"
                    {{ old('eviction') == '1' ? 'checked' : '' }}>
                    <label class="evction {{ old('eviction') == 1 ? 'active' : '' }}" for="eviction_yes" id="evictionYesLabel">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <!-- No Option -->
                <div class="radio-item" onclick="boxActive1(0)" id="boxnonactive1">
                    <input type="radio" id="eviction_no" name="eviction" value="0"
                    {{ old('eviction') == '0' ? 'checked' : '' }}>
                    <label class="evction {{ old('eviction') == '0' ? 'active' : '' }}" for="eviction_no" id="evictionNoLabel">
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
                        value="{{ old('many_time_evicted') }}">
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
                            value="{{ old('when_evicted') }}">
                    </div>
                </div>
                @error('when_evicted')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>


        </div>

        {{-- third tab form part 5 --}}

        <div class="tab" id="conviction">

            <h6>Felony Convictions</h6>

            <p style="margin-top: 30px !important;">Would you like to accept applicants with a felony conviction in their
                past?</p>

            <div class="selection-boxex-true">
                <div class="radio-item" onclick="boxActive100(1)" id="boxactive100">
                    <input type="radio" class="Convictions" id="convictions_yes" name="conviction" value="1"
                    {{ old('conviction') == '1' ? 'checked' : '' }}>
                    <label class="Convictions {{ old('conviction') == '1' ? 'active' : '' }}" for="Convictions_yes" id="ConvictionsYesLabel">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <div class="radio-item" onclick="boxActive100(0)" id="boxnunactive100">
                    <input type="radio" class="ConvictionsNo" id="convictions_no" name="conviction" value="0"
                    {{ old('conviction') == '0' ? 'checked' : '' }}>
                    <label class="ConvictionsNoLabel {{ old('conviction') == '0' ? 'active' : '' }}" for="convictions_no" id="ConvictionsNoLabel">
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
                        <option value="Murder" {{ old('conviction_pecify') == 'Murder' ? 'selected' : '' }}>Murder
                        </option>
                        <option value="Assault with a deadly weapon"
                            {{ old('conviction_pecify') == 'Assault with a deadly weapon' ? 'selected' : '' }}>Assault
                            with a deadly weapon </option>
                        <option value="Aggravated Assault"
                            {{ old('conviction_pecify') == 'Aggravated Assault' ? 'selected' : '' }}>Aggravated Assault
                        </option>
                        <option value="Kidnapping" {{ old('conviction_pecify') == 'Kidnapping' ? 'selected' : '' }}>
                            Kidnapping </option>
                        <option value="Robbery" {{ old('conviction_pecify') == 'Robbery' ? 'selected' : '' }}>Robbery
                        </option>
                        <option value="Domestic Violence"
                            {{ old('conviction_pecify') == 'Domestic Violence' ? 'selected' : '' }}>Domestic Violence
                        </option>
                        <option value="Drug Trafficking"
                            {{ old('conviction_pecify') == 'Drug Trafficking' ? 'selected' : '' }}>Drug Trafficking
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
                    {{ old('credit_check') == '1' ? 'checked' : '' }}>
                    <label for="credit_check_yes" class="{{ old('credit_check') == 1 ? 'active' : '' }}" id="credit_check_yes_label">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes"> Yes
                    </label>
                </div>

                <!-- No Option -->
                <div class="radio-item" onclick="boxActive110(0)">
                    <input type="radio" id="credit_check_no" name="credit_check" value="0"
                    {{ old('credit_check') == '0' ? 'checked' : '' }}>
                    <label for="credit_check_no " class="{{ old('credit_check') == '0' ? 'active' : '' }}" id="credit_check_no_label">
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
                        value="{{ old('credit_point') }}">
                </div>
                @error('credit_point')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>




        {{-- forth tab form  --}}


        {{-- forth tab form part 1 --}}

        <div class="tab" id="tab-4">
            <h6>Your Contact Details</h6>
            <p>Lorem ipsum is simply a dummy text for printing.</p>

            <div class="box">
                <p>Full Name</p>
                <input type="text" name="contact_name" placeholder="Full Name" value="{{ old('contact_name') }}">
                @error('contact_name')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="box">
                <p>Phone Number</p>
                <input type="number" name="contact_phone_number" placeholder="00 000 000000"
                    value="{{ old('contact_phone_number') }}">
                @error('contact_phone_number')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="box">
                <p>Email(Optional)</p>
                <input type="email" name="contact_email" placeholder="jhon@example.com"
                    value="{{ old('contact_email') }}">
                @error('contact_email')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        {{-- forth tab form part 2 --}}

        <div class="tab">


            <div class="main-file-upload-box">

                <div id="imageContainer"><label for="fileInput">
                        <img src="{{ asset('assets/images/file-upload-img.png') }}" alt=""></label>
                    <input type="file" id="fileInput" accept="image/*" multiple name="images[]">
                </div>
                <!-- Display error for the images array -->
                @error('images')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <!-- Display error for each image item in the images array -->
                @foreach ($errors->get('images.*') as $error)
                    <div class="text-danger">{{ $error[0] }}</div>
                @endforeach
            </div>

            <div class="many-forms-fields-box">
                <div class="input-box">
                    <label for="">Name</label>
                    <input type="text" placeholder="2nd floor Apartment in Las Vegas USA" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>


            <!-- Rooms & Features Section -->

            <div class="input-box textarea">
                <label for="other_details">Other Details</label>
                <textarea placeholder="Type Here" name="other_details">{{ old('other_details') }}</textarea>
            </div>

            <div class="many-check-box mt-3">
                <div class="box">
                    <label for="rent_whos">Rent to Who</label>
                    <div class="paren-check-box">
                        @foreach ($rentWhos as $rentWho)
                            <input type="checkbox" id="rentWho-{{ $rentWho->id }}" name="rent_whos[]"
                                value="{{ $rentWho->id }}" class="mt-3"
                                {{ in_array($rentWho->id, old('rent_whos', [])) ? 'checked' : '' }}>
                            <label for="rentWho-{{ $rentWho->id }}" class="mt-3">{{ $rentWho->name }}</label>
                        @endforeach
                        @error('rent_whos')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="input-box many-check-box pt-5">
                <p>Rooms & Features</p>

                <div class="display-room-feature">
                    @foreach ($features as $feature)
                        <div class="paren-check-box">
                            <div>
                                <input type="checkbox" id="feature-{{ $feature->id }}" name="features[]"
                                    value="{{ $feature->id }}"
                                    {{ in_array($feature->id, old('features', [])) ? 'checked' : '' }}
                                    onchange="toggleQuantityInput(this, '{{ $feature->id }}')">
                                <label for="feature-{{ $feature->id }}">{{ $feature->name }}</label>
                            </div>

                            <input type="number" id="quantity-{{ $feature->id }}"
                                name="quantities[{{ $feature->id }}]"
                                style="display: {{ in_array($feature->id, old('features', [])) ? 'block' : 'none' }};"
                                placeholder="Quantity" min="1" value="{{ old('quantities.' . $feature->id) }}">

                        </div>
                    @endforeach

                    @error('features')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>



            </div>

        </div>
        {{-- </form> --}}

        </div>



        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" class="cancel-btn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" class="next-btn" onclick="nextPrev(1)">Next<svg width="24"
                        height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z"
                            fill="white"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>

    </form>
@endsection

@section('scripts')
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        // Function to display the active-non-active div
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
        // document.getElementById('activeNonActive10').style.display = 'none';
        var parking = document.getElementById('parkingYes');
        if(parking.checked){
            console.log("checked");
            var box22 = document.getElementById('activeNonActive10');
            box22.style.display = 'block';
            console.log(box22);
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
        document.getElementById('activeNonActive3').style.display = 'none';


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

        document.getElementById('activeNonActive12').style.display = 'none';


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
        document.getElementById('activeNonActive11').style.display = 'none';



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

        document.getElementById('activeNonActive20').style.display = 'none';


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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('activeNonActive1').style.display = 'none';
        })


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
        document.getElementById('activeNonActive100').style.display = 'none';


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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('activeNonActive110').style.display = 'none';
        });


        // Function to display the active-non-active div
        window.onload = function() {
            const fields = document.querySelectorAll('.active-non-active');
            fields.forEach(field => field.style.display = 'none');
        };

        // Show and hide fields based on selection
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
        // Function to display the active-non-active div
        function boxActive() {
            document.getElementById('activeNonActive').style.display = 'block';
        }

        // Function to hide the active-non-active div
        function boxNonActive() {
            document.getElementById('activeNonActive').style.display = 'none';
        }

        // Function to display the active-non-active div
        function boxActive13() {}

        // Function to hide the active-non-active div
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

        // Initially hide the active-non-active div
        document.getElementById('activeNonActive13').style.display = 'none';

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            console.log("s", currentTab);
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            // if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;

            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                console.log("d", currentTab);
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function selectCategory(element) {
            // Remove 'active' class from all labels
            document.querySelectorAll('.select_box').forEach(label => {
                label.classList.remove('active');
            });

            // Add 'active' class to the corresponding label of the clicked radio button
            const label = element.closest('.radio-item').querySelector('.select_box');
            if (label) {
                label.classList.add('active');
            }

            // Optionally, log or store the selected category value
            const selectedCategory = element.value;
            console.log('Selected category ID:', selectedCategory);
        }

        function setActiveBank(element) {
            // Reset active classes
            document.querySelectorAll('.bankruptcyYesLabel, .bankruptcyNoLabel').forEach(label => {
                label.classList.remove('active');
            });

            // Add active class to the clicked item's label
            if (element.classList.contains('bankruptcyYes')) {
                document.querySelector('.bankruptcyYesLabel').classList.add('active');
            } else if (element.classList.contains('bankruptcyNo')) {
                document.querySelector('.bankruptcyNoLabel').classList.add('active');
            }

            // Mark the radio button as checked
            element.checked = true;
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



        function setEvction(element) {
            // Remove 'active' class from all radio items
            document.querySelectorAll('.evction').forEach(item => {
                item.classList.remove('active');
            });

            // Add 'active' class to the clicked radio-item
            element.classList.add('active');

            // Ensure the radio input within the clicked item is checked
            const radioInput = element.querySelector('input[type="radio"]');
            if (radioInput) {
                radioInput.checked = true;
            }
        }

        const fileInput = document.getElementById('fileInput');
        const imageContainer = document.getElementById('imageContainer');
        let selectedImages = [];

        fileInput.addEventListener('change', (event) => {
            const files = Array.from(event.target.files);

            if (selectedImages.length + files.length > 50) {
                toastr.error('You can only upload a maximum of 50 images.');
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

        function checkImageCount() {
            if (selectedImages.length < 3) {
                toastr.error('You need to upload at least 3 images.');
            }
        }

        $(document).ready(function() {


            $('.js-example-basic-multiple').select2();

            // Handle form submission inside the modal
            $('#categoryForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                var newCategory = $('#new-category').val();
                if (newCategory) {
                    $.ajax({
                        url: "{{ route('landlord.category.store') }}", // Update to your route
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: newCategory
                        },
                        success: function(response) {
                            if (response.success) {
                                // Add the new category to the select dropdown
                                $('#cars').append(
                                    `<option value="${response.category.id}" selected>${response.category.name}</option>`
                                );

                                // Clear the input field and close the modal
                                $('#new-category').val('');
                                $('#categoryModal').modal('hide'); // Hide the modal
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(error) {
                            toastr.error('Error creating category');
                        }
                    });
                } else {
                    toastr.error('Please enter a category name');
                }
            });
        });

        $(document).ready(function() {
            $('#saveChangesBtn').click(function(e) {
                e.preventDefault();
                $("#saveChangesBtn").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...'
                );
                $("#saveChangesBtn").prop('disabled', true);

                // Clear previous error messages
                $('.error-message').remove();
                $('input, select, textarea').removeClass('is-invalid');

                // Get the value from the progressNumber element
                var creditPoint = $('#progressNumber').text().trim();
                $('#credit_point').val(creditPoint);

                console.log("creditPoint", creditPoint);
                // Create a new FormData object
                var formData = new FormData($('#uploadForm')[0]);

                if ($('#eviction').is(':checked')) {
                    formData.append('eviction', 1);
                } else {
                    formData.append('eviction', 0);
                }

                if ($('#criminal_records').is(':checked')) {
                    formData.append('criminal_records', 1);
                } else {
                    formData.append('criminal_records', 0);
                }

                // Send the AJAX request
                $.ajax({
                    url: "{{ route('landlord.store_property') }}", // Your Laravel route
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#saveChangesBtn").html('Save Changes');
                        $("#saveChangesBtn").prop('disabled', false);
                        // On success: clear the form and show a success toast
                        $('#uploadForm')[0].reset(); // Reset the form
                        // Optionally, you can use a toaster library for better UI
                        toastr.success('Property created successfully!');
                        window.location.href = "{{ route('landlord.properties') }}";
                    },
                    error: function(xhr, status, error) {
                        $("#saveChangesBtn").html('Save Changes');
                        $("#saveChangesBtn").prop('disabled', false);
                        // On error, handle validation messages
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);
                        if (errors) {
                            $.each(errors, function(key, value) {
                                // Show error messages for each field
                                var input = $('[name="' + key + '"]');

                                if (key == 'rent_whos') {
                                    input = $('[name="rent_whos[]"]');
                                }
                                if (key == 'features') {
                                    input = $('[name="features[]"]');
                                }
                                if (key == 'pets') {
                                    input = $('[name="pets[]"]');
                                }
                                if (key == 'images') {
                                    input = $('[name="images[]"]');
                                }


                                input.addClass('is-invalid');
                                input.after('<span class="error-message text-danger">' +
                                    value[0] + '</span>');
                                toastr.error(key + ": " + value[0]);
                            });

                        } else {
                            // Handle general errors
                            toastr.error('Error occurred while creating property.');
                        }
                    }
                });
            });
        });

        function toggleQuantityInput(checkbox, featureId) {
            const quantityInput = document.getElementById(`quantity-${featureId}`);
            if (checkbox.checked) {
                quantityInput.style.display = 'inline'; // Show the input field
            } else {
                quantityInput.style.display = 'none'; // Hide the input field
                quantityInput.value = ''; // Reset the input value
            }
        }
    </script>
@endsection
