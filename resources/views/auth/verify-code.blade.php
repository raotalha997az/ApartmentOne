@extends('Website.layouts.master')

<style>
    .fully{
        height: 70vh;
    }
    .carder{
        padding: 50px ;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
    }
    .t-btn {
        background-color: #0077B6;
        border-radius: 50px;
        padding: 8px 30px;
        color: white;
        font-weight: 400;
        transition: .3s;
    }
    .t-btn-header:hover {
        background-color: #414141;
        color: white !important;
    }
</style>
@section('content')
<div class="container fully d-flex align-items-center justify-content-center">
    <div class="bg-light carder d-flex flex-column justify-content-starty align-items-start gap-4">
        <h2>Enter Verification Code</h2>
        <form action="{{ route('verify.code.check') }}" method="POST" class="d-flex flex-column justify-content-starty align-items-start gap-4 w-100">
            @csrf
            <div class="form-group w-100">
                <label for="verification_code">Verification Code</label>
                <input type="text" name="verification_code" id="verification_code" class="form-control w-100 mt-1" required>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="t-btn t-btn-header w-100">Verify</button>
        </form>
    </div>
</div>
@endsection
