@extends('themes.xylo.layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> 
@endsection
@section('content')
    @php $currency = activeCurrency(); @endphp

    <section class="tc-page-hero tc-page-hero--sm">
        <div class="container">
            <nav class="tc-breadcrumb__nav mb-3" aria-label="breadcrumb">
                <a href="{{ url('/') }}">{{ __('store.cart.breadcrumb_home') }}</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>{{ __('store.cart.breadcrumb_cart') }}</span>
            </nav>
            <h1 class="tc-page-hero__title">Shopping Cart</h1>
        </div>
    </section>

    @php $total = 0; @endphp
    <section class="tc-cart">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    @if(empty($cart))
                        <div class="tc-empty-state">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <p>{{ __('store.cart.empty_cart') }}</p>
                            <a href="{{ url('/') }}" class="tc-btn tc-btn--gold">Continue Shopping</a>
                        </div>
                    @else
                    <div class="tc-cart__table-wrap">
                        <table class="tc-cart__table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('store.cart.product') }}</th>
                                    <th>{{ __('store.cart.price') }}</th>
                                    <th>{{ __('store.cart.quantity') }}</th>
                                    <th>{{ __('store.cart.subtotal') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $key => $item)
                                    @php
                                        $product = \App\Models\Product::with(['translations', 'thumbnail'])->find($item['product_id']);
                                        $variant = isset($item['variant_id'])
                                                    ? \App\Models\ProductVariant::with('images')->find($item['variant_id'])
                                                    : \App\Models\ProductVariant::where('product_id', $item['product_id'])->where('is_primary', true)->first();
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $symbol = $variant->getCurrencySymbol();
                                    @endphp
                                    <tr>
                                        <td>
                                            <button class="tc-cart__remove remove-from-cart" data-id="{{ $key }}" type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="tc-cart__product">
                                                <img src="{{ Storage::url(optional($variant->images->first() ?? $product->thumbnail)->image_url ?? 'default.jpg') }}" alt="{{ $variant->name ?? $product->translation->name }}">
                                                <div>
                                                    <p class="tc-cart__product-name">{{ $variant->name ?? $product->translation->name }}</p>
                                                    @php $sizes = []; $colors = []; @endphp
                                                    @if (!empty($item['attributes']))
                                                        @foreach ($item['attributes'] as $attributeValueId)
                                                            @php
                                                                $attributeValue = \App\Models\AttributeValue::with('attribute')->find($attributeValueId);
                                                                if ($attributeValue && $attributeValue->attribute) {
                                                                    $attributeName = strtolower($attributeValue->attribute->name);
                                                                    if ($attributeName === 'size') $sizes[] = $attributeValue->translated_value;
                                                                    elseif ($attributeName === 'color') $colors[] = $attributeValue->translated_value;
                                                                }
                                                            @endphp
                                                        @endforeach
                                                    @endif
                                                    <div class="tc-cart__variants">
                                                        @foreach ($sizes as $size) <span class="tc-cart__tag">{{ $size }}</span> @endforeach
                                                        @foreach ($colors as $color) <span class="tc-cart__tag tc-cart__tag--color">{{ $color }}</span> @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><strong>{{ $symbol }}{{ number_format($item['price'], 2) }}</strong></td>
                                        <td><input type="number" class="tc-cart__qty-input" value="{{ $item['quantity'] }}" min="1" data-id="{{ $key }}"></td>
                                        <td><strong>{{ $symbol }}{{ number_format($subtotal, 2) }}</strong></td>
                                    </tr>
                                    @php $total += $subtotal; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tc-cart__btns">
                        <a href="{{ url('/') }}" class="tc-btn tc-btn--outline">{{ __('store.cart.continue_shopping') }}</a>
                        <a href="#" class="tc-btn tc-btn--gold update-cart">{{ __('store.cart.update_cart') }}</a>
                    </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="tc-cart__summary">
                        <h3 class="tc-cart__summary-title">{{ __('store.cart.cart_totals') }}</h3>
                        <div class="tc-cart__summary-row">
                            <span>{{ __('store.cart.subtotal_label') }}</span>
                            <span>{{ $variant->getCurrencySymbol() }}{{ number_format($total, 2) }}</span>
                        </div>

                        @php
                            $coupon = session('cart_coupon');
                            $discountAmount = 0;
                            if ($coupon) {
                                if ($coupon['type'] === 'percentage') { $discountAmount = $total * ($coupon['discount'] / 100); }
                                else { $discountAmount = $coupon['discount']; }
                            }
                            $finalTotal = max(0, $total - $discountAmount);
                        @endphp

                        @if($coupon)
                        <div class="tc-cart__summary-row">
                            <span>Discount ({{ $coupon['code'] }})</span>
                            <span class="d-flex align-items-center gap-2">
                                -{{ $variant->getCurrencySymbol() }}{{ number_format($discountAmount, 2) }}
                                <form id="removeCouponForm">@csrf
                                    <button type="submit" class="tc-cart__coupon-remove" title="Remove">x</button>
                                </form>
                            </span>
                        </div>
                        @endif

                        <div class="tc-cart__summary-row tc-cart__summary-row--total">
                            <span>{{ __('store.cart.total_label') }}</span>
                            <span>{{ $variant->getCurrencySymbol() }}{{ number_format($finalTotal, 2) }}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="tc-btn tc-btn--gold w-100 justify-content-center mt-3">{{ __('store.cart.proceed_to_checkout') }}</a>
                    </div>

                    <div class="tc-cart__coupon">
                        <h4 class="tc-cart__coupon-title">{{ __('store.cart.coupon_heading') }}</h4>
                        <form id="applyCouponForm">
                            @csrf
                            <input type="text" name="code" id="coupon_code" placeholder="{{ __('store.cart.coupon_placeholder') }}" class="tc-input">
                            <button type="submit" class="tc-btn tc-btn--outline w-100 justify-content-center mt-2">{{ __('store.cart.apply_coupon') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('.update-cart').click(function(e) {
            e.preventDefault();

            let cartData = [];

            $('tbody tr').each(function() {
                let productId = $(this).find('input[type="number"]').data('id');
                let quantity = $(this).find('input[type="number"]').val();

                cartData.push({
                    product_id: productId,
                    quantity: quantity
                });
            });

            $.ajax({
                url: "{{ route('cart.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    cart: cartData
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', function() {
                let productId = this.dataset.id;

                fetch("{{ route('cart.remove') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                .then(response => response.json())
                .then(data => {
                    toastr.success("{{ session('success') }}", data.message, {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: 5000
                    });
                    location.reload();
                });
            });
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("applyCouponForm")?.addEventListener("submit", function(e) {
        e.preventDefault();
        let code = document.getElementById("coupon_code").value;
        fetch("{{ route('cart.applyCoupon') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ code: code })
        })
        .then(response => response.json())
        .then(data => {
            toastr.success(data.message, "Applied", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 5000
            });
            setTimeout(() => {
                if (data.success) location.reload();
            }, 1000);
        });
    });

    document.getElementById("removeCouponForm")?.addEventListener("submit", function(e) {
        e.preventDefault();
        fetch("{{ route('cart.removeCoupon') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            toastr.success(data.message, "Removed", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 5000
            });
            
            setTimeout(() => {
                if (data.success) location.reload();
            }, 1000);

        });
    });
});
</script>

@endsection