@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.testimonial-active {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.testimonial-active svg path {
        fill: #414141 !important;
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
                    {{-- <a class="t-btn t-btn-blue" href="#">Add New</a> --}}
                    <a href="#" class="t-btn t-btn-blue" data-bs-toggle="modal" data-bs-target="#TestimonialModal">
                        <i class="fa fa-plus"></i> Add Testimonial
                    </a>
                    {{-- <a class="t-btn t-btn-blue" href="{{ route('admin.pets.create') }}">Add New</a> --}}
                </div>
                <div class="table-responsive">
                    <table id="TestimonialTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal create--}}
    <div class="modal fade" id="TestimonialModal" tabindex="-1" aria-labelledby="TestimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TestimonialModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="testimonialForm">
                        <div class="mb-3">
                            <label for="client_name" class="form-label">Add Client Name</label>
                            <input type="text" name="client_name" class="form-control" id="client_name"
                                placeholder="Enter category name">
                            @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="testimonial" class="form-label">Testimonial</label>
                            <textarea name="testimonial" class="form-control" id="testimonial" placeholder="Enter category name"></textarea>
                            @error('testimonial')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
