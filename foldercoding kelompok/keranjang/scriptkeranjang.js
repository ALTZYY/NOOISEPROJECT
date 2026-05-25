// ============================================
//  NOOISE – Product Page Script
//  script.js
// ============================================

// ── STATE ──
let qty = 1;
let cartCount = 0;
let toastTimer;

// ── DOM REFS ──
const qtyDisplay  = document.getElementById('qty');
const minusBtn    = document.getElementById('minus');
const plusBtn     = document.getElementById('plus');
const btnCart     = document.getElementById('btnCart');
const btnBuy      = document.getElementById('btnBuy');
const cartBtn     = document.getElementById('cartBtn');
const btnMasuk    = document.getElementById('btnMasuk');
const btnDaftar   = document.getElementById('btnDaftar');
const btnAppStore = document.getElementById('btnAppStore');
const btnGPlay    = document.getElementById('btnGooglePlay');
const toast       = document.getElementById('toast');

// ── QUANTITY CONTROL ──
function changeQty(delta) {
  qty = Math.max(1, qty + delta);
  qtyDisplay.textContent = qty;

  // Button bounce animation
  const btn = delta > 0 ? plusBtn : minusBtn;
  btn.style.transform = 'scale(1.35)';
  setTimeout(() => (btn.style.transform = ''), 180);
}

minusBtn.addEventListener('click', () => changeQty(-1));
plusBtn.addEventListener('click',  () => changeQty(1));

// ── RIPPLE EFFECT ──
function addRipple(btn) {
  const circle   = document.createElement('span');
  const diameter = Math.max(btn.clientWidth, btn.clientHeight);
  const radius   = diameter / 2;

  circle.style.cssText = [
    `width:${diameter}px`,
    `height:${diameter}px`,
    `left:${btn.clientWidth  / 2 - radius}px`,
    `top:${btn.clientHeight  / 2 - radius}px`,
  ].join(';');

  circle.classList.add('ripple');
  btn.appendChild(circle);
  setTimeout(() => circle.remove(), 600);
}

// ── TOAST NOTIFICATION ──
function showToast(msg) {
  toast.textContent = msg;
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 2600);
}

// ── CART ACTIONS ──
function addToCart() {
  cartCount += qty;
  showToast(`✓ ${qty} item ditambahkan ke keranjang`);
}

function buyNow() {
  showToast(`🛒 Memproses pembelian ${qty} item…`);
}

// ── BUTTON EVENT LISTENERS ──
btnCart.addEventListener('click', () => {
  addRipple(btnCart);
  addToCart();
});

btnBuy.addEventListener('click', () => {
  addRipple(btnBuy);
  buyNow();
});

cartBtn.addEventListener('click', () => {
  showToast('Keranjang belanja');
});

btnMasuk.addEventListener('click', () => {
  showToast('Silakan masuk ke akun Anda');
});

btnDaftar.addEventListener('click', () => {
  showToast('Buat akun baru');
});

btnAppStore.addEventListener('click', (e) => {
  e.preventDefault();
  showToast('Menuju App Store…');
});

btnGPlay.addEventListener('click', (e) => {
  e.preventDefault();
  showToast('Menuju Google Play…');
});