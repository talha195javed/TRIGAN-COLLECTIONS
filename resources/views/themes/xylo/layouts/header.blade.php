<header class="tc-header sticky-top">
    @php
        $wishlistCount = 0;
        if (auth('customer')->check()) {
            $wishlistCount = auth('customer')->user()->wishlistProducts()->count();
        }
    @endphp

    <div class="container">
        <nav class="navbar navbar-expand-lg tc-navbar p-0">
            <a href="{{ url('/') }}" class="navbar-brand tc-header__brand me-4">
                <img src="{{ asset('storage/banners/logo1.png') }}" width="60" alt="Trigan Collections" />
                <span class="tc-header__brand-text d-none d-sm-inline">Trigan</span>
            </a>

            <button class="navbar-toggler tc-header__toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tcMainNav" aria-controls="tcMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="tcMainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center tc-header__links">
                    @php
                        $present = [
                            'home' => false,
                            'shop' => false,
                            'about' => false,
                            'services' => false,
                            'blog' => false,
                            'contact' => false,
                        ];
                    @endphp
                    @if ($headerMenu && $headerMenu->menuItems->count())
                        @foreach ($headerMenu->menuItems as $menuItem)
                            @php
                                $menuSlug = trim((string) $menuItem->slug, '/');
                                $menuHref = url($menuItem->slug);

                                if ($menuSlug === '' || in_array($menuSlug, ['home', 'index'], true)) {
                                    $present['home'] = true;
                                    $menuHref = url('/');
                                } elseif (in_array($menuSlug, ['shop', 'products'], true)) {
                                    $present['shop'] = true;
                                    $menuHref = route('shop.index');
                                } elseif (in_array($menuSlug, ['about', 'about-us'], true)) {
                                    $present['about'] = true;
                                    $menuHref = route('xylo.about');
                                } elseif (in_array($menuSlug, ['services', 'our-services'], true)) {
                                    $present['services'] = true;
                                    $menuHref = route('xylo.services');
                                } elseif (in_array($menuSlug, ['blog', 'blogs', 'news'], true)) {
                                    $present['blog'] = true;
                                    $menuHref = route('xylo.blog');
                                } elseif (in_array($menuSlug, ['contact', 'contact-us'], true)) {
                                    $present['contact'] = true;
                                    $menuHref = route('xylo.contact');
                                }
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link tc-header__link" href="{{ $menuHref }}">{{ $menuItem->translation->title ?? 'No Translation' }}</a>
                            </li>
                        @endforeach

                        @if (!$present['home'])
                            <li class="nav-item"><a class="nav-link tc-header__link" href="{{ url('/') }}">Home</a></li>
                        @endif
                        @if (!$present['shop'])
                            <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('shop.index') }}">Shop</a></li>
                        @endif
                        @if (!$present['about'])
                            <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.about') }}">About</a></li>
                        @endif
                        @if (!$present['services'])
                            <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.services') }}">Services</a></li>
                        @endif
                        @if (!$present['blog'])
                            <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.blog') }}">Blog</a></li>
                        @endif
                        @if (!$present['contact'])
                            <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.contact') }}">Contact</a></li>
                        @endif
                    @else
                        <li class="nav-item"><a class="nav-link tc-header__link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('shop.index') }}">Shop</a></li>
                        <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.services') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link tc-header__link" href="{{ route('xylo.contact') }}">Contact</a></li>
                    @endif
                </ul>

                <form class="tc-header__search me-lg-3 mb-3 mb-lg-0" action="{{ url('/search') }}" method="GET">
                    <div class="tc-header__search-wrap">
                        <i class="fa-solid fa-magnifying-glass tc-header__search-icon"></i>
                        <input type="text" class="tc-header__search-input" id="search-input" name="q" placeholder="{{ __('store.header.search_placeholder') }}">
                        <div id="search-suggestions" class="dropdown-menu show w-100 mt-5 d-none"></div>
                    </div>
                </form>

                <div class="d-flex align-items-center gap-3 tc-header__actions">
                    <form action="{{ route('change.currency') }}" method="POST">
                        @csrf
                        <select name="currency_code" class="tc-header__currency" onchange="this.form.submit()">
                            <option value="AED" {{ session('currency', 'AED') == 'AED' ? 'selected' : '' }}>AED</option>
                            <option value="LKR" {{ session('currency', 'AED') == 'LKR' ? 'selected' : '' }}>LKR</option>
                            <option value="GBP" {{ session('currency', 'AED') == 'GBP' ? 'selected' : '' }}>GBP</option>
                        </select>
                    </form>

                    <a href="{{ auth('customer')->check() ? route('customer.wishlist.index') : route('customer.login') }}" class="tc-header__icon position-relative">
                        <i class="fa-regular fa-heart"></i>
                        @if($wishlistCount > 0)
                            <span class="tc-header__badge">{{ $wishlistCount }}</span>
                        @endif
                    </a>

                    <a href="#" class="tc-header__icon dropdown-toggle" data-bs-toggle="dropdown">
                        @auth('customer')
                            @php $customer = Auth::guard('customer')->user(); @endphp
                            @if($customer->profile_image)
                                <img src="{{ asset('storage/' . $customer->profile_image) }}" alt="Profile" class="tc-header__avatar">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=d4af37&color=fff&size=32" alt="Avatar" class="tc-header__avatar">
                            @endif
                        @else
                            <i class="fa-regular fa-user"></i>
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end tc-header__dropdown">
                        @guest('customer')
                            <li><a class="dropdown-item" href="{{ route('customer.login') }}"><i class="fa-solid fa-right-to-bracket me-2"></i>Sign In</a></li>
                            <li><a class="dropdown-item" href="{{ route('customer.register') }}"><i class="fa-solid fa-user-plus me-2"></i>Sign Up</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('customer.profile.edit') }}"><i class="fa-solid fa-user-gear me-2"></i>My Profile</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('customer.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('customer-logout-form').submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout
                                </a>
                                <form id="customer-logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>

                    <a href="{{ route('cart.view') }}" class="tc-header__icon position-relative">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span id="cart-count" class="tc-header__badge">
                            {{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
