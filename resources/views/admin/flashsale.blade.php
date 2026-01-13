@extends('layouts.admin_master')
@section('title', 'Flash Sale Settings')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Flash Sale Management</h1>

<div class="card shadow mb-4 border-left-warning">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Status</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Flash Sale is currently: <span class="text-success">ON</span></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-bolt fa-2x text-warning"></i>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Select Categories for Flash Sale</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Flash Discount (%)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Electronics</td>
                        <td><input type="number" class="form-control form-control-sm" style="width: 80px;" value="15"></td>
                        <td><span class="badge badge-warning">On Sale</span></td>
                        <td><button class="btn btn-sm btn-outline-danger">Remove</button></td>
                    </tr>
                    <tr>
                        <td>Apparel</td>
                        <td><input type="number" class="form-control form-control-sm" style="width: 80px;" placeholder="0"></td>
                        <td><span class="badge badge-light">Idle</span></td>
                        <td><button class="btn btn-sm btn-outline-success">Activate</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection