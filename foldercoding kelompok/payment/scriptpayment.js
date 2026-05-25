/* ===========================
   NOOISE — PAYMENT PAGE JS
   =========================== */

// ─── UTILITY: TOAST ───────────────────────────
function showToast(msg, duration = 2200) {
  const toast = document.getElementById('toast');
  toast.textContent = msg;
  toast.classList.add('show');
  clearTimeout(toast._timer);
  toast._timer = setTimeout(() => toast.classList.remove('show'), duration);
}

// ─── UTILITY: RIPPLE ──────────────────────────
function addRipple(btn) {
  btn.addEventListener('click', function(e) {
    const rect = btn.getBoundingClientRect();
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    const size = Math.max(rect.width, rect.height);
    ripple.style.cssText = `
      width: ${size}px;
      height: ${size}px;
      left: ${e.clientX - rect.left - size / 2}px;
      top: ${e.clientY - rect.top - size / 2}px;
    `;
    btn.style.position = 'relative';
    btn.style.overflow = 'hidden';
    btn.appendChild(ripple);
    setTimeout(() => ripple.remove(), 500);
  });
}

// ─── NAVBAR BUTTONS ───────────────────────────
document.getElementById('masukBtn').addEventListener('click', function() {
  showToast('🔐 Halaman Masuk belum tersedia');
  addRipple(this);
});

document.getElementById('daftarBtn').addEventListener('click', function() {
  showToast('📝 Halaman Daftar belum tersedia');
  addRipple(this);
});

document.getElementById('cartBtn').addEventListener('click', function() {
  showToast('🛒 1 item di keranjang');
  pulseEffect(this);
});

// ─── BACK BUTTON ──────────────────────────────
document.getElementById('backBtn').addEventListener('click', function() {
  showToast('← Kembali ke halaman sebelumnya');
});

// ─── SELECT ALL CHECKBOX ──────────────────────
let allSelected = true;
const selectAllBtn = document.getElementById('selectAllBtn');

selectAllBtn.addEventListener('click', function() {
  allSelected = !allSelected;
  if (allSelected) {
    this.classList.remove('inactive');
    document.querySelector('.select-count').textContent = '(1)';
    showToast('✅ Semua item dipilih');
  } else {
    this.classList.add('inactive');
    this.innerHTML = '';
    document.querySelector('.select-count').textContent = '(0)';
    showToast('☐ Item tidak dipilih');
  }
  if (allSelected) {
    this.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>`;
  }
});

// ─── REMOVE ALBUM ─────────────────────────────
document.getElementById('removeBtn').addEventListener('click', function() {
  const card = document.getElementById('albumCard');
  card.style.transition = 'opacity 0.3s, transform 0.3s';
  card.style.opacity = '0';
  card.style.transform = 'translateX(30px)';
  setTimeout(() => {
    card.style.display = 'none';
    document.querySelector('.select-count').textContent = '(0)';
    showToast('🗑️ Album dihapus dari keranjang');
    updateTotal(0);
  }, 300);
});

// ─── ADDRESS INPUT ─────────────────────────────
document.getElementById('pilihBtn').addEventListener('click', function() {
  const input = document.getElementById('addressInput');
  if (input.value.trim() === '') {
    input.placeholder = 'Masukkan lokasi terlebih dahulu...';
    input.focus();
    shakeElement(input.parentElement.parentElement);
    showToast('📍 Masukkan alamat pengiriman');
  } else {
    showToast(`📍 Lokasi dipilih: ${input.value}`);
    pulseEffect(this);
  }
});

document.getElementById('addressInput').addEventListener('keydown', function(e) {
  if (e.key === 'Enter') {
    document.getElementById('pilihBtn').click();
  }
});

// ─── GANTI PAYMENT ────────────────────────────
document.getElementById('gantiBtn').addEventListener('click', function() {
  const methods = [
    { name: 'OVO', fee: 150 },
    { name: 'GoPay', fee: 200 },
    { name: 'Dana', fee: 181 },
    { name: 'ShopeePay', fee: 175 },
  ];
  const current = document.querySelector('.payment-name').textContent;
  const next = methods.find(m => m.name !== current) || methods[0];
  document.querySelector('.payment-name').textContent = next.name;
  document.querySelector('.payment-fee').textContent = `biaya: IDR ${next.fee}`;
  showToast(`💳 Metode pembayaran diganti ke ${next.name}`);
  pulseEffect(document.querySelector('.payment-method-card'));
});

// ─── PROTECTION TOGGLE ────────────────────────
let protectionActive = true;
const protectionBtn = document.getElementById('protectionBtn');

protectionBtn.addEventListener('click', function() {
  protectionActive = !protectionActive;
  if (protectionActive) {
    this.classList.remove('inactive');
    this.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>`;
    showToast('🛡️ Perlindungan transaksi aktif');
    updateTotal(695181);
  } else {
    this.classList.add('inactive');
    this.innerHTML = '';
    showToast('⚠️ Perlindungan transaksi dinonaktifkan');
    updateTotal(690181);
  }
});

