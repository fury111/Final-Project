@extends('layouts.master')

@section('title', 'My Account')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
            @include('partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-person me-2"></i>Profile Information</h5>
                </div>
                <div class="card-body">
                    <!-- Profile Header -->
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px; background-color: var(--dd-primary); color: white; font-size: 2rem;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p class="text-muted mb-0">Member since {{ $user->created_at->format('F Y') }}</p>
                        </div>
                    </div>

                    <hr>

                    <!-- Profile Form -->
                    <form method="POST" action="{{ route('account.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="phone" value="{{ $user->phone ?? '' }}">
                            </div>
                        </div>

                        <hr class="my-4">

                       

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-bag fs-2" style="color: var(--dd-primary);"></i>
                            <h3 class="mt-2 mb-0">{{ $totalOrders }}</h3>
                            <small class="text-muted">Total Orders</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-heart fs-2" style="color: var(--dd-accent);"></i>
                            <h3 class="mt-2 mb-0">{{ $wishlistCount }}</h3>
                            <small class="text-muted">Wishlist Items</small>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection