@extends('layouts.master')

@section('title', 'Order Details')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/orders">My Orders</a></li>
                <li class="breadcrumb-item active">Order #DD-2026-0458</li>
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
            <!-- Order Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">Order #DD-2026-0458</h4>
                    <p class="text-muted mb-0">Placed on January 15, 2026</p>
                </div>
                <span class="badge bg-info fs-6"><i class="bi bi-hourglass-split me-1"></i>Processing</span>
            </div>

            <!-- Order Progress -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px; background-color: var(--dd-primary); color: white;">
                                <i class="bi bi-check"></i>
                            </div>
                            <p class="small mb-0 fw-bold">Confirmed</p>
                            <small class="text-muted">Jan 15</small>
                        </div>
                        <div class="col">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px; background-color: var(--dd-primary); color: white;">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <p class="small mb-0 fw-bold">Processing</p>
                            <small class="text-muted">Jan 15</small>
                        </div>
                        <div class="col">
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                <i class="bi bi-truck text-muted"></i>
                            </div>
                            <p class="small mb-0 text-muted">Shipped</p>
                            <small class="text-muted">Pending</small>
                        </div>
                        <div class="col">
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                <i class="bi bi-house-check text-muted"></i>
                            </div>
                            <p class="small mb-0 text-muted">Delivered</p>
                            <small class="text-muted">Est. Jan 18-20</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Order Items</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Product</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end pe-4">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/60x60/fff3cd/2D5A27?text=1" class="rounded me-3" alt="Organic Honey">
                                            <div>
                                                <a href="/product/organic-honey" class="text-decoration-none fw-semibold">Organic Honey</a>
                                                <small class="text-muted d-block">500g jar</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">2</td>
                                    <td class="text-end">$12.99</td>
                                    <td class="text-end pe-4"><strong>$25.98</strong></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/60x60/e8f5e9/2D5A27?text=2" class="rounded me-3" alt="Natural Soap Set">
                                            <div>
                                                <a href="/product/natural-soap-set" class="text-decoration-none fw-semibold">Natural Soap Set</a>
                                                <small class="text-muted d-block">3-piece set</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$18.50</td>
                                    <td class="text-end pe-4"><strong>$18.50</strong></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/60x60/c8e6c9/2D5A27?text=3" class="rounded me-3" alt="Green Tea Collection">
                                            <div>
                                                <a href="/product/green-tea-collection" class="text-decoration-none fw-semibold">Green Tea Collection</a>
                                                <small class="text-muted d-block">20 tea bags</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$15.99</td>
                                    <td class="text-end pe-4"><strong>$15.99</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Shipping Info -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-white">
                            <h6 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Shipping Address</h6>
                        </div>
                        <div class="card-body">
                            <address class="mb-0">
                                <strong>John Doe</strong><br>
                                123 Main Street, Apt 4B<br>
                                San Francisco, CA 94102<br>
                                United States<br>
                                <abbr title="Phone">P:</abbr> +1 (555) 123-4567
                            </address>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-white">
                            <h6 class="mb-0"><i class="bi bi-receipt me-2"></i>Order Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span>$60.47</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Discount</span>
                                <span class="text-success">-$6.49</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tax</span>
                                <span>$4.32</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong class="fs-5" style="color: var(--dd-primary);">$58.30</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-4 d-flex gap-2">
                <a href="/orders" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Orders
                </a>
                <button class="btn btn-outline-danger">
                    <i class="bi bi-x-circle me-2"></i>Cancel Order
                </button>
                <a href="/contact" class="btn btn-outline-secondary ms-auto">
                    <i class="bi bi-headset me-2"></i>Need Help?
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
