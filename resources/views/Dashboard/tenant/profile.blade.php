@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.profile-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.profile-active svg path {
        fill: #414141 !important;
    }
</style>



@section('content')
    <div class="profile-page">
        <div class="row">
            <div class="col-lg-4">

                <div class="detailed-user-box">
                    <div class="user-img-box">
                        <img src="{{ Storage::url($user->profile_img ?? '') }}" alt="">
                        <h5>{{ $user->name ?? '' }}</h5>
                    </div>
                    <div class="user-more-details">
                        <ul>
                            <li>Age : {{ $user->age ?? '' }}</li>
                            <li>City : {{ $user->city ?? '' }}</li>
                            <li>State : {{ $user->state ?? '' }}</li>
                            <li>Country : {{ $user->country ?? '' }}</li>
                            <li>Postal Code : {{ $user->postal_code ?? '' }}</li>
                            <li>Phone : {{ $user->phone ?? '' }}</li>
                            <li>Email Address : {{ $user->email ?? '' }}</li>
                        </ul>
                    </div>
                </div>

                @if (session('success'))
                    <div class="mt-3 alert alert-success alert-dismissible fade show">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

            </div>
            <div class="col-lg-8">
                <div class="credit-report-box">
                    <div class="two-things-align">
                        <div class="box">
                            <h6>Credit Report</h6>
                            <p>ABC Bank</p>
                        </div>
                        <div class="box">
                            <a href="#" class="t-btn t-btn-blue t-btn-svg">Download
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.7374 11.575C19.2822 7.98956 16.2114 5.20831 12.5041 5.20831C9.63324 5.20831 7.13949 6.88644 6.00094 9.53123C3.76344 10.2 2.0874 12.3125 2.0874 14.5833C2.0874 17.4552 4.42386 19.7916 7.29574 19.7916H8.3374V17.7083H7.29574C5.57282 17.7083 4.17074 16.3062 4.17074 14.5833C4.17074 13.1208 5.41969 11.7114 6.95511 11.4416L7.56032 11.3354L7.76032 10.7541C8.49261 8.61769 10.3103 7.29165 12.5041 7.29165C15.3759 7.29165 17.7124 9.6281 17.7124 12.5V13.5416H18.7541C19.903 13.5416 20.8374 14.476 20.8374 15.625C20.8374 16.7739 19.903 17.7083 18.7541 17.7083H16.6707V19.7916H18.7541C21.052 19.7916 22.9207 17.9229 22.9207 15.625C22.9195 14.6911 22.6052 13.7847 22.0282 13.0505C21.4511 12.3163 20.6445 11.7968 19.7374 11.575Z"
                                        fill="white" />
                                    <path
                                        d="M13.5457 14.5834V10.4167H11.4624V14.5834H8.3374L12.5041 19.7917L16.6707 14.5834H13.5457Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="four-reports-align">
                        <div class="number-box">
                            <h6>122</h6>
                            <p>Overall Points</p>
                        </div>
                        <div class="number-box">
                            <h6>12500</h6>
                            <p>Transactions</p>
                        </div>
                        <div class="number-box">
                            <h6>15</h6>
                            <p>Loans</p>
                        </div>
                        <div class="number-box">
                            <h6>02</h6>
                            <p>House Rentals</p>
                        </div>
                    </div>
                </div>
                <div class="profile-basic-info-form">
                    <h3>Basic Info</h3>
                    @if (Auth::user()->hasRole('tenant'))
                        <form action="{{ route('tenant.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <label for="">Upload Profile</label>
                                    <input type="file" name="profile_img" accept="image/*">
                                </div>
                                <div class="input-box">
                                    <label for="">Change Password</label>
                                    <input type="text" name="password">
                                </div>
                            </div>
                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <label for="">Full Name</label>
                                    <input type="text" placeholder="Full Name" name="name"
                                        value="{{ $user->name ?? '' }}">
                                </div>
                                <div class="input-box">
                                    <label for="">Email Address</label>
                                    <input type="email" placeholder="Email Address" value="{{ $user->email ?? '' }}"
                                        name="email">
                                </div>
                            </div>
                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <label for="">City</label>
                                    <input type="text" placeholder="Chicago" name="city"
                                        value="{{ $user->city ?? '' }}">
                                </div>
                                <div class="input-box">
                                    <label for="">Country</label>
                                    <input type="text" placeholder="USA" value="{{ $user->country ?? '' }}"
                                        name="country">
                                </div>
                            </div>
                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <label for="">State</label>
                                    <input type="text" placeholder="New York" name="state"
                                        value="{{ $user->state ?? '' }}">
                                </div>
                                <div class="input-box">
                                    <label for="">Postal Code</label>
                                    <input type="tel" placeholder="1001" value="{{ $user->postal_code ?? '' }}"
                                        name="postal_code">
                                </div>
                            </div>
                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <label for="">Phone Number</label>
                                    <input type="tel" placeholder="+1 123 456 789" value="{{ $user->phone ?? '' }}"
                                        name="phone">
                                </div>
                                <div class="input-box">
                                    <label for="">Date Of Birth</label>
                                    {{-- <input type="date" value="{{ $user->date_of_birth ?? '' }}" name="date_of_birth"> --}}
                                    <input type="date" value="{{ $user->date_of_birth ?? '' }}" name="date_of_birth" max="{{ \Carbon\Carbon::today()->toDateString() }}">
                                    @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="two-btn-align-sub-del">
                                <button type="submit" class="form-btn submit">Save Changes <img
                                        src="{{ asset('assets/images/right-arrow.png') }}" alt=""></button>
                                <button type="button" class="form-btn delet" onclick="window.history.back()">Discard
                                    Changes
                                    <img src="{{ asset('assets/images/right-arrow.png') }}" alt=""></button>
                            </div>
                        </form>
                        <div class="bank-info-box">
                            <h3>Bank Info</h3>
                            <form action="{{ route('tenant.bank') }}" method="POST" id="bank-form">
                                @csrf
                                <div class="two-inputs-boxes-align">
                                    <div class="input-box">
                                        {{-- {{ dd($user->bank) }} --}}
                                        <label for="">Bank Name</label>
                                        <input type="text" placeholder="ABC Bank" name="bank_name"
                                            value="{{ $user->bank->bank_name ?? '' }} ">
                                    </div>
                                    <div class="input-box">
                                        <label for="">Branch Code</label>
                                        <input type="text" placeholder="XXXX" name="branch_code"
                                            value="{{ $user->bank->branch_code ?? '' }} ">
                                    </div>
                                </div>
                                <div class="two-inputs-boxes-align">
                                    <div class="input-box">
                                        <label for="">Identity Card Number</label>
                                        <input type="text" placeholder="XXXX" name="identity_card"
                                            value="{{ $user->bank->identity_card ?? '' }} ">
                                    </div>
                                    <div class="input-box">
                                        <label for="">Account Number</label>
                                        <input type="text" placeholder="XXXX" name="account_number"
                                            value="{{ $user->bank->account_number ?? '' }} ">
                                    </div>
                                </div>
                                <div class="two-btn-align-sub-del">
                                    <button type="submit" class="form-btn submit">Save Changes <img
                                            src="{{ asset('assets/images/right-arrow.png') }}" alt=""></button>
                                    <button class="form-btn delet">Discard Changes <img
                                            src="{{ asset('assets/images/right-arrow.png') }}" alt=""></button>
                                </div>
                            </form>


                        </div>
                </div>
            </div>
            @endif

        </div>
    </div>
@endsection
<script>
    function formSubmit() {
        const form = document.getElementById('bank-form');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            // Perform validation and processing here
        });

        form.submit();
    }
</script>
