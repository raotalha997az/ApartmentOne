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

    .active-mesg-person {
        background-color: #f0f0f0;
        border-left: 4px solid #0077B6;
    }

    .parent-tabs-mesg-box .heading-form-mesg-box form input {
        color: #000;
    }

    .parent-tabs-mesg-box .parent-box-message-user .content-box svg path {
        fill: #000;
    }


    .parent-tabs-mesg-box .parent-box-message-user .content-box {
        width: -webkit-fill-available;
    }

    #message {
        color: #000 !important;
    }

    div#chat-box {
        margin-top: 100px;
        margin-bottom: 60px;
        overflow-y: auto;
        scroll-behavior: smooth;
    }

    div#write-message-box {
        position: fixed;
        width: 45.5%;
        bottom: 30px;
    }


    .parent-tabs-mesg-box .top-profile-message-box {
        display: flex;
        align-items: center;
        gap: 20px;
        position: fixed;
        background: #E5E5E5;
        width: 47.4%;
        top: 97px;
        right: 37px;
        z-index: 999;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        box-shadow: 0px 3px 6px 0px #00000021;
    }

    .parent-tabs-mesg-box .top-profile-message-box .img-box img {
        height: 50px;
        width: 50px;
        border: 3px solid #808080a3;
        border-radius: 50%;
    }

    .maintop-bar-profile {
        position: relative;
    }

    .parent-tabs-mesg-box .top-profile-message-box .profile-name-messange p {
        font-size: 16px;
        font-weight: 700;
        text-transform: capitalize;
    }
