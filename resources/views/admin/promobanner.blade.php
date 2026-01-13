@extends('layouts.admin_master')
@section('title', 'Landing Page Promo Banner')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Landing Page Promo Panel</h1>

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Banner Configuration</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Banner Heading</label>
                    <input type="text" class="form-control" placeholder="Big Winter Sale!">
                </div>
                <div class="form-group">
                    <label>Sub-text</label>
                    <textarea class="form-control" rows="2"></textarea>
                </div>
                <button class="btn btn-block btn-success">Update Visuals</button>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Featured Items on Banner</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info small">These items will appear in the main landing page slider.</div>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-grip-lines mr-3 text-gray-400"></i>
                            <strong>Sony WH-1000XM5</strong>
                        </div>
                        <button class="btn btn-sm btn-link text-danger">Remove</button>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-primary btn-block mt-4" data-toggle="modal" data-target="#addProductModal">
                    <i class="fas fa-plus"></i> Add Product to Panel
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Select Product for Promo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="modalSearch" placeholder="Search products...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Fake Data --}}
                            <tr>
                                <td>MacBook Pro 14"</td>
                                <td>Electronics</td>
                                <td>$1,999</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm">Select</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Nike Air Max</td>
                                <td>Shoes</td>
                                <td>$120</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm">Select</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Gaming Chair RGB</td>
                                <td>Furniture</td>
                                <td>$250</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm">Select</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection