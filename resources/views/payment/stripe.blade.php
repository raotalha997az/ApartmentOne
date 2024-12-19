@extends('Dashboard.Layouts.master_dashboard')
<style>
    label {
        font-size: 25px;
        font-weight: 500;
        margin: 20px 0;
        width: 100%;
    }

    button#pay-btn {
        background: #0077B6;
        border-radius: 20px;
        transition: .3s;
    }

    button#pay-btn:hover {
        background: #000;
        transition: .3s;
    }

    .dashboard-main .left-panel {
        height: 95vh !important;
        min-height: 95vh !important;
    }

    div#card-element {
        background: #E5E5E5;
        border: 1px solid #CCCCCC;
        border-radius: 10px;
        padding: 10px;
        color: #666666;
    }
</style>
@section('content')
    <div class="main-heading">
        <h1>Apply For Your Screening</h1>
        <span>This required a some payment for screening of every user. This will retrieve your credit report and some of
            your background details</span>
    </div>
    <div class="sub-heading mt-3">
        <h2>Payment details</h2>
        <span>Screening Fee </span>
        <span style="color: #0077B6">$10</span>
    </div>

    <div class="col-md-6 col-md-offset-3 mt-3">
        <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table">
                <h2 class="panel-title">Checkout Forms</h2>
            </div>

            <div class="panel-body">
                @if (session('success'))
                    <div class="mt-3 alert alert-success alert-dismissible fade show">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mt-3 alert alert-danger alert-dismissible fade show">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <form id='checkout-form' method='post' action="{{ route('tenant.stripe.post') }}">

                    @csrf

                    <input type='hidden' name='stripeToken' id='stripe-token-id'>

                    <label for="card-element">Stripe</label>

                    <div id="card-element" class="form-control"></div>

                    <button id='pay-btn' class="btn btn-success mt-3" type="button"
                        style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">PAY $10

                    </button>

                    <form>



            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')

        var elements = stripe.elements();

        var cardElement = elements.create('card');

        cardElement.mount('#card-element');



        /*------------------------------------------

        --------------------------------------------

        Create Token Code

        --------------------------------------------

        --------------------------------------------*/

        // function createToken() {

        //     document.getElementById("pay-btn").disabled = true;

        //     stripe.createToken(cardElement).then(function(result) {

        //         if (typeof result.error != 'undefined') {

        //             document.getElementById("pay-btn").disabled = false;

        //             alert(result.error.message);

        //         }

        //         /* creating token success */
        //         if (typeof result.token != 'undefined') {

        //             document.getElementById("stripe-token-id").value = result.token.id;

        //             document.getElementById('checkout-form').submit();

        //         }

        //     });
        // }
        function createToken() {
    // Show SweetAlert confirmation
    Swal.fire({
        title: 'Are you sure you want to make the payment?',
        text: "You will be charged $10 for the screening process.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, pay now!',
        cancelButtonText: 'No, cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("pay-btn").disabled = true;

            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;

                    // Show an error alert
                    Swal.fire({
                        title: 'Error!',
                        text: result.error.message,
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                }

                /* creating token success */
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;

                    // Show a success SweetAlert
                    Swal.fire({
                        title: 'Payment Successful!',
                        text: "Your payment has been processed successfully.",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form after showing the success alert
                            document.getElementById('checkout-form').submit();
                        }
                    });
                }
            });
        }
    });
}



    </script>
@endsection
