@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/cart">Cart</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <h1 class="h3 mb-4">Checkout</h1>

    <!-- Progress Steps -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-2" style="width: 40px; height: 40px; background-color: var(--dd-primary);">
                        <i class="bi bi-check"></i>
                    </div>
                    <small class="d-block">Cart</small>
                </div>
                <div class="flex-grow-1 mx-2" style="height: 2px; background-color: var(--dd-primary);"></div>
                <div class="text-center">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-2" style="width: 40px; height: 40px; background-color: var(--dd-primary);">
                        2
                    </div>
                    <small class="d-block fw-bold">Checkout</small>
                </div>
                <div class="flex-grow-1 mx-2" style="height: 2px; background-color: var(--dd-border);"></div>
                <div class="text-center">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-muted bg-light mb-2" style="width: 40px; height: 40px;">
                        3
                    </div>
                    <small class="d-block text-muted">Confirmation</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Checkout Form -->
        <div class="col-lg-8">
            <!-- Billing Address -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Billing Address</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="John">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Doe">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="john@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Street Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="123 Main St">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Apartment, suite, etc. (optional)</label>
                            <input type="text" class="form-control" placeholder="Apt 4B">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="New York">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select class="form-select">
                                <option value="">Choose...</option>
                                <option value="CA">California</option>
                                <option value="NY">New York</option>
                                <option value="TX">Texas</option>
                                <option value="FL">Florida</option>
                                <option value="WA">Washington</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">ZIP Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="10001">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sameAsShipping" checked>
                                <label class="form-check-label" for="sameAsShipping">
                                    Shipping address same as billing
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Method -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-truck me-2"></i>Shipping Method</h5>
                </div>
                <div class="card-body">
                    <div class="form-check mb-3 p-3 border rounded">
                        <input class="form-check-input" type="radio" name="shipping" id="standard" checked>
                        <label class="form-check-label w-100" for="standard">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Standard Shipping</strong>
                                    <p class="text-muted small mb-0">5-7 business days</p>
                                </div>
                                <span class="text-success fw-bold">FREE</span>
                            </div>
                        </label>
                    </div>
                    <div class="form-check mb-3 p-3 border rounded">
                        <input class="form-check-input" type="radio" name="shipping" id="express">
                        <label class="form-check-label w-100" for="express">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Express Shipping</strong>
                                    <p class="text-muted small mb-0">2-3 business days</p>
                                </div>
                                <span class="fw-bold">$9.99</span>
                            </div>
                        </label>
                    </div>
                    <div class="form-check p-3 border rounded">
                        <input class="form-check-input" type="radio" name="shipping" id="overnight">
                        <label class="form-check-label w-100" for="overnight">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Overnight Shipping</strong>
                                    <p class="text-muted small mb-0">Next business day</p>
                                </div>
                                <span class="fw-bold">$19.99</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-credit-card me-2"></i>Payment Method</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="form-check mb-3 p-3 border rounded">
                            <input class="form-check-input" type="radio" name="payment_method" id="creditCard" checked>
                            <label class="form-check-label w-100" for="creditCard">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-credit-card me-2"></i>Credit / Debit Card</span>
                                    <img src="https://placehold.co/100x24/f5f5f5/999999?text=Cards" alt="Cards">
                                </div>
                            </label>
                        </div>
                        
                        <div class="form-check mb-3 p-3 border rounded">
                            <input class="form-check-input" type="radio" name="payment_method" id="paypal">
                            <label class="form-check-label w-100" for="paypal">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-paypal me-2"></i>PayPal</span>
                                    <span class="text-primary fw-bold">PayPal</span>
                                </div>
                            </label>
                        </div>

                        <div class="form-check p-3 border rounded">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod">
                            <label class="form-check-label w-100" for="cod">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-cash me-2"></i>Cash on Delivery</span>
                                    <span class="badge bg-secondary">+$2.00</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Credit Card Form -->
                    <div id="creditCardForm">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Name on Card <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="John Doe">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Card Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Expiration Date <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="MM/YY">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">CVV <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="123">
                                    <span class="input-group-text" title="3-digit code on back of card">
                                        <i class="bi bi-question-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary Sidebar -->
        <div class="col-lg-4">
            <div class="card sticky-top" style="top: 100px;">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    <!-- Order Items -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/50x50/fff3cd/2D5A27?text=1" class="rounded me-2" alt="Product" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <small class="d-block">Organic Honey</small>
                                    <small class="text-muted">x2</small>
                                </div>
                            </div>
                            <span>$25.98</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/50x50/e8f5e9/2D5A27?text=2" class="rounded me-2" alt="Product" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <small class="d-block">Natural Soap Set</small>
                                    <small class="text-muted">x1</small>
                                </div>
                            </div>
                            <span>$18.50</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/50x50/c8e6c9/2D5A27?text=3" class="rounded me-2" alt="Product" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <small class="d-block">Green Tea Collection</small>
                                    <small class="text-muted">x1</small>
                                </div>
                            </div>
                            <span>$15.99</span>
                        </div>
                    </div>

                    <a href="/cart" class="small text-decoration-none"><i class="bi bi-pencil me-1"></i>Edit Cart</a>

                    <hr>

                    <!-- Totals -->
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
                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong class="fs-4" style="color: var(--dd-primary);">$58.30</strong>
                    </div>

                    <a href="/confirmation" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-lock me-2"></i>Place Order
                    </a>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="bi bi-shield-check me-1"></i>
                            Your payment is secure and encrypted
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
