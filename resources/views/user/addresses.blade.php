@extends('layouts.master')

@section('title', 'My Addresses')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('account') }}">My Account</a></li>
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
                @foreach($addresses as $address)
                <div class="col-md-6">
                    <div class="card h-100 {{ $address->is_default ? 'border-primary' : '' }}">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">{{ $address->label }}</span>
                            @if($address->is_default)
                                <span class="badge bg-primary">Default</span>
                            @else
                                <form action="{{ route('addresses.set-default', $address->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="small text-decoration-none btn btn-link p-0">Set as Default</button>
                                </form>
                            @endif
                        </div>
                        <div class="card-body">
                            <address class="mb-3">
                                <strong>{{ $address->full_name }}</strong><br>
                                {{ $address->address_line1 }}<br>
                                @if($address->address_line2)
                                    {{ $address->address_line2 }}<br>
                                @endif
                                {{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}<br>
                                {{ $address->country }}<br>
                                @if($address->phone)
                                    <abbr title="Phone">P:</abbr> {{ $address->phone }}
                                @endif
                            </address>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editAddressModal{{ $address->id }}">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Are you sure you want to delete this address?')">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Address Modal -->
                <div class="modal fade" id="editAddressModal{{ $address->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('addresses.update', $address->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Address Label</label>
                                            <input type="text" class="form-control" name="label" value="{{ $address->label }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="full_name" value="{{ $address->full_name }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Street Address</label>
                                            <input type="text" class="form-control" name="address_line1" value="{{ $address->address_line1 }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Apartment, suite, etc. (optional)</label>
                                            <input type="text" class="form-control" name="address_line2" value="{{ $address->address_line2 }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $address->city }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="{{ $address->state }}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">ZIP Code</label>
                                            <input type="text" class="form-control" name="postal_code" value="{{ $address->postal_code }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="{{ $address->country }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" name="phone" value="{{ $address->phone }}">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="is_default" id="setDefault{{ $address->id }}" value="1" {{ $address->is_default ? 'checked' : '' }}>
                                                <label class="form-check-label" for="setDefault{{ $address->id }}">
                                                    Set as default address
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

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
            <form action="{{ route('addresses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Address Label</label>
                            <input type="text" class="form-control" name="label" placeholder="e.g., Home, Office, etc." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="full_name" placeholder="John Doe" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Street Address</label>
                            <input type="text" class="form-control" name="address_line1" placeholder="123 Main St" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Apartment, suite, etc. (optional)</label>
                            <input type="text" class="form-control" name="address_line2" placeholder="Apt 4B">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" placeholder="San Francisco" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" name="state" placeholder="CA" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" name="postal_code" placeholder="94102" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" value="United States" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_default" id="setDefaultNew" value="1">
                                <label class="form-check-label" for="setDefaultNew">
                                    Set as default address
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection