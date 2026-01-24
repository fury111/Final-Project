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
                    @foreach($reviews as $review)
                    <tr>
                        <td class="font-weight-bold">{{ $review->product->name ?? 'N/A' }}</td>
                        <td>
                            <div class="small">{{ $review->user->name ?? 'Guest' }}</div>
                            <div class="text-xs text-muted">{{ $review->created_at ? $review->created_at->diffForHumans() : 'N/A' }}</div>
                        </td>
                        <td>
                            <div class="text-warning small">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td>
                            "{{ Str::limit(strip_tags($review->comment), 50) }} "
                            <a href="#" class="small text-primary" data-toggle="modal" data-target="#reviewModal" 
                               data-review="{{ $review->comment }}" data-product="{{ $review->product->name ?? 'N/A' }}" 
                               data-rating="{{ $review->rating }}" data-user="{{ $review->user->name ?? 'Guest' }}">
                                Read More
                            </a>
                        </td>
                        <td>
                            @switch($review->is_approved)
                                @case(1)
                                    <span class="badge badge-success">Published</span>
                                    @break
                                @case(0)
                                    <span class="badge badge-warning">Pending</span>
                                    @break
                                @case(-1)
                                    <span class="badge badge-danger">Hidden</span>
                                    @break
                                @default
                                    <span class="badge badge-secondary">Unknown</span>
                            @endswitch
                        </td>
                        <td>
                            @if($review->is_approved != 1)
                                <form action="/admin/reviews/{{ $review->id }}/approve" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm btn-icon-split mb-1">
                                        <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                        <span class="text">Approve</span>
                                    </button>
                                </form>
                            @endif
                            
                            @if($review->is_approved != -1)
                                <form action="/admin/reviews/{{ $review->id }}/hide" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary btn-sm btn-icon-split mb-1">
                                        <span class="icon text-white-50"><i class="fas fa-eye-slash"></i></span>
                                        <span class="text">Hide</span>
                                    </button>
                                </form>
                            @endif
                            
                            <form action="/admin/reviews/{{ $review->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-circle" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this review?')">
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
            <div class="small text-muted">Page {{ $reviews->currentPage() }} of {{ $reviews->lastPage() }}</div>
            <nav>
                {{ $reviews->links('pagination::bootstrap-4') }}
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
                    <h6 class="font-weight-bold text-gray-800" id="modalProductName"></h6>
                    <div class="text-warning">
                        <span id="modalRatingStars"></span>
                        <span class="text-muted text-xs ml-2" id="modalUserName"></span>
                    </div>
                </div>
                <hr>
                <p class="text-dark" id="modalReviewContent"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="button">Approve & Publish</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
$('#reviewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var review = button.data('review');
    var product = button.data('product');
    var rating = button.data('rating');
    var user = button.data('user');
    
    var modal = $(this);
    modal.find('#modalProductName').text(product);
    modal.find('#modalUserName').text('by ' + user);
    
    // Generate star rating
    var stars = '';
    for (var i = 1; i <= 5; i++) {
        if (i <= rating) {
            stars += '<i class="fas fa-star"></i>';
        } else {
            stars += '<i class="far fa-star"></i>';
        }
    }
    modal.find('#modalRatingStars').html(stars);
    
    modal.find('#modalReviewContent').text(review);
});
</script>
@endsection

@endsection