@extends('Dashboard.Layouts.master_dashboard')
@section('content')
<div class="user-reports-page price-page edit-prcings-page">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="select-box">
                    <label for="Sign Up">Price For  </label>
                    <select id="Sign Up">
                        <option value="" disabled selected>Sign Up</option>
                        <option value="Sign Up">Sign Up-01</option>
                        <option value="Sign Up">Sign Up-02</option>
                        <option value="Sign Up">Sign Up-03</option>
                        <option value="Sign Up">Sign Up-04</option>
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

                <button class="t-btn t-btn-blue">Save Changes</button>
                <button class="t-btn t-btn-blue t-btn-gray">Discard</button>
            </form>



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
