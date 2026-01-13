@extends('layouts.admin_master')
@section('title', 'Create Coupon')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Coupon</h1>
    <a href="{{ route('admin.coupon.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm"></i> Back to List
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Coupon Details</h6>
    </div>
    <div class="card-body">
        <form action="#" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Coupon Code</label>
                    <input type="text" class="form-control" name="code" placeholder="e.g. SUMMER50" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Discount Type</label>
                    <select class="form-control" name="type">
                        <option value="percentage">Percentage (%)</option>
                        <option value="fixed">Fixed Amount ($)</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Value</label>
                    <input type="number" class="form-control" name="value" placeholder="10">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Expiry Date</label>
                    <input type="date" class="form-control" name="expiry_date">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-icon-split mt-3">
                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                <span class="text">Generate Coupon</span>
            </button>
        </form>
    </div>
</div>
@endsection