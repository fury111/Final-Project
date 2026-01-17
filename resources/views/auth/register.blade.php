@extends('layouts.master')

@section('title', 'Create Account')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <a href="/home" class="text-decoration-none">
                    <h1 class="h3" style="color: var(--dd-primary);">
                        <i class="bi bi-box-seam me-2"></i>Daily<span style="color: var(--dd-accent);">Dose</span>
                    </h1>
                </a>
                <p class="text-muted">Create an account to start shopping!</p>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="John">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Doe">
                        </div>
                    </div>
                    
                    <div class="mb-3 mt-3">
                        <label class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="you@example.com">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone Number (optional)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Min. 8 characters">
                        </div>
                        <small class="text-muted">Must be at least 8 characters</small>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" placeholder="Repeat your password">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms">
                            <label class="form-check-label small" for="terms">
                                I agree to the <a href="/terms" class="text-decoration-none">Terms of Service</a> and <a href="/privacy" class="text-decoration-none">Privacy Policy</a>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="newsletter">
                            <label class="form-check-label small" for="newsletter">
                                Subscribe to our newsletter for exclusive deals
                            </label>
                        </div>
                    </div>
                    
                    <a href="/account" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-person-plus me-2"></i>Create Account
                    </a>
                    
                    <div class="text-center">
                        <span class="text-muted">Already have an account?</span>
                        <a href="/login" class="text-decoration-none">Login</a>
                    </div>
                </div>
            </div>
            
            <!-- Social Signup -->
            <div class="mt-4">
                <div class="d-flex align-items-center mb-3">
                    <hr class="flex-grow-1">
                    <span class="px-3 text-muted small">Or sign up with</span>
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
