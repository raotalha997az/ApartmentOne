@extends('Dashboard.Layouts.master_dashboard')

<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.pet {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.pet svg path {
        fill: #414141 !important;
    }

    table.table.table-striped {
        width: 100%;
    }

    table.table.table-striped th,
    table.table.table-striped td {
        text-align: left;
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
                    <h3>Pets</h3>
                    <a class="t-btn t-btn-blue" href="{{ route('admin.pets.create') }}">Add New</a>
                </div>

                <div class="table-responsive">
                    <table id="pettable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $pet)
                                <tr>
                                    <td>{{ $pet->id ?? '' }}</td>
                                    <td>{{ $pet->name ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.pets.edit', $pet->id) }}">
                                            <img src="{{ asset('assets/images/bx-pencil.png') }}" width="30" height="20">
                                        </a>
                                        <form id="deleteForm{{ $pet->id }}" action="{{ route('admin.pets.destroy', $pet->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pet->id }})">
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
        $('#pettable').DataTable({
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
        })
    }
</script>
@endsection
