@extends('themes.xylo.layouts.master')

@section('content')

    <section class="tc-page-hero tc-page-hero--lg">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="tc-pill">About Us</span>
                    <h1 class="tc-page-hero__title tc-page-hero__title--xl">About Trigan Collections</h1>
                    <p class="tc-page-hero__sub">We curate premium products with a focus on quality, detail, and a shopping experience that feels effortless.</p>
                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <a class="tc-btn tc-btn--gold" href="{{ route('shop.index') }}">Shop Now</a>
                        <a class="tc-btn tc-btn--outline" href="{{ route('xylo.contact') }}">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tc-stat-card">
                        <div class="tc-stat-card__grid">
                            <div class="tc-stat-card__item">
                                <div class="tc-stat-card__icon"><i class="fa-solid fa-gem"></i></div>
                                <div class="tc-stat-card__label">Quality</div>
                                <div class="tc-stat-card__sub">Handpicked collections</div>
                            </div>
                            <div class="tc-stat-card__item">
                                <div class="tc-stat-card__icon"><i class="fa-solid fa-shield-halved"></i></div>
                                <div class="tc-stat-card__label">Trust</div>
                                <div class="tc-stat-card__sub">Secure checkout</div>
                            </div>
                            <div class="tc-stat-card__item">
                                <div class="tc-stat-card__icon"><i class="fa-solid fa-headset"></i></div>
                                <div class="tc-stat-card__label">Support</div>
                                <div class="tc-stat-card__sub">Quick assistance</div>
                            </div>
                            <div class="tc-stat-card__item">
                                <div class="tc-stat-card__icon"><i class="fa-solid fa-truck-fast"></i></div>
                                <div class="tc-stat-card__label">Delivery</div>
                                <div class="tc-stat-card__sub">Fast dispatch</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="tc-info-card">
                        <div class="tc-info-card__icon"><i class="fa-solid fa-bullseye"></i></div>
                        <h3 class="tc-info-card__title">Our Mission</h3>
                        <p class="tc-info-card__text">To bring you modern, timeless products backed by dependable service and a clean, premium experience.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tc-info-card">
                        <div class="tc-info-card__icon"><i class="fa-solid fa-handshake"></i></div>
                        <h3 class="tc-info-card__title">What We Value</h3>
                        <p class="tc-info-card__text">Authenticity, craftsmanship, and a customer-first approach from browsing to delivery.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tc-info-card">
                        <div class="tc-info-card__icon"><i class="fa-solid fa-certificate"></i></div>
                        <h3 class="tc-info-card__title">Our Promise</h3>
                        <p class="tc-info-card__text">Clear information, transparent pricing, and a professional support experience you can rely on.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section tc-section--gray">
        <div class="container">
            <div class="tc-section__head text-center mb-5">
                <span class="tc-pill tc-pill--sm">Why Choose Us</span>
                <h2 class="tc-section__title mt-3">Why Trigan Collections</h2>
                <p class="tc-section__sub">A store designed to feel premium, modern, and easy to shop.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-gem"></i></div>
                        <h4 class="tc-why__title">Premium Picks</h4>
                        <p class="tc-why__text">Curated products selected for design and durability.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <h4 class="tc-why__title">Fast Dispatch</h4>
                        <p class="tc-why__text">Speedy processing so you get your order quickly.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-shield-heart"></i></div>
                        <h4 class="tc-why__title">Secure Shopping</h4>
                        <p class="tc-why__text">Protected checkout and trusted payment methods.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-headset"></i></div>
                        <h4 class="tc-why__title">Support</h4>
                        <p class="tc-why__text">Quick answers before and after you purchase.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section">
        <div class="container">
            <div class="tc-cta-banner">
                <div class="tc-cta-banner__content">
                    <h2 class="tc-cta-banner__title">Ready to explore the latest collection?</h2>
                    <p class="tc-cta-banner__text">Discover trending products and new arrivals, curated for you.</p>
                </div>
                <a class="tc-btn tc-btn--gold tc-btn--lg" href="{{ route('shop.index') }}">Browse Products</a>
            </div>
        </div>
    </section>

@endsection
