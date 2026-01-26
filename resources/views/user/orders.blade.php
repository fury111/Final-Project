@extends('layouts.master')

@section('title', 'My Orders')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('account') }}">My Account</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
            @include('partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Order History</h4>
                <a href="{{ route('category') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-2"></i>New Order
                </a>
            </div>

            <!-- Orders List -->
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Order ID</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="ps-4">
                                        <a href="{{ route('order.detail', $order->id) }}" class="text-decoration-none fw-semibold">#ORD-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</a>
                                    </td>
                                    <td>{{ $order->created_at->format('M j, Y') }}</td>
                                    <td>{{ $order->items->count() }} items</td>
                                    <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                                    <td>
                                        @switch($order->order_status)
                                            @case('pending')
                                                <span class="badge bg-info"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                                                @break
                                            @case('Approved')
                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Approved</span>
                                                @break
                                            @case('cancelled')
                                                <span class="badge bg-secondary"><i class="bi bi-x-lg me-1"></i>Cancelled</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">{{ ucfirst($order->order_status) }}</span>
                                        @endswitch
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-outline-primary me-1">View</a>
                                        @if($order->order_status === 'delivered')
                                            <a href="{{ route('cart') }}" class="btn btn-sm btn-outline-success">Reorder</a>
                                        @elseif(in_array($order->order_status, ['pending', 'processing']))
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cancelModal{{ $order->id }}">
                                                Cancel
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                @include('components.pagination')
            </div>

            <!-- Order Stats -->
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-box-seam fs-2" style="color: var(--dd-primary);"></i>
                            <h3 class="mt-2 mb-0">{{ $totalOrders }}</h3>
                            <small class="text-muted">Total Orders</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-truck fs-2 text-info"></i>
                            <h3 class="mt-2 mb-0">{{ $inProgressOrders }}</h3>
                            <small class="text-muted">In Progress</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-currency-dollar fs-2 text-success"></i>
                            <h3 class="mt-2 mb-0">${{ number_format($totalSpent, 2) }}</h3>
                            <small class="text-muted">Total Spent</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($orders as $order)
    @if(in_array($order->order_status, ['pending', 'processing']))
    <!-- Cancel Order Modal -->
    <div class="modal fade" id="cancelModal{{ $order->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancel Order #{{ $order->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this order?</p>
                    <p class="text-muted small mb-0">This action cannot be undone. You will receive a full refund within 3-5 business days.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keep Order</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach
@endsection