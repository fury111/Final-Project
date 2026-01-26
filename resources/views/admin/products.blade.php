@extends('layouts.admin_master')

@section('title', 'Products Management')

@section('content') 
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Product
        </a>
    </div>

    

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
            <div class="text-muted small">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td class="text-center">
                                <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://via.placeholder.com/60x60?text=Product' }}" 
                                     alt="{{ $product->name }}" 
                                     class="img-fluid rounded border" 
                                     style="max-width: 50px;">
                            </td>
                            <td>{{ $product->id }}</td>
                            <td class="font-weight-bold text-dark">{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                @if($product->stock_quantity > 10)
                                    <span class="badge badge-success">In Stock</span>
                                @elseif($product->stock_quantity > 0)
                                    <span class="badge badge-warning">Low Stock</span>
                                @else
                                    <span class="badge badge-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" 
                                   class="btn btn-sm btn-info rounded-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger rounded-circle"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="py-5">
                                    <i class="fas fa-box-open fa-2x text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">No products found matching your criteria.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                
                <nav aria-label="Page navigation example">
                    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 5,
                "ordering": true,
                "searching": true,
                "paging": true
            });
        });
    </script>
@endsection