@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.pet {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.pet svg path {
        fill: #414141 !important;
    }


    .profile-page.rooms-features-page .profile-basic-info-form form .two-inputs-boxes-align .input-box {
        width: 100%;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        gap: 5px;
        align-items: flex-start;
    }

    .profile-page.rooms-features-page .profile-basic-info-form form .two-inputs-boxes-align .input-box button#addMore {
        max-width: 150px;
        background-color: #1d77b4;
        border: none;
        padding: 15px 0 !important;
        border-radius: 50px;
        font-size: 12px;
        margin-top: 10px;
        margin-bottom: -5px;
        width: 200px;
        margin: 0;
    }

    .profile-page.rooms-features-page .profile-basic-info-form form .two-inputs-boxes-align .input-box button#addMore:hover {
        background-color: black;
    }


    .profile-page.rooms-features-page .two-hex-align {
        display: flex;
        gap: 20px;
        width: 100%;
    }

    .profile-page.rooms-features-page .two-hex-align input {
        width: 1000px !important;
    }


    .profile-page .profile-basic-info-form form .two-inputs-boxes-align .input-box select {
        background-color: #E5E5E5;
        height: 45px;
        border-radius: 10px;
        border: 1px solid #0000003d;
        padding: 10px;
        color: #666666;
        font-size: 17px;
        font-weight: 500;
    }

    .picture-tabs {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 30px;
    }

    .radio-item {
        position: relative;
        display: block;
    }

    .radio-item input {
        position: absolute;
        height: 100% !important;
        width: 100%;
        opacity: 0;
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

    .selection-boxex-true {
        display: flex;
        align-items: center;
        flex-direction: row;
        gap: 20px;
        margin: 20px 0;
    }

    .selection-boxex-true .selection-content-true span,
    .selection-boxex-true .radio-item label {
        color: #777777;
        font-size: 20px;
    }

    #featureContainer ul li {
        color: #777777;
        font-size: 15px;
        font-weight: 500;
    }

    #featureContainer ul li.mt-3 .input-box {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .profile-page .profile-basic-info-form form .two-inputs-boxes-align .input-box label img {
        height: 80px;
        width: 80px;
        object-fit: cover;
    }

    .radio-item label:hover,
    .radio-item label.active {
        transition: .3s !important;
        border-color: #0077B6 !important;
    }

    .two-btn-align-sub-del.p-3 .t-btn {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }
