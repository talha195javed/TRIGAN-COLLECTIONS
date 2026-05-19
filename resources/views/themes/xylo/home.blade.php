@extends('themes.xylo.layouts.master')
@section('css')
<style>
    .noon-home-hero {
        background: #f7f7f7;
        padding: 18px 0 24px;
    }

    .noon-home-hero__grid {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(280px, .8fr);
        grid-template-rows: 210px 210px;
        gap: 14px;
    }

    .noon-home-hero__banner,
    .noon-home-hero__deal {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        background-size: cover;
        background-position: center;
        box-shadow: 0 10px 28px rgba(0,0,0,.10);
    }

    .noon-home-hero__banner {
        grid-row: 1 / span 2;
        min-height: 434px;
        display: flex;
        align-items: center;
        padding: 42px;
    }

    .noon-home-hero__content {
        max-width: 520px;
        color: #fff;
    }

    .noon-home-hero__tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: #ffd60a;
        color: #111;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .08em;
        margin-bottom: 16px;
    }

    .noon-home-hero__content h1 {
        font-size: clamp(34px, 5vw, 66px);
        line-height: .98;
        font-weight: 900;
        letter-spacing: -.05em;
        margin: 0 0 16px;
    }

    .noon-home-hero__content p {
        max-width: 450px;
        font-size: 17px;
        line-height: 1.65;
        color: rgba(255,255,255,.86);
        margin: 0 0 24px;
    }

    .noon-home-hero__deal {
        display: flex;
        align-items: flex-end;
        min-height: 210px;
        padding: 22px;
        color: #fff;
        text-decoration: none;
    }

    .noon-home-hero__deal:hover {
        color: #fff;
    }

    .noon-home-hero__deal span {
        display: block;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: rgba(255,255,255,.76);
    }

    .noon-home-hero__deal strong {
        display: block;
        font-size: 24px;
        line-height: 1.08;
    }

    .noon-home-hero__quick {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 12px;
        margin-top: 14px;
    }

    .noon-home-hero__quick a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-height: 58px;
        border-radius: 14px;
        background: #fff;
        border: 1px solid rgba(0,0,0,.06);
        color: #111;
        text-decoration: none;
        font-weight: 800;
        box-shadow: 0 8px 22px rgba(0,0,0,.055);
    }

    .noon-home-hero__quick i {
        color: #c99b00;
    }

    @media (max-width: 991.98px) {
        .noon-home-hero__grid {
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }

        .noon-home-hero__banner {
            grid-row: auto;
            min-height: 420px;
        }

        .noon-home-hero__quick {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 575.98px) {
        .noon-home-hero {
            padding: 10px 0 16px;
        }

        .noon-home-hero__grid {
            gap: 10px;
        }

        .noon-home-hero__banner {
            min-height: 360px;
            padding: 24px;
            border-radius: 12px;
            background-position: center right;
        }

        .noon-home-hero__content h1 {
            font-size: 34px;
        }

        .noon-home-hero__content p {
            font-size: 14px;
            max-width: 300px;
        }

        .noon-home-hero__deal {
            min-height: 150px;
            border-radius: 12px;
        }

        .noon-home-hero__deal strong {
            font-size: 20px;
        }

        .noon-home-hero__quick {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .noon-home-hero__quick a {
            min-height: 50px;
            font-size: 13px;
        }
    }
</style>
@endsection
@section('content')
    @php
        $currency = activeCurrency();

        // Custom function to generate correct storage URLs
        function storageUrl($path) {
            // Use the current request to get the correct base URL
            $baseUrl = request()->getSchemeAndHttpHost();
            // If running on localhost with port, ensure port is included
            if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
                $baseUrl = 'http://127.0.0.1:8000';
            }
            return $baseUrl . '/storage/' . ltrim($path, '/');
        }
    @endphp

    {{-- ========== HERO ========== --}}
    <section class="noon-home-hero">
        <div class="container">
            <div class="noon-home-hero__grid">
                <div class="noon-home-hero__banner" style="background-image: linear-gradient(90deg, rgba(0,0,0,.78) 0%, rgba(0,0,0,.45) 45%, rgba(0,0,0,.10) 100%), url('https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1500&q=85');">
                    <div class="noon-home-hero__content">
                        <span class="noon-home-hero__tag">Mega fashion sale</span>
                        <h1>Big deals on fashion, shoes and accessories.</h1>
                        <p>Shop fresh styles, daily offers, and fast delivery from Trigan Collections.</p>
                        <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">
                            Shop Now <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <a href="{{ route('shop.index') }}" class="noon-home-hero__deal" style="background-image: linear-gradient(180deg, rgba(0,0,0,.10), rgba(0,0,0,.68)), url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=85');">
                    <div>
                        <span>Footwear deals</span>
                        <strong>Up to 40% off</strong>
                    </div>
                </a>
                <a href="{{ route('shop.index') }}" class="noon-home-hero__deal" style="background-image: linear-gradient(180deg, rgba(0,0,0,.10), rgba(0,0,0,.68)), url('https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=85');">
                    <div>
                        <span>New arrivals</span>
                        <strong>Trending now</strong>
                    </div>
                </a>
            </div>
            <div class="noon-home-hero__quick">
                <a href="{{ route('shop.index') }}"><i class="fa-solid fa-shirt"></i><span>Fashion</span></a>
                <a href="{{ route('shop.index') }}"><i class="fa-solid fa-shoe-prints"></i><span>Shoes</span></a>
                <a href="{{ route('shop.index') }}"><i class="fa-solid fa-tags"></i><span>Deals</span></a>
                <a href="{{ route('shop.index') }}"><i class="fa-solid fa-truck-fast"></i><span>Fast Delivery</span></a>
                <a href="{{ route('shop.index') }}"><i class="fa-solid fa-star"></i><span>New In</span></a>
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
                                <img src="{{ storageUrl(optional($category->translation)->image_url ?? 'default.jpg') }}" alt="{{ $category->translation->name ?? 'No Translation' }}">
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
                        <img src="{{ storageUrl(optional($product->thumbnail)->image_url ?? $product->image_url) }}" alt="{{ $product->translation->name ?? 'Product Name Not Available' }}">
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
                            <img src="{{ storageUrl('banners/shoes-ready.png') }}" alt="Sale Banner">
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
                            <img src="{{ storageUrl(optional($product->thumbnail)->image_url ?? 'default.jpg') }}" alt="{{ $product->translation->name ?? 'Product Name Not Available' }}">
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
