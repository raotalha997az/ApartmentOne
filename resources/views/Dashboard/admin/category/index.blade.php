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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        {{-- <label for="category">Category</label> --}}
                        <!-- Button to trigger the modal -->
                        <button type="button" id="create-category" class="fa fa-plus btn btn-primary btn-sm px-3 py-2"
                            style="white-space: nowrap" data-bs-toggle="modal" data-bs-target="#categoryModal">Add
                            Category</button>
                    </div>
                    {{-- <a class="t-btn t-btn-blue" href="{{ route('admin.pets.create') }}">Add New</a> --}}
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>

                    @foreach ($categorys as $category)
                        {{-- <tr>
                            <td>{{ $category->id ?? '' }}</td>
                            <td>{{ $category->name ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('admin.pets.edit', $category->id) }}">Edit</a>
                                <form id="deleteForm" action="{{ route('admin.pets.destroy', $category->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr> --}}
                        <tr>
                            <td>{{ $category->id ?? '' }}</td>
                            <td>{{ $category->name ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                                <form id="deleteForm-{{ $category->id }}" action="{{ route('admin.pets.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $category->id }})">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </table>
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
                            <input type="text" class="form-control" id="new-category" placeholder="Enter category name"
                                required>
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
                                required >
                                <input type="hidden" id="catId" name="category_id">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

   $(document).ready(function() {
    // When the "Add Category" button is clicked, open the modal
    $('#create-category').on('click', function() {
        $('#categoryModal').modal('show');
    });
});



    $(document).ready(function() {
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
                    // Optionally, refresh the list of categories on the page
                },
                error: function(xhr) {
                    // alert('An error occurred: ' + xhr.responseJSON.message);
                    toastr.error('An error occurred: ' + xhr.responseJSON.message); // Show error toast
                }
            });
        });
    });

    function confirmDelete(categoryId) {
    if (confirm("Are you sure you want to delete this category?")) {
        $.ajax({
            url: `/admin/category/${categoryId}`, // URL to delete the category
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}' // CSRF token for Laravel
            },
            success: function(response) {
                toastr.success(response.message); // Display success message
                // Remove the row from the table
                $(`#deleteForm-${categoryId}`).closest('tr').remove();
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message || 'Failed to delete category'); // Display error message
            }
        });
    }
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
