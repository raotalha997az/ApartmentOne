@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.category {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.category svg path {
        fill: #414141 !important;
    }

    table.table.table-striped {
        width: 100%;
    }

    table.table.table-striped tabel {
        width: 100% !important;
    }

    table.table.table-striped th,
    table.table.table-striped td {
        width: 30% !important;
        text-align: left;
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

div.dt-container .dt-paging .dt-paging-button.disabled, div.dt-container .dt-paging .dt-paging-button.disabled:hover, div.dt-container .dt-paging .dt-paging-button.disabled:active {
    color: #fff !important;
}

div.dt-container .dt-paging .dt-paging-button {
    color: #fff !important;
}

div.dt-container .dt-paging .dt-paging-button.current, div.dt-container .dt-paging .dt-paging-button.current:hover {
    color: #fff !important;
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

                    <h3>Category</h3>
                    {{-- <a class="t-btn t-btn-blue" href="#">Add New</a> --}}
                    <a href="#" class="t-btn t-btn-blue" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fa fa-plus"></i> Add Category
                    </a>
                    {{-- <a class="t-btn t-btn-blue" href="{{ route('admin.pets.create') }}">Add New</a> --}}
                </div>
                <div class="table-responsive">
                    <table id="categoryTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                                <tr>
                                    <td>{{ $category->id ?? '' }}</td>
                                    <td>{{ $category->name ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.category.edit', $category->id) }}">
                                            <img src="{{ asset('assets/images/bx-pencil.png') }}" width="30" height="20">
                                        </a>
                                        <form id="deleteForm-{{ $category->id }}"
                                            action="{{ route('admin.pets.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $category->id }})">
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
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <div class="mb-3">
                            <label for="new-category" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="new-category"
                                placeholder="Enter category name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="itemForm">
                        <div class="mb-3">
                            <label for="new-item" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="new-item" placeholder="Enter Category name"
                                name="name">
                            <input type="hidden" id="catId" name="category_id">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
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
            // When the "Add Category" button is clicked, open the modal
            $('#create-category').on('click', function() {
                $('#categoryModal').modal('show');
            });
            $('#categoryForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting traditionally

                let categoryName = $('#new-category').val();

                $.ajax({
                    url: "{{ route('admin.category.store') }}", // Laravel route URL
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        name: categoryName
                    },
                    success: function(response) {
                        // alert(response.message); // Show success
                        toastr.success(response.message);
                        $('#categoryModal').modal('hide'); // Hide the modal
                        $('#categoryForm')[0].reset(); // Reset the form
                        location.reload();
                        // Optionally, refresh the list of categories on the page
                    },
                    error: function(xhr) {
                        // alert('An error occurred: ' + xhr.responseJSON.message);
                        toastr.error('An error occurred: ' + xhr.responseJSON
                            .message); // Show error toast
                    }
                });
            });
        });

        // function confirmDelete(categoryId) {
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: `/admin/category/${categoryId}`, // URL to delete the category
        //                 type: 'DELETE',
        //                 data: {
        //                     _token: '{{ csrf_token() }}' // CSRF token for Laravel
        //                 },
        //                 success: function(response) {
        //                     toastr.success(response.message); // Display success message
        //                     // Remove the row from the table
        //                     $(`#deleteForm-${categoryId}`).closest('tr').remove();
        //                     location.reload();
        //                 },
        //                 error: function(xhr) {
        //                     toastr.error(xhr.responseJSON.message ||
        //                         'Failed to delete category'); // Display error message
        //                 }
        //             });
        //         }
        //     });
        // }
        function confirmDelete(categoryId) {
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
                    $.ajax({
                        url: `/admin/category/${categoryId}`, // URL to delete the category
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // CSRF token for Laravel
                        },
                        success: function(response) {
                            if (response.error) {
                                // Display SweetAlert with the error message
                                Swal.fire({
                                    title: 'Cannot Delete',
                                    text: response.error,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            } else {
                                // Display success message and reload the page
                                toastr.success(response.message);
                                $(`#deleteForm-${categoryId}`).closest('tr').remove();
                                location.reload();
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error',
                                text: xhr.responseJSON.message || 'Failed to delete category',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }


        $(document).ready(function() {
            // When the "Edit" button is clicked
            $('.btn-success').on('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                // Get the URL from the link's href attribute
                var url = $(this).attr('href');

                // Make an AJAX request to fetch the category data
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        // Check if the category data is received
                        if (response.category) {
                            // Populate the input field in the modal with the category name
                            $('#new-item').val(response.category.name);
                            $('#catId').val(response.category.id);

                            // Show the modal
                            $('#itemModal').modal('show');
                        } else {
                            toastr.error('Category not found');
                        }
                    },
                    error: function() {
                        toastr.error('Failed to fetch category data');
                    }
                });
            });
        });

        function saveCategory() {
            const id = $('#catId').val(); // Get the category ID from the modal
            const name = $('#new-item').val(); // Get the category name from the input

            $.ajax({
                url: `/admin/category/${id}`, // Use the category ID in the URL
                method: 'POST', // Use PUT method for updates
                data: {
                    name: name,
                    '_token': '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    toastr.success(response.message); // Show success message
                    $('#itemModal').modal('hide'); // Hide the modal
                    location.reload();
                    // Optionally, refresh the list of categories on the page
                },
                error: function(xhr) {
                    toastr.error('An error occurred: ' + xhr.responseJSON.message); // Show error toast
                }
            });
        }

        // Update the event handler for the item form submission
        $(document).ready(function() {
            $('#itemForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                saveCategory(); // Call the saveCategory function
            });
        });
    </script>
@endsection
