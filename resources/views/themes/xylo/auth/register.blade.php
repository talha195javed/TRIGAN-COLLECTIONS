@extends('themes.xylo.layouts.auth')

@section('content')
<div class="tc-auth">
    <div class="row g-0 min-vh-100">
        <div class="col-lg-6 tc-auth__brand">
            <div class="tc-auth__brand-inner">
                <div class="tc-auth__accent"><i class="fa-solid fa-gem"></i></div>
                <h1 class="tc-auth__brand-title">{{ __('store.register.hello') }} <br> {{ __('store.register.theme_name') }}</h1>
                <p class="tc-auth__brand-sub">{{ __('store.register.signup_now') }}</p>
                <p class="tc-auth__brand-desc">{{ __('store.register.signup_description') }}</p>
                <div class="tc-auth__brand-footer">{{ __('store.register.copyright') }}</div>
            </div>
        </div>

        <div class="col-lg-6 tc-auth__form-col">
            <div class="tc-auth__form-wrap">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/brands/logo1.png') }}" width="140" alt="Main Logo">
                </div>
                <h2 class="tc-auth__title">{{ __('store.register.welcome_back') }}</h2>
                <p class="tc-auth__subtitle">{{ __('store.register.form_subtitle') }}</p>

                <form class="w-100" method="POST" action="{{ route('customer.register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('store.register.name') }}" class="tc-input">
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('store.register.email') }}" class="tc-input">
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" placeholder="{{ __('store.register.password') }}" class="tc-input">
                        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password_confirmation" placeholder="{{ __('store.register.confirm_password') }}" class="tc-input">
                    </div>
                    <button type="submit" class="tc-btn tc-btn--gold w-100 justify-content-center tc-btn--lg">
                        {{ __('store.register.signup_btn') }}
                    </button>
                </form>

                <p class="tc-auth__links">
                    {{ __('store.register.already_account') }}
                    <a href="{{ route('customer.login') }}">{{ __('store.register.login_here') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
