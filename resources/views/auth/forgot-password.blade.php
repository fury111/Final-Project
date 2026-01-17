@extends('layouts.master')

@section('title', 'Forgot Password')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <a href="/home" class="text-decoration-none">
                    <h1 class="h3" style="color: var(--dd-primary);">
                        <i class="bi bi-box-seam me-2"></i>Daily<span style="color: var(--dd-accent);">Dose</span>
                    </h1>
                </a>
                <p class="text-muted">Reset your password</p>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-key fs-1" style="color: var(--dd-primary);"></i>
                        </div>
                        <h5>Forgot your password?</h5>
                        <p class="text-muted small">No worries! Enter your email address and we'll send you a link to reset your password.</p>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="you@example.com">
                        </div>
                    </div>
                    
                    <a href="/login" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-send me-2"></i>Send Reset Link
                    </a>
                    
                    <div class="text-center">
                        <a href="/login" class="text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i>Back to Login
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Help Text -->
            <div class="text-center mt-4">
                <p class="text-muted small">
                    <i class="bi bi-question-circle me-1"></i>
                    Still having trouble? <a href="/contact" class="text-decoration-none">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
