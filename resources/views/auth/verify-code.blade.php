{{-- @extends('Website.layouts.master') --}}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    {{-- <title>Apartment One</title> --}}
    <link rel="icon" href="assets/images/apartment-one-favicon.png" type="favicon.png" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('assets/style-folder/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
        height: 100vh;
        background-image: url('{{ asset('assets/background_image/Image35.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        align-content: center;
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
            <button type="submit" class="t-btn t-btn-header w-100">Verify Code</button>

            <a href="javascript:void(0);" class="t-btn t-btn-header w-100" onclick="resendVerification()" style="text-align: center;">Resend Code </a>
        </form>
    </div>
</div>
{{-- @endsection --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/custom-js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
     $(document).ready(function() {
        console.log('runqq');
    });

    function resendVerification() {
            $.ajax({
                url: "{{ route('reset.verify.code') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message || "Failed to resend verification. Please try again.");
                }
            });
        }
    </script>

