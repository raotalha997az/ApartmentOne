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
                    <p class="b-title">Business Revenue Amount</p>
                    <span class="business-amount">
                        ${{ $RevenueTotal }}
                    </span>
                </div>
                <div class="propertiy-listed bg-box">
                    <img src="{{ asset('assets/new-images/real-estate.png') }}" alt="">
                    <img src="{{ asset('assets/new-images/real-estate.png') }}" alt="" class="bg-overlay">
                    <p class="p-title">Properties Listed</p>
                    <span class="property-amount">
                        {{ $listedPropertiesCount ?? '' }}
                    </span>
                </div>
                <div class="propertiy-listed bg-box">
                    <img src="assets/new-images/online-analytical (1).png" alt="">
                    <img src="assets/new-images/online-analytical (1).png" alt="" class="bg-overlay">
                    <p class="p-title">Business Than Last Month</p>
                    <span class="property-amount">
                        +{{ $percentageChange }}%
                    </span>
                </div>
            </div>

            <div class="business-overview-box">
                <div class="business-chart bg-box">
                    <h3>Business Overview</h3>
                    <p>January 2024</p>
                    <div class="relative flex flex-col rounded-xl bg-clip-border text-gray-700 shadow-md">
                        <div
                            class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                        </div>
                        <div class="pt-6 px-2 pb-0">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="new-user-panel bg-box">
                    <div class="two-things-align">
                        <div class="text-box">
                            <h3>New Users</h3>
                            <p>{{ \Carbon\Carbon::now()->format('F Y') }}</p>
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
                            @foreach ($currentMonthUsers as $User)
                                <tr>
                                    <td>
                                        <div class="two-things-align">
                                            <div class="user-img">
                                                <img src="{{ asset('assets/new-images/user-panel-img.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="user-detail-box">
                                                <h6>{{ $User->name ?? '' }}</h6>
                                                <p>{{ $User->email ?? '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-role">
                                            <p>
                                                @if ($User->hasRole('land_lord'))
                                                    Landlord
                                                @elseif ($User->hasRole('tenant'))
                                                    Tenant
                                                @elseif ($User->hasRole('admin'))
                                                    Admin
                                                @else
                                                    Null
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-country">
                                            <p>{{ $User->country ?? '' }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-phone">
                                            <p>{{ $User->phone ?? '' }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        const chartData = @json($chartData); // Pass data from backend to JavaScript

        const chartConfig = {
            series: [{
                name: "Revenue",
                data: chartData,
            }, ],
            chart: {
                type: "bar",
                height: 340,
                toolbar: {
                    show: false,
                },
            },
            title: {
                show: false,
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
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
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

        $('input[type="search"]').on('keyup', function() {
            const query = $(this).val();

            $.ajax({
                url: "{{ route('admin.search.users') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    search: query
                },
                success: function(data) {
                    let rows = `
                        <tr>
                            <th>Users</th>
                            <th>Role</th>
                            <th>Country</th>
                            <th>Phone</th>
                        </tr>
                    `;

                    if (data.length > 0) {
                        data.forEach(user => {
                            rows += `
                                <tr>
                                    <td>
                                        <div class="two-things-align">
                                            <div class="user-img">
                                                <img src="/assets/new-images/user-panel-img.png" alt="">
                                            </div>
                                            <div class="user-detail-box">
                                                <h6>${user.name ?? ''}</h6>
                                                <p>${user.email ?? ''}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-role">
                                            <p>
                                                ${user.roles[0].name == 'land_lord' ? 'Landlord' :
                                                user.roles[0].name == 'tenant' ? 'Tenant' :
                                                user.roles[0].name == 'admin' ? 'Admin' : 'Null'}
                                            </p>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-country">
                                            <p>${user.country ?? ''}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-phone">
                                            <p>${user.phone ?? ''}</p>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        rows += `
                            <tr>
                                <td colspan="4" class="text-center">No results found</td>
                            </tr>
                        `;
                    }

                    $('.user-panel-list-box table').html(rows);
                },
                error: function(error) {
                    console.error("Error fetching users:", error);
                }
            });
        });


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
