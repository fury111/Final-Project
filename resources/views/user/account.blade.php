@extends('layouts.master')

@section('title', 'My Account')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
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
                            JD
                        </div>
                        <div>
                            <h5 class="mb-1">John Doe</h5>
                            <p class="text-muted mb-0">Member since January 2025</p>
                        </div>
                    </div>

                    <hr>

                    <!-- Profile Form -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" value="John">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="Doe">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" value="john.doe@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" value="+1 (555) 123-4567">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" value="1990-05-15">
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Preferences -->
                    <h6 class="mb-3">Preferences</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="newsletter" checked>
                        <label class="form-check-label" for="newsletter">
                            Receive newsletter and promotional emails
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="sms" checked>
                        <label class="form-check-label" for="sms">
                            Receive SMS notifications for order updates
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="deals">
                        <label class="form-check-label" for="deals">
                            Receive personalized deal recommendations
                        </label>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Save Changes
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-bag fs-2" style="color: var(--dd-primary);"></i>
                            <h3 class="mt-2 mb-0">12</h3>
                            <small class="text-muted">Total Orders</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-heart fs-2" style="color: var(--dd-accent);"></i>
                            <h3 class="mt-2 mb-0">3</h3>
                            <small class="text-muted">Wishlist Items</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-light border-0">
                        <div class="card-body">
                            <i class="bi bi-star fs-2 text-warning"></i>
                            <h3 class="mt-2 mb-0">245</h3>
                            <small class="text-muted">Reward Points</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
