@extends('themes.xylo.layouts.master')

@section('content')
<div class="tc-page">
    <section class="tc-page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="tc-eyebrow">Trigan Collections</div>
                    <h1 class="tc-hero-title">Contact Us</h1>
                    <p class="tc-hero-subtitle">Have a question about an order or product? Send a message and we’ll get back to you quickly.</p>
                </div>
                <div class="col-lg-5">
                    <div class="tc-hero-card">
                        <div class="tc-hero-card-inner">
                            <div class="tc-contact-mini">
                                <div class="tc-contact-mini-item"><i class="fa-solid fa-envelope"></i><span>support@trigancollections.com</span></div>
                                <div class="tc-contact-mini-item"><i class="fa-solid fa-phone"></i><span>+000 000 0000</span></div>
                                <div class="tc-contact-mini-item"><i class="fa-solid fa-location-dot"></i><span>Your City, Your Country</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="tc-surface tc-card p-4 p-md-5">
                        <h2 class="tc-section-title mb-2">Send a Message</h2>
                        <p class="tc-muted">Fill in the form and we’ll respond as soon as possible.</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label tc-form-label">Full name</label>
                                    <input type="text" class="form-control tc-input" placeholder="Your name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label tc-form-label">Email</label>
                                    <input type="email" class="form-control tc-input" placeholder="you@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label tc-form-label">Subject</label>
                                    <input type="text" class="form-control tc-input" placeholder="How can we help?">
                                </div>
                                <div class="col-12">
                                    <label class="form-label tc-form-label">Message</label>
                                    <textarea class="form-control tc-input" rows="5" placeholder="Write your message..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn tc-btn-primary w-100">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="tc-surface tc-card p-4 h-100">
                        <h3 class="tc-card-title">Support Hours</h3>
                        <div class="tc-muted">Mon - Sat: 9:00 AM - 7:00 PM</div>
                        <div class="tc-muted">Sunday: Closed</div>
                        <hr class="tc-divider">
                        <h3 class="tc-card-title">Order Help</h3>
                        <div class="tc-muted">Include your order number for faster assistance.</div>
                        <div class="d-grid gap-2 mt-3">
                            <a class="btn tc-btn-ghost" href="{{ route('shop.index') }}">Continue Shopping</a>
                            <a class="btn tc-btn-ghost" href="{{ route('xylo.services') }}">View Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
