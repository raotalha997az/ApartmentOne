@extends('Dashboard.Layouts.master_dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="notifications-main-box">
            <div class="align-date-and-time">
                <p>01 March 2024</p>
                <p>10 : 00 AM</p>
            </div>
            <div class="notification-box-main">
                <div class="content-box">
                    <h5>An land lord wants to retrieve your credit report</h5>
                    <p>Mr. Albert wants to retrieve your credit report on 21 March 2024</p>
                    <div class="two-btns-inline">
                        <button>Approve</button>
                        <button>Decline</button>
                    </div>
                </div>
                <div class="close-btn-box">
                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="notification-box-main">
                <div class="content-box">
                    <h5>An land lord wants to retrieve your credit report</h5>
                    <p>Mr. Albert wants to retrieve your credit report on 21 March 2024</p>
                </div>
                <div class="close-btn-box">
                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="notification-box-main">
                <div class="content-box">
                    <h5>An land lord wants to retrieve your credit report</h5>
                    <p>Mr. Albert wants to retrieve your credit report on 21 March 2024</p>
                    <div class="two-btns-inline">
                        <button>Approve</button>
                        <button>Decline</button>
                    </div>
                </div>
                <div class="close-btn-box">
                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="notification-box-main">
                <div class="content-box">
                    <h5>An land lord wants to retrieve your credit report</h5>
                    <p>Mr. Albert wants to retrieve your credit report on 21 March 2024</p>
                </div>
                <div class="close-btn-box">
                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    // Select all notification boxes
    document.querySelectorAll('.notification-box-main').forEach(box => {
    // Select the close anchor and the buttons within the box
    const closeAnchor = box.querySelector('.close-btn-box a');
    const buttons = box.querySelectorAll('button');

    // Add event listener for the anchor
    closeAnchor.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        box.style.display = 'none'; // Hide the box
    });

    // Add event listeners for the buttons
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            box.style.display = 'none'; // Hide the box
        });
    });
});
</script>
@endsection
