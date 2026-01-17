<!-- Reusable Product Card Component -->
<!-- Usage: @include('components.product-card', ['product' => $product]) -->
<div class="card product-card h-100">
    <!-- Product Image -->
    <div class="product-image position-relative overflow-hidden">
        <!-- Badges -->
        @if(isset($product['sale']) && $product['sale'])
            <div class="product-badge">
                <span class="badge bg-danger">SALE</span>
            </div>
        @elseif(isset($product['stock']) && $product['stock'] == 0)
            <div class="product-badge">
                <span class="badge bg-secondary">Out of Stock</span>
            </div>
        @elseif(isset($product['stock']) && $product['stock'] < 10)
            <div class="product-badge">
                <span class="badge bg-warning text-dark">Low Stock</span>
            </div>
        @endif
        
        <!-- Quick Actions -->
        <div class="product-actions">
            <a href="/wishlist" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/product/{{ $product['slug'] ?? 'sample-product' }}" title="Quick View"><i class="bi bi-eye"></i></a>
        </div>
        
        <a href="/product/{{ $product['slug'] ?? 'sample-product' }}">
            <img src="{{ $product['image'] ?? 'https://placehold.co/400x300/e8f5e9/2D5A27?text=Product' }}" 
                 class="card-img-top" 
                 alt="{{ $product['name'] ?? 'Product Name' }}">
        </a>
    </div>
    
    <div class="card-body d-flex flex-column">
        <p class="text-muted small mb-1">{{ $product['category'] ?? 'Category' }}</p>
        <h6 class="product-title mb-2">
            <a href="/product/{{ $product['slug'] ?? 'sample-product' }}">
                {{ $product['name'] ?? 'Product Name' }}
            </a>
        </h6>
        
        <!-- Rating -->
        <div class="product-rating mb-2">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
            <span class="text-muted small ms-1">(24)</span>
        </div>
        
        <div class="mt-auto">
            <div class="product-price mb-2">
                ${{ number_format($product['price'] ?? 9.99, 2) }}
                @if(isset($product['old_price']))
                    <span class="original-price">${{ number_format($product['old_price'], 2) }}</span>
                @endif
            </div>
            <a href="/cart" class="btn btn-primary btn-sm w-100 {{ (isset($product['stock']) && $product['stock'] == 0) ? 'disabled' : '' }}">
                <i class="bi bi-cart-plus me-1"></i>Add to Cart
            </a>
        </div>
    </div>
</div>
