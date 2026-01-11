@extends('layouts.admin_master') <!-- Use the layout -->

@section('title', 'Dashboard') <!-- Set the page title -->

@section('css')
    <!-- Optional: Add page-specific CSS here if needed -->
    <!-- Example: <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
@endsection

@section('content') 
 <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Product
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://via.placeholder.com/60x60?text=Headphones" alt="Wireless Headphones" class="img-fluid rounded" style="max-width: 60px; height: auto;"></td>
                            <td>1</td>
                            <td>Wireless Headphones</td>
                            <td>Electronics</td>
                            <td>$89.99</td>
                            <td>50</td>
                            <td><span class="badge badge-success">In Stock</span></td>
                            <td>
                                <a href="{{ route('admin.products.edit') }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/60x60?text=Coffee" alt="Organic Coffee Beans" class="img-fluid rounded" style="max-width: 60px; height: auto;"></td>
                            <td>2</td>
                            <td>Organic Coffee Beans</td>
                            <td>Food & Beverage</td>
                            <td>$15.99</td>
                            <td>12</td>
                            <td><span class="badge badge-warning">Low Stock</span></td>
                            <td>
                                <a href="{{ route('admin.products.edit') }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/60x60?text=Shoes" alt="Running Shoes" class="img-fluid rounded" style="max-width: 60px; height: auto;"></td>
                            <td>3</td>
                            <td>Running Shoes</td>
                            <td>Clothing</td>
                            <td>$75.00</td>
                            <td>0</td>
                            <td><span class="badge badge-danger">Out of Stock</span></td>
                            <td>
                                <a href="{{ route('admin.products.edit') }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
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