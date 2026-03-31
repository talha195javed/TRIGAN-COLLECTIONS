@extends('themes.xylo.layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> 
@endsection
@section('content')
    <div class="container">
        <h2>Search Results for "{{ $query }}"</h2>

        @if($products->count() > 0)
            <div class="row">
                @include('themes.xylo.partials.product-list', ['products' => $products])
            </div>

            {{ $products->links() }} <!-- Pagination Links -->
        @else
            <p>No products found.</p>
        @endif
    </div>
@endsection