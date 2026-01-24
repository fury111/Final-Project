@extends('layouts.admin_master')
@section('title', 'Flash Sale Settings')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Flash Sale Management</h1>

<div class="card shadow mb-4 border-left-warning">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Status</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Flash Sale is currently: 
                    <span class="text-{{ $globalFlashSale ? 'success' : 'danger' }}">
                        {{ $globalFlashSale ? 'ON' : 'OFF' }}
                    </span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-bolt fa-2x text-warning"></i>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Select Categories for Flash Sale</h6>
        @if($globalFlashSale)
            <form action="{{ route('admin.flashsales.toggle') }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="is_active" value="0">
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-power-off"></i> Turn Off
                </button>
            </form>
        @else
            <form action="{{ route('admin.flashsales.toggle') }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="is_active" value="1">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-power-off"></i> Turn On
                </button>
            </form>
        @endif
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
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->flashSale && $category->flashSale->is_active)
                                <form action="{{ route('admin.flashsales.update', $category->flashSale->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="discount_percentage" class="form-control form-control-sm" 
                                           style="width: 80px;" value="{{ $category->flashSale->discount_percentage }}" min="0" max="100">
                                    <button type="submit" class="btn btn-sm btn-primary mt-1">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.flashsales.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                    <input type="number" name="discount_percentage" class="form-control form-control-sm" 
                                           style="width: 80px;" placeholder="0" min="0" max="100">
                                    <button type="submit" class="btn btn-sm btn-success mt-1">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if($category->flashSale && $category->flashSale->is_active)
                                <span class="badge badge-warning">On Sale</span>
                            @else
                                <span class="badge badge-light">Idle</span>
                            @endif
                        </td>
                        <td>
                            @if($category->flashSale && $category->flashSale->is_active)
                                <form action="{{ route('admin.flashsales.destroy', $category->flashSale->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Are you sure you want to remove this flash sale?')">
                                        Remove
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection