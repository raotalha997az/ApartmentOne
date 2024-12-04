@extends('Dashboard.Layouts.master_dashboard')
@section('content')
    <style>
        /* Optional: some basic styling for the select box */
        .select2-container {
            width: 100% !important;
            /* Make Select2 full width */
        }

        .image-preview {
            display: inline-block;
            margin: 5px;
            position: relative;
        }

        .image-preview img {
            width: 100px;
            /* Adjust as needed */
            height: 100px;
            /* Adjust as needed */
            object-fit: cover;
        }

        .close-btn {
            position: absolute;
            top: 0;
            right: 0;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            padding: 2px 5px;
        }


        div#existingImagesContainer {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
    </style>
    <div class="add-property-form-sec">
        <div class="row">
            <div class="col-md-12">
                <form id="uploadForm" action="{{ route('landlord.properties.update', $property->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <p>Minimum 3 images, Maximum 50 images</p>
                    <div class="main-file-upload-box">
                        <div id="imageContainer">
                            <label for="fileInput">
                                <img src="{{ asset('assets/images/file-upload-img.png') }}" alt="">
                            </label>
                            <input type="file" id="fileInput" accept="image/*" multiple name="images[]">
                            <!-- Display existing images -->
                            <div id="existingImagesContainer">
                                @foreach ($property->media as $image)
                                    <div class="image-preview">
                                        <img src="{{ Storage::url($image->img_path) }}" alt="Image" />
                                        <input type="hidden" name="existing_images[]" value="{{ $image->img_path }}">
                                        <button type="button" class="close-btn"
                                            onclick="removeImage(this, '{{ $image->img_path }}')">X</button>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="many-forms-fields-box">
                        <div class="input-box">
                            <label for="">Property Name</label>
                            <input type="text" placeholder="Type Here" name="name"
                                value="{{ old('name', $property->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @error('eviction')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="many-forms-fields-box">
                        <div class="paren-check-box">
                            <label for="eviction">Eviction</label>
                            <!-- Hidden input to send 0 when unchecked -->
                            <input type="hidden" name="eviction" value="0">
                            <input type="checkbox" name="eviction" id="eviction" value="1"
                                {{ old('eviction', $property->eviction) == 1 ? 'checked' : '' }}>
                        </div>

                        <div class="many-forms-fields-box">
                            <div class="paren-check-box">
                                <label for="criminal_records">Crimanal report</label>
                                <input type="hidden" name="criminal_records" value="0">
                            <input type="checkbox" name="criminal_records" id="criminal_records" value="1"
                                {{ old('criminal_records', $property->criminal_records) == 1 ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>


                        <div class="input-box">
                            <label for="address">Address</label>
                            <input type="text" placeholder="address" name="address"
                                value="{{ old('address', $property->address) }}" required>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box simple-select">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label for="category">Category</label>
                                @if (Auth::user()->hasRole('admin'))
                                    <button type="button" id="create-category"
                                        class="fa fa-plus btn btn-primary btn-sm px-3 py-2" style="white-space: nowrap"
                                        data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
                                @endif
                            </div>
                            <select name="category" id="category" placeholder="Type Here">
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $property->cat_id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-box progress-bar">
                            <label for="category">Credit Points</label>
                            <div class="progress-container">
                                {{-- <label for="category">Credit Points</label> --}}
                                <input type="range" id="progressInput" min="10" max="2500"
                                    value="{{ $property->credit_point ?? 0 }}" step="10">
                            </div>
                            <div class="numbers-main-bb d-none">
                                <input type="number" id="numberInput1" class="number-input"
                                    value="{{ $property->credit_point ? $property->credit_point <= 10 : 10 }}"
                                    min="10" max="500" step="10">
                                <input type="number" id="numberInput2" class="number-input"
                                    value="{{ $property->credit_point ? $property->credit_point <= 500 : 500 }}"
                                    min="500" max="1000" step="10">
                                <input type="number" id="numberInput3" class="number-input"
                                    value="{{ $property->credit_point ?? 1000 }}" min="1000" max="1500"
                                    step="10">
                                <input type="number" id="numberInput4" class="number-input"
                                    value="{{ $property->credit_point ?? 1500 }}" min="1500" max="2000"
                                    step="10">
                                <input type="number" id="numberInput5" class="number-input"
                                    value="{{ $property->credit_point ?? 2000 }}" min="2000" max="2500"
                                    step="10">
                            </div>
                            <div class="progress-number" id="progressNumber">{{ $property->credit_point ?? 0 }}</div>
                            <input type="hidden" id="progress_points" name="progress_points"
                                value="{{ $property->credit_point ?? 0 }}">
                            @error('progress_points')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Rooms & Features Section -->
                        <div class="many-check-box">
                            <p>Rooms & Features</p>
                            @foreach ($allFeatures as $feature)
                                @if ($property->features && $feature)
                                    <!-- Ensure both property features and current feature exist -->
                                    <div class="paren-check-box">
                                        <input type="checkbox" id="feature-{{ $feature->id }}" name="features[]"
                                            value="{{ $feature->id }}"
                                            {{ $property->features->pluck('feature_id')->contains($feature->id) ? 'checked' : '' }}
                                            onchange="toggleQuantityInput(this, '{{ $feature->id }}')">
                                        <label for="feature-{{ $feature->id }}">{{ $feature->name }}</label>
                                    </div>
                                    <div class="row quantity-input" id="quantity-container-{{ $feature->id }}"
                                        style="display: {{ $property->features->pluck('feature_id')->contains($feature->id) ? 'block' : 'none' }};">
                                        <input type="number" id="quantity-{{ $feature->id }}"
                                            name="quantities[{{ $feature->id }}]" placeholder="Quantity" min="1"
                                            value="{{ optional($property->features->where('feature_id', $feature->id)->first())->quantity ?? '' }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>


                        <!-- Allowed Pets Section -->
                        <div class="input-box mt-3">
                            <label for="pets">Allowed Pets</label>
                            <select class="js-example-basic-multiple" multiple="multiple" style="width: 100%;"
                                name="pets[]">
                                @foreach ($pets as $pet)
                                    <option value="{{ $pet->id }}"
                                        {{ in_array($pet->id, $property->pets->pluck('pet_id')->toArray()) ? 'selected' : '' }}>
                                        {{ $pet->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pets')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <!-- Rent To Who Section -->
                        <div class="many-check-box mt-3">
                            <label for="rent_whos">Rent to Who</label>
                            <div class="paren-check-box">
                                @foreach ($rentWhos as $rentWho)
                                    <input type="checkbox" id="rentWho-{{ $rentWho->id }}" name="rent_whos[]"
                                        value="{{ $rentWho->id }}"
                                        {{ $property->RentToWhoDetails->pluck('rent_to_who_id')->contains($rentWho->id) ? 'checked' : '' }}
                                        class="mt-3">
                                    <label for="rentWho-{{ $rentWho->id }}" class="mt-3">{{ $rentWho->name }}</label>
                                @endforeach
                                @error('rent_whos')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-box textarea">
                                <label for="other_details">Other Details</label>
                                <textarea placeholder="Type Here" name="other_details">{{ old('other_details', $property->other_details) }}</textarea>
                            </div>

                            <div class="input-box simple-select">
                                <label for="availability">Availability</label>
                                <select name="availability" id="availability" placeholder="Type Here">
                                    <option value="0" {{ $property->available_status == 0 ? 'selected' : '' }}>Booked
                                    </option>
                                    <option value="1" {{ $property->available_status == 1 ? 'selected' : '' }}>Available
                                    </option>
                                </select>
                                @error('availability')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-box simple-select">
                                <label for="price">Price/Rent</label>
                                <input type="text" placeholder="price" name="price" id="price"
                                    value="{{ old('price', $property->price_rent) }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="two-btn-inline">
                                <button id="saveChangesBtn" type="button" class="t-btn">Save Changes</button>
                                {{-- <button type="button" class="t-btn t-btn-gray"
                                    onclick="window.history.back();">Discard</button> --}}
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
                $('.js-example-basic-multiple').select2({
                    placeholder: "Select Allowed Pets",
                    allowClear: true
                });

                var progressInput = document.getElementById('progress_points');
                const progress = parseInt(progressInput.value);
                updateProgress(progress);
                changeBarColor(progressInput.value);
                changeInputColors(progress);
            });
        </script>
        <script>
            // check work feature
            function toggleQuantityInput(checkbox, featureId) {
                const quantityContainer = document.getElementById('quantity-container-' + featureId);
                quantityContainer.style.display = checkbox.checked ? 'block' : 'none';
            }
            const fileInput = document.getElementById('fileInput');
            const imageContainer = document.getElementById('imageContainer');
            const existingImagesContainer = document.getElementById('existingImagesContainer');
            let selectedImages = [];

            // Function to handle file input change
            fileInput.addEventListener('change', (event) => {
                const files = Array.from(event.target.files);

                // Check for max images
                if (selectedImages.length + files.length > 50) {
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

            // Function to display uploaded images
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

            // Function to check the number of images
            function checkImageCount() {
                const totalImages = selectedImages.length + existingImagesContainer.children.length;
                if (totalImages < 3) {
                    alert('You need to upload at least 3 images.');
                }
            }

            // Function to remove existing images
            function removeImage(button, imagePath) {
                const imagePreview = button.parentElement; // Get the parent div
                existingImagesContainer.removeChild(imagePreview);

                // You may also want to handle the removal from the server-side or store the path for deletion
                // For example, you might send an AJAX request to delete the image from the server here
                // e.g. deleteImageFromServer(imagePath);

                checkImageCount(); // Check the image count after removal
            }
        </script>
        <script>
            var deletedImages = [];

            function removeImage(button, imgPath) {
                $(button).closest('.image-preview').remove();
                deletedImages.push(imgPath);
            }

            $('#saveChangesBtn').click(function(e) {
                e.preventDefault();

                var formData = new FormData($('#uploadForm')[0]);

                // Append deleted images to the FormData
                deletedImages.forEach(function(image) {
                    formData.append('deleted_images[]', image);
                });

                // Proceed with the AJAX request as before
                $.ajax({
                    url: "{{ route('landlord.properties.update', $property->id) }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#uploadForm')[0].reset();
                        toastr.success('Property updated successfully!');
                        window.location.href = "{{ route('landlord.properties') }}";
                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                var input = $('[name="' + key + '"]');
                                input.addClass('is-invalid');
                                input.after('<span class="error-message text-danger">' + value[0] +'</span>');
                            });
                            toastr.error('Error occurred while updating property.');
                        } else {
                            alert('Error occurred while updating property.');
                        }
                    }
                });
            });
        </script>
        <script>
            const progressInput = document.getElementById('progressInput');
            const progressNumber = document.getElementById('progressNumber');
            const progress_points = document.getElementById('progress_points');

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
                progress_points.value = value;

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    @endsection
