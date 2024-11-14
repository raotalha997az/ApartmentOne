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

.main-dashboard-header .right-header-links ul li a.messages svg path{
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
                <div class="main-person-message-box">
                        <a href="#" class="active-mesg-person">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                        <a href="#">
                            <div class="parent-box-message-user">
                                <div class="img-box">
                                    <img src="{{asset('assets/images/message-person-img.png')}}" alt="">
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
                <div class="parent-tabs-mesg-box">

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
