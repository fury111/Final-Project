@extends('layouts.master')

@section('title', 'My Addresses')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/account">My Account</a></li>
                <li class="breadcrumb-item active">Addresses</li>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">My Addresses</h4>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                    <i class="bi bi-plus-lg me-2"></i>Add New Address
                </button>
            </div>

            <div class="row g-4">
                <!-- Address 1 - Default -->
                <div class="col-md-6">
                    <div class="card h-100 border-primary">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Home</span>
                            <span class="badge bg-primary">Default</span>
                        </div>
                        <div class="card-body">
                            <address class="mb-3">
                                <strong>John Doe</strong><br>
                                123 Main Street, Apt 4B<br>
                                San Francisco, CA 94102<br>
                                United States<br>
                                <abbr title="Phone">P:</abbr> +1 (555) 123-4567
                            </address>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button class="btn btn-sm btn-outline-danger" disabled>
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address 2 -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Office</span>
                            <a href="#" class="small text-decoration-none">Set as Default</a>
                        </div>
                        <div class="card-body">
                            <address class="mb-3">
                                <strong>John Doe</strong><br>
                                456 Business Ave, Suite 100<br>
                                San Francisco, CA 94105<br>
                                United States<br>
                                <abbr title="Phone">P:</abbr> +1 (555) 987-6543
                            </address>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Address Card -->
                <div class="col-md-6">
                    <div class="card h-100 border-dashed" style="border-style: dashed !important; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center text-muted">
                            <i class="bi bi-plus-circle fs-1 mb-2"></i>
                            <p class="mb-0">Add New Address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Address Label</label>
                        <input type="text" class="form-control" placeholder="e.g., Home, Office, etc.">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Street Address</label>
                        <input type="text" class="form-control" placeholder="123 Main St">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Apartment, suite, etc. (optional)</label>
                        <input type="text" class="form-control" placeholder="Apt 4B">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <select class="form-select">
                            <option value="">Choose...</option>
                            <option value="CA">California</option>
                            <option value="NY">New York</option>
                            <option value="TX">Texas</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">ZIP Code</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="+1 (555) 000-0000">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="setDefault">
                            <label class="form-check-label" for="setDefault">
                                Set as default address
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Address</button>
            </div>
        </div>
    </div>
</div>
@endsection
