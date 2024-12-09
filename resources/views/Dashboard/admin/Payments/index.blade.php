@extends('Dashboard.Layouts.master_dashboard')

<style>

.dashboard-main .left-panel .left-panel-menu ul li a.payment {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.payment svg path {
        fill: #414141 !important;
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
                        <h3>Payments Paid By Users</h3>
                    </div>
                </div>
                <!-- Search Form -->
                {{-- <form action="#" method="GET" class="mb-4"> --}}

                <div class="table-responsive">
                    <table id="userTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Payment Method</th>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Description</th>
                                <th>Paid At</th>
                                <th>Payment Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Payments as $Payment)
                            {{-- {{ dd($Payment) }} --}}
                                <tr>
                                    <td>{{ $Payment->id ?? '' }}</td>
                                    <td>{{ $Payment->user->name ?? '' }}</td>
                                    <td>{{ $Payment->payment_method ?? '' }}</td>
                                    <td>{{ $Payment->transaction_id ?? '' }}</td>
                                    <td>{{ $Payment->amount ?? '' }}</td>
                                    <td>{{ $Payment->currency ?? '' }}</td>
                                    <td>{{ $Payment->description ?? '' }}</td>
                                    <td>{{ $Payment->created_at ? $Payment->created_at->format('Y-m-d h:i A') : '' }}</td>
                                        {{-- @if($Payment->created_at === $Payment->user->updated_at) --}}
                                        <td>
                                            {{ $Payment->user->payment_expires_at ? \Carbon\Carbon::parse($Payment->user->payment_expires_at)->format('Y-m-d h:i A') : '' }}
                                        </td>
                                        {{-- @endif --}}


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
