@extends('layouts.admin_master')
@section('title', 'Reviews Management')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Customer Reviews</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Moderation Tools</h6>
    </div>
    <div class="card-body">
        <form class="row">
            <div class="col-md-4 mb-3">
                <label class="small font-weight-bold">Search Content</label>
                <input type="text" class="form-control" placeholder="Search review text...">
            </div>
            <div class="col-md-4 mb-3">
                <label class="small font-weight-bold">Status</label>
                <select class="form-control">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending Approval</option>
                    <option value="approved">Published</option>
                    <option value="hidden">Hidden</option>
                </select>
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-end">
                <button type="button" class="btn btn-primary btn-block">
                    <i class="fas fa-search fa-sm"></i> Find Reviews
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="bg-light">
                    <tr>
                        <th>Product</th>
                        <th>Reviewer</th>
                        <th style="width: 120px;">Rating</th>
                        <th>Comment Preview</th>
                        <th>Status</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-weight-bold">iPhone 15 Pro</td>
                        <td>
                            <div class="small">Mark Twain</div>
                            <div class="text-xs text-muted">2 hours ago</div>
                        </td>
                        <td>
                            <div class="text-warning small">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                        </td>
                        <td>
                            "Absolutely loving the new camera features, but the battery lif..."
                            <a href="#" class="small text-primary" data-toggle="modal" data-target="#reviewModal">Read More</a>
                        </td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-icon-split mb-1">
                                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                <span class="text">Approve</span>
                            </button>
                            <button class="btn btn-danger btn-sm btn-circle" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold">Gaming Chair</td>
                        <td>
                            <div class="small">Sarah Connor</div>
                            <div class="text-xs text-muted">1 day ago</div>
                        </td>
                        <td>
                            <div class="text-warning small">
                                <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                            </div>
                        </td>
                        <td>
                            "The chair arrived broken and the customer service was unhelp..."
                            <a href="#" class="small text-primary">Read More</a>
                        </td>
                        <td><span class="badge badge-success">Published</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm btn-icon-split mb-1">
                                <span class="icon text-white-50"><i class="fas fa-eye-slash"></i></span>
                                <span class="text">Hide</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="small text-muted">Page 1 of 10</div>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-weight-bold">Review Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <h6 class="font-weight-bold text-gray-800">iPhone 15 Pro</h6>
                    <div class="text-warning">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        <span class="text-muted text-xs ml-2">by Mark Twain</span>
                    </div>
                </div>
                <hr>
                <p class="text-dark">"Absolutely loving the new camera features, but the battery life could be a little better. I upgraded from the 12 and the difference is night and day. Shipping was super fast as well!"</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="button">Approve & Publish</button>
            </div>
        </div>
    </div>
</div>
@endsection