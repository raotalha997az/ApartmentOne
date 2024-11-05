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
<div>
    <a href="{{ route('admin.blog.create') }}" type="submit" class="btn btn-primary">Add Blog</a>
</div>
<div>
    <table id="table_id" class="table">
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
            {{-- {{ dd($blogs)  }} --}}
          @foreach ($blogs as $blog )
          <tr>
           <td> <img src="{{Storage::url('blog/' . $blog->image)}}" alt="" height="150px" width="150px"> </td>
              <td>{{ $blog->title }}</td>
              <td>{{ $blog->slug }}</td>
              <td>{{ $blog->page_title }}</td>
              <td>{{ $blog->meta_tag }}</td>
              <td>{{ $blog->is_popular == 1 ? 'Popular' : 'No' }}</td>
              <td>{{ $blog->is_trending   == 1 ? 'Trending' : 'No'}}</td>
              <td>{{ $blog->is_latest   == 1 ? 'Latest' : 'No'}}</td>
              <td>{{ $blog->created_at }}</td>
              <td>
                <!-- Edit Button -->
                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-primary btn-sm"><img src="{{asset('assets/images/bx-pencil.png') }}" width="30" height="20"></a>

                <!-- Delete Button -->
                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')"> <img src="{{asset('assets/images/delete.png') }}" width="30" height="20"></button>
                </form>
            </td>
        </tr>

        </tr>
        @endforeach
        </tbody>
    </table>



</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection
