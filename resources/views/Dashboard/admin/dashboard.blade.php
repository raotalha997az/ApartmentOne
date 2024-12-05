@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.dashboard-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.dashboard-active svg path {
        fill: #414141 !important;
    }
</style>
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="page-detail-box">
            <p>Welcome</p>
            {{-- <h6>{{ Auth::user()->name }}</h6> --}}
        </div>
        <div class="credit-report-box">
            <div class="two-things-align">
                <div class="box">
                    <h6>Business Overview</h6>
                    <p>All Basic Business Details</p>
                </div>
                {{-- <div class="box">
                    <a href="#" class="t-btn t-btn-blue t-btn-svg">Download
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.7374 11.575C19.2822 7.98956 16.2114 5.20831 12.5041 5.20831C9.63324 5.20831 7.13949 6.88644 6.00094 9.53123C3.76344 10.2 2.0874 12.3125 2.0874 14.5833C2.0874 17.4552 4.42386 19.7916 7.29574 19.7916H8.3374V17.7083H7.29574C5.57282 17.7083 4.17074 16.3062 4.17074 14.5833C4.17074 13.1208 5.41969 11.7114 6.95511 11.4416L7.56032 11.3354L7.76032 10.7541C8.49261 8.61769 10.3103 7.29165 12.5041 7.29165C15.3759 7.29165 17.7124 9.6281 17.7124 12.5V13.5416H18.7541C19.903 13.5416 20.8374 14.476 20.8374 15.625C20.8374 16.7739 19.903 17.7083 18.7541 17.7083H16.6707V19.7916H18.7541C21.052 19.7916 22.9207 17.9229 22.9207 15.625C22.9195 14.6911 22.6052 13.7847 22.0282 13.0505C21.4511 12.3163 20.6445 11.7968 19.7374 11.575Z" fill="white"/>
                            <path d="M13.5457 14.5834V10.4167H11.4624V14.5834H8.3374L12.5041 19.7917L16.6707 14.5834H13.5457Z" fill="white"/>
                            </svg>
                    </a>
                </div> --}}
            </div>
            <div class="four-reports-align">
                <div class="number-box">
                    <h6>{{($user->count()) ?? ''}}</h6>
                    <p>Users</p>
                </div>
                <div class="number-box">
                    <h6>{{ $landlordsCount ?? ''}}</h6>
                    <p>Land Lords Accounts</p>
                </div>
                <div class="number-box">
                    <h6>{{ $tenantsCount ?? ''}}</h6>
                    <p>Tenants Accounts</p>
                </div>
                <div class="number-box">
                    <h6>{{ $listedPropertiesCount ?? ''}}</h6>
                    <p>Properties Listed</p>
                </div>
                <div class="number-box">
                    <h6>{{ $soldPropertiesCount ?? ''}}</h6>
                    <p>Properties Sold</p>
                </div>

            </div>
        </div>

        {{-- <div class="top-listing-parent-box">
            <div class="two-things-align">
                <div class="box">
                    <h6>Appointment Reports</h6>
                    <p>These Are The Latest Appointments Notifications</p>
                </div>
                <div class="box">
                    <a href="#" class="t-btn t-btn-blue t-btn-svg">See All Notifications
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z" fill="white"/>
                            </svg>

                    </a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="notification-box-main">
            <div class="content-box">
                <h5>An land lord wants to retrieve your credit report</h5>
                <p>Mr. Albert wants to retrieve your credit report on 21 March 2024</p>
                <div class="two-btns-inline">
                    <button>Approve</button>
                    <button>Decline</button>
                </div>
            </div>
            <div class="close-btn-box">
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div> --}}
{{--
        <div class="notification-box-main">
            <div class="content-box">
                <h5>An land lord wants to retrieve your credit report</h5>
                <p>Mr. Albert wants to retrieve your credit report on 21 March 2024</p>
                <div class="two-btns-inline">
                    <button>Approve</button>
                    <button>Decline</button>
                </div>
            </div>
            <div class="close-btn-box">
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div> --}}

        {{-- <div class="top-listing-parent-box mt-5">
            <div class="two-things-align">
                <div class="box">
                    <h6>Property Reports</h6>
                    <p>These Are The Latest Listed Properties</p>
                </div>
                <div class="box">
                    <a href="#" class="t-btn t-btn-blue t-btn-svg">See All Notifications
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z" fill="white"/>
                            </svg>

                    </a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="notification-box-main">
            <div class="content-box">
                <h5>Mr. Bravo listed a new property</h5>
                <p>Mr. Bravo listed a new property on 25 January 2024 and waiting for approval.</p>
            </div>
            <div class="close-btn-box">
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="notification-box-main">
            <div class="content-box">
                <h5>Mr. Loki listed a new property</h5>
                <p>Mr. Loki listed a new property on 10 January 2024 and waiting for approval.</p>
            </div>
            <div class="close-btn-box">
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div> --}}

    </div>

</div>


<script>
    // Select all notification boxes
    document.querySelectorAll('.notification-box-main').forEach(box => {
    // Select the close anchor and the buttons within the box
    const closeAnchor = box.querySelector('.close-btn-box a');
    const buttons = box.querySelectorAll('button');

    // Add event listener for the anchor
    closeAnchor.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        box.style.display = 'none'; // Hide the box
    });

    // Add event listeners for the buttons
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            box.style.display = 'none'; // Hide the box
        });
    });
});
</script>


@endsection