</style>
@section('content')
    <h3>Screening</h3>
    <div class="profile-page rooms-features-page">
        <h2>Apply For You Screening</h2>
        <p>This Required A Some Payment For Screening Of Every User. This Will Retrive Your Credit Report And Some Of Your
            Background Details </p>
        <div class="row">
            <div class="col-lg-12">
                @php
                    $fullName = auth()->user()->name ?? '';
                    $nameParts = explode(' ', $fullName);
                    $firstName = $nameParts[0] ?? '';
                    $lastName = isset($nameParts[1]) ? implode(' ', array_slice($nameParts, 1)) : '';
                @endphp
                <div class="profile-basic-info-form">
                    @if (Auth::user()->hasRole('tenant'))
                        <form action="{{ route('tenant.screening.update') }}" method="POST">
                            @csrf

                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <div id="featureContainer">
                                        <!-- The initial input field for Room Features -->
                                        <div class="row p-2">
                                            @if (session('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="firstName">First Name</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="First Name" name="firstName"
                                                            id="first_name" class="w-100" value="{{ $firstName ?? '' }}">
                                                    </div>
                                                    @error('firstName')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="last_name">Last Name</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Last Name" name="last_name"
                                                            id="last_name" class="w-100" value="{{ $lastName ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="date_of_birth">Date Of Birth</label>
                                                    <input class="form-control" type="date" name="date_of_birth"
                                                        id="dateOfBirth" onfocus="this.showPicker()"
                                                        placeholder="Date Of Birth"
                                                        value="{{ $user->date_of_birth ?? '' }}">
                                                </div>
                                                @error('date_of_birth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="identity_card">Identity Card</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Social Security Number"
                                                            name="identity_card" id="social_security_number" class="w-100"
                                                            value="{{ $user->bank->identity_card ?? '' }}">
                                                    </div>
                                                    @error('identity_card')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">

                                                <div class="input-box">
                                                    <label for="email-address">Email</label>
                                                    <div class="two-hex-align">
                                                        <input type="email" placeholder="Email Address"
                                                            name="email-address" id="email-address" class="w-100"
                                                            value="{{ $user->email ?? '' }}">
                                                    </div>
                                                    @error('email-address')
                                                        <div class="error-message">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="house_number">House Number</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="House Number" name="house_number"
                                                            id="house_number" class="w-100"
                                                            value="{{ $user->house_number ?? '' }}">
                                                    </div>
                                                    @error('house_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="street_name">Street Name</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Street Name" name="street_name"
                                                            id="street_name" class="w-100"
                                                            value="{{ $user->address ?? '' }}">
                                                    </div>
                                                    @error('street_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="city">City</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="City" name="city"
                                                            id="city" class="w-100"
                                                            value="{{ $user->city ?? '' }}">
                                                    </div>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="state">State</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="State" name="state"
                                                            id="state" class="w-100"
                                                            value="{{ $user->state ?? '' }}">
                                                    </div>
                                                    @error('state')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="postal_code">Postal Code</label>
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Postal Code"
                                                            name="postal_code" id="zip_code" class="w-100"
                                                            value="{{ $user->postal_code ?? '' }}">

                                                    </div>
                                                    @error('postal_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="property_city">Property City</label>
                                                    <div class="two-hex-align">
                                                        <input type="text"
                                                            placeholder="City of the property you wish to move to"
                                                            name="property_city" class="w-100"  value="{{ $user->screening['property_city'] ?? '' }}">
                                                    </div>
                                                    @error('property_city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="property_location">Property Location</label>
                                                    <div class="two-hex-align">
                                                        <input type="text"
                                                            placeholder="Preferred location of the property you wish to move to"
                                                            name="property_location" class="w-100" value="{{ $user->screening['property_location'] ?? '' }}">

                                                    </div>
                                                    @error('property_location')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="shifting_date">Preferred moving date</label>
                                                    <div class="two-hex-align">
                                                        <input type="date" placeholder="Preferred move-in date"
                                                            name="shifting_date" class="w-100" value="{{ $user->screening['shifting_date'] ?? '' }}">
                                                    </div>
                                                    @error('shifting_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="rent_type">Rent Type</label>
                                                    <div class="two-hex-align">
                                                        <select name="rent_type" id="rent_type" class="w-100">
                                                            <option value="" class="disabled" disabled selected>How
                                                                frequently would you like to pay rent?</option>
                                                            <option value="1">How frequently would you like to pay
                                                                rent Weekly?</option>
                                                            <option value="2">How frequently would you like to pay
                                                                rent Bi-Weekly?</option>
                                                            <option value="3">How frequently would you like to pay
                                                                rent Monthly?</option>
                                                            <option value="4">How frequently would you like to pay
                                                                rent Yearly?</option>
                                                        </select>

                                                    </div>
                                                    @error('rent_type')
                                                        <div class="error-message">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-3">

                                            <div class="input-box">
                                                <p for="">What type of property are you looking for?</p>

                                                <div class="get-started-content">
                                                    <div class="picture-tabs">
                                                        {{-- @foreach ($categories as $category)
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
                                                        @endforeach --}}
                                                        @foreach ($categories as $category)
                                                            <div class="radio-item">
                                                                <input type="radio" id="category-{{ $category->id }}"
                                                                    name="cat_id" value="{{ $category->id }}"
                                                                    onclick="selectCategory(this)"
                                                                    onclick="selectCategory(this)"
                                                                    {{ old('category', $selectedCategory ?? '') == $category->id ? 'checked' : '' }}>
                                                                <label for="category-{{ $category->id }}"
                                                                    class="select_box {{ old('category', $selectedCategory ?? '') == $category->id ? 'active' : '' }}">
                                                                    {{-- <img src="{{ Storage::url($category->image ?? '') }}" alt="{{ $category->name }}"> --}}
                                                                    <img src="{{ asset($category->image ?? 'default.png') }}"
                                                                        alt="{{ $category->name }}">
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

                                        </div>

                                        <div class="row p-3">

                                            <div class="col-md-6">
                                                <p>Do you have pets?</p>

                                                <div class="selection-boxex-true active-non-active" id="activeNonActive3">
                                                    <div class="radio-item" onclick="boxActive3(1)" id="boxactive3">
                                                        <input type="radio" name="radio-item" id="radio-item-yes"
                                                            value="1">
                                                        <label class="selection-content-true" id="selectionYesLabel">
                                                            <img src="{{ asset('assets/images/checked.png') }}"
                                                                alt="Yes">
                                                            <span>Yes</span>
                                                        </label>
                                                    </div>

                                                    <div class="radio-item" onclick="boxActive3(0)" id="boxnonactive3">
                                                        <input type="radio" name="radio-item" id="radio-item-no"
                                                            value="0">
                                                        <label class="selection-content-true" id="selectionNoLabel">
                                                            <img src="{{ asset('assets/images/cancel.png') }}"
                                                                alt="No">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                @error('radio-item')
                                                    <div class="error-message">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror


                                                <!-- Pets Select2 Dropdown -->
                                                <div class="active-non-active" id="activeNonActive10"
                                                    style="display: none;">
                                                    <div class="box">
                                                        <label for="pets">Select Pets</label>
                                                        <select class="js-example-basic-multiple" multiple="multiple"
                                                            style="width: 100%;" name="pets[]" id="pets">
                                                            @foreach ($pets as $pet)
                                                                <option value="{{ $pet->id }}">{{ $pet->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @error('pets')
                                                <div class="error-message">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror


                                            </div>

                                            <div class="col-md-6">

                                                <p>Do you smoke?</p>

                                                <div class="selection-boxex-true">

                                                    <div class="radio-item" onclick="boxActivesmoke(1)">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="1">
                                                        <label class="evction" for="yes" onclick="setEvction(this)"
                                                            id="selectionYesSmokeLabel">
                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                            Yes
                                                        </label>
                                                    </div>


                                                    <div class="radio-item" onclick="boxActivesmoke(0)"
                                                        id="boxnunactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="0">
                                                        <label class="evction" for="no" onclick="setEvction(this)"
                                                            id="selectionNoSmokeLabel">
                                                            <img src="/assets/images/cancel.png" alt="No">
                                                            No
                                                        </label>
                                                    </div>
                                                    @error('smoke')
                                                    <div class="error-message">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row p-3">

                                            <div class="col-md-6">

                                                <p>Will you bring waterbeds to the property?</p>

                                                <div class="selection-boxex-true">

                                                    <div class="radio-item" onclick="boxActiveWaterbed(1)"
                                                        id="boxactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="1">
                                                        <label class="evction" for="yes" onclick="setEvction(this)"
                                                            id="selectionYesWaterbedLabel">
                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                            Yes
                                                        </label>
                                                    </div>


                                                    <div class="radio-item" onclick="boxActiveWaterbed(0)"
                                                        id="boxnunactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="0">
                                                        <label class="evction" for="no" onclick="setEvction(this)"
                                                            id="selectionNoWaterbedLabel">
                                                            <img src="/assets/images/cancel.png" alt="No">
                                                            No
                                                        </label>
                                                    </div>
                                                    @error('waterbed')
                                                    <div class="error-message">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror

                                                </div>


                                            </div>

                                            <div class="col-md-6">

                                                <p>Are you looking for a short-term leasing option?</p>

                                                <div class="selection-boxex-true">

                                                    <div class="radio-item" onclick="boxActiveLease(1)" id="boxactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="1">
                                                        <label class="evction" for="yes" onclick="setEvction(this)"
                                                            id="selectionYesLeaseLabel">
                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                            Yes
                                                        </label>
                                                    </div>


                                                    <div class="radio-item" onclick="boxActiveLease(0)"
                                                        id="boxnunactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="0">
                                                        <label class="evction" for="no" onclick="setEvction(this)"
                                                            id="selectionNoLeaseLabel">
                                                            <img src="/assets/images/cancel.png" alt="No">
                                                            No
                                                        </label>
                                                    </div>

                                                    @error('lease_short_term')
                                                    <div class="error-message">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row p-3">

                                            <div class="col-md-12" style="height: min-content !important;">
                                                <p>Will you be providing a security deposit?</p>
                                                <div class="selection-boxex-true">
                                                    <div class="radio-item" onclick="boxActiveDeposit(1)"
                                                        id="boxactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="1">
                                                        <label class="evction" for="yes" onclick="setEvction(this)"
                                                            id="selectionYesDepositLabel">
                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                            Yes
                                                        </label>
                                                    </div>

                                                    <div class="radio-item" onclick="boxActiveDeposit(0)"
                                                        id="boxnunactive10">
                                                        <input type="radio" id="eviction" name="eviction"
                                                            value="0">
                                                        <label class="evction" for="no" onclick="setEvction(this)"
                                                            id="selectionNoDepositLabel">
                                                            <img src="/assets/images/cancel.png" alt="No">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="active-non-active" id="securityDeposit"
                                                    style="display: none;">
                                                    <div class="box">
                                                        <input type="number" placeholder="Enter Amount" class="w-100"
                                                            name="deposit_amount">
                                                    </div>
                                                </div>
                                            </div>    @error('security_deposit')
                                            <div class="error-message">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror

                                        </div>

                                        <div class="row p-3">
                                            <div class="col-lg-12" style="height: max-content !important;">
                                                <ul>
                                                    <li>By submitting your application, you acknowledge and authorize
                                                        <b>Apartment One</b> to conduct background checks on your behalf,
                                                        including but not limited to:
                                                    </li>
                                                    <li>Criminal record checks
                                                    </li>
                                                    <li>Eviction history checks
                                                    </li>
                                                    <li>Credit score evaluations
                                                    </li>
                                                    <li>These checks are conducted solely for the purpose of assisting you
                                                        in finding a suitable rental property that meets the landlord’s
                                                        criteria.
                                                    </li>
                                                    <li>Your Privacy Matters
                                                    </li>
                                                    <li>All information obtained during these checks will be handled with
                                                        strict confidentiality and used only for the stated purpose. We do
                                                        not share or disclose your information to third parties beyond what
                                                        is necessary to complete the screening process.
                                                    </li>
                                                    <li>By proceeding, you confirm your consent to these checks and agree to
                                                        the terms outlined above.</li>
                                                    <li class="mt-3">
                                                        <div class="input-box">
                                                            <input type="checkbox" name="consent">
                                                            <label for="consent">I consent to the background checks as
                                                                described.</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @error('consent')
                                            <div class="error-message">
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                        </div>


                                    </div>
                                </div>



                            </div>
                            <div class="two-btn-align-sub-del p-3">
                                <button type="submit" class="t-btn t-btn-blue">Agree & Apply
                                    <img src="{{ asset('assets/images/right-arrow.png') }}" alt="">
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Define the function globally
            window.boxActive3 = function(value) {
                const yesLabel = document.getElementById('selectionYesLabel');
                const noLabel = document.getElementById('selectionNoLabel');
                console.log(value);

                if (value === 1) {
                    yesLabel.classList.add('active');
                    noLabel.classList.remove('active');
                } else {
                    noLabel.classList.add('active');
                    yesLabel.classList.remove('active');
                }
            };
            window.boxActivesmoke = function(value) {
                const yesLabel = document.getElementById('selectionYesSmokeLabel');
                const noLabel = document.getElementById('selectionNoSmokeLabel');
                console.log(value);

                if (value === 1) {
                    yesLabel.classList.add('active');
                    noLabel.classList.remove('active');
                } else {
                    noLabel.classList.add('active');
                    yesLabel.classList.remove('active');
                }
            };

            window.boxActiveWaterbed = function(value) {
                const yesLabel = document.getElementById('selectionYesWaterbedLabel');
                const noLabel = document.getElementById('selectionNoWaterbedLabel');
                if (value === 1) {
                    yesLabel.classList.add('active');
                    noLabel.classList.remove('active');
                } else {
                    noLabel.classList.add('active');
                    yesLabel.classList.remove('active');
                }
            };

            window.boxActiveShortTerm = function(value) {
                const yesLabel = document.getElementById('selectionYesShortTermLabel');
                const noLabel = document.getElementById('selectionNoShortTermLabel');
                if (value === 1) {
                    yesLabel.classList.add('active');
                    noLabel.classList.remove('active');
                } else {
                    noLabel.classList.add('active');
                    yesLabel.classList.remove('active');
                }
            };

            window.boxActiveDeposit = function(value) {
                console.log(value);
                const yesLabel = document.getElementById('selectionYesDepositLabel');
                const noLabel = document.getElementById('selectionNoDepositLabel');
                if (value === 1) {
                    yesLabel.classList.add('active');
                    noLabel.classList.remove('active');
                } else {
                    noLabel.classList.add('active');
                    yesLabel.classList.remove('active');
                }
            };
            window.boxActiveLease = function(value) {
                console.log(value);
                const yesLabel = document.getElementById('selectionYesLeaseLabel');
                const noLabel = document.getElementById('selectionNoLeaseLabel');
                if (value === 1) {
                    yesLabel.classList.add('active');
                    noLabel.classList.remove('active');
                } else {
                    noLabel.classList.add('active');
                    yesLabel.classList.remove('active');
                }
            };

            // Initialize Select2 for Pets
            $('#pets').select2({
                placeholder: "Select your pets",
                allowClear: true
            });

            // Show/Hide Pets Dropdown Based on Selection
            window.boxActive3Pets = function(isActive) {
                if (isActive) {
                    $('#activeNonActive10').show(); // Show the pets dropdown
                } else {
                    $('#activeNonActive10').hide(); // Hide the pets dropdown
                    $('#pets').val(null).trigger('change'); // Clear selection
                }
            };
        });

        function boxActive10() {
            // Show the input field when "Yes" is selected
            document.getElementById('securityDeposit').style.display = 'block';
        }

        function boxNonActive10() {
            // Hide the input field when "No" is selected
            document.getElementById('securityDeposit').style.display = 'none';
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
@endsection
