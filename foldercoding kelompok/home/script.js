// ============================================
//  NOOISE - Home Page Script
//  script.js
// ============================================

// DOM REFS
const cartBtn      = document.getElementById('cartBtn');
const cartBadge    = document.getElementById('cartBadge');
const btnMasuk     = document.getElementById('btnMasuk');
const btnDaftar    = document.getElementById('btnDaftar');
const heroFotoBtn  = document.getElementById('heroFotoBtn');
const searchInput  = document.getElementById('searchInput');
const productGrid  = document.getElementById('productGrid');
const noResults    = document.getElementById('noResults');
const catBtns      = document.querySelectorAll('.cat-btn');
const priceChecks  = document.querySelectorAll('.price-check');
const addCartBtns  = document.querySelectorAll('.btn-add-cart');
const toast        = document.getElementById('toast');
const btnAppStore  = document.getElementById('btnAppStore');
const btnGPlay     = document.getElementById('btnGPlay');

// STATE
let cartCount   = 0;
let activeCategory = 'all';
let searchQuery    = '';
let activePriceRanges = [];
let toastTimer;

// TOAST
function showToast(msg) {
  toast.textContent = msg;
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 2600);
}

// RIPPLE
function addRipple(btn) {
  const circle   = document.createElement('span');
  const diameter = Math.max(btn.clientWidth, btn.clientHeight);
  const radius   = diameter / 2;
  circle.style.cssText = [
    'width:' + diameter + 'px',
    'height:' + diameter + 'px',
    'left:' + (btn.clientWidth  / 2 - radius) + 'px',
    'top:' + (btn.clientHeight  / 2 - radius) + 'px',
  ].join(';');
  circle.classList.add('ripple');
  btn.appendChild(circle);
  setTimeout(() => circle.remove(), 600);
}

// UPDATE CART BADGE
function updateCart(delta) {
  cartCount = Math.max(0, cartCount + delta);
  cartBadge.textContent = cartCount;
  cartBadge.classList.add('pop');
  setTimeout(() => cartBadge.classList.remove('pop'), 220);
}

// FILTER PRODUCTS
function getActivePriceRanges() {
  activePriceRanges = [];
  priceChecks.forEach(function(cb) {
    if (cb.checked) {
      activePriceRanges.push({
        min: parseInt(cb.dataset.min),
        max: parseInt(cb.dataset.max),
      });
    }
  });
}

function filterProducts() {
  getActivePriceRanges();
  const cards = document.querySelectorAll('.product-card');
  let visible = 0;

  cards.forEach(function(card) {
    const price    = parseInt(card.dataset.price);
    const cat      = card.dataset.cat;
    const title    = card.dataset.title.toLowerCase();
    const query    = searchQuery.toLowerCase();

    // Category filter
    const catOk = (activeCategory === 'all') || (cat === activeCategory);

    // Price filter
    let priceOk = activePriceRanges.length === 0;
    activePriceRanges.forEach(function(range) {
      if (price >= range.min && price <= range.max) priceOk = true;
    });

    // Search filter
    const searchOk = title.includes(query);

    if (catOk && priceOk && searchOk) {
      card.style.display = '';
      visible++;
    } else {
      card.style.display = 'none';
    }
  });

  noResults.style.display = visible === 0 ? 'block' : 'none';
}

// CATEGORY BUTTONS
catBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    catBtns.forEach(function(b) { b.classList.remove('active'); });
    btn.classList.add('active');
    activeCategory = btn.dataset.cat;
    filterProducts();
    showToast('Kategori: ' + btn.textContent.trim());
  });
});

// PRICE CHECKBOXES
priceChecks.forEach(function(cb) {
  cb.addEventListener('change', function() {
    filterProducts();
  });
});

// SEARCH
searchInput.addEventListener('input', function() {
  searchQuery = searchInput.value;
  filterProducts();
});

// ADD TO CART BUTTONS
addCartBtns.forEach(function(btn) {
  btn.addEventListener('click', function(e) {
    e.stopPropagation();
    addRipple(btn);
    const title = btn.dataset.title;
    updateCart(1);
    showToast('+ ' + title + ' ditambahkan ke keranjang!');
  });
});

// PRODUCT CARD CLICK
document.querySelectorAll('.product-card').forEach(function(card) {
  card.addEventListener('click', function() {
    // arahkan ke halaman deskripsi produk (dinamis by query param)
    const title = card.dataset.title || card.querySelector('.product-name')?.textContent || '';
    const price = card.dataset.price || '';
    const imgSrc = card.querySelector('img')?.getAttribute('src') || '';

    const url = new URL("../indexdeskirpsi.html", window.location.href);
    url.searchParams.set('title', title);
    url.searchParams.set('price', price);
    url.searchParams.set('img', imgSrc);

    window.location.href = url.toString();

    showToast('Membuka: ' + (title || '').trim());
  });
});

// NAV BUTTONS
cartBtn.addEventListener('click', function() {
  showToast('Keranjang (' + cartCount + ' item)');
});

btnMasuk.addEventListener('click', function() {
  showToast('Menuju halaman login');
  window.location.href = "../../config.html";
});

btnDaftar.addEventListener('click', function() {
  showToast('Menuju registrasi');
  window.location.href = "../../registasisisi.html";
});

heroFotoBtn.addEventListener('click', function() {
  showToast('Membuka galeri foto');
});

btnAppStore.addEventListener('click', function(e) {
  e.preventDefault();
  showToast('Menuju App Store...');
});

btnGPlay.addEventListener('click', function(e) {
  e.preventDefault();
  showToast('Menuju Google Play...');
});

// Social buttons
document.querySelectorAll('.social-btn').forEach(function(btn) {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    showToast('Membuka ' + (btn.title || 'media sosial'));
  });
});

// STAGGERED CARD ANIMATION
document.querySelectorAll('.product-card').forEach(function(card, i) {
  card.style.animationDelay = (i * 0.05) + 's';
});

// INIT
getActivePriceRanges();
