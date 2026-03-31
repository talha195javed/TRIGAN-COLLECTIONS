@php $currency = activeCurrency(); @endphp
@foreach($products as $product)
<div class="col-6 col-md-4">
    <div class="product-card tc-product-card">
        <div class="product-img tc-product-img position-relative">
            <a href="{{ route('product.show', $product->slug) }}" class="d-block tc-product-media">
                <img src="{{ Storage::url(optional($product->thumbnail)->image_url ?? 'default.jpg') }}"
                     alt="{{ $product->translation->name ?? 'Product Name Not Available' }}">
            </a>
            <button class="wishlist-btn tc-wishlist-btn" data-product-id="{{ $product->id }}" type="button">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="product-info mt-3 tc-product-info">
            <div class="top-info">
                <div class="reviews tc-product-reviews">
                    <i class="fa-solid fa-star"></i> {{ $product->reviews_count }} {{ __('store.category.reviews') }}
                </div>
            </div>

            <div class="bottom-info tc-product-bottom">
                <div class="left">
                    <h3 class="tc-product-title mb-2">
                        <a href="{{ route('product.show', $product->slug) }}" class="product-title tc-product-link">
                            {{ $product->translation->name ?? 'Product Name Not Available' }}
                        </a>
                    </h3>

                    <p class="price tc-product-price mb-0">
                        <span class="original {{ optional($product->primaryVariant)->converted_discount_price ? 'has-discount' : '' }}">
                            {{ $currency->symbol }}{{ optional($product->primaryVariant)->converted_price ?? 'N/A' }}
                        </span>

                        @if(optional($product->primaryVariant)->converted_discount_price)
                            <span class="discount">
                                {{ $currency->symbol }}{{ $product->primaryVariant->converted_discount_price }}
                            </span>
                        @endif
                    </p>
                </div>

                <button class="cart-btn tc-cart-btn" onclick="addToCart({{ $product->id }})" type="button">
                    <i class="fa fa-shopping-bag"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
