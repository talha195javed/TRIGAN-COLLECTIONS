@extends('themes.xylo.layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> 
@endsection
@section('content')
    @php $currency = activeCurrency(); @endphp

    <section class="tc-page-hero tc-page-hero--sm">
        <div class="container">
            <span class="tc-pill tc-pill--sm">Shop</span>
            <h1 class="tc-page-hero__title">All Products</h1>
            <p class="tc-page-hero__sub">Browse our curated collection of premium products</p>
        </div>
    </section>

    <section class="tc-shop">
        <div class="container">
            <div class="row g-4">
                <aside class="col-lg-3 d-none d-lg-block">
                    <div class="tc-filter" id="filterSidebar">
                        <div class="tc-filter__group">
                            <h6 class="tc-filter__title">{{ __('store.shop.brands') }}</h6>
                            @foreach($brands as $brand)
                            <label class="tc-filter__check">
                                <input class="filter-input" type="checkbox" name="brand[]" value="{{ $brand->id }}">
                                <span>{{ mb_convert_case($brand->translation->name ?? $brand->slug, MB_CASE_TITLE, "UTF-8") }}</span>
                                <small>({{ $brand->products_count }})</small>
                            </label>
                            @endforeach
                        </div>

                        <div class="tc-filter__group">
                            <h6 class="tc-filter__title">{{ __('store.shop.categories') }}</h6>
                            @foreach($categories as $category)
                            <label class="tc-filter__check">
                                <input class="filter-input" type="checkbox" name="category[]" value="{{ $category->id }}">
                                <span>{{ mb_convert_case($category->translation->name ?? $category->slug, MB_CASE_TITLE, "UTF-8") }}</span>
                                <small>({{ $category->products_count }})</small>
                            </label>
                            @endforeach
                        </div>

                        <div class="tc-filter__group">
                            <h6 class="tc-filter__title">{{ __('store.shop.price') }}</h6>
                            <p id="priceRange" class="tc-filter__range-text">
    @php
        $sampleVariant = new \App\Models\ProductVariant();
        $symbol = $sampleVariant->getCurrencySymbol();
    @endphp
    {{ $symbol }}<span id="minPriceText">0</span> - {{ $symbol }}<span id="maxPriceText">1000</span>
</p>
                            <div class="tc-filter__range">
                                <input type="range" name="price_min" id="minPrice" min="0" max="1000" value="0" step="10">
                                <input type="range" name="price_max" id="maxPrice" min="0" max="1000" value="1000" step="10">
                            </div>
                        </div>

                        <div class="tc-filter__group">
                            <h6 class="tc-filter__title">{{ __('store.shop.colors') }}</h6>
                            @foreach(['red', 'black'] as $color)
                            <label class="tc-filter__check">
                                <input class="filter-input" type="checkbox" name="color[]" value="{{ strtolower($color) }}">
                                <span>{{ __('store.shop.' . strtolower($color)) }}</span>
                            </label>
                            @endforeach
                        </div>

                        <div class="tc-filter__group">
                            <h6 class="tc-filter__title">{{ __('store.shop.size') }}</h6>
                            @foreach(['M' => 'M', 'L' => 'L'] as $key => $size)
                            <label class="tc-filter__check">
                                <input class="filter-input" type="checkbox" name="size[]" value="{{ $key }}">
                                <span>{{ __('store.shop.' . $key) }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9">
                    <div class="row" id="productList">
                        @include('themes.xylo.partials.product-list')
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    const minSlider = document.getElementById('minPrice');
    const maxSlider = document.getElementById('maxPrice');
    const minPriceText = document.getElementById('minPriceText');
    const maxPriceText = document.getElementById('maxPriceText');

    function updatePriceDisplay() {
        let minVal = parseInt(minSlider.value);
        let maxVal = parseInt(maxSlider.value);

        if (minVal > maxVal) {
            [minVal, maxVal] = [maxVal, minVal];
        }

        minPriceText.textContent = minVal;
        maxPriceText.textContent = maxVal;

        // Trigger the filter request after price changes
        sendFilterRequest();
    }

    minSlider.addEventListener('input', updatePriceDisplay);
    maxSlider.addEventListener('input', updatePriceDisplay);

    // Function to send filters including price
    function sendFilterRequest() {
        let url = new URL("{{ route('shop.index') }}", window.location.origin);
        let params = new URLSearchParams();

        // Include all checked filter inputs
        document.querySelectorAll('.filter-input:checked').forEach(checked => {
            params.append(checked.name, checked.value);
        });

        // Include price range
        let minVal = parseInt(minSlider.value);
        let maxVal = parseInt(maxSlider.value);

        if (minVal > maxVal) {
            [minVal, maxVal] = [maxVal, minVal];
        }

        params.append('price_min', minVal);
        params.append('price_max', maxVal);

        url.search = params.toString();

        fetch(url, {
            method: 'GET',
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('productList').innerHTML = html;
        });
    }

    // Trigger filter when other inputs change
    document.querySelectorAll('.filter-input').forEach(input => {
        input.addEventListener('change', sendFilterRequest);
    });

    // Optional: Initial load
    updatePriceDisplay();
</script>


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
@endsection
