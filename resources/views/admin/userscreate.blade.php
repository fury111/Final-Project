@extends('layouts.admin_master')

@section('title', 'Create Admin')

@section('css')
<style>
    /* Modern UI Customizations */
    .card { border: none; border-radius: 12px; }
    .card-header { border-bottom: 1px solid #f0f2f5; padding: 1.5rem; }
    .form-control { 
        padding: 0.75rem 1rem; 
        border-radius: 8px; 
        border: 1px solid #dce1e7;
    }
    .form-control:focus {
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
        border-color: #0d6efd;
    }
    .input-group-text {
        background-color: #f8f9fa;
        border-color: #dce1e7;
        color: #6c757d;
        border-radius: 8px;
    }
    .btn-create {
        padding: 0.8rem;
        font-weight: 600;
        border-radius: 8px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    .profile-preview-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 1rem;
        border: 2px dashed #dee2e6;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            
            <div class="mb-4 text-center">
                <h2 class="fw-bold">New Administrator</h2>
                <p class="text-muted">Fill in the details to grant system access.</p>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="d-flex flex-column align-items-center mb-4">
                            <div class="profile-preview-wrapper" id="imagePreview">
                                <i class="fas fa-user-plus fa-2x text-muted"></i>
                            </div>
                            <label class="btn btn-outline-primary btn-sm" for="image">
                                Upload Photo
                            </label>
                            <input type="file" class="d-none" id="image" name="image" accept="image/*">
                            <div class="small text-muted mt-2">JPG, PNG (Max 2MB)</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="John Doe" name="name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="john@company.com" name="email" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" id="password" class="form-control" placeholder="••••••••" name="password" minlength="8" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text mt-2">Must be at least 8 characters.</div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-create">
                                Create Admin Account
                            </button>
                            <a href="{{route('admin.users.index')}}" class="btn btn-link text-muted btn-sm text-decoration-none">Cancel and Return</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // Password Toggle Logic
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });

    // Simple Image Preview
    document.getElementById('image').onchange = evt => {
        const [file] = document.getElementById('image').files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = `<img src="${URL.createObjectURL(file)}" style="width:100%;height:100%;object-fit:cover;">`;
            preview.style.borderStyle = 'solid';
        }
    }
</script>
@endsection