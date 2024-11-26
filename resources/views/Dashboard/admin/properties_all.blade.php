@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active svg path {
        fill: #414141 !important;
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


#propertiesTable_wrapper .dt-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
}

#propertiesTable_wrapper .dt-search {
    margin-bottom: 15px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}

#propertiesTable_wrapper .dt-search input#dt-search-0 {
    width: 50%;
    border-radius: 10px;
    border: 2px solid #80808075;
    color: #000;
}

#propertiesTable_wrapper .dt-search label {
    font-weight: 600;
}


#propertiesTable_info {
    margin-top: 10px;
    font-weight: 600;
    color: #00000094;
    width: 100%;
    text-align: end;
}

#propertiesTable_wrapper .dt-paging {
    width: 100%;
    text-align: end;
    margin-top: 10px;
}

#propertiesTable_wrapper .dt-paging nav {
    display: flex;
    justify-content: flex-end;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}

#propertiesTable_wrapper .dt-paging nav button {
    border-radius: 10px;
    color: #fff !important;
    font-weight: 500;
    background: #0077B6;
}

a.Delet-btn.dan img {
    height: 25px;
    width: 25px;
    object-fit: contain;
}



</style>
@section('content')
    <div class="tab-content">
        <div class="profile-basic-info-form">
            <div class="box-inline">
                <h3>List of All Properties</h3>

            </div>
        </div>
        <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
            <div class="table-responsive">

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
                                            <a href="{{ route('admin.propertiesdetails', $property->id) }}"
                                                class="btn btn-primary btn-sm">Details</a>
                                        @else
                                            <a href="#" class="Delet-btn dan" data-id="{{ $property->id }}"
                                                onclick="deleteProperty(this)">
                                                <img src="{{ asset('assets/images/delete.png') }}" width="40" height="30" style="background-color: red;">
                                            </a>
                                            <a href="{{ route('admin.properties.approve', $property->id) }}"
                                                class="btn btn-success btn-sm">Approve</a>
                                            <a href="{{ route('admin.propertiesdetails', $property->id) }}"
                                                class="btn btn-primary btn-sm">Details</a>
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
