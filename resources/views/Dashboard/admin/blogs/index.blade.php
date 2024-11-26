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

div.dt-container .dt-paging .dt-paging-button.disabled, div.dt-container .dt-paging .dt-paging-button.disabled:hover, div.dt-container .dt-paging .dt-paging-button.disabled:active {
    color: #fff !important;
}

div.dt-container .dt-paging .dt-paging-button {
    color: #fff !important;
}

div.dt-container .dt-paging .dt-paging-button.current, div.dt-container .dt-paging .dt-paging-button.current:hover {
    color: #fff !important;
}
</style>

@section('content')
<div>
    <h3>Blogs</h3>
    <a href="{{ route('admin.blog.create') }}" type="submit" class="btn btn-primary" style="float: right">Add Blog</a>
</div>
<div>
    <div class="export-buttons mb-3"></div>
<table id="table_id" class="table table-bordered">
    <thead>
        <tr class="thead-dark">
            <th>Image</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Page Title</th>
            <th>Meta Tag</th>
            <th>Is Popular</th>
            <th>Is Trending</th>
            <th>Is Latest</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <td><img src="{{ Storage::url('blog/' . $blog->image) }}" alt="" height="50px" width="50px"></td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->slug }}</td>
            <td>{{ $blog->page_title }}</td>
            <td>{{ $blog->meta_tag }}</td>
            <td>{{ $blog->is_popular ? 'Popular' : 'No' }}</td>
            <td>{{ $blog->is_trending ? 'Trending' : 'No' }}</td>
            <td>{{ $blog->is_latest ? 'Latest' : 'No' }}</td>
            <td>{{ $blog->created_at }}</td>
            <td>
                <!-- Edit Button -->
                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-primary btn-sm">
                    <img src="{{ asset('assets/images/bx-pencil.png') }}" width="20" height="20">
                </a>
                <!-- Delete Button -->
                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                        <img src="{{ asset('assets/images/delete.png') }}" width="20" height="20">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
@section('scripts')
<script>
   $(document).ready(function() {
            $('#table_id').DataTable({
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

</script>
@endsection
