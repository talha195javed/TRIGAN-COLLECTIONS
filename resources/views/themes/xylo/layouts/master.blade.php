<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Trigan Collections') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    @if (!App::environment('testing'))
    @vite([
    'resources/views/themes/xylo/sass/app.scss',
    'resources/views/themes/xylo/css/animate.min.css',
    'resources/views/themes/xylo/css/style.css',
    'resources/views/themes/xylo/css/custom.css'
    ])
    @endif

    @yield('css')
</head>
<body class="tc-global">

@include('themes.xylo.layouts.header')

@yield('content')

@include('themes.xylo.layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (!App::environment('testing'))
@vite([
'resources/views/themes/xylo/js/app.js',
'resources/views/themes/xylo/js/main.js'
])
@endif

@yield('js')

<script>
    $(document).ready(function () {
        // Category Slider
        if ($('.category-slider').length) {
            $('.category-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 1 } }
                ]
            });
        }

        // Banner Slider
        if ($('.banner-slider').length) {
            $('.banner-slider').slick({
                slidesToShow: 1,
                fade: true,
                speed: 700,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                prevArrow: $('.tc-hero-prev'),
                nextArrow: $('.tc-hero-next'),
            });
        }

        // Product Slider
        let productSlider = $('.tc-section--gray .product-slider, .trending-products .product-slider');
        if (productSlider.length) {
            productSlider.slick({
                slidesToShow: 4,
                infinite: true,
                autoplay: true,
                prevArrow: $('.tc-slider-nav__btn.prev, .custom-arrows .prev'),
                nextArrow: $('.tc-slider-nav__btn.next, .custom-arrows .next'),
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } }
                ]
            });
        }

        // PDP Gallery
        if ($('.tc-pdp-gallery .product-slider').length) {
            $('.tc-pdp-gallery .product-slider').slick({
                slidesToShow: 1,
                dots: true,
                arrows: true,
                prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
            });
        }

        // AJAX Search
        $('#search-input').on('keyup', function () {
            let query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: '{{ url("/search-suggestions") }}',
                    type: 'GET',
                    data: { q: query },
                    success: function (data) {
                        let suggestions = $('#search-suggestions');
                        suggestions.html('');
                        if (data.length > 0) {
                            data.forEach(product => {
                                suggestions.append(`
                                        <a href="/product/${product.slug}" class="dropdown-item d-flex align-items-center">
                                            <img src="${product.thumbnail}" alt="${product.name}" class="me-2" width="40" height="40" style="object-fit: cover; border-radius: 5px;">
                                            <span class="search-product-title">${product.name}</span>
                                        </a>
                                    `);
                            });
                            suggestions.removeClass('d-none');
                        } else {
                            suggestions.addClass('d-none');
                        }
                    }
                });
            } else {
                $('#search-suggestions').addClass('d-none');
            }
        });
    });

    // Account Dropdown Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const accountToggle = document.getElementById('accountDropdown');
        const accountMenu = document.querySelector('.account-menu');
        if (accountToggle && accountMenu) {
            document.addEventListener('click', function(event) {
                if (!accountToggle.contains(event.target) && !accountMenu.contains(event.target)) {
                    accountMenu.classList.remove('show');
                }
            });
        }
    });
</script>
</body>
</html>
