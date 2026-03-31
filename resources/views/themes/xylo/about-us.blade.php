@extends('themes.xylo.layouts.master')

@section('content')
<div class="tc-page">
    <section class="tc-page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="tc-eyebrow">Trigan Collections</div>
                    <h1 class="tc-hero-title">About Us</h1>
                    <p class="tc-hero-subtitle">We curate premium products with a focus on quality, detail, and a shopping experience that feels effortless.</p>
                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <a class="btn tc-btn-primary" href="{{ route('shop.index') }}">Shop Now</a>
                        <a class="btn tc-btn-ghost" href="{{ route('xylo.contact') }}">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tc-hero-card">
                        <div class="tc-hero-card-inner">
                            <div class="tc-stat-grid">
                                <div class="tc-stat">
                                    <div class="tc-stat-value">Quality</div>
                                    <div class="tc-stat-label">Handpicked collections</div>
                                </div>
                                <div class="tc-stat">
                                    <div class="tc-stat-value">Trust</div>
                                    <div class="tc-stat-label">Secure checkout</div>
                                </div>
                                <div class="tc-stat">
                                    <div class="tc-stat-value">Support</div>
                                    <div class="tc-stat-label">Quick assistance</div>
                                </div>
                                <div class="tc-stat">
                                    <div class="tc-stat-value">Delivery</div>
                                    <div class="tc-stat-label">Fast dispatch</div>
                                </div>
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
                <div class="col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <h3 class="tc-card-title">Our Mission</h3>
                        <p class="tc-muted mb-0">To bring you modern, timeless products backed by dependable service and a clean, premium experience.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <h3 class="tc-card-title">What We Value</h3>
                        <p class="tc-muted mb-0">Authenticity, craftsmanship, and a customer-first approach from browsing to delivery.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <h3 class="tc-card-title">Our Promise</h3>
                        <p class="tc-muted mb-0">Clear information, transparent pricing, and a professional support experience you can rely on.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="tc-section-head">
                <h2 class="tc-section-title">Why Trigan Collections</h2>
                <p class="tc-section-subtitle">A store designed to feel premium, modern, and easy to shop.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="tc-feature">
                        <div class="tc-feature-icon"><i class="fa-solid fa-gem"></i></div>
                        <div class="tc-feature-title">Premium Picks</div>
                        <div class="tc-feature-text">Curated products selected for design and durability.</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tc-feature">
                        <div class="tc-feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="tc-feature-title">Fast Dispatch</div>
                        <div class="tc-feature-text">Speedy processing so you get your order quickly.</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tc-feature">
                        <div class="tc-feature-icon"><i class="fa-solid fa-shield-heart"></i></div>
                        <div class="tc-feature-title">Secure Shopping</div>
                        <div class="tc-feature-text">Protected checkout and trusted payment methods.</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tc-feature">
                        <div class="tc-feature-icon"><i class="fa-solid fa-headset"></i></div>
                        <div class="tc-feature-title">Support</div>
                        <div class="tc-feature-text">Quick answers before and after you purchase.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="tc-cta">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="tc-cta-title">Ready to explore the latest collection?</div>
                        <div class="tc-cta-text">Discover trending products and new arrivals, curated for you.</div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="btn tc-btn-primary w-100 w-lg-auto" href="{{ route('shop.index') }}">Browse Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
