@extends('themes.xylo.layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> 
@endsection
@section('content')

    <section class="tc-page-hero tc-page-hero--sm">
        <div class="container">
            <span class="tc-pill tc-pill--sm"><i class="fa-solid fa-magnifying-glass me-1"></i> Search</span>
            <h1 class="tc-page-hero__title">Results for "{{ $query }}"</h1>
        </div>
    </section>

    <section class="tc-shop">
        <div class="container">
            @if($products->count() > 0)
                <div class="row">
                    @include('themes.xylo.partials.product-list', ['products' => $products])
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @else
                <div class="tc-empty-state">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <p>No products found for "{{ $query }}"</p>
                    <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">Browse All Products</a>
                </div>
            @endif
        </div>
    </section>
@endsection