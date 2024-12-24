@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active{
        background-color: rgba(250, 250, 250, 0.1);
    transition: .3s;
    border-left: 5px solid #fff;
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

                    {{-- <h3>Category</h3> --}}
                    {{-- <a class="t-btn t-btn-blue" href="#">Add New</a> --}}
                    <a href="#" class="t-btn t-btn-blue-shade" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                    {{-- <a class="t-btn t-btn-blue" href="{{ route('admin.pets.create') }}">Add New</a> --}}
                </div>
                    <table id="categoryTable" class="table table-striped">
                        <thead>
                            <tr>
                                {{-- <th>Id</th> --}}
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                            {{-- {{ dd($category) }} --}}
                                <tr>
                                    {{-- <td>{{ $category->id ?? '' }}</td> --}}
                                    <td>{{ $category->name ?? '' }}</td>
                                    <td><img src="{{ asset( ($category->image ?? 'default.png')) }}" alt="" height="50px" width="50px"></td>
                                    <td>
                                        <div class="property-action-buttons">

                                        <a class="btn-primary category-edit-modal" href="{{ route('admin.category.edit', $category->id) }}">
                                            {{-- <img src="{{ asset('assets/images/bx-pencil.png') }}" width="30" height="20"> --}}
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.871 6.1675C16.186 5.8525 16.3593 5.43416 16.3593 4.98916C16.3593 4.54416 16.186 4.12583 15.871 3.81083L14.5493 2.48916C14.2343 2.17416 13.816 2.00083 13.371 2.00083C12.926 2.00083 12.5077 2.17416 12.1935 2.48833L3.3335 11.3208V15H7.011L15.871 6.1675ZM13.371 3.6675L14.6935 4.98833L13.3685 6.30833L12.0468 4.9875L13.371 3.6675ZM5.00016 13.3333V12.0125L10.8668 6.16416L12.1885 7.48583L6.32266 13.3333H5.00016ZM3.3335 16.6667H16.6668V18.3333H3.3335V16.6667Z" fill="#0077B6"/>
                                                </svg>
                                            Edit
                                        </a>

                                        <form id="deleteForm-{{ $category->id }}"
                                            action="{{ route('admin.pets.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="Delet-btn" onclick="confirmDelete({{ $category->id }})">
                                                {{-- <img src="{{ asset('assets/images/delete.png') }}" width="30" height="20"> --}}
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"/>
                                                    <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"/>
                                                    </svg>

                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"><svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.2868 27.99L20.0002 23.2766L24.7135 27.99L27.0702 25.6333L22.3568 20.92L27.0702 16.2066L24.7135 13.85L20.0002 18.5633L15.2868 13.85L12.9302 16.2066L17.6435 20.92L12.9302 25.6333L15.2868 27.99Z" fill="#777777"/>
                        <path d="M20.0002 37.5866C29.1902 37.5866 36.6668 30.11 36.6668 20.92C36.6668 11.73 29.1902 4.2533 20.0002 4.2533C10.8102 4.2533 3.3335 11.73 3.3335 20.92C3.3335 30.11 10.8102 37.5866 20.0002 37.5866ZM20.0002 7.58663C27.3518 7.58663 33.3335 13.5683 33.3335 20.92C33.3335 28.2716 27.3518 34.2533 20.0002 34.2533C12.6485 34.2533 6.66683 28.2716 6.66683 20.92C6.66683 13.5683 12.6485 7.58663 20.0002 7.58663Z" fill="#777777"/>
                        </svg>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm" enctype="multipart/form-data">


                        <div class="mb-3">
                            {{-- <label for="category-image" class="form-label">Category Image</label> --}}
                            {{-- <input put type="file" name="image" class="form-control" id="category-image"> --}}
                            <div class="upload-container" id="uploadBox">
                                <div class="upload-text" id="uploadText">
                                  <img src="{{ asset('assets/new-images/bx-cloud-upload.svg.png') }}" alt="upload icon" width="50">
                                </div>
                                <img id="previewImage" alt="Preview">
                                <button class="cancel-button" id="cancelButton">&times;</button>
                                <input type="file" id="fileInput" style="display: none;" name="image">
                              </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            {{-- <label for="new-category" class="form-label">Category Name</label> --}}
                            <input type="text" name="name" class="form-control" id="new-category"
                                placeholder="Enter category name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <button type="submit" class="btn t-btn-blue-shade"><i class="fa fa-plus"></i> Add Category</button>
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
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.2868 27.99L20.0002 23.2766L24.7135 27.99L27.0702 25.6333L22.3568 20.92L27.0702 16.2066L24.7135 13.85L20.0002 18.5633L15.2868 13.85L12.9302 16.2066L17.6435 20.92L12.9302 25.6333L15.2868 27.99Z" fill="#777777"/>
                            <path d="M20.0002 37.5866C29.1902 37.5866 36.6668 30.11 36.6668 20.92C36.6668 11.73 29.1902 4.2533 20.0002 4.2533C10.8102 4.2533 3.3335 11.73 3.3335 20.92C3.3335 30.11 10.8102 37.5866 20.0002 37.5866ZM20.0002 7.58663C27.3518 7.58663 33.3335 13.5683 33.3335 20.92C33.3335 28.2716 27.3518 34.2533 20.0002 34.2533C12.6485 34.2533 6.66683 28.2716 6.66683 20.92C6.66683 13.5683 12.6485 7.58663 20.0002 7.58663Z" fill="#777777"/>
                            </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="itemForm" enctype="multipart/form-data">

                        <div class="mb-3">
                            <div class="upload-container" id="uploadBox">
                                <div class="upload-text" id="uploadText">
                                  <img src="{{ asset('assets/new-images/bx-cloud-upload.svg.png') }}" alt="upload icon" width="50">
                                </div>
                                <img id="previewImage" alt="Preview">
                                <button class="cancel-button" id="cancelButton">&times;</button>
                                <input type="file" id="fileInput" style="display: none;" name="image">
                              </div>
                              @error('image')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mb-3">
                            {{-- <label for="new-item" class="form-label">Category Name</label> --}}
                            <input type="text" class="form-control" id="new-item" placeholder="Enter Category name"
                                name="name">
                            <input type="hidden" id="catId" name="category_id">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3 update-category-old-image">
                            <label for="old-image" class="form-label">Old Category Image</label>
                            <img src="" alt="Old Category Image" id="old-image" height="50px" width="50px">
                        </div>
                        <div class="mb-3">
                            {{-- <label for="image" class="form-label">Category Image</label> --}}
                            {{-- <input type="file" class="form-control" id="image" name="image"> --}}
                        </div>


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
                event.preventDefault(); // Prevent the default form submission

                // Create FormData object
                let formData = new FormData(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Get CSRF token from meta tag
                    }
                });

                $.ajax({
                    url: "{{ route('admin.category.store') }}", // Adjust this to your actual route
                    method: 'POST',
                    data: formData,
                    contentType: false, // Required for file uploads
                    processData: false, // Prevent jQuery from automatically processing data
                    success: function(response) {
                        toastr.success(response.message); // Show success message
                        $('#categoryModal').modal('hide'); // Hide the modal
                        $('#categoryForm')[0].reset(); // Reset the form
                        location.reload(); // Reload the page (or update the category list dynamically)
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        if (xhr.responseJSON.errors) {
                            toastr.error(Object.values(xhr.responseJSON.errors).join('<br>'));
                        } else {
                            toastr.error('An error occurred: ' + xhr.responseJSON.message); // Show error toast
                        }
                    }
                });
            });


        });
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
    $('.category-edit-modal').on('click', function(event) {
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
                    console.log(response.category);

                    // Populate the input field in the modal with the category name
                    $('#new-item').val(response.category.name);
                    $('#catId').val(response.category.id);

                    // Update the image source in the modal
                    if (response.category.image_url) {
                        $('#old-image').attr('src', response.category.image_url);
                    } else {
                        $('#old-image').attr('src', ''); // Clear image if none exists
                    }

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
    const formData = new FormData();
    const id = $('#catId').val(); // Get the category ID from the modal
    const name = $('#new-item').val(); // Get the category name from the input
    const image = $('#image')[0].files[0]; // Use the correct id for the file input

    formData.append('name', name);
    if (image) {
        formData.append('image', image); // Only append if an image is selected
    }
    formData.append('_token', '{{ csrf_token() }}'); // Include CSRF token
    formData.append('_method', 'PUT'); // Laravel requires this for PUT requests via AJAX

    $.ajax({
        url: `/admin/category/${id}`, // Use the category ID in the URL
        method: 'POST', // Send as POST with `_method` set to `PUT`
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            toastr.success(response.message); // Show success message
            $('#itemModal').modal('hide'); // Hide the modal
            location.reload(); // Reload the page to reflect changes
        },
        error: function(xhr) {
            const errors = xhr.responseJSON.errors;
            if (errors) {
                for (let key in errors) {
                    toastr.error(errors[key][0]); // Display each validation error
                }
            } else {
                toastr.error('An error occurred: ' + xhr.responseJSON.message); // Show error toast
            }
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
