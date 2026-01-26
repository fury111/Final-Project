@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cart') }}">Cart</a></li>
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
            <form method="POST" action="{{ route('checkout.store') }}" id="checkout-form">
                @csrf
                
                <!-- Address Selection -->
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Select Address</h5>
                    </div>
                    <div class="card-body">
                        @if($addresses->count() > 0)
                            <div class="mb-3">
                                @foreach($addresses as $address)
                                <div class="form-check mb-2 p-3 border rounded">
                                    <input class="form-check-input" type="radio" name="address_id" id="address_{{ $address->id }}" value="{{ $address->id }}" {{ $loop->first ? 'checked' : '' }}>
                                    <label class="form-check-label w-100" for="address_{{ $address->id }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $address->full_name }}</strong>
                                                <p class="text-muted small mb-0">{{ $address->address_line1 }}, {{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</p>
                                                <span class="badge bg-secondary">{{ $address->label }}</span>
                                                @if($address->is_default)
                                                    <span class="badge bg-primary">Default</span>
                                                @endif
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-warning">
                                No saved addresses found. Please <a href="{{ route('addresses.create') }}">add an address</a> first.
                            </div>
                        @endif
                        
                        <a href="{{ route('addresses.create') }}" class="btn btn-outline-primary">
                            <i class="bi bi-plus me-1"></i>Add New Address
                        </a>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-credit-card me-2"></i>Payment Method</h5>
                    </div>
                    <div class="card-body">
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
                
                <input type="hidden" name="total_amount" value="{{ $finalTotal }}">
                <input type="hidden" name="discount_amount" value="{{ $discountAmount ?? 0 }}">
                <input type="hidden" name="applied_coupon" value="{{ $appliedCouponCode ?? '' }}">
            </form>
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
                        @foreach($items as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <img src="{{ $item->product->image_path ?? 'https://placehold.co/50x50' }}" class="rounded me-2" alt="{{ $item->product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <small class="d-block">{{ $item->product->name }}</small>
                                    <small class="text-muted">x{{ $item->quantity }}</small>
                                </div>
                            </div>
                            <span>${{ number_format($item->quantity * $item->product->price, 2) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <a href="{{ route('cart') }}" class="small text-decoration-none"><i class="bi bi-pencil me-1"></i>Edit Cart</a>

                    <hr>

                    <!-- Totals -->
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    @if($appliedCouponCode && $discountAmount > 0)
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Discount</span>
                        <span class="text-success">-${{ number_format($discountAmount, 2) }}</span>
                    </div>
                    @else
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Discount</span>
                        <span class="text-success">-$0.00</span>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Shipping</span>
                        <span class="text-success">Free</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tax</span>
                        <span>${{ number_format($tax, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong class="fs-4" style="color: var(--dd-primary);">${{ number_format($finalTotal, 2) }}</strong>
                    </div>

                    <button type="submit" form="checkout-form" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-lock me-2"></i>Place Order
                    </button>

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

@section('scripts')
<script>
    // Form submission handler
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate address selection
        const selectedAddress = document.querySelector('input[name="address_id"]:checked');
        if (!selectedAddress) {
            alert('Please select an address before placing your order.');
            return;
        }
        
        // Show loading state
        const submitBtn = document.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Processing...';
        submitBtn.disabled = true;
        
        // Submit form
        this.submit();
    });
</script>
@endsection