@extends('layouts.admin_master')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content') 
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Daily) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Profit (Daily)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($dailyEarnings, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Profit (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($monthlyEarnings, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Today Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Orders (Today)</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ordersToday }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ $ordersToday > 0 ? min(100, ($ordersToday / max(1, $pendingOrders + $ordersToday)) * 100) : 0 }}%" 
                                            aria-valuenow="{{ $ordersToday > 0 ? min(100, ($ordersToday / max(1, $pendingOrders + $ordersToday)) * 100) : 0 }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingOrders }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Profit Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Options:</div>
                            <a class="dropdown-item" href="#">Export Data</a>
                            <a class="dropdown-item" href="#">Refresh Graph</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Recent Orders Section -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Orders (Approved Only)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Profit</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                            @if($order->order_status === 'delivered' || $order->order_status === 'approved') <!-- Only show approved orders -->
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? 'Guest' }}</td>
                                <td>{{ $order->user->email ?? 'N/A' }}</td>
                                <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                                <td>
                                    @switch($order->order_status)
                                        @case('pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @break
                                        @case('delivered')
                                            <span class="badge badge-success">Delivered</span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge badge-danger">Cancelled</span>
                                            @break
                                        @case('approved')
                                            <span class="badge badge-success">Approved</span>
                                            @break
                                        @default
                                            <span class="badge badge-secondary">{{ ucfirst($order->order_status) }}</span>
                                    @endswitch
                                </td>
                                <td>{{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Stats Cards -->
    <div class="row">
        <!-- Top Selling Products -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top Selling Products</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($topSellingProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge badge-primary badge-pill">{{ $product->order_items_count }} sales</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <!-- Active Coupons -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Active Coupons</h6>
                </div>
                <div class="card-body">
                    <p><strong>Active:</strong> {{ $activeCoupons }}</p>
                    <a href="{{ route('admin.coupon.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Stats -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Total Users:</strong> {{ $totalUsers }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>New This Month:</strong> {{ $newUsersThisMonth }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary">View All Users</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('js')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script>
        // Area Chart
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Profit",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 1)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 2)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 3)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 4)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 5)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 6)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 7)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 8)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 9)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 10)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 11)->sum('total_amount') }},
                        {{ \App\Models\Order::where('order_status', 'delivered')->orWhere('order_status', 'approved')->whereMonth('created_at', 12)->sum('total_amount') }}
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

        // Pie Chart
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Direct", "Social", "Referral"],
                datasets: [{
                    data: [55, 30, 15],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });

        // Format number function
        function number_format(number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "paging": true
            });
        });
    </script>
@endsection