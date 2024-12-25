@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active {
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
                    {{-- {{ route('admin.room_features') }} --}}
                    <a class="t-btn t-btn-blue-shade" href="javascript:void(0)" data-toggle="modal"
                        data-target="#add-new-room-and-feature-Modal"><svg width="20" height="21" viewBox="0 0 20 21"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.8337 9.84148H10.8337V4.84148H9.16699V9.84148H4.16699V11.5081H9.16699V16.5081H10.8337V11.5081H15.8337V9.84148Z"
                                fill="white" />
                        </svg>
                        Add New</a>
                </div>

                <div class="table-responsive">
                    <table id="roomFeaturesTable" class="table table-striped mb-3">
                        <thead>
                            <tr>
                                {{-- <th>Id</th> --}}
                                <th>Rooms & Features</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $roomFeature)
                                <tr>
                                    {{-- <td>{{ $roomFeature->id }}</td> --}}
                                    <td>{{ $roomFeature->name }}</td>
                                    <td>
                                        <div class="property-action-buttons">

                                            <a class="btn-primary rooms-feature-edit-modal"
                                                href=" {{ route('admin.roomFeature.edit', $roomFeature->id) }}">


                                                {{-- <img src="{{ asset('assets/images/bx-pencil.png') }}" width="30" height="20"> --}}
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.871 6.1675C16.186 5.8525 16.3593 5.43416 16.3593 4.98916C16.3593 4.54416 16.186 4.12583 15.871 3.81083L14.5493 2.48916C14.2343 2.17416 13.816 2.00083 13.371 2.00083C12.926 2.00083 12.5077 2.17416 12.1935 2.48833L3.3335 11.3208V15H7.011L15.871 6.1675ZM13.371 3.6675L14.6935 4.98833L13.3685 6.30833L12.0468 4.9875L13.371 3.6675ZM5.00016 13.3333V12.0125L10.8668 6.16416L12.1885 7.48583L6.32266 13.3333H5.00016ZM3.3335 16.6667H16.6668V18.3333H3.3335V16.6667Z"
                                                        fill="#0077B6"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <form id="deleteForm{{ $roomFeature->id }}"
                                                action="{{ route('admin.roomFeature.destroy', $roomFeature->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="Delet-btn"
                                                    onclick="confirmDelete({{ $roomFeature->id }})">
                                                    {{-- <img src="{{ asset('assets/images/delete.png') }}" width="30" height="20"> --}}
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z"
                                                            fill="#777777"></path>
                                                        <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777">
                                                        </path>
                                                    </svg>

                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="edit-room-and-feature-Modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Room & Features</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.2868 27.99L20.0002 23.2766L24.7135 27.99L27.0702 25.6333L22.3568 20.92L27.0702 16.2066L24.7135 13.85L20.0002 18.5633L15.2868 13.85L12.9302 16.2066L17.6435 20.92L12.9302 25.6333L15.2868 27.99Z"
                                fill="#777777" />
                            <path
                                d="M20.0002 37.5866C29.1902 37.5866 36.6668 30.11 36.6668 20.92C36.6668 11.73 29.1902 4.2533 20.0002 4.2533C10.8102 4.2533 3.3335 11.73 3.3335 20.92C3.3335 30.11 10.8102 37.5866 20.0002 37.5866ZM20.0002 7.58663C27.3518 7.58663 33.3335 13.5683 33.3335 20.92C33.3335 28.2716 27.3518 34.2533 20.0002 34.2533C12.6485 34.2533 6.66683 28.2716 6.66683 20.92C6.66683 13.5683 12.6485 7.58663 20.0002 7.58663Z"
                                fill="#777777" />
                        </svg>

                    </button>
                </div>
                <form id="itemForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="featureid">
                        <input type="text" placeholder="Bedrooms" name="room_features" id="room_features">
                        @error('room_features')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="two-things-align">
                        <button type="submit" class="t-btn-blue-shade"><svg width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0119C17.3244 16.6993 17.5 16.2754 17.5 15.8333V6.66668C17.5006 6.55701 17.4796 6.44829 17.4381 6.34676C17.3967 6.24523 17.3356 6.15288 17.2583 6.07501L13.925 2.74168C13.8471 2.66445 13.7548 2.60334 13.6533 2.56187C13.5517 2.5204 13.443 2.49938 13.3333 2.50001H4.16667C3.72464 2.50001 3.30072 2.67561 2.98816 2.98817C2.67559 3.30073 2.5 3.72465 2.5 4.16668V15.8333C2.5 16.2754 2.67559 16.6993 2.98816 17.0119C3.30072 17.3244 3.72464 17.5 4.16667 17.5ZM12.5 15.8333H7.5V11.6667H12.5V15.8333ZM10.8333 5.83335H9.16667V4.16668H10.8333V5.83335ZM4.16667 4.16668H5.83333V7.50001H12.5V4.16668H12.9917L15.8333 7.00835V15.8333H14.1667V11.6667C14.1667 11.2247 13.9911 10.8007 13.6785 10.4882C13.3659 10.1756 12.942 10 12.5 10H7.5C7.05797 10 6.63405 10.1756 6.32149 10.4882C6.00893 10.8007 5.83333 11.2247 5.83333 11.6667V15.8333H4.16667V4.16668Z"
                                    fill="white" />
                            </svg>
                            Update</button>
                        <button type="button" class="modal-cancel-btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-new-room-and-feature-Modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Room & Features</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.2868 27.99L20.0002 23.2766L24.7135 27.99L27.0702 25.6333L22.3568 20.92L27.0702 16.2066L24.7135 13.85L20.0002 18.5633L15.2868 13.85L12.9302 16.2066L17.6435 20.92L12.9302 25.6333L15.2868 27.99Z"
                                fill="#777777" />
                            <path
                                d="M20.0002 37.5866C29.1902 37.5866 36.6668 30.11 36.6668 20.92C36.6668 11.73 29.1902 4.2533 20.0002 4.2533C10.8102 4.2533 3.3335 11.73 3.3335 20.92C3.3335 30.11 10.8102 37.5866 20.0002 37.5866ZM20.0002 7.58663C27.3518 7.58663 33.3335 13.5683 33.3335 20.92C33.3335 28.2716 27.3518 34.2533 20.0002 34.2533C12.6485 34.2533 6.66683 28.2716 6.66683 20.92C6.66683 13.5683 12.6485 7.58663 20.0002 7.58663Z"
                                fill="#777777" />
                        </svg>

                    </button>
                </div>
                <form id="roomFeatureForm">
                    <div class="modal-body">
                        <input type="text" placeholder="Rooms & Features" name="room_features">
                    </div>
                    <div class="two-things-align">
                        <button type="submit" class="t-btn-blue-shade"><svg width="20" height="21"
                                viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.8337 9.84148H10.8337V4.84148H9.16699V9.84148H4.16699V11.5081H9.16699V16.5081H10.8337V11.5081H15.8337V9.84148Z"
                                    fill="white" />
                            </svg>

                            Add New</button>
                        <button type="button" class="modal-cancel-btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#roomFeaturesTable').DataTable({
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

        $('#roomFeatureForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Create FormData object
            let formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Get CSRF token from meta tag
                }
            });

            $.ajax({
                url: "{{ route('admin.features.store') }}", // Adjust this to your actual route
                method: 'POST',
                data: formData,
                contentType: false, // Required for file uploads
                processData: false, // Prevent jQuery from automatically processing data
                success: function(response) {
                    toastr.success(response.message); // Show success message
                    $('#add-new-room-and-feature-Modal').modal('hide'); // Hide the modal
                    $('#roomFeatureForm')[0].reset(); // Reset the form
                    location
                        .reload(); // Reload the page (or update the category list dynamically)
                },
                error: function(xhr) {
                    // Handle validation errors
                    if (xhr.responseJSON.errors) {
                        toastr.error(Object.values(xhr.responseJSON.errors).join('<br>'));
                    } else {
                        toastr.error('An error occurred: ' + xhr.responseJSON
                            .message); // Show error toast
                    }
                }
            });
        });

        $(document).ready(function() {
            // When the "Edit" button is clicked
            $('.rooms-feature-edit-modal').on('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                // Get the URL from the link's href attribute
                var url = $(this).attr('href');

                // Make an AJAX request to fetch the category data
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        // Check if the category data is received
                        if (response.feature) {
                            console.log(response.feature);

                            // Populate the input field in the modal with the feature name
                            $('#room_features').val(response.feature.name);
                            $('#featureid').val(response.feature.id);

                            // Update the image source in the modal

                            // Show the modal
                            $('#edit-room-and-feature-Modal').modal('show');
                        } else {
                            toastr.error('feature not found');
                        }
                    },
                    error: function() {
                        toastr.error('Failed to fetch feature data');
                    }
                });
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


        function saveFeature() {
            const formData = new FormData();
            const id = $('#featureid').val();
            const name = $('#room_features').val(); // Get the category name from the input

            formData.append('name', name);
            formData.append('_token', '{{ csrf_token() }}'); // Include CSRF token
            formData.append('_method', 'PUT'); // Laravel requires this for PUT requests via AJAX

            $.ajax({
                url: `/admin/roomFeature/${id}`, // Use the category ID in the URL
                method: 'POST', // Send as POST with `_method` set to `PUT`
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success(response.message); // Show success message
                    $('#edit-room-and-feature-Modal').modal('hide'); // Hide the modal
                    // location.reload(); // Reload the page to reflect changes
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
                saveFeature(); // Call the saveCategory function
            });
        });
    </script>
@endsection