// ─── UPDATE TOTAL ─────────────────────────────
function updateTotal(amount) {
  const totalEl = document.querySelector('.total-value');
  const formatted = 'Rp ' + amount.toLocaleString('id-ID');
  totalEl.style.transition = 'all 0.2s';
  totalEl.style.opacity = '0';
  totalEl.style.transform = 'translateY(-4px)';
  setTimeout(() => {
    totalEl.textContent = formatted;
    totalEl.style.opacity = '1';
    totalEl.style.transform = 'translateY(0)';
  }, 180);
}

// ─── BAYAR BUTTON ─────────────────────────────
document.getElementById('bayarBtn').addEventListener('click', function() {
  const address = document.getElementById('addressInput').value.trim();
  if (address === '') {
    showToast('📍 Isi alamat pengiriman dulu ya!');
    document.getElementById('addressInput').focus();
    shakeElement(document.querySelector('.address-input-row'));
    return;
  }

  this.textContent = 'Memproses...';
  this.disabled = true;
  this.style.opacity = '0.7';

  setTimeout(() => {
    this.textContent = 'Bayar';
    this.disabled = false;
    this.style.opacity = '1';
    showModal();
  }, 1600);
});

// ─── MODAL ────────────────────────────────────
function showModal() {
  const overlay = document.getElementById('modalOverlay');
  overlay.classList.add('show');
  document.body.style.overflow = 'hidden';
}

document.getElementById('modalCloseBtn').addEventListener('click', function() {
  const overlay = document.getElementById('modalOverlay');
  overlay.classList.remove('show');
  document.body.style.overflow = '';
  showToast('👋 Kembali ke toko!');
});

document.getElementById('modalOverlay').addEventListener('click', function(e) {
  if (e.target === this) {
    this.classList.remove('show');
    document.body.style.overflow = '';
  }
});

// ─── RECOMMENDATION CARDS ─────────────────────
document.querySelectorAll('.rec-card').forEach(card => {
  card.addEventListener('click', function() {
    const name = this.dataset.name;
    const price = this.dataset.price;
    showToast(`🎵 "${name}" — Rp ${price}`);
    pulseEffect(this);
  });
});

// ─── SEARCH INPUT ─────────────────────────────
document.getElementById('searchInput').addEventListener('input', function() {
  const query = this.value.toLowerCase();
  document.querySelectorAll('.rec-card').forEach(card => {
    const name = card.dataset.name.toLowerCase();
    const artist = card.dataset.artist.toLowerCase();
    const matches = name.includes(query) || artist.includes(query);
    card.style.transition = 'opacity 0.2s, transform 0.2s';
    card.style.opacity = matches || query === '' ? '1' : '0.3';
    card.style.transform = matches || query === '' ? 'scale(1)' : 'scale(0.96)';
  });
});

// ─── HELPER: SHAKE ────────────────────────────
function shakeElement(el) {
  el.style.animation = 'none';
  el.style.transition = 'transform 0.08s';

  const times = [0, 6, -6, 6, -4, 4, -2, 0];
  let i = 0;
  const interval = setInterval(() => {
    el.style.transform = `translateX(${times[i]}px)`;
    i++;
    if (i >= times.length) {
      clearInterval(interval);
      el.style.transform = '';
    }
  }, 55);
}

// ─── HELPER: PULSE ────────────────────────────
function pulseEffect(el) {
  el.style.transition = 'transform 0.15s cubic-bezier(.34,1.56,.64,1)';
  el.style.transform = 'scale(1.05)';
  setTimeout(() => { el.style.transform = ''; }, 250);
}

// ─── KEYBOARD: ESC CLOSE MODAL ────────────────
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    const overlay = document.getElementById('modalOverlay');
    if (overlay.classList.contains('show')) {
      overlay.classList.remove('show');
      document.body.style.overflow = '';
    }
  }
});

// ─── INIT ─────────────────────────────────────
addRipple(document.getElementById('bayarBtn'));
addRipple(document.getElementById('pilihBtn'));
addRipple(document.getElementById('gantiBtn'));