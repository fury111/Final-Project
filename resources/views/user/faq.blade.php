@extends('layouts.master')

@section('title', 'FAQs')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container text-center">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to common questions about Daily Dose</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Search FAQ -->
            <div class="mb-4">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search for answers...">
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="accordion" id="faqAccordion">
                <!-- Ordering -->
                <h5 class="mt-4 mb-3">Ordering</h5>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            How do I place an order?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Simply browse our products, add items to your cart, and proceed to checkout. You'll need to create an account or log in to complete your purchase.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Can I modify my order after placing it?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can modify or cancel your order within 1 hour of placing it, as long as it hasn't been shipped yet. Go to "My Orders" in your account to make changes.
                        </div>
                    </div>
                </div>

                <!-- Shipping -->
                <h5 class="mt-4 mb-3">Shipping & Delivery</h5>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            What are the shipping options?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We offer Standard Shipping (5-7 business days, free on orders over $50), Express Shipping (2-3 business days, $9.99), and Overnight Shipping (next business day, $19.99).
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            How can I track my order?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Once your order ships, you'll receive an email with a tracking number. You can also view tracking information in "My Orders" section of your account.
                        </div>
                    </div>
                </div>

                <!-- Returns -->
                <h5 class="mt-4 mb-3">Returns & Refunds</h5>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            What is your return policy?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We accept returns within 30 days of delivery for most items. Products must be unopened and in original packaging. Some items like perishables cannot be returned.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                            How long does it take to process a refund?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Once we receive your return, refunds are processed within 3-5 business days. The refund will appear on your original payment method within 5-10 business days depending on your bank.
                        </div>
                    </div>
                </div>

                <!-- Payment -->
                <h5 class="mt-4 mb-3">Payment</h5>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                            What payment methods do you accept?
                        </button>
                    </h2>
                    <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We accept all major credit cards (Visa, MasterCard, American Express, Discover), PayPal, and Cash on Delivery for select areas.
                        </div>
                    </div>
                </div>

                <!-- Still Have Questions -->
                <div class="text-center mt-5 p-4 bg-light rounded">
                    <h5>Still have questions?</h5>
                    <p class="text-muted">Can't find the answer you're looking for? Please contact our support team.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary">Contact Support</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection