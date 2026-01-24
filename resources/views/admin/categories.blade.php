@extends('layouts.admin_master')

@section('title', 'Categories')

@section('content') 

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add New Category
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter Categories</h6>
    </div>
    <div class="card-body">
        <form method="GET" class="row">
            <div class="col-md-5 mb-3">
                <label class="small font-weight-bold text-dark">Search Name or Slug</label>
                <input type="text" class="form-control" name="search" 
                       value="{{ request('search') }}" 
                       placeholder="e.g. 'Electronics' or 'shoes'...">
            </div>
            <div class="col-md-4 mb-3">
                <label class="small font-weight-bold text-dark">Parent Category</label>
                <select class="form-control" name="parent">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                                {{ request('parent') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-search fa-sm mr-1"></i> Apply Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Categories Management</h6>
        <div class="text-muted small">
            Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTableCategories" width="100%" cellspacing="0">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Parent Category</th>
                        <th>Product Count</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td class="font-weight-bold text-dark">{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            @if($category->parent_category_id)
                                {{ $category->parent->name ?? 'Unknown' }}
                            @else
                                <span class="text-muted">None</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-secondary px-2">
                                {{ $category->products_count ?? $category->products->count() }} Items
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" 
                               class="btn btn-info btn-sm btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                <span class="text">Edit</span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="py-5">
                                <i class="fas fa-folder-open fa-2x text-gray-300 mb-3"></i>
                                <p class="text-gray-500">No categories found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="small text-muted font-italic">
                Page {{ $categories->currentPage() }} of {{ $categories->lastPage() }}
            </div>
            <nav aria-label="Page navigation">
                {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
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
            $('#dataTableCategories').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "paging": true
            });
        });
    </script>
@endsection