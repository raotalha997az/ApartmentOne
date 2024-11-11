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
        <p>This Required A Some Payment For Screening Of Every User. This Will Retrive Your Credit Report And Some Of Your Background Details </p>
        <div class="row">
            <div class="col-lg-12">
                <div class="profile-basic-info-form">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- <h3>Screening</h3> --}}
                    {{-- @if (Auth::user()->hasRole('admin')) --}}
                        {{-- <form action="{{ route('admin.pets.store') }}" method="POST"> --}}
                            <form action="#" method="">
                            @csrf

                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <div id="featureContainer">
                                        <!-- The initial input field for Room Features -->
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="first name" name="first_name"
                                                            class="w-100" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="last name" name="last_name"
                                                            class="w-100" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="form-group">
                                                {{-- <label for="date_of_birth">Date of Birth</label> --}}
                                                {{-- <input class="form-control"  type="date" name="date_of_birth" placeholder="Date Of Birth"> --}}
                                                <input class="form-control" type="date" name="date_of_birth" id="dateOfBirth" onfocus="this.showPicker()" placeholder="Date Of Birth">
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Social Security Number" name="Social_security_Number"
                                                            class="w-100" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="House Number" name="House_Number"
                                                            class="w-100" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="Street Name " name="Street_Number"
                                                            class="w-100" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="City" name="City"
                                                            class="w-100" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="State" name="State"
                                                            class="w-100" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    {{-- <label for="room_features">Pets</label> --}}
                                                    <div class="two-hex-align">
                                                        <input type="text" placeholder="ZIP Code" name="zip_code"
                                                            class="w-100" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two-btn-align-sub-del">
                                <button type="submit" class="form-btn submit">Agree & Apply
                                    <img src="{{ asset('assets/images/right-arrow.png') }}" alt="">
                                </button>
                                <button type="button" class="form-btn delet" >Decline
                                  </button>
                            </div>



                        </form>
                    {{-- @endif --}}
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <script>
            document.getElementById('dateOfBirth').addEventListener('focus', function() {
                this.showPicker(); // This line automatically shows the date picker on focus
            });
        </script>
    @endsection

