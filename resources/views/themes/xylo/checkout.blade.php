@extends('themes.xylo.layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> 
@endsection
@section('content')
    @php $currency = activeCurrency(); @endphp

    <section class="tc-page-hero tc-page-hero--sm">
        <div class="container">
            <nav class="tc-breadcrumb__nav mb-3" aria-label="breadcrumb">
                <a href="{{ url('/') }}">{{ __('store.checkout.breadcrumb_home') }}</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>{{ __('store.checkout.breadcrumb_checkout') }}</span>
            </nav>
            <h1 class="tc-page-hero__title">Checkout</h1>
        </div>
    </section>

    <section class="tc-checkout">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <form id="checkout-form" method="POST" action="{{ route('checkout.process') }}">
                        @csrf

                        <div class="tc-checkout__card">
                            <h3 class="tc-checkout__card-title"><i class="fa-solid fa-truck me-2"></i>{{ __('store.checkout.shipping_information') }}</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="tc-input" placeholder="{{ __('store.checkout.first_name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="tc-input" placeholder="{{ __('store.checkout.last_name') }}" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="address" class="tc-input" placeholder="{{ __('store.checkout.address') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="suite" class="tc-input" placeholder="{{ __('store.checkout.suite') }}">
                                </div>
                                <div class="col-md-6">
                                    <select name="country" class="tc-input tc-select" required>
                                        <option value="">{{ __('store.checkout.select_country') }}</option>
                                        <option value="1">United States</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="city" class="tc-input" placeholder="{{ __('store.checkout.city') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="state" class="tc-input tc-select" required>
                                        <option value="">{{ __('store.checkout.select_state') }}</option>
                                        <option value="1">New York</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="zipcode" class="tc-input" placeholder="{{ __('store.checkout.zipcode') }}" required>
                                </div>
                                <div class="col-12">
                                    <label class="tc-checkbox">
                                        <input type="checkbox" name="use_as_billing" value="1" checked>
                                        <span>{{ __('store.checkout.use_as_billing') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="tc-checkout__card">
                            <h3 class="tc-checkout__card-title"><i class="fa-solid fa-envelope me-2"></i>{{ __('store.checkout.contact_information') }}</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="email" name="email" class="tc-input" placeholder="{{ __('store.checkout.email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="tc-input" placeholder="{{ __('store.checkout.phone') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="tc-checkout__card">
                            <h3 class="tc-checkout__card-title"><i class="fa-solid fa-credit-card me-2"></i>{{ __('store.checkout.payment_method') }}</h3>
                            @foreach($paymentGateways as $gateway)
                                <label class="tc-checkout__gateway">
                                    <input type="radio" name="gateway" value="{{ $gateway->code }}" id="gateway-{{ $gateway->id }}" required>
                                    <span>{{ $gateway->name }}</span>
                                </label>
                                @if($gateway->code === 'paypal')
                                    <div id="paypal-button-container" class="mt-3" style="display: none;"></div>
                                @endif
                                @if($gateway->code === 'stripe')
                                    <div id="card-element" class="mt-3" style="display: none;"></div>
                                    <div id="card-errors" class="text-danger mt-2"></div>
                                @endif
                            @endforeach
                            <div id="payment-fields"></div>
                        </div>

                        <button type="submit" id="place-order" class="tc-btn tc-btn--gold tc-btn--lg w-100 justify-content-center">
                            <i class="fa-solid fa-lock me-2"></i>{{ __('store.checkout.place_order') }}
                        </button>
                    </form>
                </div>

                <div class="col-lg-5">
                    <div class="tc-cart__summary tc-cart__summary--sticky">
                        <h3 class="tc-cart__summary-title">{{ __('store.checkout.order_summary') }}</h3>
                        <div class="tc-cart__summary-row">
                            <span>{{ __('store.checkout.subtotal') }}</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="tc-cart__summary-row">
                            <span>{{ __('store.checkout.shipping') }}</span>
                            <span class="tc-muted-text">{{ __('store.checkout.shipping_info') }}</span>
                        </div>
                        <div class="tc-cart__summary-row tc-cart__summary-row--total">
                            <span>{{ __('store.checkout.total') }}</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php /* ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
    // Fetch keys from backend
    let response = await fetch("{{ route('stripe.checkout.process') }}");
    let data = await response.json();

    let stripe = Stripe(data.publicKey);
    let elements = stripe.elements();
    let cardElement = elements.create('card');
    cardElement.mount('#card-element');

    document.querySelector('#checkout-form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const {error, paymentIntent} = await stripe.confirmCardPayment(data.clientSecret, {
            payment_method: {
                card: cardElement
            }
        });

        if (error) {
            alert(error.message);
        } else if (paymentIntent.status === 'succeeded') {
            alert("Payment successful!");
            window.location.href = "/order/success";
        }
    });
});
</script>


@if($paypalClientId)
    <script src="https://www.paypal.com/sdk/js?client-id={{ $paypalClientId }}&currency=USD"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof paypal !== "undefined") {
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{ amount: { value: "{{ $total }}" } }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            fetch("{{ route('checkout.process') }}", {
                                method: "POST",
                                headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
                                body: JSON.stringify({
                                    gateway: "paypal",
                                    order_id: data.orderID
                                })
                            });
                        });
                    }
                }).render('#paypal-button-container');
            } else {
                console.error("PayPal SDK not loaded");
            }
        });
    </script>
@endif
<?php */ ?>
<script src="https://www.paypal.com/sdk/js?client-id={{ $paypalClientId }}&currency=USD"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const gatewayRadios = document.querySelectorAll('input[name="gateway"]');
    const paypalContainer = document.getElementById("paypal-button-container");
    const stripeContainer = document.getElementById("card-element");
    const placeOrderBtn = document.getElementById("place-order");

    let stripe = Stripe("asdasd");
    let elements = stripe.elements();
    let card = elements.create("card");
    card.mount("#card-element");

    // Show correct payment fields
    gatewayRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "paypal") {
                paypalContainer.style.display = "block";
                stripeContainer.style.display = "none";
            } else if (this.value === "stripe") {
                stripeContainer.style.display = "block";
                paypalContainer.style.display = "none";
            } else {
                paypalContainer.style.display = "none";
                stripeContainer.style.display = "none";
            }
        });
    });

    // PayPal integration
    if (typeof paypal !== "undefined") {
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{ amount: { value: "{{ number_format($total, 2, '.', '') }}" } }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    // Send to backend
                    fetch("{{ route('checkout.process') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            gateway: "paypal",
                            order_id: data.orderID,
                            details: details
                        })
                    }).then(res => res.json()).then(result => {
                        window.location.href = "/thank-you";
                    });
                });
            }
        }).render("#paypal-button-container");
    }

    // Stripe integration
    const form = document.getElementById("checkout-form");
    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        let selectedGateway = document.querySelector('input[name="gateway"]:checked').value;

        if (selectedGateway === "stripe") {
            const {paymentMethod, error} = await stripe.createPaymentMethod({
                type: "card",
                card: card,
            });

            if (error) {
                document.getElementById("card-errors").textContent = error.message;
            } else {
                // Send paymentMethod.id + form data to backend
                let formData = new FormData(form);
                formData.append("payment_method_id", paymentMethod.id);

                fetch("{{ route('checkout.process') }}", {
                    method: "POST",
                    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
                    body: formData
                }).then(res => res.json()).then(result => {
                    window.location.href = "/thank-you";
                });
            }
        } else if (selectedGateway === "paypal") {
            alert("Please complete payment with PayPal button");
        } else {
            form.submit();
        }
    });
});
</script>


@endsection