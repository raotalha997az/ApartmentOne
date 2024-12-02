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




.drop_down_hover .drop_down_hover_content {
    display: none;
    flex-direction: column;
    align-items: stretch;
    text-align: center;
    gap: 10px;
    background: #fff;
    padding: 20px 15px;
    border-radius: 5px;
    border: 1px solid #80808030;
    position: absolute;
    z-index: 1;
    top: 100%;
    min-width: 150px;
    transition: .3s;
    left: 0;
}

.drop_down_hover {
    position: relative;
    transition: .3s;
    cursor: pointer;
    width: max-content;
}

.drop_down_hover:hover .drop_down_hover_content{
    display: flex;
    transition: .3s
}

.drop_down_hover:hover{
    width: 100%
}

.drop_down_hover_content .Delet-btn{
    background: red;
    color: #fff

}

.drop_down_hover_content .Delet-btn:hover{
    background: rgb(221, 0, 0);
    color:#fff;
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
                                    <div class="drop_down_hover" >
                                        <svg width="5" height="19" viewBox="0 0 5 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2.5" cy="2.5" r="2.5" fill="#000" />
                                            <circle cx="2.5" cy="9.5" r="2.5" fill="#000" />
                                            <circle cx="2.5" cy="16.5" r="2.5" fill="#000" />
                                        </svg>

                                        <div class="drop_down_hover_content" >
                                            @if ($property->approve == 1)
                                                <a href="{{ route('admin.propertiesdetails', $property->id) }}" class="btn btn-primary btn-sm">Details</a>
                                            @else
                                                <a href="#" class="Delet-btn btn-sm btn" data-id="{{ $property->id }}" onclick="deleteProperty(this)">
                                                    Delete
                                                </a>
                                                <a href="{{ route('admin.properties.approve', $property->id) }}" class="btn btn-success btn-sm">Approve</a>
                                                <a href="{{ route('admin.propertiesdetails', $property->id) }}" class="btn btn-primary btn-sm">Details</a>
                                            @endif

                                        </div>
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
                    fetch(`{{ route('admin.properties.delete', '') }}/${propertyId}`, { // Adjusted route
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
