@extends('themes.xylo.layouts.master')
@section('content')
    @php $currency = activeCurrency(); @endphp

    {{-- ========== HERO ========== --}}
    <section class="tc-hero">
        <div class="tc-hero__bg-shapes">
            <div class="tc-hero__shape tc-hero__shape--1"></div>
            <div class="tc-hero__shape tc-hero__shape--2"></div>
            <div class="tc-hero__shape tc-hero__shape--3"></div>
        </div>
        <div class="container position-relative" style="z-index:3">
            <div class="tc-hero__surface">
                <div class="banner-slider">
                    @foreach ($banners as $banner)
                    <div>
                        <div class="tc-hero__slide">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6 order-lg-1 order-2">
                                    <span class="tc-pill">Trigan Collections</span>
                                    <h1 class="tc-hero__heading">{{ $banner->translation ? $banner->translation->title : $banner->title }}</h1>
                                    <p class="tc-hero__text">{{ __('store.home.banner_text') }}</p>
                                    <div class="d-flex gap-3 flex-wrap">
                                        <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">
                                            {{ __('store.home.shop_now') }}
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                        <a href="{{ route('xylo.about') }}" class="tc-btn tc-btn--outline">
                                            About Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-2 order-1">
                                    <div class="tc-hero__visual">
                                        <img src="{{ Storage::url(optional($banner->translation)->image_url ?? 'default.jpg') }}" class="tc-hero__img" alt="{{ $banner->translation ? $banner->translation->title : $banner->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tc-hero-arrows" aria-label="Hero slider navigation">
                    <button type="button" class="tc-hero-prev" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>
                    <button type="button" class="tc-hero-next" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== TRUST STRIP ========== --}}
    <section class="tc-trust-strip">
        <div class="container">
            <div class="tc-trust-strip__inner">
                <div class="tc-trust-strip__item">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>{{ __('store.home.fast_delivery_title') }}</span>
                </div>
                <div class="tc-trust-strip__item">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>Secure Checkout</span>
                </div>
                <div class="tc-trust-strip__item">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Easy Returns</span>
                </div>
                <div class="tc-trust-strip__item">
                    <i class="fa-solid fa-headset"></i>
                    <span>{{ __('store.home.customer_support_title') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== CATEGORIES ========== --}}
    <section class="tc-section tc-section--light animate-on-scroll">
        <div class="container">
            <div class="tc-section__head">
                <div>
                    <span class="tc-pill tc-pill--sm">Browse</span>
                    <h2 class="tc-section__title">{{ __('store.home.explore_popular_categories') }}</h2>
                </div>
                <p class="tc-section__sub">Curated collections crafted for your lifestyle</p>
            </div>
            <div class="category-slider">
                @foreach($categories as $category)
                <div>
                    <div class="tc-catcard">
                        <a href="{{ route('category.show', $category->slug) }}">
                            <div class="tc-catcard__visual">
                                <img src="{{ Storage::url(optional($category->translation)->image_url ?? 'default.jpg') }}" alt="{{ $category->translation->name ?? 'No Translation' }}">
                            </div>
                            <div class="tc-catcard__body">
                                <h3>{{ $category->translation->name ?? 'No Translation' }}</h3>
                                <span class="tc-catcard__go"><i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========== TRENDING ========== --}}
    <section class="tc-section tc-section--gray animate-on-scroll">
        <div class="container position-relative">
            <div class="tc-section__head tc-section__head--between">
                <div>
                    <span class="tc-pill tc-pill--sm">Hot Right Now</span>
                    <h2 class="tc-section__title">{{ __('store.home.trending_products') }}</h2>
                </div>
                <div class="tc-slider-nav custom-arrows">
                    <button class="tc-slider-nav__btn prev"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="tc-slider-nav__btn next"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="product-slider">
                @foreach ($products as $product)
                <div class="tc-pcard">
                    <div class="tc-pcard__visual">
                        <img src="{{ Storage::url(optional($product->thumbnail)->image_url ?? 'default.jpg') }}" alt="{{ $product->translation->name ?? 'Product Name Not Available' }}">
                        <button class="tc-pcard__wish wishlist-btn" data-product-id="{{ $product->id }}"><i class="fa-solid fa-heart"></i></button>
                        <div class="tc-pcard__overlay">
                            <a href="{{ route('product.show', $product->slug) }}" class="tc-pcard__action"><i class="fa-solid fa-eye"></i></a>
                            <button class="tc-pcard__action tc-pcard__action--dark" onclick="addToCart({{ $product->id }})"><i class="fa-solid fa-bag-shopping"></i></button>
                        </div>
                    </div>
                    <div class="tc-pcard__body">
                        <div class="tc-pcard__stars">
                            <i class="fa-solid fa-star"></i>
                            <span>{{ $product->reviews_count }} {{ __('store.home.reviews') }}</span>
                        </div>
                        <h3 class="tc-pcard__name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->translation->name ?? 'Product Name Not Available' }}</a></h3>
                        <div class="tc-pcard__price">
                            <span class="tc-pcard__price-now {{ optional($product->primaryVariant)->converted_discount_price ? 'tc-pcard__price-now--old' : '' }}">
                                @php
                                    $variant = $product->primaryVariant;
                                    $symbol = $variant ? $variant->getCurrencySymbol() : '$';
                                @endphp
                                {{ $symbol }}{{ optional($product->primaryVariant)->converted_price ?? 'N/A' }}
                            </span>
                            @if(optional($product->primaryVariant)->converted_discount_price)
                            <span class="tc-pcard__price-sale">{{ $symbol }}{{ $product->primaryVariant->converted_discount_price }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========== PROMO BANNER ========== --}}
    <section class="tc-promo animate-on-scroll">
        <div class="container">
            <div class="tc-promo__card">
                <div class="tc-promo__bg"></div>
                <div class="row align-items-center g-0">
                    <div class="col-lg-7">
                        <div class="tc-promo__content">
                            <span class="tc-pill">Limited Offer</span>
                            <h2 class="tc-promo__heading">Seasonal Sale <br>Up To <span class="tc-gold-text">50% Off</span></h2>
                            <p class="tc-promo__text">Premium quality at unbeatable prices. Don't miss our biggest sale of the season.</p>
                            <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">
                                Shop The Sale <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="tc-promo__visual">
                            <img src="assets/images/homesale-banner.png" alt="Sale Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== FEATURED PRODUCTS ========== --}}
    <section class="tc-section tc-section--light animate-on-scroll">
        <div class="container">
            <div class="tc-section__head text-center">
                <span class="tc-pill tc-pill--sm">Curated For You</span>
                <h2 class="tc-section__title">{{ __('store.home.featured_products') }}</h2>
                <p class="tc-section__sub">Hand-picked selections for the discerning shopper</p>
            </div>
            <div class="row g-4">
                @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                    <div class="tc-pcard">
                        <div class="tc-pcard__visual">
                            <img src="{{ Storage::url(optional($product->thumbnail)->image_url ?? 'default.jpg') }}" alt="{{ $product->translation->name ?? 'Product Name Not Available' }}">
                            <button class="tc-pcard__wish wishlist-btn" data-product-id="{{ $product->id }}"><i class="fa-solid fa-heart"></i></button>
                            <div class="tc-pcard__overlay">
                                <a href="{{ route('product.show', $product->slug) }}" class="tc-pcard__action"><i class="fa-solid fa-eye"></i></a>
                                <button class="tc-pcard__action tc-pcard__action--dark" onclick="addToCart({{ $product->id }})"><i class="fa-solid fa-bag-shopping"></i></button>
                            </div>
                        </div>
                        <div class="tc-pcard__body">
                            <div class="tc-pcard__stars">
                                <i class="fa-solid fa-star"></i>
                                <span>{{ $product->reviews_count }} {{ __('store.home.reviews') }}</span>
                            </div>
                            <h3 class="tc-pcard__name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->translation->name ?? 'Product Name Not Available' }}</a></h3>
                            <div class="tc-pcard__price">
                                <span class="tc-pcard__price-now {{ optional($product->primaryVariant)->converted_discount_price ? 'tc-pcard__price-now--old' : '' }}">
                                    @php
                                        $variant = $product->primaryVariant;
                                        $symbol = $variant ? $variant->getCurrencySymbol() : '$';
                                    @endphp
                                    {{ $symbol }}{{ optional($product->primaryVariant)->converted_price ?? 'N/A' }}
                                </span>
                                @if(optional($product->primaryVariant)->converted_discount_price)
                                <span class="tc-pcard__price-sale">{{ $symbol }}{{ $product->primaryVariant->converted_discount_price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--outline tc-btn--lg">
                    {{ __('store.home.view_all') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ========== WHY CHOOSE US ========== --}}
    <section class="tc-why animate-on-scroll">
        <div class="container">
            <div class="tc-section__head text-center">
                <span class="tc-pill tc-pill--sm">Why Trigan</span>
                <h2 class="tc-section__title">{{ __('store.home.why_choose_us') }}</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <h3>{{ __('store.home.fast_delivery_title') }}</h3>
                        <p>{{ __('store.home.fast_delivery_text') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-headset"></i></div>
                        <h3>{{ __('store.home.customer_support_title') }}</h3>
                        <p>{{ __('store.home.customer_support_text') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-globe"></i></div>
                        <h3>{{ __('store.home.trusted_worldwide_title') }}</h3>
                        <p>{{ __('store.home.trusted_worldwide_text') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="tc-why__card">
                        <div class="tc-why__icon"><i class="fa-solid fa-award"></i></div>
                        <h3>{{ __('store.home.ten_years_services_title') }}</h3>
                        <p>{{ __('store.home.ten_years_services_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
        function addToCart(productId) {

            fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                toastr.success("{{ session('success') }}", data.message, {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: 5000
                });
                updateCartCount(data.cart);
            })
            .catch(error => console.error("Error:", error));
        }

        function updateCartCount(cart) {
            let totalCount = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById("cart-count").textContent = totalCount;
        }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.wishlist-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');

            fetch('/customer/wishlist', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => {
                if (response.status === 401) {
                    // Not logged in
                    window.location.href = '/customer/login';
                } else if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Something went wrong');
                }
            })
            .then(data => {
                if (data?.message) {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
</script>
@endsection