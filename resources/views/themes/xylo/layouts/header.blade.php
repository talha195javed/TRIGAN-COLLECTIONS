<header class="tc-header sticky-top">

     {{--  Wishlist Count --}}
    @php
        $wishlistCount = 0;
        if (auth('customer')->check()) {
            $wishlistCount = auth('customer')->user()->wishlistProducts()->count();
        }
    @endphp

    <div class="top-bar w-100 bg-light py-1 header-top-bar">
        <div class="text-center small">
            {{ __('store.header.top_bar_message') }} 
        </div>
    </div>  

    <div class="container py-3">
        <nav class="navbar navbar-expand-lg tc-navbar p-0">
            <a href="{{ url('/') }}" class="navbar-brand me-3">
                <div class="d-flex align-items-center gap-2">
                    <img src="https://i.ibb.co/dHx2ZR3/velstore.png" width="44" alt="Trigan Collections" />
                    <span class="tc-brand-name d-none d-sm-inline">Trigan Collections</span>
                </div>
            </a>

            <button class="navbar-toggler tc-nav-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tcMainNav" aria-controls="tcMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="tcMainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center tc-nav-links">
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
                                <a class="nav-link menu-text-color" href="{{ $menuHref }}">{{ $menuItem->translation->title ?? 'No Translation' }}</a>
                            </li>
                        @endforeach

                        @if (!$present['home'])
                            <li class="nav-item"><a class="nav-link menu-text-color" href="{{ url('/') }}">Home</a></li>
                        @endif
                        @if (!$present['shop'])
                            <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('shop.index') }}">Shop</a></li>
                        @endif
                        @if (!$present['about'])
                            <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.about') }}">About</a></li>
                        @endif
                        @if (!$present['services'])
                            <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.services') }}">Services</a></li>
                        @endif
                        @if (!$present['blog'])
                            <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.blog') }}">Blog</a></li>
                        @endif
                        @if (!$present['contact'])
                            <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.contact') }}">Contact</a></li>
                        @endif
                    @else
                        <li class="nav-item"><a class="nav-link menu-text-color" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('shop.index') }}">Shop</a></li>
                        <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.services') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link menu-text-color" href="{{ route('xylo.contact') }}">Contact</a></li>
                    @endif
                </ul>

                <form class="d-flex tc-nav-search me-lg-3 mb-3 mb-lg-0" action="{{ url('/search') }}" method="GET">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" id="search-input" name="q" placeholder="{{ __('store.header.search_placeholder') }}">
                        <button type="submit" class="btn btn-outline-secondary search-style"><i class="fa fa-search"></i></button>
                        <div id="search-suggestions" class="dropdown-menu show w-100 mt-5 d-none"></div>
                    </div>
                </form>

                <div class="d-flex justify-content-end align-items-center gap-3 tc-nav-actions">
                <!-- Language Selector -->
                <form action="{{ route('change.store.language') }}" method="POST">
                    @csrf
                    <select name="lang" class="form-select form-select-sm font-style" onchange="this.form.submit()">
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                        <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>FR</option>
                        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>ES</option>
                        <option value="de" {{ app()->getLocale() == 'de' ? 'selected' : '' }}>DE</option>
                    </select>
                </form>

                <!-- Currency Selector -->
                <form action="{{ route('change.currency') }}" method="POST">
                    @csrf
                    <select name="currency_code" class="form-select form-select-sm font-style" onchange="this.form.submit()">
                        @foreach (\App\Models\Currency::all() as $currency)
                            <option value="{{ $currency->code }}" {{ session('currency', 'USD') == $currency->code ? 'selected' : '' }}>
                                {{ strtoupper($currency->code) }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <!-- Wishlist Icon -->
                 <a href="{{ auth('customer')->check() ? route('customer.wishlist.index') : route('customer.login') }}" class="position-relative homepage-icon">
                    <i class="fa-regular fa-heart"></i>

                    @if($wishlistCount > 0)
                        <span id="wishlist-count"
                              class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $wishlistCount }}
                        </span>
                    @endif
                </a>

                 <!-- Account Icon -->
                <a href="#" class="dropdown-toggle homepage-icon" data-bs-toggle="dropdown">
                    @auth('customer')
                        @php
                            $customer = Auth::guard('customer')->user();
                        @endphp
                        @if($customer->profile_image)
                            <img src="{{ asset('storage/' . $customer->profile_image) }}" 
                                alt="Profile" 
                                class="rounded-circle" 
                                style="width:32px; height:32px; object-fit:cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}" 
                                alt="Avatar" 
                                class="rounded-circle" 
                                style="width:32px; height:32px; object-fit:cover;">
                        @endif
                    @else
                        <i class="fa-regular fa-user"></i>
                    @endauth
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-2">
                    @guest('customer')
                        <li><a class="dropdown-item" href="{{ route('customer.login') }}">Sign In</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.register') }}">Sign Up</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('customer.profile.edit') }}">My Profile</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('customer.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('customer-logout-form').submit();">
                            Logout
                            </a>
                            <form id="customer-logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>

                <!-- Cart Icon -->
                <a href="{{ route('cart.view') }}" class="position-relative homepage-icon">
                    <i class="fa fa-shopping-bag"></i>
                    <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}
                    </span>
                </a>
                </div>
            </div>
        </nav>
    </div>
</header>
