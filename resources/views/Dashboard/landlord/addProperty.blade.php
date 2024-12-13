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


    p,#regForm .box label {
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
    input {
        background-color: #E5E5E5;
        border-radius: 10px;
        padding: 15px 20px;
        color: #999999;
        border: 1px solid #999999;
        width: 100%;
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
                                <img src="{{ Storage::url($category->image ?? '') }}" alt="{{ $category->name }}">
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
                <span>Country</span>
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
                <span>Address</span>
                <textarea name="address" id="" cols="100" rows="10" placeholder="Type Here">{{ old('address') }}</textarea>
            </div>

        </div>



        {{-- third tab form  --}}


        {{-- third tab form part 1 --}}


        {{-- third tab form part 2 --}}

        <div class="tab" id="tab-3">

            <h6>Uses of Property</h6>
            <p>Are pets allowed in the property?</p>

            <div class="selection-boxex-true">
                <div class="selection-content-true" onclick="boxActive3()" id="boxactive3">
                    <img src="{{ asset('assets/images/checked.png') }}" alt="">
                    <span>Yes</span>
                </div>

                <div class="selection-content-true" onclick="boxNonActive3()" id="boxnunactive3">
                    <img src="{{ asset('assets/images/cancel.png') }}" alt="">
                    <span>No</span>
                </div>
            </div>

            <div class="active-non-active" id="activeNonActive3">
                <div class="input-box mt-3">
                    <label for="select pets">Select pets</label>
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

        </div>

        {{-- third tab form part 3 --}}

        <div class="tab" id="tab-3">

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

        </div>

        {{-- third tab form part 4 --}}

        <div class="tab" id="tab-3">

            <h6>Eviction Terms</h6>
            <p>What background check will you do to screen your applicant?</p>

            <p style="margin-top: 30px !important;">Have you ever been evicted?</p>

            <div class="selection-boxex-true">

                <div class="radio-item" onclick="boxActive1()" id="boxactive1">
                    <input type="radio" id="eviction" name="eviction" value="1">
                    <label class="evction" for="yes" onclick="setEvction(this)">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>


                <div class="radio-item" onclick="boxNonActive1()" id="boxnunactive1">
                    <input type="radio" id="eviction" name="eviction" value="0">
                    <label class="evction" for="no" onclick="setEvction(this)">
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

            <div class="active-non-active" id="activeNonActive1">

                <div class="box">
                    <p>How Many Times You Are Evicted?</p>
                    <input type="number" placeholder="00" name="many_time_evicted"
                        value="{{ old('many_time_evicted') }}">
                </div>
                @error('many_time_evicted')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror

                <div class="box">
                    <p>When You Are Evicted?</p>
                    <div class="flex-input">
                        <input type="date" placeholder="YYYY-MM-DD" name="when_evicted"
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

        <div class="tab" id="tab-3">

            <h6>Bank Currepcy</h6>
            <p>What background check will you do to screen your applicant?</p>

            <p style="margin-top: 30px !important;">Have you ever declared bankruptcy?</p>

            <div class="selection-boxex-true">
                <div class="radio-item">
                    <input type="radio" class="bankruptcyYes" id="bankruptcyYes" name="bankruptcy" value="1"
                        onclick="setActiveBank(this)"
                        {{ old('bankruptcy', $selectedBankruptcy ?? '') == 1 ? 'checked' : '' }}>
                    <label
                        class="bankruptcyYesLabel {{ old('bankruptcy', $selectedBankruptcy ?? '') == 1 ? 'active' : '' }}"
                        for="bankruptcyYes">
                        <img src="{{ asset('assets/images/checked.png') }}" alt="Yes">
                        Yes
                    </label>
                </div>

                <div class="radio-item">
                    <input type="radio" class="bankruptcyNo" id="bankruptcyNo" name="bankruptcy" value="0"
                        onclick="setActiveBank(this)"
                        {{ old('bankruptcy', $selectedBankruptcy ?? '') == 0 ? 'checked' : '' }}>
                    <label
                        class="bankruptcyNoLabel {{ old('bankruptcy', $selectedBankruptcy ?? '') == 0 ? 'active' : '' }}"
                        for="bankruptcyNo">
                        <img src="{{ asset('assets/images/cancel.png') }}" alt="No">
                        No
                    </label>
                </div>

                @error('bankruptcy')
                    <div class="error-message">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>



        </div>



        {{-- forth tab form  --}}


        {{-- forth tab form part 1 --}}

        <div class="tab" id="tab-4">
            <h6>Contact Details</h6>
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
                <p>Email</p>
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


            <p>Minimum 10 images, Maximum 50 images</p>
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
                    <input type="text" placeholder="Type Here" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>


            <div class="input-box progress-bar">

                <div class="progress-container">
                    <input type="range" id="progressInput" min="10" max="2500" value="10"
                        step="10">
                </div>
                <div class="numbers-main-bb">
                    <input type="number" id="numberInput1" class="number-input" value="10" min="10"
                        max="500" step="10">
                    <input type="number" id="numberInput2" class="number-input" value="500" min="500"
                        max="1000" step="10">
                    <input type="number" id="numberInput3" class="number-input" value="1000" min="1000"
                        max="1500" step="10">
                    <input type="number" id="numberInput4" class="number-input" value="1500" min="1500"
                        max="2000" step="10">
                    <input type="number" id="numberInput5" class="number-input" value="2000" min="2000"
                        max="2500" step="10">
                </div>
                <div class="progress-number" id="progressNumber"></div>
                <!-- Hidden input to hold the credit_point value -->
                <input type="hidden" name="credit_point" id="progressNumberForDB" value="{{ old('credit_point') }}">

                @error('credit_point')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


            </div>

            <!-- Rooms & Features Section -->
            <div class="many-check-box">
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

            <!-- Rent To Who Section -->
            <div class="many-check-box mt-3">
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

            <div class="input-box textarea">
                <label for="other_details">Other Details</label>
                <textarea placeholder="Type Here" name="other_details">{{ old('other_details') }}</textarea>
            </div>

            <div class="input-box simple-select">
                <label for="availability">Availability</label>
                <select name="availability" id="availability" placeholder="Type Here">
                    <option value="0">Booked</option>
                    <option value="1">Available</option>
                </select>
                @error('availability')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-box simple-select">
                <label for="price">Price/Rent</label>
                <input type="text" placeholder="price" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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
        </div>

    </form>










    <script>
        // Function to display the active-non-active div
        function boxActive() {
            document.getElementById('activeNonActive').style.display = 'block';
        }

        // Function to hide the active-non-active div
        function boxNonActive() {
            document.getElementById('activeNonActive').style.display = 'none';
        }

        // Initially hide the active-non-active div
        document.getElementById('activeNonActive').style.display = 'none';
    </script>



    <script>
        // Function to display the active-non-active div
        function boxActive1() {
            document.getElementById('activeNonActive1').style.display = 'block';
        }

        // Function to hide the active-non-active div
        function boxNonActive1() {
            document.getElementById('activeNonActive1').style.display = 'none';
        }

        // Initially hide the active-non-active div
        document.getElementById('activeNonActive1').style.display = 'none';
    </script>

    <script>
        // Function to display the active-non-active div
        function boxActive3() {
            document.getElementById('activeNonActive3').style.display = 'block';
        }

        // Function to hide the active-non-active div
        function boxNonActive3() {
            document.getElementById('activeNonActive3').style.display = 'none';
        }

        // Initially hide the active-non-active div
        document.getElementById('activeNonActive3').style.display = 'none';
    </script>
    <script>
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
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

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
    </script>



    <script>
        const progressInput = document.getElementById('progressInput');
        const progressNumber = document.getElementById('progressNumber');
        const progressNumberForDB = document.getElementById('progressNumberForDB');

        // Individual input boxes
        const numberInput1 = document.getElementById('numberInput1');
        const numberInput2 = document.getElementById('numberInput2');
        const numberInput3 = document.getElementById('numberInput3');
        const numberInput4 = document.getElementById('numberInput4');
        const numberInput5 = document.getElementById('numberInput5');

        // Listen to slider changes and update corresponding number inputs
        progressInput.addEventListener('input', function() {
            const progress = parseInt(progressInput.value);
            updateProgress(progress);
            changeBarColor(progressInput.value);
            changeInputColors(progress);
            progressNumberForDB.value = progress;
            console.log("val", progressNumberForDB.value);
        });

        // Listen to number input changes to update progress bar
        numberInput1.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value >= 10 && value < 500) {
                progressInput.value = value;
                updateProgress(value);
            }
        });

        numberInput2.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value >= 500 && value < 1000) {
                progressInput.value = value;
                updateProgress(value);
            }
        });

        numberInput3.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value >= 1000 && value < 1500) {
                progressInput.value = value;
                updateProgress(value);
            }
        });

        numberInput4.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value >= 1500 && value < 2000) {
                progressInput.value = value;
                updateProgress(value);
            }
        });

        numberInput5.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value >= 2000) {
                progressInput.value = value;
                updateProgress(value);
            }
        });

        // Function to update the progress and which number input is active
        function updateProgress(value) {
            progressNumber.innerText = value;
            // Update number inputs based on the current progress value
            if (value >= 10 && value < 500) {
                numberInput1.value = value;
            } else if (value >= 500 && value < 1000) {
                numberInput2.value = value;
            } else if (value >= 1000 && value < 1500) {
                numberInput3.value = value;
            } else if (value >= 1500 && value < 2000) {
                numberInput4.value = value;
            } else if (value >= 2000) {
                numberInput5.value = value;
            }
        }

        // Change the color of the progress bar based on the value
        function changeBarColor(value) {
            const maxValue = parseInt(progressInput.max);
            const percentage = (value / maxValue) * 100;

            // Set a color based on the percentage
            if (percentage <= 50) {
                progressInput.style.background = `linear-gradient(90deg, #0077B6 ${percentage}%, #f3f3f3 ${percentage}%)`;
            } else {
                progressInput.style.background = `linear-gradient(90deg, #0077B6 ${percentage}%, #f3f3f3 ${percentage}%)`;
            }
        }

        // Change the background color of the input box corresponding to the progress value
        function changeInputColors(value) {
            // Reset background color of all input boxes
            resetInputs();

            // Change color based on the progress value
            if (value >= 10 && value < 500) {
                numberInput1.style.backgroundColor = '#0077B6'; // Change color for 10-500 range
            } else if (value >= 500 && value < 1000) {
                numberInput2.style.backgroundColor = '#0077B6'; // Change color for 500-1000 range
            } else if (value >= 1000 && value < 1500) {
                numberInput3.style.backgroundColor = '#0077B6'; // Change color for 1000-1500 range
            } else if (value >= 1500 && value < 2000) {
                numberInput4.style.backgroundColor = '#0077B6'; // Change color for 1500-2000 range
            } else if (value >= 2000) {
                numberInput5.style.backgroundColor = '#0077B6'; // Change color for 2000+ range
            }
        }

        // Reset all number inputs to avoid multiple updates
        function resetInputs() {
            numberInput1.style.backgroundColor = '';
            numberInput2.style.backgroundColor = '';
            numberInput3.style.backgroundColor = '';
            numberInput4.style.backgroundColor = '';
            numberInput5.style.backgroundColor = '';
        }

        // Start progress on click (demo)
        function startProgress() {
            const intervals = [10, 500, 1000, 1500, 2000]; // The progress increments
            let index = 0;

            const progressInterval = setInterval(() => {
                if (index < intervals.length) {
                    const progress = intervals[index];
                    progressInput.value = progress;
                    updateProgress(progress);
                    changeBarColor(progress);
                    changeInputColors(progress); // Update input box colors
                    index++;
                } else {
                    clearInterval(progressInterval); // Stop when all increments are done
                }
            }, 1000); // Update every second
        }
    </script>

    <script>
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
                    alert("Only image files are allowed.");
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
                alert('You need to upload at least 3 images.');
            }
        }
    </script>
    <script>
        $(document).ready(function() {
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
                            alert('Error creating category');
                        }
                    });
                } else {
                    alert('Please enter a category name');
                }
            });
        });
    </script>
    <script>
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
                            alert('Error occurred while creating property.');
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
@endsection
