@extends('themes.xylo.layouts.master')

@section('content')
<section class="tc-page-hero tc-page-hero--sm">
    <div class="container">
        <h1 class="tc-page-hero__title">Thank You</h1>
        <p class="tc-page-hero__subtitle">Your order has been placed successfully.</p>
    </div>
</section>

<section class="tc-section tc-section--light">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 620px;">
            <div class="mb-4" style="font-size: 64px; color: #27ae60;">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h2 class="tc-section__title">Order Confirmed</h2>
            <p class="tc-section__sub mb-4">Thank you for shopping with Trigan Collections. We have received your order and will process it shortly.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('shop.index') }}" class="tc-btn tc-btn--gold">Continue Shopping</a>
                <a href="{{ url('/') }}" class="tc-btn tc-btn--outline">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
