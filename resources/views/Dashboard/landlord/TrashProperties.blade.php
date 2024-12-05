@extends('Dashboard.Layouts.master_dashboard')
<style>

    .dashboard-main .left-panel .left-panel-menu ul li a.propertiestrash-active {
        background-color: white;
        color: #414141;
    }


    .dashboard-main .left-panel .left-panel-menu ul li a.propertiestrash-active svg path {
    fill: #414141 !important;
}
</style>
@section('content')
    <div class="landlord-dashboard landlord-properties">
        <div class="row">
            <div class="col-md-12">
                <div class="basic-reports-box properties-page">

                    <div class="two-things-align">
                        <div class="reports-fours-box-align">
                            <div class="parent-box">
                                <div class="content">
                                    <h5>{{ $properties->count() }}</h5>
                                    <p>Total Properties</p>
                                </div>
                            </div>
                            {{-- <div class="parent-box">
                                <div class="content">
                                    <h5>12</h5>
                                    <p>Homes</p>
                                </div>
                            </div> --}}
                            {{-- <div class="parent-box">
                                <div class="content">
                                    <h5>150</h5>
                                    <p>Apartments</p>
                                </div>
                            </div> --}}
                            {{-- <div class="parent-box">
                                <div class="content">
                                    <h5>10</h5>
                                    <p>Lands</p>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <a href="{{ route('landlord.add_property') }}" class="t-btn t-btn-blue t-btn-svg">Add Property
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z"
                                    fill="white"></path>
                            </svg>

                        </a> --}}
                    </div>

                    <div class="two-things-align">
                        <div class="box">
                            <h6>Trash Properties</h6>
                            {{-- <p>Based On Your Profile</p> --}}
                        </div>
                    </div>


                    <div class="tab-content">

                        <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel" aria-expanded="true">
                            <div class="reports-listings-property-table">
                                <div class="three-headings-align">
                                    <h3>Property</h3>
                                    <h3></h3>
                                    <h3>Action</h3>
                                </div>

                                <div class="three-box-table">
                                    @foreach ($properties as $property)
                                            <a href="#">
                                            <div class="box img-box-property">
                                                    <img src="{{ Storage::url($property->media[0]->img_path ?? '') }}"
                                                        alt="">
                                                <div class="content">
                                                    <h4>{{ $property->name ?? ''}}</h4>
                                                    <p>
                                                        @if (strlen($property->other_details) > 20)
                                                            <abbr
                                                                title="{{ $property->other_details ?? ''}}">{{ substr($property->other_details, 0, 20) }}...</abbr>
                                                        @else
                                                            {{ $property->other_details ?? ''}}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="box gallery-box-imges">
                                                {{-- <img src="{{ asset('assets/images/Tenants-Applied-img-01.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-02.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-03.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-04.png') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/Tenants-Applied-img-05.png') }}"
                                                    alt=""> --}}

                                            </div>
                                        {{-- </a> --}}

                                            <div class="box numbers-of-applications">
                                                <p>
                                                    <form id="deleteForm{{ $property->id }}" action="{{route('landlord.trash.undo',$property->id) }}" method="post" style="display:inline-block;">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="button" class="btn btn-sm btn-warning" onclick="undo({{ $property->id }})">Undo</button>
                                                    </form>

                                                </p>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>


                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
@endsection

<script>
    function undo(propertId) {
    console.log(propertId);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert Property!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, revert Property!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + propertId).submit();
            }
        })
    }
</script>
