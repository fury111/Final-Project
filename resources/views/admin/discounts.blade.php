@extends('layouts.admin_master')
@section('title', 'Product Discounts')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Product Specific Discounts</h1>

<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Apply Discount to Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.discounts.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="small font-weight-bold">Select Product</label>
                        <select name="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} - ID: {{ $product->id }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small font-weight-bold">Type</label>
                            <select name="discount_type" class="form-control @error('discount_type') is-invalid @enderror" required>
                                <option value="percentage">Percentage (%)</option>
                                <option value="fixed">Fixed Amount ($)</option>
                            </select>
                            @error('discount_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small font-weight-bold">Amount</label>
                            <input type="number" step="0.01" name="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" 
                                   placeholder="e.g. 20" required>
                            @error('discount_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small font-weight-bold">Valid Until</label>
                        <input type="date" name="valid_until" class="form-control @error('valid_until') is-invalid @enderror">
                        @error('valid_until')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="small font-weight-bold">Status</label>
                        <select name="is_active" class="form-control @error('is_active') is-invalid @enderror" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-4">
                        <i class="fas fa-check mr-2"></i> Apply Discount
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Active Item Discounts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                <th>Original</th>
                                <th>New Price</th>
                                <th>Discount</th>
                                <th>Ends In</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($discounts as $discount)
                            <tr>
                                <td>
                                    <div class="font-weight-bold">{{ $discount->product->name }}</div>
                                    <div class="small text-muted">ID: {{ $discount->product->id }}</div>
                                </td>
                                <td class="text-muted"><del>${{ number_format($discount->product->price, 2) }}</del></td>
                                <td class="font-weight-bold text-success">
                                    ${{ number_format($discount->discounted_price, 2) }}
                                </td>
                                <td>{{ $discount->formatted_discount }}</td>
                                <td>
                                    @if($discount->valid_until)
                                        <span class="badge badge-{{ $discount->days_remaining <= 3 ? 'danger' : 'warning' }}">
                                            {{ $discount->days_remaining }} Days
                                        </span>
                                    @else
                                        <span class="badge badge-info">No Expiry</span>
                                    @endif
                                </td>
                                <td>
                                    @if($discount->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                title="Remove Discount" 
                                                onclick="return confirm('Are you sure you want to remove this discount?')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="py-5">
                                        <i class="fas fa-tags fa-2x text-gray-300 mb-3"></i>
                                        <p class="text-gray-500">No active discounts found.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection