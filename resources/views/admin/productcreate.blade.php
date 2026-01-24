@extends('layouts.admin_master') <!-- Use the layout -->

@section('title', 'Dashboard') <!-- Set the page title -->

@section('css')

@endsection

@section('content') 
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Product</h1>
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name" class="font-weight-bold">Product Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
               placeholder="e.g. Wireless Headphones" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description" class="font-weight-bold">Product Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" 
                  placeholder="Enter product description here..." rows="4">{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_id" class="font-weight-bold">Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="price" class="font-weight-bold">Price ($)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" 
                           placeholder="0.00" value="{{ old('price') }}" required>
                </div>
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="stock_quantity" class="font-weight-bold">Stock Amount</label>
                <input type="number" name="stock_quantity" id="stock_quantity" class="form-control @error('stock_quantity') is-invalid @enderror" 
                       placeholder="0" value="{{ old('stock_quantity') }}" required>
                @error('stock_quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="image" class="font-weight-bold">Product Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" 
                           id="customFile" accept="image/*">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <small class="form-text text-muted">Recommended size: 800x800px (Max 2MB).</small>
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <hr>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary px-4">
            <i class="fas fa-save mr-1"></i> Save Product
        </button>
        <button type="reset" class="btn btn-light border px-4 ml-2">Reset</button>
    </div>
</form>


            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-info-circle mr-1"></i> Quick Tips</h6>
            </div>
            <div class="card-body">
                <p class="small">Provide a clear and concise product name for better search results.</p>
                <p class="small">Ensure your <strong>stock amount</strong> is accurate to prevent overselling on the storefront.</p>
                <p class="small mb-0">Images should be in <strong>JPG or PNG</strong> format for faster loading times.</p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
document.getElementById('customFile').addEventListener('change', function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
    document.querySelector('.custom-file-label').textContent = fileName;
});
</script>
   
   <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
   <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection