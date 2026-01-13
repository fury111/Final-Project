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
        <form class="row">
            <div class="col-md-5 mb-3">
                <label class="small font-weight-bold text-dark">Search Name or Slug</label>
                <input type="text" class="form-control" id="searchCategory" placeholder="e.g. 'Electronics' or 'shoes'...">
            </div>
            <div class="col-md-4 mb-3">
                <label class="small font-weight-bold text-dark">Parent Category</label>
                <select class="form-control" id="filterParent">
                    <option value="">All Categories</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Home & Garden">Home & Garden</option>
                </select>
            </div>
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <button type="button" class="btn btn-primary btn-block">
                    <i class="fas fa-search fa-sm mr-1"></i> Apply Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Categories Management</h6>
        <div class="text-muted small">Showing 1 to 2 of 12 categories</div>
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
                    <tr>
                        <td>1</td>
                        <td class="font-weight-bold text-dark">Electronics</td>
                        <td>electronics</td>
                        <td><span class="text-muted">None</span></td>
                        <td><span class="badge badge-secondary px-2">150 Items</span></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                <span class="text">Edit</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="font-weight-bold text-dark">Headphones</td>
                        <td>headphones</td>
                        <td>Electronics</td>
                        <td><span class="badge badge-secondary px-2">45 Items</span></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                <span class="text">Edit</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="small text-muted font-italic">Page 1 of 2</div>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection