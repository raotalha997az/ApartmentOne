    @extends('Dashboard.Layouts.master_dashboard')
    <style>
        .dashboard-main .left-panel .left-panel-menu ul li a.testimonial-active {
            background-color: white;
            color: #414141;
        }

        .dashboard-main .left-panel .left-panel-menu ul li a.testimonial-active svg path {
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

        div.dt-container .dt-paging .dt-paging-button.disabled,
        div.dt-container .dt-paging .dt-paging-button.disabled:hover,
        div.dt-container .dt-paging .dt-paging-button.disabled:active {
            color: #fff !important;
        }

        div.dt-container .dt-paging .dt-paging-button {
            color: #fff !important;
        }

        div.dt-container .dt-paging .dt-paging-button.current,
        div.dt-container .dt-paging .dt-paging-button.current:hover {
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

                        <h3>Testimonial</h3>
                        <a href="#" class="t-btn t-btn-blue" data-bs-toggle="modal"
                            data-bs-target="#TestimonialModal">
                            <i class="fa fa-plus"></i> Add Testimonial
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="TestimonialTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Testimonial</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonals as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->testimonial }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#TestimonialModal1" data-id="{{ $testimonial->id }}"
                                                data-name="{{ $testimonial->name }}"
                                                data-testimonial="{{ $testimonial->testimonial }}" id="editButton"> <img
                                                    src="{{ asset('assets/images/bx-pencil.png') }}" width="30"
                                                    height="20"></a>
                                            <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete(event, this)"> <img
                                                        src="{{ asset('assets/images/delete.png') }}" width="30"
                                                        height="20"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="TestimonialModal" tabindex="-1" aria-labelledby="TestimonialModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TestimonialModalLabel">Add or Edit Testimonial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Add action and method to form -->
                            <form id="testimonialForm" action="{{ route('admin.testimonial.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="testimonial_id" id="testimonial_id" value="">
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control" id="client_name"
                                        placeholder="Enter client name" value="{{ old('client_name') }}">
                                    @error('client_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="testimonial" class="form-label">Testimonial</label>
                                    <textarea name="testimonial" class="form-control" id="testimonial" placeholder="Enter testimonial">{{ old('testimonial') }}</textarea>
                                    @error('testimonial')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" id="submitButton">Add Testimonial</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{-- edit model --}}

            <div class="modal fade" id="TestimonialModal1" tabindex="-1" aria-labelledby="TestimonialModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TestimonialModalLabel">Add or Edit Testimonial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Add action and method to form -->
                            <form id="testimonialForm_edit" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="testimonial_id" id="testimonial_id_edit" value="">
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control" id="client_name_edit"
                                        placeholder="Enter client name" value="{{ old('client_name') }}">
                                    @error('client_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="testimonial" class="form-label">Testimonial</label>
                                    <textarea name="testimonial" class="form-control" id="testimonial_edit" placeholder="Enter testimonial">{{ old('testimonial') }}</textarea>
                                    @error('testimonial')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" id="submitButton_update">Update
                                    Testimonial</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endsection
        @section('scripts')
            <script>
                $(document).ready(function() {
                    // Initialize DataTable with buttons
                    $('#TestimonialTable').DataTable({
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

                function confirmDelete(event, button) {
                    event.preventDefault(); // Prevent default form submission

                    // Show SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If confirmed, use AJAX to handle the delete operation
                            let form = button.closest('form');
                            let action = form.getAttribute('action'); // Get the form action URL

                            $.ajax({
                                url: action,
                                type: 'POST',
                                data: $(form).serialize(), // Serialize form data
                                success: function(response) {
                                    // Show success SweetAlert after deletion
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'The testimonial has been deleted.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Reload the page to update the table
                                        location.reload();
                                    });
                                },
                                error: function(xhr) {
                                    // Show error SweetAlert if something goes wrong
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Something went wrong while deleting the testimonial.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            });
                        }
                    });
                }



                var testimonialModal = document.getElementById('TestimonialModal1');

                testimonialModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var testimonialId = button.getAttribute('data-id'); // Get testimonial ID from data attribute

                    // Make an AJAX request to fetch the testimonial data by ID
                    fetch("{{ url('admin/testimonials') }}/" + testimonialId + "/edit")
                        .then(response => response.json())
                        .then(data => {
                            // Populate form fields with data from the response
                            document.getElementById('testimonial_id_edit').value = data.id;
                            document.getElementById('client_name_edit').value = data.name;
                            document.getElementById('testimonial_edit').value = data.testimonial;

                            // Update form action to use the correct PUT method for updating
                            document.getElementById('testimonialForm_edit').action =
                                "{{ url('admin/testimonials') }}/" + data.id;

                            // Change the submit button text to 'Update Testimonial'
                            document.getElementById('submitButton_update').textContent = 'Update Testimonial';
                        })
                        .catch(error => {
                            console.error('Error fetching testimonial data:', error);
                        });
                });

                $(document).ready(function() {
                    // Handle Add Testimonial Form Submission
                    $('#testimonialForm').on('submit', function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                // Show success notification
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Testimonial added successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    // Close modal and reload table
                                    $('#TestimonialModal').modal('hide');
                                    location.reload();
                                });
                            },
                            error: function(response) {
                                // Display validation errors in the modal
                                const errors = response.responseJSON.errors;
                                displayErrors('#TestimonialModal', errors);
                            }
                        });
                    });

                    // Handle Edit Testimonial Form Submission
                    $('#testimonialForm_edit').on('submit', function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                // Show success notification
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Testimonial updated successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    // Close modal and reload table
                                    $('#TestimonialModal1').modal('hide');
                                    location.reload();
                                });
                            },
                            error: function(response) {
                                // Display validation errors in the modal
                                const errors = response.responseJSON.errors;
                                displayErrors('#TestimonialModal1', errors);
                            }
                        });
                    });

                    // Helper function to display errors in the modal
                    function displayErrors(modalSelector, errors) {
                        $(modalSelector + ' .alert-danger').remove(); // Remove any existing error messages
                        for (const field in errors) {
                            errors[field].forEach(message => {
                                const errorElement = `
                    <div class="alert alert-danger">${message}</div>
                `;
                                $(`${modalSelector} [name=${field}]`).closest('.mb-3').append(errorElement);
                            });
                        }
                    }
                });
            </script>
        @endsection
