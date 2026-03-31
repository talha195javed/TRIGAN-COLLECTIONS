@extends('themes.xylo.layouts.master')

@section('title', $category->translation->name)

@section('content')
<div class="container py-4">

    {{-- Breadcrumbs --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('xylo.home') }}">{{ __('store.category.home') }}</a></li>
            @foreach($breadcrumbs as $crumb)
                <li class="breadcrumb-item">
                    <a href="{{ route('category.show', $crumb->slug) }}">{{ $crumb->translation->name }}</a>
                </li>
            @endforeach
        </ol>
    </nav>

    <h2 class="mb-3">{{ $category->translation->name }}</h2>

    {{-- Filters --}}
    <div class="tc-surface p-3 p-md-4 mb-4">
        <form method="GET" class="d-flex gap-2 flex-wrap">
            <input type="number" name="min_price" class="form-control" placeholder="{{ __('store.category.min_price') }}" value="{{ request('min_price') }}">
            <input type="number" name="max_price" class="form-control" placeholder="{{ __('store.category.max_price') }}" value="{{ request('max_price') }}">
            <select name="sort" class="form-select">
                <option value="">{{ __('store.category.sort_by') }}</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('store.category.newest') }}</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>{{ __('store.category.price_low_high') }}</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>{{ __('store.category.price_high_low') }}</option>
                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>{{ __('store.category.top_rated') }}</option>
            </select>
            <button type="submit" class="btn btn-primary">{{ __('store.category.filter') }}</button>
        </form>
    </div>

    {{-- Products --}}
    @if($products->count() > 0)
        <div class="row">
            @include('themes.xylo.partials.product-list', ['products' => $products])
        </div>
    @else
        <p>{{ __('store.category.no_products_found') }}</p>
    @endif

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
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
