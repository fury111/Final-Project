@extends('layouts.master')

@section('title', 'Shopping Cart')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <h1 class="h3 mb-4">Shopping Cart</h1>

    <div class="row g-4">
        <!-- Cart Items -->
        <div class="col-lg-8">
            @if($items->isEmpty())
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-cart fs-1 text-muted mb-3"></i>
                        <h5>Your cart is empty</h5>
                        <p class="text-muted">Add some products to your cart</p>
                        <a href="{{ route('category') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body p-0">
                        @foreach($items as $item)
                            <div class="d-flex p-3 border-bottom">
                                <img src="{{ $item->product->image_path ?? 'https://placehold.co/100x100' }}" 
                                     class="rounded me-3" 
                                     alt="{{ $item->product->name }}"
                                     style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="{{ route('product', $item->product->slug) }}" 
                                                   class="text-decoration-none text-dark">
                                                    {{ $item->product->name }}
                                                </a>
                                            </h6>
                                            <small class="text-muted">{{ Str::limit($item->product->description, 100) }}</small>
                                        </div>
                                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0" title="Remove item">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end mt-2">
                                        <div class="input-group" style="max-width: 120px;">
                                            <form method="POST" action="{{ route('cart.update') }}" class="d-flex">
                                                @csrf
                                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                <button class="btn btn-outline-secondary btn-sm" type="submit" name="quantity" value="{{ max(1, $item->quantity - 1) }}">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="number" name="quantity" 
                                                       class="form-control form-control-sm text-center" 
                                                       value="{{ $item->quantity }}" 
                                                       min="1" 
                                                       max="{{ $item->product->stock_quantity }}"
                                                       onchange="this.form.submit()">
                                                <button class="btn btn-outline-secondary btn-sm" type="submit" name="quantity" value="{{ min($item->product->stock_quantity, $item->quantity + 1) }}">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <span class="fw-bold" style="color: var(--dd-primary);">
                                            ${{ number_format($item->item_total, 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Continue Shopping -->
                <div class="mt-3 d-flex justify-content-between">
                    <a href="{{ route('category') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                    </a>
                    <form method="POST" action="{{ route('cart.clear') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash me-2"></i>Clear Cart
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            @if(!$items->isEmpty())
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        
                        <!-- Coupon Code -->
                        <div class="mb-4">
                            <label class="form-label small text-muted">Coupon Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter code">
                                <button class="btn btn-outline-primary" type="button">Apply</button>
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="border-top pt-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal ({{ $items->sum('quantity') }} items)</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Discount</span>
                                <span class="text-success">-$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tax (estimated)</span>
                                <span>${{ number_format($tax, 2) }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Total</strong>
                                <strong class="fs-4" style="color: var(--dd-primary);">${{ number_format($total, 2) }}</strong>
                            </div>

                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg w-100">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Security Badge -->
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="bi bi-shield-lock me-1"></i>Secure checkout
                    </small>
                    <div class="mt-2">
                        <img src="https://placehold.co/200x30/f5f5f5/999999?text=Payment+Methods" alt="Payment methods" class="img-fluid">
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- You May Also Like -->
    @if($items->isNotEmpty())
        <section class="mt-5">
            <h4 class="mb-4">You May Also Like</h4>
            <div class="row g-4">
                @php
                    // Get IDs of items currently in cart to exclude them
                    $cartProductIds = $items->pluck('product.id')->toArray();
                    
                    // Get random products that are not in the cart
                    $recommended = \App\Models\Product::whereNotIn('id', $cartProductIds)
                        ->where('stock_quantity', '>', 0) // Only show products in stock
                        ->inRandomOrder()
                        ->limit(4)
                        ->get();
                @endphp
                @foreach($recommended as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('components.product-card', [
                            'product' => [
                                'name' => $product->name,
                                'price' => $product->price,
                                'category' => $product->category->name ?? 'Uncategorized',
                                'image' => $product->image_path,
                                'slug' => $product->slug,
                                'stock' => $product->stock_quantity,
                                'sale' => false,
                                'old_price' => null
                            ]
                        ])
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection