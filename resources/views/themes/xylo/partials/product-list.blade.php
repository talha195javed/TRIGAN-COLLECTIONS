@foreach($products as $product)
<div class="col-xl-3 col-lg-4 col-md-4 col-6 mb-4">
    <div class="tc-pcard">
        <div class="tc-pcard__visual">
            <img src="{{ Storage::url(optional($product->thumbnail)->image_url ?? 'default.jpg') }}" alt="{{ $product->translation->name ?? 'Product Name Not Available' }}">
            <button class="tc-pcard__wish wishlist-btn" data-product-id="{{ $product->id }}" type="button"><i class="fa-solid fa-heart"></i></button>
            <div class="tc-pcard__overlay">
                <a href="{{ route('product.show', $product->slug) }}" class="tc-pcard__action"><i class="fa-solid fa-eye"></i></a>
                <button class="tc-pcard__action tc-pcard__action--dark" onclick="addToCart({{ $product->id }})" type="button"><i class="fa-solid fa-bag-shopping"></i></button>
            </div>
        </div>
        <div class="tc-pcard__body">
            <div class="tc-pcard__stars">
                <i class="fa-solid fa-star"></i>
                <span>{{ $product->reviews_count }} {{ __('store.category.reviews') }}</span>
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
