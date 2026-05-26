// Light helper for order edit modal
function showEdit(el) {
  if (!el) return;
  const modal = document.getElementById('editModal');
  if (!modal) return;

  const id = el.getAttribute('data-id') || '';
  const nama = el.getAttribute('data-nama') || '';
  const album = el.getAttribute('data-album') || '';
  const status = el.getAttribute('data-status') || '';
  const harga = el.getAttribute('data-harga') || '';

  modal.querySelector('[data-field="id"]').textContent = id;
  modal.querySelector('[data-field="nama"]').textContent = nama;
  modal.querySelector('[data-field="album"]').textContent = album;
  modal.querySelector('[data-field="harga"]').textContent = harga;

  const select = modal.querySelector('select[data-field="status"]');
  if (select) select.value = status;

  modal.classList.remove('hidden');
}

function closeEditModal() {
  const modal = document.getElementById('editModal');
  if (!modal) return;
  modal.classList.add('hidden');
}

