@extends('Dashboard.Layouts.master_dashboard')

<style>

.dashboard-main .left-panel .left-panel-menu ul li a.newslatter {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.newslatter svg path {
        fill: #414141 !important;
    }

</style>

@section('content')
    <div class="profile-page user-page">
        <div class="row">

            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="profile-basic-info-form">
                    <div class="box-inline">
                        <h3> News  Letters</h3>
                    </div>
                </div>
                <!-- Search Form -->
                {{-- <form action="#" method="GET" class="mb-4"> --}}

                <div class="table-responsive">
                    <table id="userTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newslatters as $newslatter)
                                <tr>
                                    <td>{{ $newslatter->id ?? '' }}</td>
                                    <td>{{ $newslatter->email ?? '' }}</td>
                                    <td>{{ $newslatter->created_at ? $newslatter->created_at->format('Y-m-d h:i A') : '' }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
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
