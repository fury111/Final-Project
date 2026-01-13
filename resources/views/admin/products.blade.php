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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Products</h6>
        </div>
        <div class="card-body">
            <form class="row">
                <div class="col-md-3 mb-3">
                    <label class="small font-weight-bold">Search</label>
                    <input type="text" class="form-control" id="searchProduct" placeholder="Product name or ID...">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="small font-weight-bold">Category</label>
                    <select class="form-control" id="filterCategory">
                        <option value="">All Categories</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Food & Beverage">Food & Beverage</option>
                        <option value="Clothing">Clothing</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="small font-weight-bold">Stock Status</label>
                    <select class="form-control" id="filterStock">
                        <option value="">All Status</option>
                        <option value="In Stock">In Stock</option>
                        <option value="Low Stock">Low Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 d-flex align-items-end">
                    <button type="button" class="btn btn-primary btn-block">
                        <i class="fas fa-filter fa-sm"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
            <div class="text-muted small">Showing 1 to 3 of 50 entries</div>
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
                        <tr>
                            <td class="text-center"><img src="https://via.placeholder.com/60x60?text=Headphones" alt="..." class="img-fluid rounded border" style="max-width: 50px;"></td>
                            <td>1</td>
                            <td class="font-weight-bold text-dark">Wireless Headphones</td>
                            <td>Electronics</td>
                            <td>$89.99</td>
                            <td>50</td>
                            <td><span class="badge badge-success">In Stock</span></td>
                            <td>
                                <a href="{{ route('admin.products.edit') }}" class="btn btn-sm btn-info rounded-circle"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="https://via.placeholder.com/60x60?text=Coffee" alt="..." class="img-fluid rounded border" style="max-width: 50px;"></td>
                            <td>2</td>
                            <td class="font-weight-bold text-dark">Organic Coffee Beans</td>
                            <td>Food & Beverage</td>
                            <td>$15.99</td>
                            <td>12</td>
                            <td><span class="badge badge-warning">Low Stock</span></td>
                            <td>
                                <a href="{{ route('admin.products.edit') }}" class="btn btn-sm btn-info rounded-circle"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="small text-muted">Page 1 of 5</div>
                <nav aria-label="Page navigation example">
                  <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection