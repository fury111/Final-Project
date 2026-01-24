@extends('layouts.admin_master')
@section('title', 'Orders Management')

@section('content') 
<h1 class="h3 mb-4 text-gray-800">Orders Management</h1>

<div class="row mb-4">
    <div class="col-md-3">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingOrdersCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableOrders" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Order Status</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#ORD-{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                        <td class="font-weight-bold">${{ number_format($order->total_amount, 2) }}</td>
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
                                @default
                                    <span class="badge badge-secondary">{{ ucfirst($order->order_status) }}</span>
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-sm" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>

                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Update Status
                                </button>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                    <h6 class="dropdown-header">Mark as:</h6>
                                    <a class="dropdown-item text-success" href="#" data-toggle="modal" data-target="#statusModal" 
                                       data-order-id="{{ $order->id }}" data-order="#ORD-{{ $order->id }}" data-action="delivered">
                                        <i class="fas fa-check-circle fa-sm fa-fw mr-2"></i> Delivered
                                    </a>
                                    <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#statusModal" 
                                       data-order-id="{{ $order->id }}" data-order="#ORD-{{ $order->id }}" data-action="cancelled">
                                        <i class="fas fa-times-circle fa-sm fa-fw mr-2"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-left-primary shadow">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary">Confirm Status Change</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to <span id="modalAction" class="font-weight-bold"></span> order <span id="modalOrderId" class="text-primary font-weight-bold"></span>?
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                <form id="statusForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="order_status" id="statusInput">
                    <button type="submit" class="btn btn-primary">Confirm Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#statusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var orderId = button.data('order-id');
        var order = button.data('order');
        var action = button.data('action');
        
        var modal = $(this);
        var actionText = action.charAt(0).toUpperCase() + action.slice(1);
        
        modal.find('#modalAction').text(actionText);
        modal.find('#modalOrderId').text(order);
        modal.find('#statusForm').attr('action', '/admin/orders/' + orderId);
        modal.find('#statusInput').val(action);
    });
});
</script>
@endsection