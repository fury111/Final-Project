@extends('layouts.master')

@section('title', 'Order Confirmed')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Success Alert -->
            <div class="text-center mb-5">
                <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <i class="bi bi-check-lg text-white" style="font-size: 3rem;"></i>
                </div>
                <h1 class="h2 mb-2">Thank You for Your Order!</h1>
                <p class="text-muted lead">Your order has been successfully placed.</p>
            </div>

            <!-- Order Details Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Order Confirmation</h5>
                        <span class="badge bg-success">Confirmed</span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Order Info -->
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Order Number</small>
                            <strong>#DD-2026-0458</strong>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Date</small>
                            <strong>January 15, 2026</strong>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Payment Method</small>
                            <strong>Credit Card</strong>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Estimated Delivery</small>
                            <strong>Jan 18-20, 2026</strong>
                        </div>
                    </div>

                    <hr>

                    <!-- Receipt Summary -->
                    <h6 class="mb-3">Order Summary</h6>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="table-light">
                                <tr>
                                    <th>Item</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/50x50/fff3cd/2D5A27?text=1  " class="rounded me-2" alt="Organic Honey">
                                            <span>Organic Honey (500g)</span>
                                        </div>
                                    </td>
                                    <td class="text-center">2</td>
                                    <td class="text-end">$25.98</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/50x50/e8f5e9/2D5A27?text=2  " class="rounded me-2" alt="Natural Soap Set">
                                            <span>Natural Soap Set</span>
                                        </div>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$18.50</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/50x50/c8e6c9/2D5A27?text=3  " class="rounded me-2" alt="Green Tea Collection">
                                            <span>Green Tea Collection</span>
                                        </div>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$15.99</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end text-muted">Subtotal</td>
                                    <td class="text-end">$60.47</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end text-muted">Discount</td>
                                    <td class="text-end text-success">-$6.49</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end text-muted">Shipping</td>
                                    <td class="text-end">Free</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end text-muted">Tax</td>
                                    <td class="text-end">$4.32</td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="2" class="text-end"><strong>Total</strong></td>
                                    <td class="text-end"><strong class="fs-5" style="color: var(--dd-primary);">$58.30</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <hr>

                    <!-- Shipping Address -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="mb-2"><i class="bi bi-geo-alt me-2"></i>Shipping Address</h6>
                            <address class="text-muted mb-0">
                                John Doe<br>
                                123 Main Street, Apt 4B<br>
                                San Francisco, CA 94102<br>
                                United States
                            </address>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-2"><i class="bi bi-credit-card me-2"></i>Payment Details</h6>
                            <p class="text-muted mb-0">
                                Visa ending in 4242<br>
                                Billing address same as shipping
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="{{ route('orders') }}" class="btn btn-primary">
                    <i class="bi bi-list-ul me-2"></i>View Order History
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="bi bi-shop me-2"></i>Continue Shopping
                </a>
            </div>

            <!-- Help Section -->
            <div class="text-center mt-5">
                <p class="text-muted small mb-2">
                    <i class="bi bi-envelope me-1"></i>
                    A confirmation email has been sent to <strong>john.doe@example.com</strong>
                </p>
                <p class="text-muted small">
                    Questions about your order? <a href="{{ route('contact') }}" class="text-decoration-none">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection