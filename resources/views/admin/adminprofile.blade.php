@extends('layouts.admin_master')

@section('title', 'Admin Profile')

@section('css')
<style>
    /* Professional Color Palette & Typography */
    :root {
        --admin-primary: #4361ee;
        --admin-bg: #f8f9fa;
        --border-color: #e9ecef;
    }

    body { background-color: var(--admin-bg); }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        background: #fff;
    }

    /* Profile Header Styling */
    .profile-banner {
        height: 100px;
        background: linear-gradient(135deg, var(--admin-primary), #4cc9f0);
        border-radius: 12px 12px 0 0;
    }

    .avatar-container {
        margin-top: -55px;
        padding: 0 25px;
    }

    .avatar-main {
        width: 110px;
        height: 110px;
        border: 4px solid #fff;
        background: #f8f9fa;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        font-size: 2rem;
        font-weight: 700;
        color: var(--admin-primary);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Fixed Sidebar Alignment */
    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
    }

    .info-icon {
        width: 32px;
        height: 32px;
        background: #f0f2f5;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #6c757d;
        flex-shrink: 0;
    }

    /* Form Tuning */
    .section-title {
        font-size: 0.75rem;
        font-weight: 700;
        color: #adb5bd;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        display: flex;
        align-items: center;
    }

    .section-title span {
        color: var(--admin-primary);
        margin-right: 8px;
    }

    .form-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #495057;
        margin-bottom: 6px;
    }

    .form-control {
        border: 1px solid var(--border-color);
        padding: 0.7rem 1rem;
        border-radius: 8px;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: var(--admin-primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    /* Refined Upload Box - REMOVED */
    .btn-submit {
        background-color: var(--admin-primary);
        color: white;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        transition: all 0.2s;
    }

    .btn-submit:hover {
        background-color: #3751d4;
        transform: translateY(-1px);
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card h-100 pb-4">
                <div class="profile-banner"></div>
                <div class="card-body">
                    <div class="avatar-container mb-4 text-center">
                        <div class="avatar-main rounded-circle mx-auto">
                            {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}
                        </div>
                        <h4 class="mt-3 fw-bold mb-1">{{ Auth::guard('admin')->user()->name }}</h4>
                        <p class="text-muted small mb-0">Administrator</p>
                    </div>

                    <div class="text-center border-top border-bottom py-3 my-4">
                        <span class="d-block fw-bold h5 mb-0">{{ $totalOrders }}</span>
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Total Orders Managed</small>
                    </div>

                    <div class="px-2">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-envelope fa-sm"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.7rem;">EMAIL ADDRESS</small>
                                <span class="fw-medium small text-dark">{{ Auth::guard('admin')->user()->email }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-calendar-alt fa-sm"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.7rem;">MEMBER SINCE</small>
                                <span class="fw-medium small text-dark">{{ Auth::guard('admin')->user()->created_at->format('F Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card p-4 h-100">
                <div class="d-flex align-items-center mb-5">
                    <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3 text-primary">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h5 class="mb-0 fw-bold">Account Settings</h5>
                </div>

                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-5">
                        <div class="section-title mb-4">
                            <span>01</span> General Information
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">FULL NAME</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">EMAIL ADDRESS</label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                        </div>
                    </div>

                    <div class="mb-5">
                        <div class="section-title mb-4">
                            <span>02</span> Security & Password
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">NEW PASSWORD</label>
                                <input type="password" class="form-control" name="password" placeholder="••••••••">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">CONFIRM PASSWORD</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                        <button type="reset" class="btn btn-link text-muted text-decoration-none fw-bold small">Reset</button>
                        <button type="submit" class="btn btn-submit shadow-sm px-5">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection