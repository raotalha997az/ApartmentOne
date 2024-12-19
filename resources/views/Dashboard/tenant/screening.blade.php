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
    height: 100%;
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

.selection-boxex-true .selection-content-true span, .selection-boxex-true .radio-item label {
    color: #777777;
    font-size: 20px;
}

#featureContainer ul li{
    color: #777777;
    font-size: 15px;
    font-weight: 500;
}

#featureContainer ul li.mt-3 .input-box{
    display: flex;
    flex-direction: row;
    align-items: center;
}

.profile-page .profile-basic-info-form form .two-inputs-boxes-align .input-box label img {
    height: 80px;
    width: 80px;
    object-fit: cover;
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
                                        <div class="row p-3">
                                            @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                            <div class="col-md-6">
                                                <div class="input-box">
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
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Last Name" name="last_name"
                                                            id="last_name" class="w-100" value="{{ $lastName ?? '' }}">
                                                        @error('last_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-3">

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <input class="form-control" type="date" name="date_of_birth"
                                                        id="dateOfBirth" onfocus="this.showPicker()" placeholder="Date Of Birth"
                                                        value="{{ $user->date_of_birth ?? '' }}">
                                                </div>
                                                @error('date_of_birth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-box">
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
                                        <div class="row p-3">

                                            <div class="col-md-6">

                                                <div class="input-box">
                                                    <div class="two-hex-align">
                                                        <input type="email" placeholder="Email Address" name="email-address"
                                                            id="email-address" class="w-100"
                                                            value="{{ $user->house_number ?? '' }}">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-box">
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
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="input-box">
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
                                                        <div class="two-hex-align">
                                                            <input type="text" placeholder="City" name="city"
                                                                id="city" class="w-100" value="{{ $user->city ?? '' }}">
                                                        </div>
                                                        @error('city')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-3">
                                                    <div class="col-md-6">
                                                        <div class="input-box">
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
                                                                <div class="two-hex-align">
                                                                    <input type="text" placeholder="Postal Code" name="postal_code"
                                                                        id="zip_code" class="w-100"
                                                                        value="{{ $user->postal_code ?? '' }}">

                                                                </div>
                                                                @error('postal_code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row p-3">
                                                            <div class="col-md-6">
                                                                <div class="input-box">
                                                                    <div class="two-hex-align">
                                                                        <input type="text" placeholder="City of the property you wish to move to" name="state"
                                                                            class="w-100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-box">
                                                                    <div class="two-hex-align">
                                                                        <input type="text" placeholder="Preferred location of the property you wish to move to" name="postal_code"
                                                                            class="w-100">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row p-3">
                                                            <div class="col-md-6">
                                                                <div class="input-box">
                                                                    <div class="two-hex-align">
                                                                        <input type="date" placeholder="Preferred move-in date" name="state"
                                                                            class="w-100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-box">
                                                                    <div class="two-hex-align">
                                                                            <select name="" id="" class="w-100">
                                                                                <option value="" class="disabled">How frequently would you like to pay rent?</option>
                                                                                <option value="">How frequently would you like to pay rent?</option>
                                                                                <option value="">How frequently would you like to pay rent?</option>
                                                                                <option value="">How frequently would you like to pay rent?</option>
                                                                                <option value="">How frequently would you like to pay rent?</option>
                                                                            </select>

                                                                    </div>
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
                                                                            <input type="radio" id="category-{{ $category->id }}" name="category"
                                                                                value="{{ $category->id }}" onclick="selectCategory(this)"
                                                                                {{ old('category', $selectedCategory ?? '') == $category->id ? 'checked' : '' }}>
                                                                            <label for="category-{{ $category->id }}"
                                                                                class="select_box {{ old('category', $selectedCategory ?? '') == $category->id ? 'active' : '' }}">
                                                                                {{-- <img src="{{ Storage::url($category->image ?? '') }}" alt="{{ $category->name }}"> --}}
                                                                                <img src="{{ asset('assets/images/cat_') . ($loop->index + 1) . '.png' }}"
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

                                                                <div class="selection-boxex-true">

                                                                    <div class="radio-item" onclick="boxActive10()" id="boxactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="1">
                                                                        <label class="evction" for="yes" onclick="setEvction(this)">
                                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                                            Yes
                                                                        </label>
                                                                    </div>


                                                                    <div class="radio-item" onclick="boxNonActive10()" id="boxnunactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="0">
                                                                        <label class="evction" for="no" onclick="setEvction(this)">
                                                                            <img src="/assets/images/cancel.png" alt="No">
                                                                            No
                                                                        </label>
                                                                    </div>


                                                                </div>

                                                                <div class="active-non-active" id="activeNonActive10">

                                                                    <div class="box">
                                                                        <input type="text" placeholder="Please Specify" class="w-100">
                                                                    </div>

                                                                </div>



                                                            </div>

                                                            <div class="col-md-6">

                                                                <p>Do you smoke?</p>

                                                                <div class="selection-boxex-true">

                                                                    <div class="radio-item" onclick="boxActive10()" id="boxactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="1">
                                                                        <label class="evction" for="yes" onclick="setEvction(this)">
                                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                                            Yes
                                                                        </label>
                                                                    </div>


                                                                    <div class="radio-item" onclick="boxNonActive10()" id="boxnunactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="0">
                                                                        <label class="evction" for="no" onclick="setEvction(this)">
                                                                            <img src="/assets/images/cancel.png" alt="No">
                                                                            No
                                                                        </label>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row p-3">

                                                            <div class="col-md-6">

                                                                <p>Will you bring waterbeds to the property?</p>

                                                                <div class="selection-boxex-true">

                                                                    <div class="radio-item" onclick="boxActive10()" id="boxactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="1">
                                                                        <label class="evction" for="yes" onclick="setEvction(this)">
                                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                                            Yes
                                                                        </label>
                                                                    </div>


                                                                    <div class="radio-item" onclick="boxNonActive10()" id="boxnunactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="0">
                                                                        <label class="evction" for="no" onclick="setEvction(this)">
                                                                            <img src="/assets/images/cancel.png" alt="No">
                                                                            No
                                                                        </label>
                                                                    </div>


                                                                </div>


                                                            </div>

                                                            <div class="col-md-6">

                                                                <p>Are you looking for a short-term leasing option?</p>

                                                                <div class="selection-boxex-true">

                                                                    <div class="radio-item" onclick="boxActive10()" id="boxactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="1">
                                                                        <label class="evction" for="yes" onclick="setEvction(this)">
                                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                                            Yes
                                                                        </label>
                                                                    </div>


                                                                    <div class="radio-item" onclick="boxNonActive10()" id="boxnunactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="0">
                                                                        <label class="evction" for="no" onclick="setEvction(this)">
                                                                            <img src="/assets/images/cancel.png" alt="No">
                                                                            No
                                                                        </label>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row p-3">

                                                            <div class="col-md-6">

                                                                <p>Will you be providing a security deposit?</p>

                                                                <div class="selection-boxex-true">

                                                                    <div class="radio-item" onclick="boxActive10()" id="boxactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="1">
                                                                        <label class="evction" for="yes" onclick="setEvction(this)">
                                                                            <img src="/assets/images/checked.png" alt="Yes">
                                                                            Yes
                                                                        </label>
                                                                    </div>


                                                                    <div class="radio-item" onclick="boxNonActive10()" id="boxnunactive10">
                                                                        <input type="radio" id="eviction" name="eviction" value="0">
                                                                        <label class="evction" for="no" onclick="setEvction(this)">
                                                                            <img src="/assets/images/cancel.png" alt="No">
                                                                            No
                                                                        </label>
                                                                    </div>


                                                                </div>

                                                                <div class="active-non-active" id="activeNonActive10">

                                                                    <div class="box">
                                                                        <input type="number" placeholder="Enter Amount" class="w-100">
                                                                    </div>

                                                                </div>



                                                            </div>

                                                        </div>


                                                        <div class="row p-3">
                                                            <div class="col-lg-12" style="height: max-content !important;">
                                                                <ul>
                                                                    <li>By submitting your application, you acknowledge and authorize [Company Name] to conduct background checks on your behalf, including but not limited to:
                                                                    </li>
                                                                    <li>Criminal record checks
                                                                    </li>
                                                                    <li>Eviction history checks
                                                                    </li>
                                                                    <li>Credit score evaluations
                                                                    </li>
                                                                    <li>These checks are conducted solely for the purpose of assisting you in finding a suitable rental property that meets the landlord’s criteria.
                                                                    </li>
                                                                    <li>Your Privacy Matters
                                                                    </li>
                                                                    <li>All information obtained during these checks will be handled with strict confidentiality and used only for the stated purpose. We do not share or disclose your information to third parties beyond what is necessary to complete the screening process.
                                                                    </li>
                                                                    <li>By proceeding, you confirm your consent to these checks and agree to the terms outlined above.</li>
                                                                    <li class="mt-3">
                                                                        <div class="input-box">
                                                                            <input type="checkbox" name="consent">
                                                                            <label for="consent">I consent to the background checks as described.</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
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
                        document.getElementById('dateOfBirth').addEventListener('focus', function() {
                            this.showPicker();
                        });
                    </script>
                @endsection
