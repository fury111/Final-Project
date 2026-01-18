@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container text-center">
        <h1>Contact Us</h1>
        <p>We're here to help! Get in touch with us.</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Send us a Message</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="John">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Doe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="john@example.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone (optional)</label>
                            <input type="tel" class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <select class="form-select">
                                <option value="">Choose a topic...</option>
                                <option value="order">Order Inquiry</option>
                                <option value="product">Product Question</option>
                                <option value="return">Returns & Refunds</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="5" placeholder="How can we help you?"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Get in Touch</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background-color: var(--dd-secondary);">
                                <i class="bi bi-geo-alt" style="color: var(--dd-primary);"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Address</h6>
                                <p class="text-muted small mb-0">123 Store Street<br>San Francisco, CA 94102</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background-color: var(--dd-secondary);">
                                <i class="bi bi-telephone" style="color: var(--dd-primary);"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone</h6>
                                <p class="text-muted small mb-0">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background-color: var(--dd-secondary);">
                                <i class="bi bi-envelope" style="color: var(--dd-primary);"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email</h6>
                                <p class="text-muted small mb-0">support@dailydose.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Business Hours</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span>Monday - Friday</span>
                            <strong>9:00 AM - 6:00 PM</strong>
                        </li>
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span>Saturday</span>
                            <strong>10:00 AM - 4:00 PM</strong>
                        </li>
                        <li class="d-flex justify-content-between py-2">
                            <span>Sunday</span>
                            <strong class="text-muted">Closed</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection