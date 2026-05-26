<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nooise - Album Music Store</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{asset('cssnooise/stylehome.css') }}"/>
  <!-- Swiper.js CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>

<!-- TOP BAR -->
<div class="topbar">
  <span>@makenooise_&nbsp;&nbsp;+62 333 888 777</span>
  <span>www.nooisealbummusic.com.id</span>
</div>

<!-- NAV -->
<nav>
  <a href="#" class="logo">no<span>&#8734;</span>ise</a>
  <a href="{{ route('halaman.about') }}">


    <button class="cart-icon" id="cartBtn" type="button">
  
    <svg viewBox="0 0 24 24">
      <circle cx="9" cy="21" r="1"/>
      <circle cx="20" cy="21" r="1"/>
      <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
    </svg>
    <span class="cart-badge" id="cartBadge">{{ $cartCount ?? 0 }}</span>
  </button>
  </a>
  <div class="nav-actions">
    <form action="{{route('halaman.login')}}">
      <button class="btn-ghost" id="btnLog-out">Log-out</button>
    </form>
    <!-- <button class="btn-ghost" id="btnDaftar">Daftar</button> -->
  </div>
</nav>

<!-- HERO BANNER (SWIPER IMAGE SLIDER) -->
<div class="hero-slider-container">
  <div class="swiper hero-swiper">
    <div class="swiper-wrapper">
      @foreach($slides as $slide)
        <div class="swiper-slide">
          <img src="{{ asset($slide) }}" alt="Nooise Promo Banner">
        </div>
      @endforeach
    </div>
    <!-- Pagination (titik-titik di bawah) -->
    <div class="swiper-pagination"></div>
    <!-- Navigasi panah kiri-kanan -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</div>

<!-- MAIN CONTENT -->
<main>

  <!-- SIDEBAR + PRODUCTS -->
  <div class="content-layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" id="searchInput" placeholder="Search..." value="{{ request('search') }}"/>
      </div>

      <div class="sidebar-section">
        <h4 class="sidebar-heading">Kategori</h4>
        <div class="sidebar-divider"></div>
        <ul class="category-list">
          <li><button class="cat-btn active" data-cat="all">Semua</button></li>
          <li><button class="cat-btn" data-cat="rnb">R&amp;B</button></li>
          <li><button class="cat-btn" data-cat="hiphop">HipHop</button></li>
        </ul>
        <p class="sidebar-sub">Mendatang</p>
        <ul class="category-list">
          <li><button class="cat-btn" data-cat="pop">POP</button></li>
          <li><button class="cat-btn" data-cat="edm">EDM</button></li>
        </ul>
      </div>

      <div class="sidebar-section">
        <h4 class="sidebar-heading harga-heading">HARGA</h4>
        <div class="price-filters">
          <label class="price-label">
            <input type="checkbox" class="price-check" data-min="300000" data-max="500000" checked/>
            <span>Rp 300.000 - Rp 500.000</span>
          </label>
          <label class="price-label">
            <input type="checkbox" class="price-check" data-min="500000" data-max="1000000" checked/>
            <span>Rp 500.000 - Rp 1.000.000</span>
          </label>
          <label class="price-label">
            <input type="checkbox" class="price-check" data-min="1000000" data-max="9999999" checked/>
            <span>Rp 1.000.000 +</span>
          </label>
        </div>
      </div>
    </aside>

    <!-- PRODUCT GRID -->
    <div class="products-area">
      <div class="product-grid" id="productGrid">
        @foreach($products as $product)
          <div class="product-card" data-id="{{ $product->sku }}" data-price="{{ $product->price }}" data-cat="{{ $product->category }}" data-title="{{ $product->name }}">
            <a href="{{ route('halaman.deskripsi', ['id' => $product->id]) }}" style="text-decoration: none; color: inherit;">
              <div class="product-img-wrap {{ $product->color ?? 'brown' }}">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" onerror="this.parentElement.style.background='#7a4020'"/>
                <div class="vinyl {{ $product->vinyl_class }}">
                  <div class="vinyl-center" style="background-image: url('{{ asset($product->image) }}');"></div>
                </div>
              </div>
              <p class="product-name">{{ $product->name }}</p>
            </a>
            <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <button class="btn-add-cart" data-id="{{ $product->id }}" data-price="{{ $product->price }}" type="button">+ Keranjang</button>
          </div>
        @endforeach
      </div><!-- /product-grid -->

      <p class="no-results" id="noResults" style="display:none">Tidak ada produk ditemukan.</p>
    </div><!-- /products-area -->

  </div><!-- /content-layout -->
</main>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <span class="footer-logo">no&#8734;ise</span>
      <p class="footer-tag">100%</p>
      <p class="footer-sub">AUTHENTIC &amp; GUARANTEED</p>
    </div>
    <div class="footer-col">
      <a href="#">FAQ</a>
      <a href="#">Syarat &amp; Ketentuan</a>
      <a href="#">Panduan Beli</a>
      <a href="#">NooiseNews</a>
    </div>
    <div class="footer-col">
      <p class="footer-col-title">Keep in touch with us!</p>
      <div class="social-icons">
        <a href="#" class="social-btn" title="Email">&#9993;</a>
        <a href="#" class="social-btn" title="TikTok">&#9835;</a>
        <a href="#" class="social-btn" title="Instagram">&#9711;</a>
      </div>
    </div>
    <div class="footer-col store-col">
      <a href="#" class="store-badge" id="btnAppStore">&#63743; App Store</a>
      <a href="#" class="store-badge" id="btnGPlay">&#9654; Google Play</a>
    </div>
  </div>
</footer>

<!-- TOAST -->
<div class="toast" id="toast"></div>



<form id="add-to-cart-form" method="POST" action="{{ route('cart.add') }}" style="display:none">
  @csrf
  <input type="hidden" name="product_id" id="form-product-id">
  <input type="hidden" name="quantity" value="1">
</form>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-add-cart').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const productId = btn.getAttribute('data-id') || '';

        if (!productId) {
            alert("Produk belum terdaftar di database!");
            return;
        }

        document.getElementById('form-product-id').value = productId;
        
        const form = document.getElementById('add-to-cart-form');
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const badge = document.getElementById('cartBadge');
                let count = parseInt(badge.innerText) || 0;
                badge.innerText = count + 1;
            }
        })
        .catch(error => console.error('Error:', error));
      });
    });
  });
</script>
<!-- Swiper.js JS CDN & Initialization -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.hero-swiper', {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      keyboard: {
        enabled: true,
      },
      effect: 'slide',
      speed: 800,
    });
  });
</script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>