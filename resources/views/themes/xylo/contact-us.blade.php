@extends('themes.xylo.layouts.master')

@section('content')

    <section class="tc-page-hero tc-page-hero--lg">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="tc-pill">Contact</span>
                    <h1 class="tc-page-hero__title tc-page-hero__title--xl">Get in Touch</h1>
                    <p class="tc-page-hero__sub">Have a question about an order or product? Send a message and we'll get back to you quickly.</p>
                </div>
                <div class="col-lg-5">
                    <div class="tc-stat-card">
                        <div class="tc-contact-info">
                            <div class="tc-contact-info__item"><i class="fa-solid fa-envelope"></i><span>support@trigancollections.com</span></div>
                            <div class="tc-contact-info__item"><i class="fa-solid fa-phone"></i><span>+000 000 0000</span></div>
                            <div class="tc-contact-info__item"><i class="fa-solid fa-location-dot"></i><span>Your City, Your Country</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="tc-info-card tc-info-card--lg">
                        <h2 class="tc-info-card__title">Send a Message</h2>
                        <p class="tc-info-card__text mb-4">Fill in the form and we'll respond as soon as possible.</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="tc-form-label">Full name</label>
                                    <input type="text" class="tc-input" placeholder="Your name">
                                </div>
                                <div class="col-md-6">
                                    <label class="tc-form-label">Email</label>
                                    <input type="email" class="tc-input" placeholder="you@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="tc-form-label">Subject</label>
                                    <input type="text" class="tc-input" placeholder="How can we help?">
                                </div>
                                <div class="col-12">
                                    <label class="tc-form-label">Message</label>
                                    <textarea class="tc-input" rows="5" placeholder="Write your message..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="tc-btn tc-btn--gold w-100 justify-content-center">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="tc-info-card h-100">
                        <div class="tc-info-card__icon"><i class="fa-solid fa-clock"></i></div>
                        <h3 class="tc-info-card__title">Support Hours</h3>
                        <p class="tc-info-card__text">Mon - Sat: 9:00 AM - 7:00 PM</p>
                        <p class="tc-info-card__text">Sunday: Closed</p>
                        <hr style="border-color: rgba(0,0,0,0.06);">
                        <div class="tc-info-card__icon"><i class="fa-solid fa-box"></i></div>
                        <h3 class="tc-info-card__title">Order Help</h3>
                        <p class="tc-info-card__text">Include your order number for faster assistance.</p>
                        <div class="d-grid gap-2 mt-3">
                            <a class="tc-btn tc-btn--outline justify-content-center" href="{{ route('shop.index') }}">Continue Shopping</a>
                            <a class="tc-btn tc-btn--outline justify-content-center" href="{{ route('xylo.services') }}">View Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
