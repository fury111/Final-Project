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
                        <span class="badge bg-success">{{ ucfirst($order->order_status) }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Order Info -->
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Order Number</small>
                            <strong>#ORD-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</strong>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Date</small>
                            <strong>{{ $order->created_at->format('M j, Y') }}</strong>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Status</small>
                            <strong>{{ ucfirst($order->order_status) }}</strong>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <small class="text-muted d-block">Total</small>
                            <strong>${{ number_format($order->total_amount, 2) }}</strong>
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
                                @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->product->image_path ?? 'https://placehold.co/50x50' }}" class="rounded me-2" alt="{{ $item->product->name }}">
                                            <span>{{ $item->product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">${{ number_format($item->price_at_time * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end text-muted">Subtotal</td>
                                    <td class="text-end">${{ number_format($order->total_amount / 1.08, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end text-muted">Tax</td>
                                    <td class="text-end">${{ number_format($order->total_amount - ($order->total_amount / 1.08), 2) }}</td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="2" class="text-end"><strong>Total</strong></td>
                                    <td class="text-end"><strong class="fs-5" style="color: var(--dd-primary);">${{ number_format($order->total_amount, 2) }}</strong></td>
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
                                {{ $order->address->full_name ?? 'N/A' }}<br>
                                {{ $order->address->address_line1 ?? 'N/A' }}<br>
                                @if($order->address->address_line2)
                                    {{ $order->address->address_line2 }}<br>
                                @endif
                                {{ $order->address->city ?? 'N/A' }}, {{ $order->address->state ?? 'N/A' }} {{ $order->address->postal_code ?? 'N/A' }}<br>
                                {{ $order->address->country ?? 'N/A' }}
                            </address>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-2"><i class="bi bi-credit-card me-2"></i>Payment Details</h6>
                            <p class="text-muted mb-0">
                                Payment processed<br>
                                Order ID: #ORD-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
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
                    A confirmation email has been sent to <strong>{{ $order->user->email ?? 'N/A' }}</strong>
                </p>
                <p class="text-muted small">
                    Questions about your order? <a href="{{ route('contact') }}" class="text-decoration-none">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection