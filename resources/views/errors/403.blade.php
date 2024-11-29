@extends('Website.layouts.master')
<style>
    .error {
        color: #0077B6 !important;
        font-size: 100px;
    }

    .center {
        text-align: center;
        height: 60vh;
        align-content: center;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="center">
                    <h1 class="error">
                        403
                    </h1>
                    <span>
                        This action is unauthorized.
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
