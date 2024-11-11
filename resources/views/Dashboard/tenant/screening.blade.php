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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Auth::user()->hasRole('tenant'))

                    <form action="#" method="">
                        @csrf

                        <div class="two-inputs-boxes-align">
                            <div class="input-box">
                                <div id="featureContainer">
                                    <!-- The initial input field for Room Features -->
                                    <div class="row p-3">
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="first_name">First Name</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="First Name" name="first_name" id="first_name" class="w-100" value="{{ $firstName ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="last_name">Last Name</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="w-100" value="{{ $lastName ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="form-group">
                                            <label for="dateOfBirth">Date of Birth</label>
                                            <input class="form-control" type="date" name="date_of_birth" id="dateOfBirth" onfocus="this.showPicker()" placeholder="Date Of Birth"
                                                value="{{ $user->date_of_birth ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="social_security_number">Social Security Number</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="Social Security Number" name="social_security_number" id="social_security_number" class="w-100" value="{{$user->bank->identity_card ?? ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="house_number">House Number</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="House Number" name="house_number" id="house_number" class="w-100" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="street_name">Street Name</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="Street Name" name="street_name" id="street_name" class="w-100" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="city">City</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="City" name="city" id="city" class="w-100" value="{{$user->city ?? ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="state">State</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="State" name="state" id="state" class="w-100" value="{{$user->state ?? ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <label for="zip_code">ZIP Code</label>
                                                <div class="two-hex-align">
                                                    <input type="text" placeholder="ZIP Code" name="zip_code" id="zip_code" class="w-100" value="">
                                                </div>
                                            </div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <script>
            document.getElementById('dateOfBirth').addEventListener('focus', function() {
                this.showPicker(); 
            });
        </script>
    @endsection
