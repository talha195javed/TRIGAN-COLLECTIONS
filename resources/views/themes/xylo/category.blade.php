@extends('themes.xylo.layouts.master')

@section('title', $category->translation->name)

@section('content')

    <section class="tc-page-hero tc-page-hero--sm">
        <div class="container">
            <nav class="tc-breadcrumb__nav mb-3" aria-label="breadcrumb">
                <a href="{{ route('xylo.home') }}">{{ __('store.category.home') }}</a>
                @foreach($breadcrumbs as $crumb)
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="{{ route('category.show', $crumb->slug) }}">{{ $crumb->translation->name }}</a>
                @endforeach
            </nav>
            <h1 class="tc-page-hero__title">{{ $category->translation->name }}</h1>
        </div>
    </section>

    <section class="tc-shop">
        <div class="container">
            <div class="tc-filter-bar">
                <form method="GET" class="tc-filter-bar__form">
                    <input type="number" name="min_price" class="tc-input tc-input--sm" placeholder="{{ __('store.category.min_price') }}" value="{{ request('min_price') }}">
                    <input type="number" name="max_price" class="tc-input tc-input--sm" placeholder="{{ __('store.category.max_price') }}" value="{{ request('max_price') }}">
                    <select name="sort" class="tc-input tc-input--sm tc-select">
                        <option value="">{{ __('store.category.sort_by') }}</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('store.category.newest') }}</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>{{ __('store.category.price_low_high') }}</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>{{ __('store.category.price_high_low') }}</option>
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>{{ __('store.category.top_rated') }}</option>
                    </select>
                    <button type="submit" class="tc-btn tc-btn--gold tc-btn--sm">{{ __('store.category.filter') }}</button>
                </form>
            </div>

            @if($products->count() > 0)
                <div class="row">
                    @include('themes.xylo.partials.product-list', ['products' => $products])
                </div>
            @else
                <div class="tc-empty-state">
                    <i class="fa-solid fa-box-open"></i>
                    <p>{{ __('store.category.no_products_found') }}</p>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    // Add to Cart
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
            toastr.success(data.message || "Added to cart successfully!");
            updateCartCount(data.cart);
        })
        .catch(error => console.error("Error:", error));
    }

    function updateCartCount(cart) {
        let totalCount = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
        document.getElementById("cart-count").textContent = totalCount;
    }

    // Wishlist
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
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
@endsection
