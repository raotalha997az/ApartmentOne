@extends('Dashboard.Layouts.master_dashboard')

<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.users {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.users svg path {
        fill: #414141 !important;
    }

    table.table.table-striped {
        width: 100%;
    }

    table.table.table-striped th,
    table.table.table-striped td {
        width: 30% !important;
        text-align: left;
    }

    .box-inline {
        display: flex;
        width: 60%;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        column-gap: 20px;
        padding: 0px 0 20px 0;
    }

    a.t-btn {
        width: 210px;
    }

    .box-inline form {
        margin: 0 !important;
    }


    .profile-basic-info-form .input-group button {
        background: #0077B6;
        transition: .3s;
    }

    .profile-basic-info-form .input-group button:hover {
        background: #000;
        transition: .3s;
    }

    .pagination {
        justify-content: flex-end;
        padding-top: 10px;
    }


    .pagination .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between ul.pagination {
        gap: 10px;
    }

    .pagination .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between ul.pagination li .page-link {
        padding: 5px 15px !important;
        border: 1px solid #80808038 !important;
        border-radius: 8px;
        box-shadow: 0px 1px 1px grey;
    }

    .pagination .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between div:nth-child(1) {
        display: none !important;
    }

    .table-responsive::-webkit-scrollbar {
        height: 5px;
    }

    .col-lg-9 .col-lg-12::-webkit-scrollbar,
    .col-lg-9 .col-md-12::-webkit-scrollbar {
        width: 5px;
    }

    .active>.page-link,
    .page-link.active {
        background-color: #0077B6 !important;
    }

    .page-link:hover {
        background-color: #000 !important;
        color: #fff !Important;
    }


    .badge {
        font-weight: 400;
    }

    td {
        align-content: center;
    }

    a.Delet-btn.dan {
        background: red;
        border-radius: 10px;
        padding: 5px;
    }

    .btn {
        align-content: center;
        border-radius: 10px;
        padding: 5px 15px;
        transition: .3s;
    }


    .dt-buttons {
        display: flex;
        flex-direction: row;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 15px;
    }

    .dt-search {
        margin-bottom: 15px;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }

    .dt-search input#dt-search-0 {
        width: 50%;
        border-radius: 10px;
        border: 2px solid #80808075;
        color: #000;
    }

    .dt-search label {
        font-weight: 600;
    }


    #roomFeaturesTable_info {
        margin-top: 10px;
        font-weight: 600;
        color: #00000094;
        width: 100%;
        text-align: end;
    }

    .dt-paging {
        width: 100%;
        text-align: end;
        margin-top: 10px;
    }

    .dt-paging nav {
        display: flex;
        justify-content: flex-end;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }

    .dt-paging nav button {
        border-radius: 10px !important;
        color: #fff !important;
        font-weight: 500;
        background: #0077B6 !important;
    }

    a.Delet-btn.dan img {
        height: 25px;
        width: 25px;
        object-fit: contain;
    }

    div.dt-container .dt-paging .dt-paging-button.disabled,
    div.dt-container .dt-paging .dt-paging-button.disabled:hover,
    div.dt-container .dt-paging .dt-paging-button.disabled:active {
        color: #fff !important;
    }

    div.dt-container .dt-paging .dt-paging-button {
        color: #fff !important;
    }

    div.dt-container .dt-paging .dt-paging-button.current,
    div.dt-container .dt-paging .dt-paging-button.current:hover {
        color: #fff !important;
    }


    .box-inline {
        width: 100%;
        justify-content: flex-end;
    }
</style>

@section('content')
    <div class="profile-page user-page">
        <div class="row">

            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="profile-basic-info-form">
                    <h3>Users</h3>
                    <div class="box-inline">
                        <a class="t-btn t-btn-blue" href="{{ route('admin.user.create') }}">Add New User</a>
                        {{-- <form action="{{ route('admin.user.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search users..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form> --}}
                    </div>
                </div>


                <div class="table-responsive">
                    {{-- <div class="export-buttons mb-3"></div> --}}
                    <table id="users_list" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Postal Code</th>
                                <th>Address</th>
                                <th>Profile Image</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name ?? 'N/A' }}</td>
                                    <td>{{ $user->email ?? 'N/A' }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>{{ $user->city ?? 'N/A' }}</td>
                                    <td>{{ $user->country ?? 'N/A' }}</td>
                                    <td>{{ $user->state ?? 'N/A' }}</td>
                                    <td>{{ $user->postal_code ?? 'N/A' }}</td>
                                    <td>{{ $user->address ?? 'N/A' }}</td>
                                    <td>
                                        @if ($user->profile_img)
                                            <img src="{{ asset('assets/' . ($user->profile_img ?? 'default.png')) }}" alt="Profile Image"
                                                width="50" height="50">

                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->hasRole('land_lord'))
                                            Landlord
                                        @elseif ($user->hasRole('tenant'))
                                            Tenant
                                        @elseif ($user->hasRole('admin'))
                                            Admin
                                        @else
                                            Null
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center gap-2"
                                            style="width: 100px">
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('admin.user.edit', $user->id) }}">
                                                <img src="{{ asset('assets/images/bx-pencil.png') }}" width="20"
                                                    height="20">
                                            </a>
                                            <form id="deleteForm{{ $user->id }}"
                                                action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger btn-del"
                                                    onclick="confirmDelete({{ $user->id }})">
                                                    <img src="{{ asset('assets/images/delete.png') }}" width="20"
                                                        height="20">
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="pagination">
                    {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#users_list').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: 'Export to CSV',
                        className: 'btn btn-outline-primary btn-sm'
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        className: 'btn btn-outline-danger btn-sm',
                        orientation: 'landscape', // For wider tables
                        pageSize: 'A4'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        className: 'btn btn-outline-secondary btn-sm'
                    }
                ]
            });
        });

        // Handle delete confirmation
        window.confirmDelete = function(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            });
        };

        // Show SweetAlert for success or error messages
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}'
            });
        @endif

    </script>
@endsection
