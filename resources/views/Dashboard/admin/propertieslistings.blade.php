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
                            <input type="text" placeholder="Type Here">
                        </div>
                        <div class="input-box simple-select">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label for="cars">Category</label>
                                <!-- Button to trigger the modal -->
                                <button type="button" id="create-category"
                                    class="fa fa-plus btn btn-primary btn-sm px-3 py-2" style="white-space: nowrap"
                                    data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
                            </div>
                            <select name="cars" id="cars" placeholder="Type Here">
                                <!-- Categories will be appended here -->
                            </select>
                        </div>
                        <div class="input-box progress-bar">

                            <div class="progress-container">
                                <input type="range" id="progressInput" min="10" max="2500" value="10"
                                    step="10">
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
                            <div class="progress-number" id="progressNumber">10</div>


                        </div>

                        <div class="many-check-box">
                            <p>Rooms & Features</p>

                            <div class="paren-check-box">
                                <input type="checkbox" id="bed-room" name="bed-room" value="rooms-and-features">
                                <label for="bed-room"> Bed Room</label>
                            </div>


                            <div class="paren-check-box">
                                <input type="checkbox" id="attach-bathroom" name="attach-bathroom"
                                    value="rooms-and-features">
                                <label for="attach-bathroom">Attach Bathroom</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="separate-bathroom" name="separate-bathroom"
                                    value="rooms-and-features">
                                <label for="separate-bathroom">Separate Bathroom</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="balcony" name="balcony" value="rooms-and-features">
                                <label for="balcony">Balcony</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="swimming-pool" name="swimming-pool"
                                    value="rooms-and-features">
                                <label for="swimming-pool">Swimming Pool</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="in-house-swimming-pool" name="in-house-swimming-pool"
                                    value="rooms-and-features">
                                <label for="in-house-swimming-pool">In House Swimming Pool</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="garden" name="garden" value="rooms-and-features">
                                <label for="garden">Garden</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="parking" name="parking" value="rooms-and-features">
                                <label for="parking">Parking</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="in-house-garage" name="in-house-garage"
                                    value="rooms-and-features">
                                <label for="in-house-garage">In House Garage</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="living-room" name="living-room"
                                    value="rooms-and-features">
                                <label for="living-room">Living Room</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="tv-launch" name="tv-launch" value="rooms-and-features">
                                <label for="tv-launch">TV Launch</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="open-kitchen" name="open-kitchen"
                                    value="rooms-and-features">
                                <label for="open-kitchen">Open Kitchen</label>
                            </div>

                            <div class="paren-check-box">
                                <input type="checkbox" id="separate-kitchen" name="separate-kitchen"
                                    value="rooms-and-features">
                                <label for="separate-kitchen">Separate Kitchen</label>
                            </div>

                        </div>

                        <div class="input-box  mt-3">
                            <label for="">Allowed Pets</label>
                            <select class="js-example-basic-multiple" multiple="multiple" style="width: 300px;"
                                id="services">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="FL">Florida</option>
                                <option value="NY">New York</option>
                                <option value="CA">California</option>
                            </select>

                        </div>

                        <div class="many-check-box mt-3">
                            <p>Rent To Who</p>

                            <div class="paren-check-box">
                                <input type="checkbox" id="dont-drink-alcohol" name="dont-drink-alcohol"
                                    value="rooms-and-features">
                                <label for="dont-drink-alcohol"> Don’t Drink Alcohol</label>
                            </div>
                            <div class="paren-check-box">
                                <input type="checkbox" id="dont-smoke" name="dont-smoke" value="rooms-and-features">
                                <label for="dont-smoke"> Don’t Smoke</label>
                            </div>
                            <div class="paren-check-box">
                                <input type="checkbox" id="dont-rape-any-one" name="dont-rape-any-one"
                                    value="rooms-and-features">
                                <label for="dont-rape-any-one"> Don’t Rape Any One</label>
                            </div>
                            <div class="paren-check-box">
                                <input type="checkbox" id="dont-sex-addicted" name="dont-sex-addicted"
                                    value="rooms-and-features">
                                <label for="dont-sex-addicted"> Don’t Sex Addicted</label>
                            </div>
                            <div class="paren-check-box">
                                <input type="checkbox" id="dont-have-any-criminal Record"
                                    name="dont-have-any-criminal Record" value="rooms-and-features">
                                <label for="dont-have-any-criminal Record"> Don’t Have Any Criminal Record</label>
                            </div>
                            <div class="paren-check-box">
                                <input type="checkbox" id="dont-have-weapons" name="dont-have-weapons"
                                    value="rooms-and-features">
                                <label for="dont-have-weapons"> Don’t Have Weapons</label>
                            </div>


                        </div>

                        <div class="input-box">
                            <label for="">Number Of Bedrooms</label>
                            <input type="text" placeholder="01">
                        </div>


                        <div class="input-box textarea">
                            <label for="">Other Details</label>
                            <textarea placeholder="Type Here"></textarea>
                        </div>

                        <div class="input-box simple-select">
                            <label for="cars">Availability</label>
                            <select name="cars" id="cars" placeholder="Type Here">
                                <option value="Category-01">Type Here-01</option>
                                <option value="Type Here-02">Type Here-02</option>
                                <option value="Type Here-03">Type Here-03</option>
                                <option value="Type Here-04">Type Here-04</option>
                            </select>
                        </div>

                        <div class="input-box simple-select">
                            <label for="cars">Price/Rent</label>
                            <select name="cars" id="cars" placeholder="Type Here">
                                <option value="Price/Rent-01">Price/Rent-01</option>
                                <option value="Price/Rent-02">Price/Rent-02</option>
                                <option value="Price/Rent-03">Price/Rent-03</option>
                                <option value="Price/Rent-04">Price/Rent-04</option>
                            </select>
                        </div>

                        <div class="two-btn-inline">
                            <button class="t-btn">Save Changes</button>
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
            if (selectedImages.length < 10) {
                alert('You need to upload at least 10 images.');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
@endsection
