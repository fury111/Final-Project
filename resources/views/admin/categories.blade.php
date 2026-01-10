@extends('layouts.admin_master') <!-- Use the layout -->

@section('title', 'Dashboard') <!-- Set the page title -->

@section('css')
    <!-- Optional: Add page-specific CSS here if needed -->
    <!-- Example: <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
@endsection

@section('content') 
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add New Category
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories Management</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCategories" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Parent Category</th>
                        <th>Product Count</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Example Static Data - Replace with Laravel Blade Loop --}}
                    <tr>
                        <td>1</td>
                        <td class="font-weight-bold">Electronics</td>
                        <td>electronics</td>
                        <td>-</td>
                        <td><span class="badge badge-secondary">150 Items</span></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                <span class="text">Edit</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Headphones</td>
                        <td>headphones</td>
                        <td>Electronics</td>
                         <td><span class="badge badge-secondary">45 Items</span></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                <span class="text">Edit</span>
                            </a>
                             {{-- Delete is often risky for categories with items, so maybe omit it or use a modal --}}
                        </td>
                    </tr>
                     {{-- End Loop --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('js')
   
   <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
   <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection