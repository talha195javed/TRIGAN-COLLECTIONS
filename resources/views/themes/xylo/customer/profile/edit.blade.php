@extends('themes.xylo.layouts.master')

@section('content')
<section class="tc-page-hero tc-page-hero--sm">
    <div class="container">
        <h1 class="tc-page-hero__title">{{ __('store.profile.title') }}</h1>
    </div>
</section>

<section class="tc-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="tc-info-card tc-info-card--lg">
                    <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="text-center mb-4">
                            <img id="profilePreview"
                                src="{{ $customer->profile_image 
                                    ? asset('storage/' . $customer->profile_image) 
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($customer->name) . '&background=d4af37&color=fff&size=80' }}"
                                alt="Profile"
                                class="tc-profile__avatar">
                            <div class="mt-2">
                                <label for="profile_image" class="tc-btn tc-btn--outline tc-btn--sm">{{ __('store.profile.choose_file') }}</label>
                                <input type="file" id="profile_image" name="profile_image" accept="image/*" class="d-none">
                            </div>
                            @error('profile_image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="tc-form-label">{{ __('store.profile.name') }}</label>
                                <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="tc-input">
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="tc-form-label">{{ __('store.profile.email') }}</label>
                                <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="tc-input">
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="tc-form-label">{{ __('store.profile.phone') }}</label>
                                <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="tc-input">
                                @error('Phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="tc-form-label">{{ __('store.profile.address') }}</label>
                                <textarea name="address" rows="1" class="tc-input">{{ old('address', $customer->address) }}</textarea>
                                @error('address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12"><hr style="border-color: rgba(0,0,0,0.06);"></div>
                            <div class="col-md-4">
                                <label class="tc-form-label">{{ __('store.profile.current_password') }}</label>
                                <input type="password" name="current_password" class="tc-input">
                                @error('current_password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="tc-form-label">{{ __('store.profile.new_password') }}</label>
                                <input type="password" name="password" class="tc-input">
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="tc-form-label">{{ __('store.profile.confirm_new_password') }}</label>
                                <input type="password" name="password_confirmation" class="tc-input">
                                @error('password_confirmation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="tc-btn tc-btn--gold">
                                    <i class="fa-solid fa-floppy-disk me-1"></i>{{ __('store.profile.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}", "{{ __('store.profile.success') }}", {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 5000
        });
    </script>
@endif

{{-- Live Preview Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('profile_image');
    const previewImg = document.getElementById('profilePreview');
    fileInput.addEventListener('change', e => {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = e => previewImg.src = e.target.result;
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection
