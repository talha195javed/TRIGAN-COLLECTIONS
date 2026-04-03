@extends('themes.xylo.layouts.master')

@section('content')
    <section class="tc-page-hero tc-page-hero--lg">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="tc-pill">Services</span>
                    <h1 class="tc-page-hero__title tc-page-hero__title--xl">Our Services</h1>
                    <p class="tc-page-hero__sub">Everything we do is designed to make shopping smooth, fast, and professional.</p>
                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <a class="tc-btn tc-btn--gold" href="{{ route('shop.index') }}">Explore Products</a>
                        <a class="tc-btn tc-btn--outline" href="{{ route('xylo.contact') }}">Talk to Us</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tc-stat-card">
                        <span class="tc-pill tc-pill--sm">Premium Experience</span>
                        <p class="tc-info-card__text mt-3">From product discovery to delivery tracking, we focus on clarity, speed, and quality.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section">
        <div class="container">
            <div class="tc-section__head text-center mb-5">
                <span class="tc-pill tc-pill--sm">What You Get</span>
                <h2 class="tc-section__title mt-3">What You Get</h2>
                <p class="tc-section__sub">Core services that help you shop with confidence.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <h4 class="tc-why__title">Curated Catalog</h4>
                        <p class="tc-why__text">Carefully selected items with clean product details to make decisions easy.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-box"></i></div>
                        <h4 class="tc-why__title">Fast Processing</h4>
                        <p class="tc-why__text">Orders are prepared quickly with clear updates and reliable handling.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-shield"></i></div>
                        <h4 class="tc-why__title">Secure Payments</h4>
                        <p class="tc-why__text">Safe checkout with trusted payment integrations and privacy protection.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                        <h4 class="tc-why__title">Easy Support</h4>
                        <p class="tc-why__text">Reach out anytime. We respond quickly with professional guidance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-star"></i></div>
                        <h4 class="tc-why__title">Quality Focus</h4>
                        <p class="tc-why__text">We emphasize materials, finishing, and overall value in every collection.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-heart"></i></div>
                        <h4 class="tc-why__title">Customer First</h4>
                        <p class="tc-why__text">A store designed around comfort, trust, and a premium feel.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section">
        <div class="container">
            <div class="tc-cta-banner">
                <div class="tc-cta-banner__content">
                    <h2 class="tc-cta-banner__title">Need help choosing the right product?</h2>
                    <p class="tc-cta-banner__text">Send a message and we'll guide you based on your needs.</p>
                </div>
                <a class="tc-btn tc-btn--gold tc-btn--lg" href="{{ route('xylo.contact') }}">Contact Support</a>
            </div>
        </div>
    </section>

@endsection
