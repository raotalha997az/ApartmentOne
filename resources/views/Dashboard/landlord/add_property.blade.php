        @extends('Dashboard.Layouts.master_dashboard')
        @section('content')
            <style>
                /* Optional: some basic styling for the select box */
                .select2-container {
                    width: 100% !important;
                    /* Make Select2 full width */
                }
            </style>
            <div class="add-property-form-sec">
                <div class="row">
                    <div class="col-md-12">
                        <form id="uploadForm" action="{{ route('landlord.store_property') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <p>Minimum 10 images, Maximum 50 images</p>
                            <div class="main-file-upload-box">

                                <div id="imageContainer"><label for="fileInput"> <img
                                            src="{{ asset('assets/images/file-upload-img.png') }}" alt=""></label>
                                    <input type="file" id="fileInput" accept="image/*" multiple name="images[]">
                                </div>
                            </div>

                            <div class="many-forms-fields-box">
                                <div class="input-box">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="Type Here" name="name">
                                </div>
                                <div class="input-box">
                                    <label for="address">Address</label>
                                    <input type="text" placeholder="address" name="address" required>
                                </div>
                                <div class="input-box simple-select">
                                    @if (Auth::user()->hasRole('admin'))
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <label for="category">Category</label>
                                        <!-- Button to trigger the modal -->
                                        <button type="button" id="create-category"
                                        class="fa fa-plus btn btn-primary btn-sm px-3 py-2" style="white-space: nowrap"
                                        data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
                                    </div>
                                    @endif
                                    <select name="category" id="category" placeholder="Type Here">
                                        <!-- Categories will be appended here -->
                                        <option disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-box progress-bar">

                                    <div class="progress-container">
                                        <input type="range" id="progressInput" min="10" max="2500"
                                            value="10" step="10">
                                    </div>
                                    <div class="numbers-main-bb">
                                        <input type="number" id="numberInput1" class="number-input" value="10"
                                            min="10" max="500" step="10">
                                        <input type="number" id="numberInput2" class="number-input" value="500"
                                            min="500" max="1000" step="10">
                                        <input type="number" id="numberInput3" class="number-input" value="1000"
                                            min="1000" max="1500" step="10">
                                        <input type="number" id="numberInput4" class="number-input" value="1500"
                                            min="1500" max="2000" step="10">
                                        <input type="number" id="numberInput5" class="number-input" value="2000"
                                            min="2000" max="2500" step="10">
                                    </div>
                                    <div class="progress-number" id="progressNumber"></div>
                                    <!-- Hidden input to hold the credit_point value -->
                                    <input type="hidden" name="credit_point" id="credit_point">


                                </div>

                                <!-- Rooms & Features Section -->
                                <div class="many-check-box">
                                    <p>Rooms & Features</p>

                                    @foreach ($features as $feature)
                                        <div class="paren-check-box">
                                            <input type="checkbox" id="feature-{{ $feature->id }}" name="features[]"
                                                value="{{ $feature->id }}"
                                                onchange="toggleQuantityInput(this, '{{ $feature->id }}')">
                                            <label for="feature-{{ $feature->id }}">{{ $feature->name }}</label>

                                        </div>
                                        <div class="row"><input type="number" id="quantity-{{ $feature->id }}"
                                                name="quantities[{{ $feature->id }}]" style="display: none;"
                                                placeholder="Quantity" min="1"></div>
                                    @endforeach

                                </div>

                                <!-- Allowed Pets Section -->
                                <div class="input-box mt-3">
                                    <label for="pets">Allowed Pets</label>
                                    <select class="js-example-basic-multiple" multiple="multiple" style="width: 300px;"
                                        name="pets[]">
                                        @foreach ($pets as $pet)
                                            <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Rent To Who Section -->
                                <div class="many-check-box mt-3">
                                    <label for="rent_whos">Rent to Who</label>
                                    <div class="paren-check-box">
                                        @foreach ($rentWhos as $rentWho)
                                            <input type="checkbox" id="rentWho-{{ $rentWho->id }}" name="rent_whos[]"
                                                value="{{ $rentWho->id }}" class="mt-3">
                                            <label for="rentWho-{{ $rentWho->id }}"
                                                class="mt-3">{{ $rentWho->name }}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="input-box textarea">
                                    <label for="other_details">Other Details</label>
                                    <textarea placeholder="Type Here" name="other_details"></textarea>
                                </div>

                                <div class="input-box simple-select">
                                    <label for="availability">Availability</label>
                                    <select name="availability" id="availability" placeholder="Type Here">
                                        <option value="0">Booked</option>
                                        <option value="1">Available</option>
                                    </select>
                                </div>

                                <div class="input-box simple-select">
                                    <label for="price">Price/Rent</label>
                                    <input type="text" placeholder="price" name="price" id="price">
                                </div>

                                <div class="two-btn-inline">
                                    <button type="button" class="t-btn" id="saveChangesBtn">Save Changes</button>
                                    <button class="t-btn t-btn-gray"> Discard</button>
                                </div>

                            </div>
                        </form>
                        <!-- Modal for adding a new category -->
                        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="categoryForm">
                                            <div class="mb-3">
                                                <label for="new-category" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="new-category"
                                                    placeholder="Enter category name" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add Category</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Load jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });

                $(".js-example-basic-multiple").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".js-example-placeholder-multiple").select2({
                    placeholder: "Select a state"
                });
            </script>



            <script>
                const progressInput = document.getElementById('progressInput');
                const progressNumber = document.getElementById('progressNumber');

                // Individual input boxes
                const numberInput1 = document.getElementById('numberInput1');
                const numberInput2 = document.getElementById('numberInput2');
                const numberInput3 = document.getElementById('numberInput3');
                const numberInput4 = document.getElementById('numberInput4');
                const numberInput5 = document.getElementById('numberInput5');

                // Listen to slider changes and update corresponding number inputs
                progressInput.addEventListener('input', function() {
                    const progress = parseInt(progressInput.value);
                    updateProgress(progress);
                    changeBarColor(progressInput.value);
                    changeInputColors(progress); // Change input box colors
                });

                // Listen to number input changes to update progress bar
                numberInput1.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    if (value >= 10 && value < 500) {
                        progressInput.value = value;
                        updateProgress(value);
                    }
                });

                numberInput2.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    if (value >= 500 && value < 1000) {
                        progressInput.value = value;
                        updateProgress(value);
                    }
                });

                numberInput3.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    if (value >= 1000 && value < 1500) {
                        progressInput.value = value;
                        updateProgress(value);
                    }
                });

                numberInput4.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    if (value >= 1500 && value < 2000) {
                        progressInput.value = value;
                        updateProgress(value);
                    }
                });

                numberInput5.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    if (value >= 2000) {
                        progressInput.value = value;
                        updateProgress(value);
                    }
                });

                // Function to update the progress and which number input is active
                function updateProgress(value) {
                    progressNumber.innerText = value;

                    // Update number inputs based on the current progress value
                    if (value >= 10 && value < 500) {
                        numberInput1.value = value;
                    } else if (value >= 500 && value < 1000) {
                        numberInput2.value = value;
                    } else if (value >= 1000 && value < 1500) {
                        numberInput3.value = value;
                    } else if (value >= 1500 && value < 2000) {
                        numberInput4.value = value;
                    } else if (value >= 2000) {
                        numberInput5.value = value;
                    }
                }

                // Change the color of the progress bar based on the value
                function changeBarColor(value) {
                    const maxValue = parseInt(progressInput.max);
                    const percentage = (value / maxValue) * 100;

                    // Set a color based on the percentage
                    if (percentage <= 50) {
                        progressInput.style.background = `linear-gradient(90deg, #0077B6 ${percentage}%, #f3f3f3 ${percentage}%)`;
                    } else {
                        progressInput.style.background = `linear-gradient(90deg, #0077B6 ${percentage}%, #f3f3f3 ${percentage}%)`;
                    }
                }

                // Change the background color of the input box corresponding to the progress value
                function changeInputColors(value) {
                    // Reset background color of all input boxes
                    resetInputs();

                    // Change color based on the progress value
                    if (value >= 10 && value < 500) {
                        numberInput1.style.backgroundColor = '#0077B6'; // Change color for 10-500 range
                    } else if (value >= 500 && value < 1000) {
                        numberInput2.style.backgroundColor = '#0077B6'; // Change color for 500-1000 range
                    } else if (value >= 1000 && value < 1500) {
                        numberInput3.style.backgroundColor = '#0077B6'; // Change color for 1000-1500 range
                    } else if (value >= 1500 && value < 2000) {
                        numberInput4.style.backgroundColor = '#0077B6'; // Change color for 1500-2000 range
                    } else if (value >= 2000) {
                        numberInput5.style.backgroundColor = '#0077B6'; // Change color for 2000+ range
                    }
                }

                // Reset all number inputs to avoid multiple updates
                function resetInputs() {
                    numberInput1.style.backgroundColor = '';
                    numberInput2.style.backgroundColor = '';
                    numberInput3.style.backgroundColor = '';
                    numberInput4.style.backgroundColor = '';
                    numberInput5.style.backgroundColor = '';
                }

                // Start progress on click (demo)
                function startProgress() {
                    const intervals = [10, 500, 1000, 1500, 2000]; // The progress increments
                    let index = 0;

                    const progressInterval = setInterval(() => {
                        if (index < intervals.length) {
                            const progress = intervals[index];
                            progressInput.value = progress;
                            updateProgress(progress);
                            changeBarColor(progress);
                            changeInputColors(progress); // Update input box colors
                            index++;
                        } else {
                            clearInterval(progressInterval); // Stop when all increments are done
                        }
                    }, 1000); // Update every second
                }
            </script>

            <script>
                const fileInput = document.getElementById('fileInput');
                const imageContainer = document.getElementById('imageContainer');
                let selectedImages = [];

                fileInput.addEventListener('change', (event) => {
                    const files = Array.from(event.target.files);

                    if (selectedImages.length + files.length > 3) {
                        alert("You can only upload a maximum of 50 images.");
                        return;
                    }

                    files.forEach(file => {
                        if (file.type.startsWith('image/')) {
                            if (selectedImages.length < 50) {
                                selectedImages.push(file);
                                displayImage(file);
                            }
                        } else {
                            alert("Only image files are allowed.");
                        }
                    });

                    checkImageCount();
                });

                function displayImage(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imagePreview = document.createElement('div');
                        imagePreview.classList.add('image-preview');

                        const img = document.createElement('img');
                        img.src = e.target.result;

                        const closeButton = document.createElement('button');
                        closeButton.classList.add('close-btn');
                        closeButton.innerHTML = 'X';
                        closeButton.onclick = function() {
                            imageContainer.removeChild(imagePreview);
                            selectedImages = selectedImages.filter(img => img !== file);
                            checkImageCount();
                        };

                        imagePreview.appendChild(img);
                        imagePreview.appendChild(closeButton);
                        imageContainer.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                }

                function checkImageCount() {
                    if (selectedImages.length < 3) {
                        alert('You need to upload at least 3 images.');
                    }
                }
            </script>
            <script>
                $(document).ready(function() {
                    // Handle form submission inside the modal
                    $('#categoryForm').on('submit', function(event) {
                        event.preventDefault(); // Prevent the form from submitting normally

                        var newCategory = $('#new-category').val();
                        if (newCategory) {
                            $.ajax({
                                url: "{{ route('landlord.category.store') }}", // Update to your route
                                method: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    name: newCategory
                                },
                                success: function(response) {
                                    if (response.success) {
                                        // Add the new category to the select dropdown
                                        $('#cars').append(
                                            `<option value="${response.category.id}" selected>${response.category.name}</option>`
                                        );

                                        // Clear the input field and close the modal
                                        $('#new-category').val('');
                                        $('#categoryModal').modal('hide'); // Hide the modal
                                    } else {
                                        alert(response.message);
                                    }
                                },
                                error: function(error) {
                                    alert('Error creating category');
                                }
                            });
                        } else {
                            alert('Please enter a category name');
                        }
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#saveChangesBtn').click(function(e) {
                        e.preventDefault();

                        // Clear previous error messages
                        $('.error-message').remove();
                        $('input, select, textarea').removeClass('is-invalid');

                        // Get the value from the progressNumber element
                        var creditPoint = $('#progressNumber').text().trim();
                        $('#credit_point').val(creditPoint);

                        // Create a new FormData object
                        var formData = new FormData($('#uploadForm')[0]);

                        // Send the AJAX request
                        $.ajax({
                            url: "{{ route('landlord.store_property') }}", // Your Laravel route
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                // On success: clear the form and show a success toast
                                $('#uploadForm')[0].reset(); // Reset the form
                                // Optionally, you can use a toaster library for better UI
                                toastr.success('Property created successfully!');
                                window.location.href = "{{ route('landlord.properties') }}";
                            },
                            error: function(xhr, status, error) {
                                // On error, handle validation messages
                                var errors = xhr.responseJSON.errors;
                                if (errors) {
                                    $.each(errors, function(key, value) {
                                        // Show error messages for each field
                                        var input = $('[name="' + key + '"]');
                                        input.addClass('is-invalid');
                                        input.after('<span class="error-message text-danger">' +
                                            value[0] + '</span>');
                                    });

                                    toastr.error(
                                        'Error occurred while creating property. Please check the fields.'
                                    );
                                } else {
                                    // Handle general errors
                                    alert('Error occurred while creating property.');
                                }
                            }
                        });
                    });
                });

                function toggleQuantityInput(checkbox, featureId) {
                    const quantityInput = document.getElementById(`quantity-${featureId}`);
                    if (checkbox.checked) {
                        quantityInput.style.display = 'inline'; // Show the input field
                    } else {
                        quantityInput.style.display = 'none'; // Hide the input field
                        quantityInput.value = ''; // Reset the input value
                    }
                }
            </script>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        @endsection
