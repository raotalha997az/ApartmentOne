@extends('Dashboard.Layouts.master_dashboard')


<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.blog {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.blog svg path {
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

    <div class="main-blog-box main-blog-box-list customers-box">
        <div class="two-things-align">
            <h5>{{ isset($blog) ? 'Edit Blog' : 'Create Blog' }}</h5>
            <a href="{{ route('admin.blog.index') }}" class="t-btn btn btn-secondary">Back</a>
        </div>
        <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control w-100" id="title" name="title"
                            value="{{ old('title', isset($blog) ? $blog->title : '') }}">
                        @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control w-100" id="slug" name="slug"
                            value="{{ old('slug', isset($blog) ? $blog->slug : '') }}">
                        <small class="form-text text-danger">Slug will be generated automatically.</small>
                        @error('slug')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="short_description">Short Description:</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="3" >{{ old('short_description', isset($blog) ? $blog->short_description : '') }}</textarea>
                @error('short_description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Long Description:</label>
                <textarea class="form-control" id="editor" name="long_description" rows="5" cols="5">{{ old('long_description', isset($blog) ? $blog->long_description : '') }}</textarea>
                @error('long_description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                @error('image')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            @if (isset($blog) && $blog->image)
                <div class="my-3">
                    <label for="">Current Image</label>
                    <img src="{{ Storage::url('blog/' .$blog->image) }}" width="100" height="100">
                </div>
            @endif

            <div class="form-group">
                <label>Page Title</label>
                <input class="form-control w-50" name="page_title"
                    value="{{ old('page_title', isset($blog) ? $blog->page_title : '') }}">
                <small class="form-text text-danger">This title belongs to the browser's tab</small>
                @error('page_title')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Meta Description</label>
                <input class="form-control w-50" name="meta_tag" value="{{ old('meta_tag', isset($blog) ? $blog->meta_tag : '') }}">
                <small class="form-text text-danger">Please write complete meta tag</small>
                @error('meta_tag')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

@endsection

@section('scripts')
    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {

                })
                .catch(error => {
                    console.error('CKEditor error:', error);
                });


            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w-]+/g, '')
                    .replace(/--+/g, '-');
            }

            $('#title').on('input', function() {
                var titleValue = $(this).val();
                var slugValue = slugify(titleValue);
                $('#slug').val(slugValue);
            });

            // Debugging
            console.log('Slugify script loaded');
        });
    </script>
@endsection
