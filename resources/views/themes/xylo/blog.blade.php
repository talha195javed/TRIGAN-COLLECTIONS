@extends('themes.xylo.layouts.master')

@section('content')
<div class="tc-page">
    <section class="tc-page-hero">
        <div class="container">
            <div class="row align-items-end g-4">
                <div class="col-lg-7">
                    <div class="tc-eyebrow">Trigan Collections</div>
                    <h1 class="tc-hero-title">Blog</h1>
                    <p class="tc-hero-subtitle">Editorial picks, style notes, and updates from our latest collections.</p>
                </div>
                <div class="col-lg-5">
                    <div class="tc-hero-card">
                        <div class="tc-hero-card-inner">
                            <div class="tc-badge">Luxury Notes</div>
                            <div class="tc-muted mt-3">When you’re ready, we can connect this page to a real blog system. For now, it’s styled as a premium editorial layout.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="tc-blog-feature tc-surface">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-6">
                        <div class="tc-blog-feature-media"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4 p-md-5 h-100 d-flex flex-column">
                            <div class="tc-post-meta">Featured</div>
                            <h2 class="tc-section-title mt-3 mb-2">The Trigan Standard: how we select premium picks</h2>
                            <p class="tc-muted mb-4">A behind-the-scenes look at our curation process—materials, detail, and consistency—so every purchase feels like a premium decision.</p>
                            <div class="mt-auto d-flex gap-3 flex-wrap">
                                <a href="{{ route('shop.index') }}" class="btn tc-btn-primary">Shop Collections</a>
                                <a href="{{ route('xylo.contact') }}" class="btn tc-btn-ghost">Ask a Question</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-lg-8">
                    <div class="tc-section-head mt-4">
                        <h2 class="tc-section-title">Latest Posts</h2>
                        <p class="tc-section-subtitle">Curated content designed to feel editorial and premium.</p>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <article class="tc-surface tc-card p-4 h-100 tc-blog-card">
                                <div class="tc-post-meta">Collections</div>
                                <h3 class="tc-card-title mt-3">How we curate products for Trigan Collections</h3>
                                <p class="tc-muted">A quick look into selection, consistency, and premium finishing.</p>
                                <a href="{{ route('shop.index') }}" class="tc-link">Explore the store</a>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="tc-surface tc-card p-4 h-100 tc-blog-card">
                                <div class="tc-post-meta">Guides</div>
                                <h3 class="tc-card-title mt-3">Choosing the right product: a simple checklist</h3>
                                <p class="tc-muted">Quality, fit, and value—what to check before you buy.</p>
                                <a href="{{ route('xylo.contact') }}" class="tc-link">Ask for help</a>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="tc-surface tc-card p-4 h-100 tc-blog-card">
                                <div class="tc-post-meta">Updates</div>
                                <h3 class="tc-card-title mt-3">New arrivals and trending picks</h3>
                                <p class="tc-muted">Seasonal recommendations and what’s trending right now.</p>
                                <a href="{{ route('shop.index') }}" class="tc-link">Shop trending</a>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="tc-surface tc-card p-4 h-100 tc-blog-card">
                                <div class="tc-post-meta">Service</div>
                                <h3 class="tc-card-title mt-3">Shipping, support, and what to expect</h3>
                                <p class="tc-muted">Clear expectations so your shopping experience stays stress-free.</p>
                                <a href="{{ route('xylo.services') }}" class="tc-link">View services</a>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tc-surface tc-card p-4">
                        <h3 class="tc-card-title">Subscribe</h3>
                        <p class="tc-muted">Get updates on new collections and announcements.</p>
                        <form>
                            <div class="mb-3">
                                <label class="form-label tc-form-label">Email</label>
                                <input type="email" class="form-control tc-input" placeholder="you@example.com">
                            </div>
                            <button type="submit" class="btn tc-btn-primary w-100">Subscribe</button>
                        </form>
                    </div>

                    <div class="tc-surface tc-card p-4 mt-4">
                        <h3 class="tc-card-title">Quick Links</h3>
                        <div class="d-grid gap-2">
                            <a class="btn tc-btn-ghost" href="{{ route('xylo.about') }}">About Us</a>
                            <a class="btn tc-btn-ghost" href="{{ route('xylo.services') }}">Our Services</a>
                            <a class="btn tc-btn-ghost" href="{{ route('xylo.contact') }}">Contact Us</a>
                        </div>
                    </div>

                    <div class="tc-surface tc-card p-4 mt-4">
                        <h3 class="tc-card-title">Store</h3>
                        <p class="tc-muted mb-3">Browse curated premium picks with fast dispatch and support.</p>
                        <a class="btn tc-btn-primary w-100" href="{{ route('shop.index') }}">Go to Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
