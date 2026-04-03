<footer class="tc-footer">
    <div class="tc-footer__main">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="tc-footer__brand">
                        <img src="{{ asset('storage/banners/logo1.png') }}" width="50" alt="Trigan Collections" />
                        <div>
                            <div class="tc-footer__brand-name">Trigan Collections</div>
                            <div class="tc-footer__tagline">Curated premium picks, delivered with care.</div>
                        </div>
                    </div>
                    <p class="tc-footer__desc">Premium e-commerce experience with handpicked products, fast delivery, and dedicated customer support.</p>
                    <div class="tc-footer__social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6 mb-4">
                    <h6 class="tc-footer__heading">{{ __('store.footer.account') }}</h6>
                    <ul class="tc-footer__list">
                        <li><a href="#">{{ __('store.footer.my_account') }}</a></li>
                        <li><a href="#">{{ __('store.footer.wishlist') }}</a></li>
                        <li><a href="{{ route('cart.view') }}">Cart</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-6 mb-4">
                    <h6 class="tc-footer__heading">{{ __('store.footer.pages') }}</h6>
                    <ul class="tc-footer__list">
                        <li><a href="{{ route('xylo.about') }}">About Us</a></li>
                        <li><a href="{{ route('xylo.services') }}">Our Services</a></li>
                        <li><a href="{{ route('xylo.blog') }}">Blog</a></li>
                        <li><a href="{{ route('xylo.contact') }}">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h6 class="tc-footer__heading">{{ __('store.footer.follow_us') }}</h6>
                    <p class="tc-footer__tagline">Subscribe to get updates on new collections and exclusive offers.</p>
                    <form class="tc-footer__newsletter">
                        <input type="email" placeholder="Enter your email" class="tc-footer__newsletter-input">
                        <button type="submit" class="tc-footer__newsletter-btn"><i class="fa-solid fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="tc-footer__bottom">
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap">
                <span>{{ __('store.footer.copyright') }}</span>
                <span>{{ __('store.footer.powered_by') }}</span>
            </div>
        </div>
    </div>
</footer>
