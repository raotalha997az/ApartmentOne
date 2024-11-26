@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.room_features {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.room_features svg path {
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
    <div class="profile-page rooms-features-page">
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="profile-basic-info-form">
                    <h3>Rooms & Features</h3>
                    <a class="t-btn t-btn-blue" href="{{ route('admin.room_features') }}">Add New</a>
                </div>

                <div class="table-responsive">
                    <table id="roomFeaturesTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $roomFeature)
                                <tr>
                                    <td>{{ $roomFeature->id }}</td>
                                    <td>{{ $roomFeature->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('admin.roomFeature.edit', $roomFeature->id) }}">
                                            <img src="{{ asset('assets/images/bx-pencil.png') }}" width="30" height="20">
                                        </a>
                                        <form id="deleteForm{{ $roomFeature->id }}"
                                            action="{{ route('admin.roomFeature.destroy', $roomFeature->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $roomFeature->id }})">
                                                <img src="{{ asset('assets/images/delete.png') }}" width="30" height="20">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#roomFeaturesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
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

    function confirmDelete(id) {
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
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }
</script>
@endsection
