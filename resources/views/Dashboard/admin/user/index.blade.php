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
                    <form action="{{ route('admin.user.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search users..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                    </div>
                    {{-- <a class="t-btn t-btn-blue" href="#">Add New User</a> --}}
                </div>
                <!-- Search Form -->
                {{-- <form action="#" method="GET" class="mb-4"> --}}


                <div class="table-responsive">
                    <table class="table table-striped ">
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
                                        {{-- <img src="{{ asset('storage/'.$user->profile_img) }}" alt="Profile Image" width="50" height="50"> --}}
                                        <img src="{{ Storage::url($user->profile_img ?? '') }}" alt="Profile Image"
                                            width="50" height="50">

                                        {{-- <img src="{{ asset('storage/' . $user->profiles) }}" alt="Profile Image" width="50" height="50"> --}}
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
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('admin.user.edit', $user->id) }}"><img src="{{asset('assets/images/bx-pencil.png') }}" width="30" height="20"></a>
                                    <form id="deleteForm{{ $user->id }}"
                                        action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $user->id }})"> <img src="{{asset('assets/images/delete.png') }}" width="30" height="20"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="pagination justify-content-center">
                    {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete(userId) {
        console.log(userId);
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
        })
    }
</script>
