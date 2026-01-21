@extends('layouts.master')

@section('title', 'Forgot Password')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h1 class="h3" style="color: var(--dd-primary);">
                        <i class="bi bi-box-seam me-2"></i>Daily<span style="color: var(--dd-accent);">Dose</span>
                    </h1>
                </a>
                <p class="text-muted">Enter your email to reset your password.</p>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <!-- Show Errors -->
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <!-- Email Form -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="you@example.com" 
                                       required 
                                       autocomplete="email" 
                                       autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-envelope me-2"></i>Send Password Reset Link
                        </button>
                    </form>
                    
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
                    </div>
                </div>
            </div>
            
            <!-- Back to Home -->
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="text-muted text-decoration-none small">
                    <i class="bi bi-arrow-left me-1"></i>Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection