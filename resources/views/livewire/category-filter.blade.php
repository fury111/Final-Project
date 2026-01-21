<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @if($category)
                        <li class="breadcrumb-item"><a href="{{ route('category') }}">Categories</a></li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    @else
                        <li class="breadcrumb-item active">Shop All</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-4">
                <div class="sidebar">
                    <h5 class="sidebar-title">Filters</h5>
                    
                    <!-- Search -->
                    <div class="mb-3">
                        <h6>Search</h6>
                        <input type="text" wire:model.live.debounce.300ms="search" class="form-control form-control-sm" 
                               placeholder="Search products...">
                    </div>

                    <!-- Price Filter -->
                    <div class="mb-3">
                        <h6>Price Range</h6>
                        <div class="mb-2">
                            <input type="number" wire:model.live="priceMin" class="form-control form-control-sm" 
                                   placeholder="Min">
                        </div>
                        <div class="mb-2">
                            <input type="number" wire:model.live="priceMax" class="form-control form-control-sm" 
                                   placeholder="Max">
                        </div>
                    </div>

                    <!-- Stock Filter -->
                    <div class="mb-3">
                        <h6>Availability</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model.live="inStock" 
                                   id="inStock">
                            <label class="form-check-label" for="inStock">In Stock Only</label>
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    @if($inStock || $priceMin || $priceMax || $search)
                        <div class="mt-3">
                            <button wire:click="clearFilters" class="btn btn-sm btn-outline-secondary">Clear Filters</button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                <!-- Header & Sort -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <div>
                        <h1 class="h4 mb-1">
                            {{ $category ? $category->name . ' Products' : 'Shop All Products' }}
                        </h1>
                        <p class="text-muted mb-0 small">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products</p>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <label class="text-muted small text-nowrap">Sort by:</label>
                        <select wire:model.live="sortBy" class="form-select form-select-sm" style="width: auto;">
                            <option value="newest">Newest</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                            <option value="name_asc">Name: A-Z</option>
                            <option value="name_desc">Name: Z-A</option>
                        </select>
                        <div class="btn-group ms-2">
                            <button class="btn btn-outline-secondary btn-sm active"><i class="bi bi-grid-3x3-gap-fill"></i></button>
                            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-list"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Active Filters -->
                @if($inStock || $priceMin || $priceMax || $search)
                    <div class="mb-3">
                        @if($inStock)
                            <span class="badge bg-light text-dark border me-2 px-3 py-2">
                                In Stock <button type="button" class="btn-close ms-2" style="font-size: 0.5rem;" 
                                              wire:click="removeFilter('in_stock')"></button>
                            </span>
                        @endif
                        @if($priceMin)
                            <span class="badge bg-light text-dark border me-2 px-3 py-2">
                                Min: ${{ $priceMin }} <button type="button" class="btn-close ms-2" style="font-size: 0.5rem;" 
                                                              wire:click="removeFilter('price_min')"></button>
                            </span>
                        @endif
                        @if($priceMax)
                            <span class="badge bg-light text-dark border me-2 px-3 py-2">
                                Max: ${{ $priceMax }} <button type="button" class="btn-close ms-2" style="font-size: 0.5rem;" 
                                                             wire:click="removeFilter('price_max')"></button>
                            </span>
                        @endif
                        @if($search)
                            <span class="badge bg-light text-dark border me-2 px-3 py-2">
                                Search: "{{ $search }}" <button type="button" class="btn-close ms-2" style="font-size: 0.5rem;" 
                                                               wire:click="removeFilter('search')"></button>
                            </span>
                        @endif
                        <a href="#" class="small text-danger" wire:click.prevent="clearFilters">Clear All</a>
                    </div>
                @endif

                <!-- Product Grid -->
                <div class="row g-4">
                    @forelse($products as $product)
                        <div class="col-6 col-md-4">
                            <!-- Fixed the route issue here -->
                            <a href="{{ route('product', $product->slug) }}" class="text-decoration-none">
                                @include('components.product-card', [
                                    'product' => [
                                        'name' => $product->name,
                                        'price' => $product->price,
                                        'category' => $product->category->name ?? 'Uncategorized',
                                        'image' => $product->image_path,
                                        'slug' => $product->slug, // ← This was missing
                                        'stock' => $product->stock_quantity,
                                        'sale' => $product->flashSale ? true : false,
                                        'old_price' => $product->flashSale ? $product->price * 1.2 : null
                                    ]
                                ])
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="bi bi-box-seam fs-1 text-muted mb-3"></i>
                                <h5 class="text-muted">No products found</h5>
                                <p class="text-muted">No products match your current filters.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>