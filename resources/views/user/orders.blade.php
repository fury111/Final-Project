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
                                <!-- Order 1 - Processing -->
                                <tr>
                                    <td class="ps-4">
                                        <a href="{{ route('order.detail') }}" class="text-decoration-none fw-semibold">#DD-2026-0458</a>
                                    </td>
                                    <td>Jan 15, 2026</td>
                                    <td>4 items</td>
                                    <td><strong>$58.30</strong></td>
                                    <td>
                                        <span class="badge bg-info"><i class="bi bi-hourglass-split me-1"></i>Processing</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('order.detail') }}" class="btn btn-sm btn-outline-primary me-1">View</a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Order 2 - Shipped -->
                                <tr>
                                    <td class="ps-4">
                                        <a href="{{ route('order.detail') }}" class="text-decoration-none fw-semibold">#DD-2026-0421</a>
                                    </td>
                                    <td>Jan 10, 2026</td>
                                    <td>2 items</td>
                                    <td><strong>$34.99</strong></td>
                                    <td>
                                        <span class="badge bg-primary"><i class="bi bi-truck me-1"></i>Shipped</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('order.detail') }}" class="btn btn-sm btn-outline-primary me-1">View</a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary">Track</a>
                                    </td>
                                </tr>
                                
                                <!-- Order 3 - Delivered -->
                                <tr>
                                    <td class="ps-4">
                                        <a href="{{ route('order.detail') }}" class="text-decoration-none fw-semibold">#DD-2026-0398</a>
                                    </td>
                                    <td>Jan 5, 2026</td>
                                    <td>3 items</td>
                                    <td><strong>$45.50</strong></td>
                                    <td>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Delivered</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('order.detail') }}" class="btn btn-sm btn-outline-primary me-1">View</a>
                                        <a href="{{ route('cart') }}" class="btn btn-sm btn-outline-success">Reorder</a>
                                    </td>
                                </tr>
                                
                                <!-- Order 4 - Delivered -->
                                <tr>
                                    <td class="ps-4">
                                        <a href="{{ route('order.detail') }}" class="text-decoration-none fw-semibold">#DD-2025-1245</a>
                                    </td>
                                    <td>Dec 28, 2025</td>
                                    <td>1 item</td>
                                    <td><strong>$12.99</strong></td>
                                    <td>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Delivered</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('order.detail') }}" class="btn btn-sm btn-outline-primary me-1">View</a>
                                        <a href="{{ route('cart') }}" class="btn btn-sm btn-outline-success">Reorder</a>
                                    </td>
                                </tr>
                                
                                <!-- Order 5 - Cancelled -->
                                <tr class="table-secondary">
                                    <td class="ps-4">
                                        <a href="{{ route('order.detail') }}" class="text-decoration-none fw-semibold text-muted">#DD-2025-1198</a>
                                    </td>
                                    <td class="text-muted">Dec 20, 2025</td>
                                    <td class="text-muted">2 items</td>
                                    <td class="text-muted"><strong>$27.48</strong></td>
                                    <td>
                                        <span class="badge bg-secondary"><i class="bi bi-x-lg me-1"></i>Cancelled</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('order.detail') }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                </tr>
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
                            <h3 class="mt-2 mb-0">12</h3>
                            <small class="text-muted">Total Orders</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-truck fs-2 text-info"></i>
                            <h3 class="mt-2 mb-0">2</h3>
                            <small class="text-muted">In Progress</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-currency-dollar fs-2 text-success"></i>
                            <h3 class="mt-2 mb-0">$523.80</h3>
                            <small class="text-muted">Total Spent</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Order Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancel Order</h5>
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
@endsection