@extends('themes.xylo.layouts.master')

@section('content')

    <section class="tc-page-hero tc-page-hero--lg">
        <div class="container">
            <div class="row align-items-end g-5">
                <div class="col-lg-7">
                    <span class="tc-pill">Blog</span>
                    <h1 class="tc-page-hero__title tc-page-hero__title--xl">Blog</h1>
                    <p class="tc-page-hero__sub">Editorial picks, style notes, and updates from our latest collections.</p>
                </div>
                <div class="col-lg-5">
                    <div class="tc-stat-card">
                        <span class="tc-pill tc-pill--sm">Luxury Notes</span>
                        <p class="tc-info-card__text mt-3">When you're ready, we can connect this page to a real blog system. For now, it's styled as a premium editorial layout.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tc-section">
        <div class="container">
            <div class="tc-blog-feature">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-6">
                        <div class="tc-blog-feature__media"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tc-blog-feature__content">
                            <span class="tc-pill tc-pill--sm">Featured</span>
                            <h2 class="tc-blog-feature__title">The Trigan Standard: how we select premium picks</h2>
                            <p class="tc-info-card__text">A behind-the-scenes look at our curation process—materials, detail, and consistency—so every purchase feels like a premium decision.</p>
                            <div class="d-flex gap-3 flex-wrap mt-auto">
                                <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">Shop Collections</a>
                                <a href="{{ route('xylo.contact') }}" class="tc-btn tc-btn--outline">Ask a Question</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-lg-8">
                    <div class="tc-section__head mb-4">
                        <h2 class="tc-section__title">Latest Posts</h2>
                        <p class="tc-section__sub">Curated content designed to feel editorial and premium.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <article class="tc-blog-card">
                                <span class="tc-pill tc-pill--sm">Collections</span>
                                <h3 class="tc-blog-card__title">How we curate products for Trigan Collections</h3>
                                <p class="tc-blog-card__text">A quick look into selection, consistency, and premium finishing.</p>
                                <a href="{{ route('shop.index') }}" class="tc-link">Explore the store <i class="fa-solid fa-arrow-right"></i></a>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="tc-blog-card">
                                <span class="tc-pill tc-pill--sm">Guides</span>
                                <h3 class="tc-blog-card__title">Choosing the right product: a simple checklist</h3>
                                <p class="tc-blog-card__text">Quality, fit, and value—what to check before you buy.</p>
                                <a href="{{ route('xylo.contact') }}" class="tc-link">Ask for help <i class="fa-solid fa-arrow-right"></i></a>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="tc-blog-card">
                                <span class="tc-pill tc-pill--sm">Updates</span>
                                <h3 class="tc-blog-card__title">New arrivals and trending picks</h3>
                                <p class="tc-blog-card__text">Seasonal recommendations and what's trending right now.</p>
                                <a href="{{ route('shop.index') }}" class="tc-link">Shop trending <i class="fa-solid fa-arrow-right"></i></a>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="tc-blog-card">
                                <span class="tc-pill tc-pill--sm">Service</span>
                                <h3 class="tc-blog-card__title">Shipping, support, and what to expect</h3>
                                <p class="tc-blog-card__text">Clear expectations so your shopping experience stays stress-free.</p>
                                <a href="{{ route('xylo.services') }}" class="tc-link">View services <i class="fa-solid fa-arrow-right"></i></a>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tc-info-card">
                        <h3 class="tc-info-card__title">Subscribe</h3>
                        <p class="tc-info-card__text">Get updates on new collections and announcements.</p>
                        <form>
                            <label class="tc-form-label">Email</label>
                            <input type="email" class="tc-input mb-3" placeholder="you@example.com">
                            <button type="submit" class="tc-btn tc-btn--gold w-100 justify-content-center">Subscribe</button>
                        </form>
                    </div>

                    <div class="tc-info-card mt-4">
                        <h3 class="tc-info-card__title">Quick Links</h3>
                        <div class="d-grid gap-2">
                            <a class="tc-btn tc-btn--outline justify-content-center" href="{{ route('xylo.about') }}">About Us</a>
                            <a class="tc-btn tc-btn--outline justify-content-center" href="{{ route('xylo.services') }}">Our Services</a>
                            <a class="tc-btn tc-btn--outline justify-content-center" href="{{ route('xylo.contact') }}">Contact Us</a>
                        </div>
                    </div>

                    <div class="tc-info-card mt-4">
                        <h3 class="tc-info-card__title">Store</h3>
                        <p class="tc-info-card__text mb-3">Browse curated premium picks with fast dispatch and support.</p>
                        <a class="tc-btn tc-btn--gold w-100 justify-content-center" href="{{ route('shop.index') }}">Go to Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
