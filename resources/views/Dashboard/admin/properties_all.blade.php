@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active svg path {
        fill: #414141 !important;
    }


</style>
@section('content')

<div class="tab-content">
    <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
        <div class="table-responsive">
            {{-- <table id="propertiesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Landlord Name</th>
                        <th>Approved</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->user->name }}</td>
                        <td>
                            @if ($property->approve)
                            <span class="badge bg-success">Approved</span>
                            @else
                            <span class="badge bg-danger">Not Approved</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if ($property->approve)
                                <!-- Details Button -->
                                <a href="{{ route('admin.propertiesdetails', $property->id) }}" class="btn btn-primary btn-sm">Details</a>
                                @else
                                <!-- Delete Button -->
                                <a href="#" class="Delet-btn" data-id="{{ $property->id }}" onclick="deleteProperty(this)">
                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.00806 25.5818C7.00806 26.2448 7.27145 26.8807 7.74029 27.3496C8.20913 27.8184 8.84502 28.0818 9.50806 28.0818H22.0081C22.6711 28.0818 23.307 27.8184 23.7758 27.3496C24.2447 26.8807 24.5081 26.2448 24.5081 25.5818V10.5818H27.0081V8.08179H22.0081V5.58179C22.0081 4.91875 21.7447 4.28286 21.2758 3.81402C20.807 3.34518 20.1711 3.08179 19.5081 3.08179H12.0081C11.345 3.08179 10.7091 3.34518 10.2403 3.81402C9.77145 4.28286 9.50806 4.91875 9.50806 5.58179V8.08179H4.50806V10.5818H7.00806V25.5818ZM12.0081 5.58179H19.5081V8.08179H12.0081V5.58179ZM10.7581 10.5818H22.0081V25.5818H9.50806V10.5818H10.7581Z" fill="#FF0000" />
                                        <path d="M12.0081 13.0818H14.5081V23.0818H12.0081V13.0818ZM17.0081 13.0818H19.5081V23.0818H17.0081V13.0818Z" fill="#FF0000" />
                                    </svg>
                                </a>
                                <!-- Approve Button -->
                                <a href="{{ route('admin.properties.approve', $property->id) }}" class="btn btn-success btn-sm">Approve</a>
                                <!-- Details Button -->
                                <a href="{{ route('admin.propertiesdetails', $property->id) }}" class="btn btn-primary btn-sm">Details</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}

            <div class="export-buttons mb-3"></div>
<table id="propertiesTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Property Name</th>
            <th>Landlord Name</th>
            <th>Approved</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $property)
        <tr>
            <td>{{ $property->name }}</td>
            <td>{{ $property->user->name }}</td>
            <td>
                @if ($property->approve)
                <span class="badge bg-success">Approved</span>
                @else
                <span class="badge bg-danger">Not Approved</span>
                @endif
            </td>
            <td>
                <div class="d-flex gap-2">
                    @if ($property->approve)
                    <a href="{{ route('admin.propertiesdetails', $property->id) }}" class="btn btn-primary btn-sm">Details</a>
                    @else
                    <a href="#" class="Delet-btn" data-id="{{ $property->id }}" onclick="deleteProperty(this)">
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="..." fill="#FF0000" />
                            <path d="..." fill="#FF0000" />
                        </svg>
                    </a>
                    <a href="{{ route('admin.properties.approve', $property->id) }}" class="btn btn-success btn-sm">Approve</a>
                    <a href="{{ route('admin.propertiesdetails', $property->id) }}" class="btn btn-primary btn-sm">Details</a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
            $('#propertiesTable').DataTable({
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


    function deleteProperty(element) {
        const propertyId = element.getAttribute('data-id');

        // SweetAlert confirmation dialog
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
                // Proceed with deletion
                fetch(`{{ route('landlord.properties.delete', '') }}/${propertyId}`, { // Adjusted route
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is included
                    },
                    body: JSON.stringify({}) // If you need to send any data
                })
                .then(response => response.json())
                .then(data => {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        data.message,
                        'success'
                    ).then(() => {
                        // Reload the DataTable
                        $('#propertiesTable').DataTable().ajax.reload();
                    });
                })
                .catch(error => {
                    // Handle error response
                    Swal.fire(
                        'Error!',
                        'There was an error deleting the property.',
                        'error'
                    );
                    console.error('Error:', error);
                });
            }
        });
    }
</script>
@endsection
