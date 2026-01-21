<!-- Dynamic Product Card Component -->
<div class="card h-100 product-card">
    <div class="product-image position-relative">
        <img src="{{ $product['image'] ?? 'https://placehold.co/300x200/e8f5e9/2D5A27?text=Product' }}" 
             class="card-img-top" 
             alt="{{ $product['name'] ?? 'Sample Product' }}">
        
        @if($product['sale'] ?? false)
            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Sale</span>
        @endif
        
        @if(($product['stock'] ?? 0) <= 0)
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                <span class="text-white fw-bold">Out of Stock</span>
            </div>
        @endif
    </div>
    
    <div class="card-body">
        <h6 class="card-title">{{ $product['name'] ?? 'Sample Product' }}</h6>
        <p class="text-muted">Category: {{ $product['category'] ?? 'Uncategorized' }}</p>
        
        <div class="d-flex align-items-center">
            @if(($product['old_price'] ?? null) && ($product['sale'] ?? false))
                <p class="text-primary fw-bold mb-0 me-2">${{ number_format($product['old_price'], 2) }}</p>
                <p class="text-muted text-decoration-line-through small mb-0 me-2">${{ number_format($product['price'], 2) }}</p>
            @else
                <p class="text-primary fw-bold mb-0">${{ number_format($product['price'] ?? 0, 2) }}</p>
            @endif
        </div>
        
        @if(($product['stock'] ?? 0) > 0)
            <a href="{{ route('product', ['slug' => $product['slug']]) }}" class="btn btn-primary btn-sm">View Details</a>
        @else
            <button class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
        @endif
    </div>
</div>