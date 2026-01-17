@extends('layouts.master')

@section('title', 'About Us')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container text-center">
        <h1>About Daily Dose</h1>
        <p>Your trusted partner for daily essentials since 2020</p>
    </div>
</div>

<div class="container pb-5">
    <!-- Our Story -->
    <section class="mb-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="https://placehold.co/600x400/e8f5e9/2D5A27?text=Our+Story" class="img-fluid rounded shadow-sm" alt="Our Story">
            </div>
            <div class="col-lg-6">
                <h2 class="h3 mb-4">Our Story</h2>
                <p>Daily Dose was founded with a simple mission: to make quality daily essentials accessible to everyone. We believe that everyday products should be affordable, sustainable, and delivered right to your doorstep.</p>
                <p>What started as a small online store has grown into a trusted destination for thousands of customers who rely on us for their household, personal care, and grocery needs.</p>
                <p class="mb-0">Today, we're proud to offer a curated selection of over 2,000 products from trusted brands, with a commitment to quality, value, and customer satisfaction.</p>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="mb-5">
        <h2 class="h3 mb-4 text-center">Our Values</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: var(--dd-secondary);">
                            <i class="bi bi-heart fs-2" style="color: var(--dd-primary);"></i>
                        </div>
                        <h5>Quality First</h5>
                        <p class="text-muted mb-0">We carefully select every product to ensure it meets our high standards for quality and safety.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: var(--dd-secondary);">
                            <i class="bi bi-leaf fs-2" style="color: var(--dd-primary);"></i>
                        </div>
                        <h5>Sustainability</h5>
                        <p class="text-muted mb-0">We're committed to reducing our environmental impact through eco-friendly packaging and practices.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background-color: var(--dd-secondary);">
                            <i class="bi bi-people fs-2" style="color: var(--dd-primary);"></i>
                        </div>
                        <h5>Community</h5>
                        <p class="text-muted mb-0">We support local suppliers and give back to our community through various initiatives.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="mb-5 py-5 rounded" style="background-color: var(--dd-secondary);">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold" style="color: var(--dd-primary);">50K+</h2>
                <p class="text-muted mb-0">Happy Customers</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold" style="color: var(--dd-primary);">2,000+</h2>
                <p class="text-muted mb-0">Products</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold" style="color: var(--dd-primary);">99%</h2>
                <p class="text-muted mb-0">Satisfaction Rate</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold" style="color: var(--dd-primary);">24/7</h2>
                <p class="text-muted mb-0">Support</p>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section>
        <h2 class="h3 mb-4 text-center">Meet Our Team</h2>
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <img src="https://placehold.co/150x150/e8f5e9/2D5A27?text=JD" class="rounded-circle mb-3" alt="Team Member">
                        <h6 class="mb-1">Jane Doe</h6>
                        <small class="text-muted">CEO & Founder</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <img src="https://placehold.co/150x150/e3f2fd/2D5A27?text=MS" class="rounded-circle mb-3" alt="Team Member">
                        <h6 class="mb-1">Mike Smith</h6>
                        <small class="text-muted">Operations Manager</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <img src="https://placehold.co/150x150/fff3e0/2D5A27?text=SJ" class="rounded-circle mb-3" alt="Team Member">
                        <h6 class="mb-1">Sarah Johnson</h6>
                        <small class="text-muted">Marketing Lead</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <img src="https://placehold.co/150x150/fce4ec/2D5A27?text=AC" class="rounded-circle mb-3" alt="Team Member">
                        <h6 class="mb-1">Alex Chen</h6>
                        <small class="text-muted">Customer Support</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
