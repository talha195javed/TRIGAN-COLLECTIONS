@extends('themes.xylo.layouts.auth')

@section('content')
<div class="tc-auth">
    <div class="row g-0 min-vh-100">
        <div class="col-lg-6 tc-auth__brand">
            <div class="tc-auth__brand-inner">
                <div class="tc-auth__accent"><i class="fa-solid fa-gem"></i></div>
                <h1 class="tc-auth__brand-title">{{ __('store.login.hello') }} <br> {{ __('store.login.theme_name') }}</h1>
                <p class="tc-auth__brand-sub">{{ __('store.login.login_now') }}</p>
                <p class="tc-auth__brand-desc">{{ __('store.login.login_description') }}</p>
                <div class="tc-auth__brand-footer">{{ __('store.login.copyright') }}</div>
            </div>
        </div>

        <div class="col-lg-6 tc-auth__form-col">
            <div class="tc-auth__form-wrap">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/brands/logo1.png') }}" width="140" alt="Main Logo">
                </div>
                <h2 class="tc-auth__title">{{ __('store.login.welcome_back') }}</h2>
                <p class="tc-auth__subtitle">{{ __('store.login.form_subtitle') }}</p>

                <form class="w-100" method="POST" action="{{ route('customer.login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="{{ __('store.login.email') }}" class="tc-input">
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="{{ __('store.login.password') }}" class="tc-input">
                        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="tc-btn tc-btn--gold w-100 justify-content-center tc-btn--lg">
                        {{ __('store.login.login_btn') }}
                    </button>
                </form>

                <p class="tc-auth__links">
                    {{ __('store.login.dont_have_account') }}
                    <a href="{{ route('customer.register') }}">{{ __('store.login.signup') }}</a>
                    <br>
                    <a href="{{ route('customer.password.request') }}">{{ __('store.login.forgot_password') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
