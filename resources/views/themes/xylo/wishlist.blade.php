@extends('themes.xylo.layouts.master')

@section('content')
@php $currency = activeCurrency(); @endphp

    <section class="tc-page-hero tc-page-hero--sm">
        <div class="container">
            <span class="tc-pill tc-pill--sm"><i class="fa-solid fa-heart me-1"></i> Wishlist</span>
            <h1 class="tc-page-hero__title">{{ __('store.wishlist.title') }}</h1>
        </div>
    </section>

    <section class="tc-shop">
        <div class="container">
            @if($products->isEmpty())
                <div class="tc-empty-state">
                    <i class="fa-regular fa-heart"></i>
                    <p>{{ __('store.wishlist.empty') }}</p>
                    <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">Browse Products</a>
                </div>
            @else
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-6 mb-4">
                            <div class="tc-pcard">
                                <div class="tc-pcard__visual">
                                    <img src="{{ Storage::url(optional($product->thumbnail)->image_url ?? 'default.jpg') }}" alt="{{ $product->translation->name }}">
                                    <button class="tc-pcard__wish wishlist-btn" data-product-id="{{ $product->id }}" type="button"><i class="fa-solid fa-heart"></i></button>
                                    <div class="tc-pcard__overlay">
                                        <a href="{{ route('product.show', $product->slug) }}" class="tc-pcard__action"><i class="fa-solid fa-eye"></i></a>
                                        <button class="tc-pcard__action tc-pcard__action--dark" onclick="addToCart({{ $product->id }})" type="button"><i class="fa-solid fa-bag-shopping"></i></button>
                                    </div>
                                </div>
                                <div class="tc-pcard__body">
                                    <div class="tc-pcard__stars"><i class="fa-solid fa-star"></i><span>{{ $product->reviews_count }} {{ __('store.wishlist.reviews') }}</span></div>
                                    <h3 class="tc-pcard__name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->translation->name }}</a></h3>
                                    <div class="tc-pcard__price">
                                        <span class="tc-pcard__price-now {{ optional($product->primaryVariant)->converted_discount_price ? 'tc-pcard__price-now--old' : '' }}">{{ $currency->symbol }}{{ optional($product->primaryVariant)->converted_price ?? 'N/A' }}</span>
                                        @if(optional($product->primaryVariant)->converted_discount_price)
                                        <span class="tc-pcard__price-sale">{{ $currency->symbol }}{{ $product->primaryVariant->converted_discount_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@section('js')
<script>
$(document).on('click', '.wishlist-btn', function () {
    let button = $(this);
    let productId = button.data('product-id');

    $.post('{{ route("customer.wishlist.toggle") }}', {
        _token: '{{ csrf_token() }}',
        product_id: productId
    }, function(res) {
        if (res.status === 'removed') {
            button.closest('.col-md-3').fadeOut();
        }
    });
});
//  Add to Cart
function addToCart(productId) {
    $.ajax({
        url: "{{ route('cart.add') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            product_id: productId,
            quantity: 1
        },
        success: function(res) {
            if (res.status === 'success') {
                toastr.success(res.message);
            } else {
                toastr.success(res.message);
            }
        },
        error: function() {
            toastr.error("Error adding to cart");
        }
    });
}
</script>
@endsection
