@extends('layouts.admin_master')

@section('title', 'Create Coupon')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Coupon</h1>
    <a href="{{ route('admin.coupon.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm"></i> Back to Coupons
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Coupon</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="code" class="font-weight-bold">Coupon Code *</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" 
                               id="code" name="code" value="{{ old('code') }}" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discount_type" class="font-weight-bold">Discount Type *</label>
                        <select class="form-control @error('discount_type') is-invalid @enderror" 
                                id="discount_type" name="discount_type" required>
                            <option value="">Select Discount Type</option>
                            <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                            <option value="fixed_amount" {{ old('discount_type') == 'fixed_amount' ? 'selected' : '' }}>Fixed Amount</option>
                        </select>
                        @error('discount_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discount_value" class="font-weight-bold">Discount Value *</label>
                        <input type="number" step="0.01" class="form-control @error('discount_value') is-invalid @enderror" 
                               id="discount_value" name="discount_value" value="{{ old('discount_value') }}" required>
                        @error('discount_value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="min_order_amount" class="font-weight-bold">Minimum Order Amount</label>
                        <input type="number" step="0.01" class="form-control @error('min_order_amount') is-invalid @enderror" 
                               id="min_order_amount" name="min_order_amount" value="{{ old('min_order_amount', 0) }}">
                        @error('min_order_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="usage_limit" class="font-weight-bold">Usage Limit</label>
                        <input type="number" class="form-control @error('usage_limit') is-invalid @enderror" 
                               id="usage_limit" name="usage_limit" value="{{ old('usage_limit', 1) }}">
                        @error('usage_limit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expires_at" class="font-weight-bold">Expiration Date *</label>
                        <input type="date" class="form-control @error('expires_at') is-invalid @enderror" 
                               id="expires_at" name="expires_at" value="{{ old('expires_at') }}" required>
                        @error('expires_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_active" class="font-weight-bold">Status</label>
                        <select class="form-control @error('is_active') is-invalid @enderror" 
                                id="is_active" name="is_active">
                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save fa-sm mr-1"></i> Create Coupon
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection