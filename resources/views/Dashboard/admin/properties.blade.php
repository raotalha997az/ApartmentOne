@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.properties-active {
        background-color: rgba(250, 250, 250, 0.1);
    transition: .3s;
    border-left: 5px solid #fff;
    }

</style>
@section('content')
<div class="properties-page admin-properties">
    <div class="row">
        <div class="col-lg-12">
            {{-- <div class="top-listing-parent-box">
                <div class="two-things-align">
                    <div class="box">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Apartments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Houses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Luxury Apartments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Luxury Houses</a>
                            </li>
                        </ul><!-- Tab panes -->
                    </div>
                </div>
            </div> --}}

            <div class="property-for-approvel-table">
                <table class="fixed-scroll-table">
                    <tr>
                        <th>Land Lords</th>
                        <th>Property Name</th>
                        <th>Property Category</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="approved-badge"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approved</span></td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="two-things-align">
                                <div class="user-img">
                                    <img src="/assets/new-images/user-img.png" alt="">
                                </div>
                                <div class="user-detail-box">
                                    <h6>Grant Blanchard</h6>
                                    <p>kulyfi@mailinator.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                                <p>Property Name</p>
                        </td>
                        <td>
                                <p>Property Category</p>
                        </td>
                        <td>
                                <p>$235</p>
                        </td>
                        <td><p>17/12/2024</p></td>
                        <td>
                            <span class="not-approved-badge"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53991 13.535L10.8966 11.1783L13.2532 13.535L14.4316 12.3567L12.0749 10L14.4316 7.64333L13.2532 6.465L10.8966 8.82166L8.53991 6.465L7.36157 7.64333L9.71824 10L7.36157 12.3567L8.53991 13.535Z" fill="#FF4A4A"></path>
                                <path d="M10.8966 18.3333C15.4916 18.3333 19.2299 14.595 19.2299 10C19.2299 5.405 15.4916 1.66666 10.8966 1.66666C6.30157 1.66666 2.56323 5.405 2.56323 10C2.56323 14.595 6.30157 18.3333 10.8966 18.3333ZM10.8966 3.33333C14.5724 3.33333 17.5632 6.32416 17.5632 10C17.5632 13.6758 14.5724 16.6667 10.8966 16.6667C7.22073 16.6667 4.2299 13.6758 4.2299 10C4.2299 6.32416 7.22073 3.33333 10.8966 3.33333Z" fill="#FF4A4A"></path>
                                </svg>Not Approved</span>
                        </td>
                        <td>
                            <div class="property-action-buttons">
                            <a href="http://127.0.0.1:8000/admin/properties/approve/65" class="btn btn-success btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="#499C00"></path>
                            <path d="M9.99909 13.587L7.70009 11.292L6.28809 12.708L10.0011 16.413L16.7071 9.707L15.2931 8.293L9.99909 13.587Z" fill="#499C00"></path>
                            </svg>
                            Approve</a>
                            <a href="http://127.0.0.1:8000/admin/propertiesdetails/65" class="btn btn-primary btn-sm"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3L16.293 6.293L9.29297 13.293L10.707 14.707L17.707 7.707L21 11V3H13Z" fill="#0077B6"></path>
                            <path d="M19 19H5V5H12L10 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V14L19 12V19Z" fill="#0077B6"></path>
                            </svg>
                            Details</a>
                            <a href="#" class="Delet-btn btn-sm btn" data-id="65" onclick="deleteProperty(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20C5 20.5304 5.21071 21.0391 5.58579 21.4142C5.96086 21.7893 6.46957 22 7 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V8H21V6H17V4C17 3.46957 16.7893 2.96086 16.4142 2.58579C16.0391 2.21071 15.5304 2 15 2H9C8.46957 2 7.96086 2.21071 7.58579 2.58579C7.21071 2.96086 7 3.46957 7 4V6H3V8H5V20ZM9 4H15V6H9V4ZM8 8H17V20H7V8H8Z" fill="#777777"></path>
                            <path d="M9 10H11V18H9V10ZM13 10H15V18H13V10Z" fill="#777777"></path>
                            </svg>
                            Delete
                            </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


            {{-- <div class="tab-content">
                @foreach ( $properties as $property)
                <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
                    <div class="latest-listing-parent-box">
                        <div class="latest-child-box">
                            <div class="box property-detail-box">
                                <div class="img-box">

                                </div>
                                <div class="content">
                                    <h6>Property Details</h6>
                                    <h5>{{ $property->name }}</h5>
                                    <p>{{ $property->other_details }}</p>
                                    <h4>{{ $property->price_rent }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box two-person-align-box">
                            <div class="sunb-person-child-box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/' . ($property->user->profile_img ?? 'default.png')) }}" alt="" width="150px" height="100" style="object-fit: contain">
                                </div>
                                <div class="content">
                                    <h6>Owner/Land Lord</h6>
                                    <h5>{{ $property->user->name }}</h5>
                                    {{ $property->created_at->format('d-m-Y') }}
                                </div>
                            </div>

                        </div>
                        <div class="two-btns-inline">
                            <a href="{{ route('admin.properties.approve', $property->id) }}"  class="t-btn t-btn-blue">Approve</a>
                            <a href="{{ route('admin.propertiesdetails.approval', $property->id) }}"  class="t-btn t-btn-blue">Details</a>
                        </div>

                    </div>


                </div>
                @endforeach

            </div> --}}

        </div>
    </div>
</div>
@endsection
