// Light helper for order edit modal
function showEdit(el) {
  if (!el) return;
  const modal = document.getElementById('editModal');
  if (!modal) return;

  const id = el.getAttribute('data-id') || '';
  const email = el.getAttribute('data-email') || '';
  const album = el.getAttribute('data-album') || '';
  const statusPesanan = el.getAttribute('data-status-pesanan') || '';
  const harga = el.getAttribute('data-harga') || '';

  modal.querySelector('[data-field="id"]').textContent = id;
  modal.querySelector('[data-field="nama"]').textContent = email;
  modal.querySelector('[data-field="album"]').textContent = album;
  modal.querySelector('[data-field="harga"]').textContent = harga;

  const selectPesanan = modal.querySelector('select[data-field="status_pesanan"]');
  if (selectPesanan) selectPesanan.value = statusPesanan;

  modal.classList.remove('hidden');
}

function closeEditModal() {
  const modal = document.getElementById('editModal');
  if (!modal) return;
  modal.classList.add('hidden');
}
