@extends('layouts.master')

@section('title', 'Login')

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
                <p class="text-muted">Welcome back! Please login to your account.</p>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="you@example.com">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Password</label>
                            <a href="/forgot-password" class="small text-decoration-none">Forgot password?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Enter your password">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>
                    
                    <a href="/account" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </a>
                    
                    <div class="text-center">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="/register" class="text-decoration-none">Create one</a>
                    </div>
                </div>
            </div>
            
            <!-- Social Login -->
            <div class="mt-4">
                <div class="d-flex align-items-center mb-3">
                    <hr class="flex-grow-1">
                    <span class="px-3 text-muted small">Or continue with</span>
                    <hr class="flex-grow-1">
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary flex-grow-1">
                        <i class="bi bi-google me-2"></i>Google
                    </button>
                    <button class="btn btn-outline-secondary flex-grow-1">
                        <i class="bi bi-facebook me-2"></i>Facebook
                    </button>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-4">
                <a href="/home" class="text-muted text-decoration-none small">
                    <i class="bi bi-arrow-left me-1"></i>Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
