@extends('layouts.master')

@section('title', 'Verify Email')

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
                <p class="text-muted">Please verify your email address to continue.</p>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    @if(session('resent'))
                        <div class="alert alert-success">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <p>Before proceeding, please check your email for a verification link.</p>
                        <p>If you did not receive the email:</p>
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-envelope me-2"></i>Click here to request another
                            </button>
                        </form>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="text-decoration-none">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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