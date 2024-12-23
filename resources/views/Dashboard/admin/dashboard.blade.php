@extends('Dashboard.Layouts.master_dashboard')
<style>
    .dashboard-main .left-panel .left-panel-menu ul li a.dashboard-active {
    background-color: rgba(250, 250, 250, 0.1);
    font-weight: 600;
    border-left: 5px solid #fff;
    transition: .3s;
}
</style>
@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="business-detail-box">
            <div class="business-revenue bg-box">
                <img src="{{ asset('assets/new-images/revenue-1.png') }}" alt="">
                <img src="{{ asset('assets/new-images/revenue-1.png') }}" alt="" class="bg-overlay">
                <p class="b-title">Business Revenue</p>
                <span class="business-amount">
                    $ 1,20,000
                </span>
            </div>
            <div class="propertiy-listed bg-box">
                <img src="{{ asset('assets/new-images/real-estate.png') }}" alt="">
                <img src="{{ asset('assets/new-images/real-estate.png') }}" alt="" class="bg-overlay">
                <p class="p-title">Properties Listed</p>
                <span class="property-amount">
                    120
                </span>
            </div>
            <div class="propertiy-listed bg-box">
                <img src="{{ asset('assets/new-images/online-analytical (1).png') }}" alt="">
                <img src="{{ asset('assets/new-images/online-analytical (1).png') }}" alt="" class="bg-overlay">
                <p class="p-title">Business Than Last Month</p>
                <span class="property-amount">
                    +15%
                </span>
            </div>
        </div>

        <div class="business-overview-box">
            <div class="business-chart bg-box">
                <h3>Business Overview</h3>
                <p>January 2024</p>
                <div class="relative flex flex-col rounded-xl bg-clip-border text-gray-700 shadow-md">
                    <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center"></div>
                    <div class="pt-6 px-2 pb-0">
                      <div id="bar-chart"></div>
                    </div>
                </div>
            </div>

            <div class="new-user-panel bg-box">
                <div class="two-things-align">
                    <div class="text-box">
                        <h3>Business Overview</h3>
                        <p>January 2024</p>
                    </div>
                    <div class="search-user">
                        <form>
                            <input type="search" placeholder="Search" class="bg-box">
                        </form>
                    </div>
                </div>
                <div class="user-panel-list-box">
                    <table>
                        <tr>
                            <th>Users</th>
                            <th>Role</th>
                            <th>Country</th>
                            <th>Phone</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="two-things-align">
                                    <div class="user-img">
                                        <img src="{{ asset('assets/new-images/user-panel-img.png') }}" alt="">
                                    </div>
                                    <div class="user-detail-box">
                                        <h6>Smith Jonson</h6>
                                        <p>abc@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-role">
                                    <p>User</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-country">
                                    <p>Texas</p>
                                </div>
                            </td>
                            <td>
                                <div class="user-phone">
                                    <p>123-1234-1234</p>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


        {{-- <div class="credit-report-box">
            <div class="two-things-align">
                <div class="box">
                    <h6>Business Overview</h6>
                    <p>All Basic Business Details</p>
                </div>

            </div>
            <div class="four-reports-align">
                <div class="number-box">
                    <h6>{{($user->count()) ?? ''}}</h6>
                    <p>Users</p>
                </div>
                <div class="number-box">
                    <h6>{{ $landlordsCount ?? ''}}</h6>
                    <p>Land Lords Accounts</p>
                </div>
                <div class="number-box">
                    <h6>{{ $tenantsCount ?? ''}}</h6>
                    <p>Tenants Accounts</p>
                </div>
                <div class="number-box">
                    <h6>{{ $listedPropertiesCount ?? ''}}</h6>
                    <p>Properties Listed</p>
                </div>
                <div class="number-box">
                    <h6>{{ $soldPropertiesCount ?? ''}}</h6>
                    <p>Properties Sold</p>
                </div>

            </div>
        </div> --}}

        {{-- <div class="top-listing-parent-box">
            <div class="two-things-align">
                <div class="box">
                    <h6>Appointment Reports</h6>
                    <p>These Are The Latest Appointments Notifications</p>
                </div>
                <div class="box">
                    <a href="#" class="t-btn t-btn-blue t-btn-svg">See All Notifications
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z" fill="white"/>
                            </svg>

                    </a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="notification-box-main">
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
        </div> --}}
{{--
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
        </div> --}}

        {{-- <div class="top-listing-parent-box mt-5">
            <div class="two-things-align">
                <div class="box">
                    <h6>Property Reports</h6>
                    <p>These Are The Latest Listed Properties</p>
                </div>
                <div class="box">
                    <a href="#" class="t-btn t-btn-blue t-btn-svg">See All Notifications
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.0215 17.5981L12.3834 18.9601L18.8435 12.5L12.3834 6.03992L11.0215 7.40186L15.1564 11.5368H5.92334V13.4632H15.1564L11.0215 17.5981Z" fill="white"/>
                            </svg>

                    </a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="notification-box-main">
            <div class="content-box">
                <h5>Mr. Bravo listed a new property</h5>
                <p>Mr. Bravo listed a new property on 25 January 2024 and waiting for approval.</p>
            </div>
            <div class="close-btn-box">
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="notification-box-main">
            <div class="content-box">
                <h5>Mr. Loki listed a new property</h5>
                <p>Mr. Loki listed a new property on 10 January 2024 and waiting for approval.</p>
            </div>
            <div class="close-btn-box">
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div> --}}

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const chartConfig = {
      series: [
        {
          name: "Sales",
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500, 600, 700, 800],
        },
      ],
      chart: {
        type: "bar",
        height: 340,
        toolbar: {
          show: false,
        },
      },
      title: {
        show: "",
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#2B2B2B"],
      plotOptions: {
        bar: {
          columnWidth: "40%",
          borderRadius: 2,
        },
      },
      xaxis: {
        axisTicks: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
        labels: {
          style: {
            colors: "#2B2B2B",
            fontSize: "12px",
            fontFamily: "inherit",
            fontWeight: 400,
          },
        },
        categories: [
          "jan",
          "feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
      },
      yaxis: {
        labels: {
          style: {
            colors: "#616161",
            fontSize: "12px",
            fontFamily: "inherit",
            fontWeight: 400,
          },
        },
      },
      grid: {
        show: true,
        borderColor: "#dddddd",
        strokeDashArray: 5,
        xaxis: {
          lines: {
            show: true,
          },
        },
        padding: {
          top: 5,
          right: 20,
        },
      },
      fill: {
        opacity: 0.8,
      },
      tooltip: {
        theme: "dark",
      },
    };

    const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);

    chart.render();
    </script>


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
