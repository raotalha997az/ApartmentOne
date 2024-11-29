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
                        404
                    </h1>
                    <h3>
                        Page Not Found
                    </h3>
                    <span>
                        The page you are looking for is not found
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
