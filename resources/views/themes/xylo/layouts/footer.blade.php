<footer class="bg-light pt-5 tc-footer">
  <div class="container">
    <div class="row">
      <!-- Column 1: Logo -->
      <div class="col-12 col-md-3 mb-4">
        <div class="d-flex align-items-center gap-2">
          <img src="https://i.ibb.co/dHx2ZR3/velstore.png" alt="Trigan Collections" class="img-fluid" style="max-width: 52px;">
          <div>
            <div class="tc-brand-name">Trigan Collections</div>
            <div class="text-muted small tc-footer-tagline">Curated premium picks, delivered with care.</div>
          </div>
        </div>
      </div>

      <!-- Column 2: Account -->
      <div class="col-6 col-md-3 mb-4">
        <h5> {{ __('store.footer.account') }}</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">{{ __('store.footer.my_account') }}</a></li>
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">{{ __('store.footer.wishlist') }}</a></li>
        </ul>
      </div>

      <!-- Column 3: Other Pages -->
      <div class="col-6 col-md-3 mb-4">
        <h5>{{ __('store.footer.pages') }}</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="{{ route('xylo.about') }}" class="text-muted text-decoration-none">About Us</a></li>
          <li class="mb-2"><a href="{{ route('xylo.services') }}" class="text-muted text-decoration-none">Our Services</a></li>
          <li class="mb-2"><a href="{{ route('xylo.blog') }}" class="text-muted text-decoration-none">Blog</a></li>
          <li class="mb-2"><a href="{{ route('xylo.contact') }}" class="text-muted text-decoration-none">Contact Us</a></li>
        </ul>
      </div>

      <!-- Column 4: Social Links -->
    <div class="col-12 col-md-3 mb-4">
    <h5>{{ __('store.footer.follow_us') }}</h5>
    <div class="d-flex gap-3 tc-footer-social">
        <a href="#" class="fs-5"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="fs-5"><i class="fab fa-twitter"></i></a>
        <a href="#" class="fs-5"><i class="fab fa-instagram"></i></a>
        <a href="#" class="fs-5"><i class="fab fa-linkedin-in"></i></a>
    </div>
    </div>

    </div>
  </div>

  <!-- Footer Bottom Strip -->
  <div class="bg-black text-white py-3 mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap small">
          <span>{{ __('store.footer.copyright') }}</span>
          <span>{{ __('store.footer.powered_by') }}</span>
        </div>
      </div>
    </div>
  </div>
</footer>