</style>
@section('content')
    <meta name="user-id" content="{{ auth()->id() }}">
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
                    <div class="main-person-message-box">
                        @if (Auth::user()->hasRole('tenant'))
                            @foreach ($conversations as $conversation)
                                {{-- {{ dd($conversation) }} --}}
                                <a onclick="getMessages({{ $conversation->id }}, this)" class="mesg-person">
                                    <div class="parent-box-message-user">
                                        <div class="img-box">
                                            <img src="{{ Storage::url($conversation->property->user->profile_img) }}"
                                                alt="">
                                        </div>
                                        <div class="content-box">
                                            <div class="name-and-date">
                                                <h6>{{ $conversation->property->user->name }}</h6>
                                                <h5>{{ $conversation->created_at->format('d-m-Y') }}</h5>
                                            </div>
                                            <p>
                                                <svg width="21" height="20" viewBox="0 0 31 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M24.6716 2.44946H12.1716C10.7929 2.44946 9.67161 3.57071 9.67161 4.94946V11.932L3.78786 17.8157C3.6131 17.9905 3.49409 18.2132 3.44588 18.4557C3.39767 18.6981 3.42242 18.9494 3.51701 19.1778C3.6116 19.4062 3.77177 19.6014 3.97729 19.7387C4.1828 19.8761 4.42442 19.9494 4.67161 19.9495V26.1995C4.67161 26.531 4.8033 26.8489 5.03773 27.0833C5.27215 27.3178 5.59009 27.4495 5.92161 27.4495H25.9216C26.2531 27.4495 26.5711 27.3178 26.8055 27.0833C27.0399 26.8489 27.1716 26.531 27.1716 26.1995V4.94946C27.1716 3.57071 26.0504 2.44946 24.6716 2.44946ZM14.6716 24.9495H7.17161V17.967L10.9216 14.217L14.6716 17.967V24.9495ZM24.6716 24.9495H17.1716V19.9495C17.4191 19.95 17.6611 19.877 17.867 19.7398C18.0729 19.6025 18.2334 19.4072 18.3281 19.1786C18.4228 18.9499 18.4474 18.6983 18.3988 18.4557C18.3503 18.213 18.2307 17.9903 18.0554 17.8157L12.1716 11.932V4.94946H24.6716V24.9495Z"
                                                        fill="white" />
                                                    <path
                                                        d="M14.6714 7.44946H17.1714V9.94946H14.6714V7.44946ZM19.6714 7.44946H22.1714V9.94946H19.6714V7.44946ZM19.6714 12.4882H22.1714V14.9495H19.6714V12.4882ZM19.6714 17.4495H22.1714V19.9495H19.6714V17.4495ZM9.67139 18.6995H12.1714V21.1995H9.67139V18.6995Z"
                                                        fill="white" />
                                                </svg>
                                                {{ $conversation->property->name }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif

                        @if (Auth::user()->hasRole('land_lord'))
                            @foreach ($conversations as $conversation)
                                <a onclick="getMessages({{ $conversation->id }}, this)" class="mesg-person">
                                    <div class="parent-box-message-user">
                                        <div class="img-box">
                                            <img src="{{ Storage::url($conversation->user->profile_img) }}" alt="">
                                        </div>
                                        <div class="content-box">
                                            <div class="name-and-date">
                                                <h6>{{ $conversation->user->name }}</h6>
                                                <h5>{{ $conversation->created_at->format('d-m-Y') }}</h5>
                                            </div>
                                            <p>
                                                <svg width="21" height="20" viewBox="0 0 31 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M24.6716 2.44946H12.1716C10.7929 2.44946 9.67161 3.57071 9.67161 4.94946V11.932L3.78786 17.8157C3.6131 17.9905 3.49409 18.2132 3.44588 18.4557C3.39767 18.6981 3.42242 18.9494 3.51701 19.1778C3.6116 19.4062 3.77177 19.6014 3.97729 19.7387C4.1828 19.8761 4.42442 19.9494 4.67161 19.9495V26.1995C4.67161 26.531 4.8033 26.8489 5.03773 27.0833C5.27215 27.3178 5.59009 27.4495 5.92161 27.4495H25.9216C26.2531 27.4495 26.5711 27.3178 26.8055 27.0833C27.0399 26.8489 27.1716 26.531 27.1716 26.1995V4.94946C27.1716 3.57071 26.0504 2.44946 24.6716 2.44946ZM14.6716 24.9495H7.17161V17.967L10.9216 14.217L14.6716 17.967V24.9495ZM24.6716 24.9495H17.1716V19.9495C17.4191 19.95 17.6611 19.877 17.867 19.7398C18.0729 19.6025 18.2334 19.4072 18.3281 19.1786C18.4228 18.9499 18.4474 18.6983 18.3988 18.4557C18.3503 18.213 18.2307 17.9903 18.0554 17.8157L12.1716 11.932V4.94946H24.6716V24.9495Z"
                                                        fill="white" />
                                                    <path
                                                        d="M14.6714 7.44946H17.1714V9.94946H14.6714V7.44946ZM19.6714 7.44946H22.1714V9.94946H19.6714V7.44946ZM19.6714 12.4882H22.1714V14.9495H19.6714V12.4882ZM19.6714 17.4495H22.1714V19.9495H19.6714V17.4495ZM9.67139 18.6995H12.1714V21.1995H9.67139V18.6995Z"
                                                        fill="white" />
                                                </svg>
                                                {{ $conversation->property->name }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8" style="position: relative">
                <div class="large-mesg-box" id="large-mesg-box">



                    <div class="parent-tabs-mesg-box">

                        <div class="maintop-bar-profile" id="profileBar">
                            {{-- <div class="top-profile-message-box">
                                <div class="img-box">
                                    <img src="{{ Storage::url($conversation->property->user->profile_img) }}"
                                                    alt="">
                                </div>
                                <div class="profile-name-messange">
                                    <p>Abdul Raheem</p>
                                </div>

                            </div> --}}
                        </div>

                        <div id="chat-box">

                            {{-- <div class="main-person-message-box">
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
                            </div> --}}

                        </div>

                        <div class="heading-form-mesg-box" id="write-message-box">
                            <form action="">
                                <input type="hidden" id="sender_id">
                                <input type="hidden" id="receiver_id">
                                <input type="hidden" id="property_id">
                                <input type="hidden" id="conversation_id">
                                <input type="text" id="message" placeholder="Type Here">
                                <button type="button" onclick="sendMessage()">Send</button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>

    {{-- {{ dd($tenant) }} --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#chat-box").hide();
            $("#profileBar").hide();
            $("#write-message-box").hide();

            // Check if there is an active conversation stored in localStorage
            const activeConversationId = localStorage.getItem('activeConversationId');
            if (activeConversationId) {
                const activeElement = document.querySelector(`.mesg-person[data-id="${activeConversationId}"]`);
                if (activeElement) {
                    getMessages(activeConversationId, activeElement);
                }
            }
        });

        $('input[placeholder="Search"]').on('input', function() {
            let query = $(this).val().toLowerCase();
            $('.mesg-person').each(function() {
                let name = $(this).find('h6').text().toLowerCase();
                $(this).toggle(name.includes(query));
            });
        });


        function getMessages(id, element) {
            // Remove the active class from all elements
            document.querySelectorAll('.active-mesg-person').forEach(el => el.classList.remove('active-mesg-person'));
            // Add the active class to the clicked element
            element.classList.add('active-mesg-person');

            $("#message").val('');

            $.ajax({
                url: "{{ route('tenant.get.messages') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    conversation_id: id
                },
                success: function(response) {
                    console.log(response);
                    console.log(response.history.user.profile_img);
                    const currentUserId = {{ auth()->id() }}; // Get the logged-in user's ID
                    $("#chat-box").show();
                    $("#profileBar").show();
                    $("#profileBar").empty();
                    $("#chat-box").empty();
                    $("#write-message-box").show();

                    @if (Auth::user()->hasRole('land_lord'))
                        $("#profileBar").append(`
                            <div class="top-profile-message-box">
                                <div class="img-box">
                                    <img src="{{ Storage::url('/') }}${response.history.user.profile_img}" alt="">
                                </div>
                                <div class="profile-name-messange">
                                    <p>${response.history.user.name}</p>
                                </div>
                            </div>
                        `);

                        $("#sender_id").val(response.history.property.user.id);
                        $("#receiver_id").val(response.history.user_id);
                        $("#property_id").val(response.history.property_id);
                        $("#conversation_id").val(response.history.id);
                    @endif
                    @if (Auth::user()->hasRole('tenant'))

                        $("#profileBar").append(`
                            <div class="top-profile-message-box">
                                <div class="img-box">
                                    <img src="{{ Storage::url('/') }}${response.history.property.user.profile_img}" alt="">
                                </div>
                                <div class="profile-name-messange">
                                    <p>${response.history.property.user.name}</p>
                                </div>
                            </div>
                        `);

                        $("#sender_id").val(response.history.user_id);
                        $("#receiver_id").val(response.history.property.user.id);
                        $("#property_id").val(response.history.property_id);
                        $("#conversation_id").val(response.history.id);
                    @endif

                    response.messages.forEach(message => {
                        const isSender = message.sender_id === currentUserId;

                        $("#chat-box").append(`
                            <div class="main-person-message-box">
                                <div class="parent-box-message-user">
                                    <div class="content-box ${isSender ? 'you' : 'client'}">
                                        <div class="name-and-date">
                                            <h6>${isSender ? 'You' : message.sender.name}</h6>
                                            <h5>${new Date(message.created_at).toLocaleDateString()}</h5>
                                        </div>
                                        <p>${message.message}</p>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);
                }
            });
        }


        function sendMessage() {
            var message = $('#message').val();
            var receiverId = $('#receiver_id').val();
            var senderId = $('#sender_id').val();
            var propertyId = $('#property_id').val();
            var conversationId = $('#conversation_id').val();

            if (message.trim() === '') {
                alert('Please enter a message before sending.');
                return;
            }

            $.ajax({
                url: '/tenant/send-message',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    message: message,
                    receiver_id: receiverId,
                    sender_id: senderId,
                    property_id: propertyId,
                    conversation_id: conversationId
                },
                success: function(data) {
                    $('#message').val(''); // Clear input
                    $("#chat-box").append(`
                        <div class="main-person-message-box">
                            <div class="parent-box-message-user">
                                <div class="content-box you">
                                    <div class="name-and-date">
                                        <h6>You</h6>
                                        <h5>${new Date().toLocaleDateString()}</h5>
                                    </div>
                                    <p>${data.data.message}</p>
                                </div>
                            </div>
                        </div>
                    `);
                },
                error: function(error) {
                    console.error('Error sending message:', error);
                }
            });
        }
    </script>
@endsection
