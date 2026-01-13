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
                <form action="#" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="small font-weight-bold">Select Product</label>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light" placeholder="Search product name or ID..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <small class="form-text text-muted">Find the item you want to put on sale.</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small font-weight-bold">Type</label>
                            <select class="form-control" id="discountType">
                                <option value="percent">Percentage (%)</option>
                                <option value="fixed">Fixed Amount ($)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small font-weight-bold">Amount</label>
                            <input type="number" class="form-control" placeholder="e.g. 20">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small font-weight-bold">Valid Until</label>
                        <input type="date" class="form-control">
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
            <div class="card-header py-3">
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
                                <th>Ends In</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="font-weight-bold">Sony WH-1000XM5</div>
                                    <div class="small text-muted">ID: 402</div>
                                </td>
                                <td class="text-muted"><del>$350.00</del></td>
                                <td class="font-weight-bold text-success">$299.00</td>
                                <td><span class="badge badge-warning">2 Days</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-danger" title="Remove Discount">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="font-weight-bold">Leather Office Chair</div>
                                    <div class="small text-muted">ID: 881</div>
                                </td>
                                <td class="text-muted"><del>$150.00</del></td>
                                <td class="font-weight-bold text-success">$120.00</td>
                                <td><span class="badge badge-info">1 Week</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-danger" title="Remove Discount">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection