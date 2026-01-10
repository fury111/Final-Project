

@extends('layouts.admin_master') <!-- Use the layout -->

@section('title', 'Dashboard') <!-- Set the page title -->

@section('css')
    <!-- Optional: Add page-specific CSS here if needed -->
    <!-- Example: <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
@endsection


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Category</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Categories
    </a>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
            </div>
            <div class="card-body">
                <form action="{{-- route('categories.store') --}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. Electronics or Summer Collection" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parent_id" class="font-weight-bold">Parent Category (Optional)</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">None (Top Level)</option>
                            {{-- Replace with @foreach($categories as $cat) --}}
                            <option value="1">Electronics</option>
                            <option value="2">Fashion</option>
                            {{-- End @foreach --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image" class="font-weight-bold">Category Image/Icon</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="categoryImage" accept="image/*">
                            <label class="custom-file-label" for="categoryImage">Choose category image...</label>
                        </div>
                        <small class="form-text text-muted">A clear icon or representative image (Max 1MB).</small>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <hr>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Create Category</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-eye mr-1"></i> Image Preview</h6>
            </div>
            <div class="card-body text-center">
                <div class="p-3 border rounded bg-light mb-3" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                    <img id="preview-img" src="https://dummyimage.com/200x200/dddfeb/6e707e.png&text=No+Image" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 180px;">
                </div>
                <p class="text-muted small">This image will appear on your store's navigation or category grid.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
   
   <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
   <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection