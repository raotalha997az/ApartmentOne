@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.room_features {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.room_features svg path {
        fill: #414141 !important;
    }

    .profile-page.rooms-features-page .profile-basic-info-form form .two-inputs-boxes-align .input-box {
        width: 100%;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        gap: 5px;
        align-items: flex-start;
    }

    .profile-page.rooms-features-page .profile-basic-info-form form .two-inputs-boxes-align .input-box button#addMore {
        max-width: 150px;
        background-color: #1d77b4;
        border: none;
        padding: 15px 0 !important;
        border-radius: 50px;
        font-size: 12px;
        margin-top: 10px;
        margin-bottom: -5px;
        width: 200px;
        margin: 0;
    }

    .profile-page.rooms-features-page .profile-basic-info-form form .two-inputs-boxes-align .input-box button#addMore:hover {
        background-color: black;
    }


    .profile-page.rooms-features-page .two-hex-align {
        display: flex;
        gap: 20px;
        width: 100%;
    }

    .profile-page.rooms-features-page .two-hex-align input {
        width: 1000px !important;
    }
</style>

@section('content')
    <div class="profile-page rooms-features-page">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile-basic-info-form">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h3>Rooms & Features Create</h3>
                    @if (Auth::user()->hasRole('admin'))
                        <form
                            action="{{ isset($feature) ? route('admin.roomFeature.update', $feature->id) : route('admin.features.store') }}"
                            method="POST">
                            @csrf

                            <div class="two-inputs-boxes-align">
                                <div class="input-box">
                                    <div id="featureContainer">
                                        <!-- The initial input field for Room Features -->
                                        <div class="input-box">
                                            <label for="room_features">Rooms & Features</label>
                                            <div class="two-hex-align">
                                                <input type="text" placeholder="Room Features" name="room_features[]"
                                                    class="w-100" value="{{ isset($feature) ? $feature->name : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button to add more fields -->
                                    {{-- <button type="button" id="addMore" class="fa fa-plus btn btn-danger btn-sm p-2"
                                        onclick="addmore()">Add More</button> --}}
                                    @if (!Request::routeIs('admin.roomFeature.edit'))
                                        <button type="button" id="addMore" class="fa fa-plus btn btn-danger btn-sm p-2"
                                            onclick="addmore()">Add More</button>
                                    @endif

                                </div>
                            </div>

                            <div class="two-btn-align-sub-del">
                                <button type="submit" class="form-btn submit">Save Changes
                                    <img src="{{ asset('assets/images/right-arrow.png') }}" alt="">
                                </button>
                            </div>
                        </form>
                    @endif
                </div>



            </div>
        </div>
    @endsection
    <script>
        function addmore() {
            // Get the container where the new input fields will be added
            let container = document.getElementById('featureContainer');

            // Define the new input field structure
            let newInputBox = `
            <div class="input-box">
                <label for="room_features">Rooms & Features</label>
                <div class="two-hex-align">
                    <input type="text" placeholder="Room Features" name="room_features[]" class="w-100">
                    <button type="button" class="removeFeature btn btn-danger btn-sm">Remove</button>
                </div>
            </div>`;

            // Append the new input field to the container
            container.insertAdjacentHTML('beforeend', newInputBox);
        }

        // Remove a feature input field when "Remove" button is clicked
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('removeFeature')) {
                e.target.closest('.input-box').remove();
            }
        });
    </script>
