@extends('layouts.admin_master') <!-- Use the layout -->

@section('title', 'Dashboard') <!-- Set the page title -->

@section('css')
    <!-- Optional: Add page-specific CSS here if needed -->
    <!-- Example: <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
@endsection

@section('content') 

<h1 class="h3 mb-4 text-gray-800">Orders Management</h1>

<div class="row mb-4">
    <div class="col-md-3">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
        {{-- Optional: A dropdown for quick filtering could go here, like in the image example --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableOrders" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date Placed</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Replace with @foreach($orders as $order) --}}
                    <tr>
                        <td><a href="#">#ORD-7829</a></td>
                        <td>Douglas McGee</td>
                        <td>2023/10/25 14:30</td>
                        <td class="font-weight-bold">$329.50</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td><h5><span class="badge badge-warning">Pending</span></h5></td>
                        <td>
                            <a href="{{-- route('orders.show', $order->id) --}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#">#ORD-7828</a></td>
                        <td>Gavin Joyce</td>
                        <td>2023/10/24 09:15</td>
                        <td class="font-weight-bold">$1,200.00</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td><h5><span class="badge badge-info">Processing</span></h5></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#">#ORD-7827</a></td>
                        <td>Jenna Smith</td>
                        <td>2023/10/23 18:00</td>
                        <td class="font-weight-bold">$55.00</td>
                        <td><span class="badge badge-danger">Failed</span></td>
                        <td><h5><span class="badge badge-danger">Cancelled</span></h5></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                     {{-- End Loop --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('js')
   
   <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
   <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection