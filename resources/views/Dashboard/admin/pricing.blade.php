@extends('Dashboard.Layouts.master_dashboard')
@section('content')
<div class="user-reports-page price-page">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="select-box">
                    <label for="Price For">Price For</label>
                    <select id="Price For">
                        <option value="" disabled selected>Price For</option>
                        <option value="Price For">Price For-01</option>
                        <option value="Price For">Price For-02</option>
                        <option value="Price For">Price For-03</option>
                        <option value="Price For">Price For-04</option>
                    </select>
                </div>

                <div class="select-box">
                    <label for="Role">Role</label>
    <select id="Role">
        <option value="" disabled selected>Tenant</option>
        <option value="Tenant">Tenant-01</option>
        <option value="Tenant">Tenant-02</option>
        <option value="Tenant">Tenant-03</option>
        <option value="Tenant">Tenant-04</option>
    </select>
                </div>

                <button class="t-btn t-btn-blue">Add New Pricing</button>
            </form>


            <div class="two-things-align">
                <div class="box">
                    <h6>All Pricing</h6>
                </div>
                <div class="box">
                    <a href="#" class="t-btn t-btn-blue t-btn-svg">Download CSV
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.7374 11.575C19.2822 7.98956 16.2114 5.20831 12.5041 5.20831C9.63324 5.20831 7.13949 6.88644 6.00094 9.53123C3.76344 10.2 2.0874 12.3125 2.0874 14.5833C2.0874 17.4552 4.42386 19.7916 7.29574 19.7916H8.3374V17.7083H7.29574C5.57282 17.7083 4.17074 16.3062 4.17074 14.5833C4.17074 13.1208 5.41969 11.7114 6.95511 11.4416L7.56032 11.3354L7.76032 10.7541C8.49261 8.61769 10.3103 7.29165 12.5041 7.29165C15.3759 7.29165 17.7124 9.6281 17.7124 12.5V13.5416H18.7541C19.903 13.5416 20.8374 14.476 20.8374 15.625C20.8374 16.7739 19.903 17.7083 18.7541 17.7083H16.6707V19.7916H18.7541C21.052 19.7916 22.9207 17.9229 22.9207 15.625C22.9195 14.6911 22.6052 13.7847 22.0282 13.0505C21.4511 12.3163 20.6445 11.7968 19.7374 11.575Z" fill="white"></path>
                            <path d="M13.5457 14.5834V10.4167H11.4624V14.5834H8.3374L12.5041 19.7917L16.6707 14.5834H13.5457Z" fill="white"></path>
                            </svg>

                    </a>
                </div>
            </div>

            <div class="reports-three-boxes">
                <div class="user-reports-yealt">
                    <div class="report-item">Tenant</div>
                    <div class="report-item">Sign Up</div>
                    <div class="report-item paid">$1,400</div>
                    <div class="report-item two-btns">
                        <div class="two-btns-inline">
                            <button>Edit</button>
                            <button>Delete</button>
                        </div>
                    </div>
                  </div>
            </div>

            <div class="reports-three-boxes">
                <div class="user-reports-yealt">
                    <div class="report-item">Land Lord</div>
                    <div class="report-item">Sign Up</div>
                    <div class="report-item paid">$15,000</div>
                    <div class="report-item two-btns">
                        <div class="two-btns-inline">
                            <button>Edit</button>
                            <button>Delete</button>
                        </div>
                    </div>
                  </div>
            </div>


        </div>
    </div>

</div>

<script>
    // Get the current year
    const currentYear = 2024;
    const yearSelect = document.getElementById('yearSelect');

    // Populate the select options with years till 2024
    for (let year = currentYear; year >= 1900; year--) {
        let option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option);
    }
</script>
@endsection
