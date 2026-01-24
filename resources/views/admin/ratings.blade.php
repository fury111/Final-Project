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
                    @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td class="font-weight-bold">{{ $review->product->name ?? 'N/A' }}</td>
                        <td>{{ $review->user->email ?? 'Guest' }}</td>
                        <td>
                            <span class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </span>
                            <span class="small text-muted">({{ $review->rating }}.0)</span>
                        </td>
                        <td>{{ $review->created_at ? $review->created_at->format('Y-m-d') : 'N/A' }}</td>
                        <td class="text-center">
                            <form action="/admin/reviews/{{ $review->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-circle" title="Delete Rating" 
                                        onclick="return confirm('Are you sure you want to delete this rating?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="small text-muted">Showing 1 to {{ $reviews->count() }} of {{ $reviews->total() }}</div>
            <nav>
                {{ $reviews->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
</div>
@endsection