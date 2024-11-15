@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.messages {
        background-color: white;
        color: #414141;
    }

    .dashboard-main .left-panel .left-panel-menu ul li a.messages svg path {
        fill: #414141 !important;
    }

    .main-dashboard-header .right-header-links ul li a.messages {
        color: #0077B6;
    }

    .main-dashboard-header .right-header-links ul li a.messages svg path {
        fill: #0077B6 !important;
    }
</style>
@section('content')
    <div class="messages-page">
        <div class="row">
            <div class="col-lg-4">
                <div class="parent-tabs-mesg-box">
                    <div class="heading-form-mesg-box">
                        <h6>Messages</h6>
                        <h5>120 New Messages</h5>
                        <form action="">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    {{-- {{ dd($landlord) }} --}}
                    <div class="main-person-message-box">
                        <a href="#" class="active-mesg-person">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/message-person-img.png') }}" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="name-and-date">
                                        <h6>Jhon Wick</h6>
                                        <h5>12/2/2024</h5>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="large-mesg-box">
                    {{-- <div class="parent-tabs-mesg-box">

                    <div class="main-person-message-box">
                                <div class="parent-box-message-user">
                                    <div class="content-box you">
                                        <div class="name-and-date">
                                            <h6>Jhon Wick</h6>
                                            <h5>12/2/2024</h5>
                                        </div>
                                        <p>Lorem Ipsum is simply dummy text of the</p>
                                    </div>

                                    <div class="content-box client">
                                        <div class="name-and-date">
                                            <h6>Jhon Wick</h6>
                                            <h5>12/2/2024</h5>
                                        </div>
                                        <p>Lorem Ipsum is simply dummy text of the</p>
                                    </div>


                                </div>
                    </div>

                    <div class="heading-form-mesg-box">
                        <form action="">
                            <input type="text" placeholder="Type Here">
                            <button>Send</button>
                        </form>
                    </div>
                </div> --}}



                    <div class="parent-tabs-mesg-box">
                        <div class="main-person-message-box" id="message-box">
                            <!-- Messages will be appended here -->
                        </div>

                        <div class="heading-form-mesg-box">
                            <form id="message-form">
                                <input type="text" id="message" placeholder="Type Here" required>
                                <button type="submit">Send</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Pusher.logToConsole = true;

    // Initialize Pusher
    var pusher = new Pusher('96010b48b2b6efb4c0f1', {
        cluster: 'ap2',
        encrypted: true
    });
    var userId = "{{ auth()->user()->id }}";

    // Subscribe to the private channel for the logged-in user
    var channel = pusher.subscribe('messages.' + userId); // Replace 'userId' with the logged-in user's ID

    // Listen for new messages on the channel
    channel.bind('MessageSent', function(data) {
        console.log(data);
        // Append new message to the message box
        var messageBox = document.getElementById('message-box');
        var messageHTML = `
            <div class="content-box ${data.sender_name === 'landlord' ? 'you' : 'client'}">
                <div class="name-and-date">
                    <h6>${data.sender_name}</h6>
                    <h5>${data.sent_at}</h5>
                </div>
                <p>${data.message}</p>
            </div>
        `;
        messageBox.insertAdjacentHTML('beforeend', messageHTML);
    });

    // Handle sending messages via the form
    document.getElementById('message-form').addEventListener('submit', function(e) {
        e.preventDefault();

        var messageInput = document.getElementById('message');
        var message = messageInput.value;
        var receiverId = "{{ $landlord->id }}"; // The receiver's ID (tenant or landlord)
        var sender_id = "{{ auth()->user()->id }}";
        // Send the message via AJAX
        fetch('/send-message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                message: message,
                receiver_id: receiverId,
                sender_id: sender_id
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Message sent', data);
            messageInput.value = ''; // Clear the input field
        })
        .catch(error => console.error('Error:', error));
    });

    </script>
@endsection
