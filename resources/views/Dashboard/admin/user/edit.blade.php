@extends('Dashboard.Layouts.master_dashboard')

<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.user {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.user svg path {
        fill: #414141 !important;
    }

    .profile-page.user-page .profile-basic-info-form .input-box {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 5px;
        align-items: flex-start;
    }

    .profile-page.user-page .profile-basic-info-form .input-box button {
        max-width: 150px;
        background-color: #1d77b4;
        border: none;
        padding: 15px 0;
        border-radius: 50px;
        font-size: 12px;
        margin-top: 10px;
        margin-bottom: -5px;
        width: 200px;
    }
</style>

@section('content')
<div class="profile-page user-page">
    <div class="row">
        <div class="col-lg-12">
            <div class="profile-basic-info-form">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h3>Edit User</h3>
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" >
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" value="{{ old('city', $user->city) }}" placeholder="City">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" name="country"  value="{{ old('country', $user->country) }}" placeholder="Country">
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input class="form-control" type="text" name="state" value="{{ old('state', $user->state) }}" placeholder="State">
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input class="form-control" type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" placeholder="Postal Code">
                                @error('postal_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="address" value="{{ old('address', $user->address) }}" placeholder="Address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile_img">Profile Image</label>
                                <input class="form-control" type="file" name="profile_img" accept="image/*">
                                @if ($user->profile_img)
                                    <img src="{{ Storage::url($user->profile_img ?? '') }}" alt="Profile Image" width="100" class="mt-2">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password (Leave blank to keep current password)</label>
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-control">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="land_lord" {{ $user->role == 'land_lord' ? 'selected' : '' }}>Land Lord</option>
                                    <!-- Add other roles as needed -->
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="form-btn submit btn btn-danger">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
