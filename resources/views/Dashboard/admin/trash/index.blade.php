@extends('Dashboard.Layouts.master_dashboard')

<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.trash {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.trash svg path {
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
                    <div class="box-inline">
                        <h3> Trashed Users</h3>
                        {{-- <form action="{{ route('admin.trash.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search users..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form> --}}
                    </div>
                </div>
                <!-- Search Form -->
                {{-- <form action="#" method="GET" class="mb-4"> --}}

                <div class="table-responsive">
                    <table id="userTable" class="table table-striped">
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
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->phone ?? '' }}</td>
                                    <td>{{ $user->city ?? '' }}</td>
                                    <td>{{ $user->country ?? '' }}</td>
                                    <td>{{ $user->state ?? '' }}</td>
                                    <td>{{ $user->postal_code ?? '' }}</td>
                                    <td>{{ $user->address ?? '' }}</td>
                                    <td>
                                        @if ($user->profile_img)
                                            <img src="{{ Storage::url($user->profile_img) }}" alt="Profile Image"
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
                                        <form id="deleteForm{{ $user->id }}"
                                            action="{{ route('admin.trash.undo', $user->id) }}" method="post"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('POST')
                                            <button type="button" class="btn btn-sm btn-warning"
                                                onclick="undo({{ $user->id }})">Undo</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                        {{-- <div class="pagination justify-content-center">
                        {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
                    </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
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

        function undo(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert User!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, revert User!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            });
        }
        // function undo(userId) {
        // console.log(userId);
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert User!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, revert User!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             document.getElementById('deleteForm' + userId).submit();
        //         }
        //     })
        // }
    </script>
@endsection
