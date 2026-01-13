@extends('layouts.admin_master') <!-- Use the layout -->

@section('title', 'Dashboard') <!-- Set the page title -->

@section('css')
    <!-- Optional: Add page-specific CSS here if needed -->
    <!-- Example: <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
@endsection

@section('content') 
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users & Customers</h1>
    <!-- 
    <a href="{{ route('admin.users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-user-plus fa-sm text-white-50"></i> Create New Admin
    </a> -->
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registered Users List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableUsers" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 50px;">Avatar</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Registered Date</th>
                       
                    </tr>
                </thead>
                <tbody>
                    {{-- Replace with @foreach($users as $user) --}}
                    <tr>
                        <td class="text-center">
                            {{-- Use a rounded circle image like the template header --}}
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" style="width: 40px; height: 40px;">
                        </td>
                        <td class="align-middle font-weight-bold">Douglas McGee</td>
                        <td class="align-middle">douglas@example.com</td>
                        <td class="align-middle"><span class="badge badge-primary">Administrator</span></td>
                        <td class="align-middle">2023/01/15</td>
    
                    </tr>
                    <tr>
                         <td class="text-center">
                             <div class="btn btn-circle btn-secondary btn-sm" style="width: 40px; height: 40px; padding-top: 8px;">
                                <i class="fas fa-user"></i>
                            </div>
                        </td>
                        <td class="align-middle font-weight-bold">Gavin Joyce</td>
                        <td class="align-middle">gavin@customer.com</td>
                        <td class="align-middle"><span class="badge badge-secondary">Customer</span></td>
                        <td class="align-middle">2023/06/22</td>
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