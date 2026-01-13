@extends('layouts.admin_master')
@section('title', 'Ratings Management')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Ratings</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Export Report
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter Ratings</h6>
    </div>
    <div class="card-body">
        <form class="row">
            <div class="col-md-4 mb-3">
                <label class="small font-weight-bold">Search Product</label>
                <input type="text" class="form-control" placeholder="Product name...">
            </div>
            <div class="col-md-4 mb-3">
                <label class="small font-weight-bold">Star Score</label>
                <select class="form-control">
                    <option value="">All Scores</option>
                    <option value="5">5 Stars (Excellent)</option>
                    <option value="4">4 Stars (Good)</option>
                    <option value="3">3 Stars (Average)</option>
                    <option value="2">2 Stars (Poor)</option>
                    <option value="1">1 Star (Terrible)</option>
                </select>
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-end">
                <button type="button" class="btn btn-primary btn-block">
                    <i class="fas fa-filter fa-sm"></i> Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTableRatings" width="100%" cellspacing="0">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td class="font-weight-bold">Sony WH-1000XM5</td>
                        <td>john.doe@example.com</td>
                        <td>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="small text-muted">(5.0)</span>
                        </td>
                        <td>2023-10-25</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger rounded-circle" title="Delete Rating">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td class="font-weight-bold">Generic USB Cable</td>
                        <td>jane.smith@example.com</td>
                        <td>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i> <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                            <span class="small text-muted">(2.0)</span>
                        </td>
                        <td>2023-10-24</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger rounded-circle" title="Delete Rating">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="small text-muted">Showing 1 to 2 of 50</div>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection