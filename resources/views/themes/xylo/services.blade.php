@extends('themes.xylo.layouts.master')

@section('content')
<div class="tc-page">
    <section class="tc-page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="tc-eyebrow">Trigan Collections</div>
                    <h1 class="tc-hero-title">Our Services</h1>
                    <p class="tc-hero-subtitle">Everything we do is designed to make shopping smooth, fast, and professional.</p>
                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <a class="btn tc-btn-primary" href="{{ route('shop.index') }}">Explore Products</a>
                        <a class="btn tc-btn-ghost" href="{{ route('xylo.contact') }}">Talk to Us</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tc-hero-card">
                        <div class="tc-hero-card-inner">
                            <div class="tc-badge">Premium Experience</div>
                            <div class="tc-muted mt-3">From product discovery to delivery tracking, we focus on clarity, speed, and quality.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="tc-section-head">
                <h2 class="tc-section-title">What You Get</h2>
                <p class="tc-section-subtitle">Core services that help you shop with confidence.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <div class="tc-service-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <h3 class="tc-card-title mt-3">Curated Catalog</h3>
                        <p class="tc-muted mb-0">Carefully selected items with clean product details to make decisions easy.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <div class="tc-service-icon"><i class="fa-solid fa-box"></i></div>
                        <h3 class="tc-card-title mt-3">Fast Processing</h3>
                        <p class="tc-muted mb-0">Orders are prepared quickly with clear updates and reliable handling.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <div class="tc-service-icon"><i class="fa-solid fa-shield"></i></div>
                        <h3 class="tc-card-title mt-3">Secure Payments</h3>
                        <p class="tc-muted mb-0">Safe checkout with trusted payment integrations and privacy protection.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <div class="tc-service-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                        <h3 class="tc-card-title mt-3">Easy Support</h3>
                        <p class="tc-muted mb-0">Reach out anytime. We respond quickly with professional guidance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <div class="tc-service-icon"><i class="fa-solid fa-star"></i></div>
                        <h3 class="tc-card-title mt-3">Quality Focus</h3>
                        <p class="tc-muted mb-0">We emphasize materials, finishing, and overall value in every collection.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-surface tc-card p-4 h-100">
                        <div class="tc-service-icon"><i class="fa-solid fa-heart"></i></div>
                        <h3 class="tc-card-title mt-3">Customer First</h3>
                        <p class="tc-muted mb-0">A store designed around comfort, trust, and a premium feel.</p>
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
                        <div class="tc-cta-title">Need help choosing the right product?</div>
                        <div class="tc-cta-text">Send a message and we’ll guide you based on your needs.</div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="btn tc-btn-primary w-100 w-lg-auto" href="{{ route('xylo.contact') }}">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
