<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Nooise</title>

  <!-- Tailwind CSS (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Custom CSS for retro/earthy vibes -->
  <link rel="stylesheet" href="{{asset('cssnooise/admin.css')}}" />
</head>

<body class="min-h-screen bg-nooise-cream text-nooise-text">

  <div class="min-h-screen">
    <!-- Layout wrapper -->
    <div class="grid grid-cols-1 md:grid-cols-[280px_1fr]">

      <!-- Sidebar -->
      <aside
        class="sidebar bg-nooise-brown-dark text-nooise-cream-dark md:sticky md:top-0 md:h-screen border-b border-white/10 md:border-b-0">

        <div class="h-full flex flex-col">
          <!-- Brand -->
          <div class="px-6 pt-6 pb-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-nooise-brown-mid flex items-center justify-center">
              <img src="../all foto/nooise.png" alt="Nooise" class="w-8 h-8 object-contain" />
            </div>
            <div>
              <div class="font-serif text-2xl tracking-tight">Nooise</div>
              <div class="text-xs text-nooise-cream-dark/80">Admin Panel</div>
            </div>
          </div>

          <!-- Nav -->
          <nav class="px-4 pb-6 flex-1">
            <ul class="space-y-2">
              <li>
                <a class="nav-item active" href="#">
                  <i class="fa-solid fa-gauge-high mr-2"></i>Dashboard
                </a>
              </li>

            </ul>
          </nav>

          <!-- Sidebar footer -->
          <div class="px-6 pb-6 border-t border-white/10">
            <div class="text-xs text-nooise-cream-dark/80">
              &copy; <span id="year"></span> Nooise
            </div>
            <div class="mt-2 text-xs text-nooise-cream-dark/70">
              Retro • Earthy • Minimal
            </div>
          </div>
        </div>

      </aside>

      <!-- Main -->
      <main class="bg-nooise-cream min-h-screen">

        <!-- Top Header -->
        <header class="sticky top-0 z-30 bg-nooise-cream/90 backdrop-blur border-b border-nooise-brown-dark/15">
          <div class="px-6 py-4 flex items-center justify-end gap-3">

            <!-- Actions -->
            <div class="flex items-center gap-3">
              <!-- <button class="icon-btn" aria-label="Notifikasi">
                <i class="fa-regular fa-bell"></i>
              </button> -->

              <div class="flex items-center gap-3">
                <button id="btnLogout" class="logout-btn" type="button" aria-label="Logout">
                  <i class="fa-solid fa-right-from-bracket text-nooise-brown-dark"></i>
                </button>
              </div>

            </div>

          </div>
        </header>

        <!-- Content -->
        <section class="px-6 py-6">

          <!-- Page title -->
          <div class="flex items-end justify-between gap-3 mb-6">
            <div>
              <h1 class="text-2xl md:text-3xl font-serif text-nooise-brown-dark">Admin Dashboard</h1>
              <p class="text-sm text-nooise-text/65">Ringkasan performa penjualan album fisik.</p>
            </div>
          </div>

          <!-- Quick Stats -->
          <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

            <div class="card-metric">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <div class="text-xs text-nooise-text/70 font-medium">Total Pendapatan</div>
                  <div class="metric-value">Rp 310.000</div>
                </div>
                <div class="metric-icon bg-nooise-brown-mid/20 text-nooise-brown-dark">
                  <i class="fa-solid fa-coins"></i>
                </div>
              </div>
              <div class="mt-2 text-xs text-nooise-text/60">Semua produk</div>
            </div>

            <div class="card-metric">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <div class="text-xs text-nooise-text/70 font-medium">Pesanan Baru</div>
                  <div class="metric-value">1</div>
                </div>
                <div class="metric-icon bg-nooise-brown-mid/20 text-nooise-brown-dark">
                  <i class="fa-solid fa-bag-shopping"></i>
                </div>
              </div>
              <div class="mt-2 text-xs text-nooise-text/60">Butuh diproses</div>
            </div>

            <!-- <div class="card-metric">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <div class="text-xs text-nooise-text/70 font-medium">Total Pelanggan</div>
                  <div class="metric-value">86</div>
                </div>
                <div class="metric-icon bg-nooise-brown-mid/20 text-nooise-brown-dark">
                  <i class="fa-solid fa-user-group"></i>
                </div>
              </div>
              <div class="mt-2 text-xs text-nooise-text/60">Aktif bulan ini</div>
            </div> -->



          </div>

          <!-- Latest Orders -->
          <div class="card-table">
            <div class="px-5 pt-5 pb-3 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
              <div>
                <h2 class="text-lg font-semibold text-nooise-brown-dark">Pesanan Terbaru</h2>
                <p class="text-sm text-nooise-text/60">Data contoh (bisa diganti dengan backend nanti).</p>
              </div>
              <div class="flex items-center gap-2">
                <!-- tombol refresh dihapus sesuai permintaan -->


              </div>


            </div>

            <div class="px-5 pb-5">
              <div class="overflow-x-auto">
                <table class="w-full text-sm border-separate" aria-label="Tabel pesanan terbaru">
                  <thead>
                    <tr class="text-left">
                      <th class="th">ID Pesanan</th>
                      <th class="th">Email User</th>
                      <th class="th">Judul Album</th>
                      <th class="th">Status Pembayaran</th>
                      <th class="th">Status Pesanan</th>
                      <th class="th">Harga</th>
                      <th class="th">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    <tr class="tr">
                      <td class="td">NO-1042</td>
                      <td class="td">contoh@gmail.com</td>
                      <td class="td">Drake - More Life</td>
                      <td class="td"><span class="badge badge-paid">Lunas</span></td>
                      <td class="td"><span class="badge badge-processing">Diproses</span></td>
                      <td class="td">Rp 310.000</td>
                      <td class="td">
                        <div class="flex gap-2">
                          <a href="#" class="btn-icon btn-icon-brown" aria-label="Edit pesanan" data-id="NO-1042"
                            data-email="contoh@gmail.com" data-album="Drake - More Life" data-status-pembayaran="Lunas"
                            data-status-pesanan="Diproses" data-harga="Rp 310.000" onclick="showEdit(this)"><i
                              class="fa-solid fa-pen"></i></a>
                        </div>
                      </td>
                    </tr>

                    <!-- <tr class="tr">
                      <td class="td">NO-1041</td>
                      <td class="td">salsa@gmail.com</td>
                      <td class="td">Keane - Hopes and Fears</td>
                      <td class="td"><span class="badge badge-paid">Lunas</span></td>
                      <td class="td"><span class="badge badge-pending">Siap Dikirim</span></td>
                      <td class="td">Rp 275.000</td>
                      <td class="td">
                        <div class="flex gap-2">
                          <a href="#" class="btn-icon" aria-label="Detail pesanan" data-id="NO-1041"
                            data-email="salsa@gmail.com" data-album="Keane - Hopes and Fears" 
                            data-status-pembayaran="Lunas" data-status-pesanan="Siap Dikirim"
                            data-harga="Rp 275.000" onclick="showEdit(this)"><i class="fa-regular fa-eye"></i></a>
                          <a href="#" class="btn-icon btn-icon-brown" aria-label="Edit pesanan" data-id="NO-1041"
                            data-email="salsa@gmail.com" data-album="Keane - Hopes and Fears" 
                            data-status-pembayaran="Lunas" data-status-pesanan="Siap Dikirim"
                            data-harga="Rp 275.000" onclick="showEdit(this)"><i class="fa-solid fa-pen"></i></a>
                        </div>
                      </td>
                    </tr>

                    <tr class="tr">
                      <td class="td">NO-1040</td>
                      <td class="td">bima@gmail.com</td>
                      <td class="td">The Weeknd - House of Balloons</td>
                      <td class="td"><span class="badge badge-paid">Lunas</span></td>
                      <td class="td"><span class="badge badge-shipped">Dikirim</span></td>
                      <td class="td">Rp 340.000</td>
                      <td class="td">
                        <div class="flex gap-2">
                          <a href="#" class="btn-icon" aria-label="Detail pesanan" data-id="NO-1040"
                            data-email="bima@gmail.com" data-album="The Weeknd - House of Balloons" 
                            data-status-pembayaran="Lunas" data-status-pesanan="Dikirim"
                            data-harga="Rp 340.000" onclick="showEdit(this)"><i class="fa-regular fa-eye"></i></a>
                          <a href="#" class="btn-icon btn-icon-brown" aria-label="Edit pesanan" data-id="NO-1040"
                            data-email="bima@gmail.com" data-album="The Weeknd - House of Balloons" 
                            data-status-pembayaran="Lunas" data-status-pesanan="Dikirim"
                            data-harga="Rp 340.000" onclick="showEdit(this)"><i class="fa-solid fa-pen"></i></a>
                        </div>
                      </td>
                    </tr>

                    <tr class="tr">
                      <td class="td">NO-1039</td>
                      <td class="td">alya@gmail.com</td>
                      <td class="td">Justin Bieber - My World</td>
                      <td class="td"><span class="badge badge-pending">Belum Dibayar</span></td>
                      <td class="td"><span class="badge badge-processing">Menunggu</span></td>
                      <td class="td">Rp 260.000</td>
                      <td class="td">
                        <div class="flex gap-2">
                          <a href="#" class="btn-icon" aria-label="Detail pesanan" data-id="NO-1039"
                            data-email="alya@gmail.com" data-album="Justin Bieber - My World" 
                            data-status-pembayaran="Belum Dibayar" data-status-pesanan="Menunggu"
                            data-harga="Rp 260.000" onclick="showEdit(this)"><i class="fa-regular fa-eye"></i></a>
                          <a href="#" class="btn-icon btn-icon-brown" aria-label="Edit pesanan" data-id="NO-1039"
                            data-email="alya@gmail.com" data-album="Justin Bieber - My World" 
                            data-status-pembayaran="Belum Dibayar" data-status-pesanan="Menunggu"
                            data-harga="Rp 260.000" onclick="showEdit(this)"><i class="fa-solid fa-pen"></i></a>
                        </div>
                      </td>
                    </tr>

                    <tr class="tr">
                      <td class="td">NO-1038</td>
                      <td class="td">fajar@gmail.com</td>
                      <td class="td">21 Savage - Umbrella</td>
                      <td class="td"><span class="badge badge-cancel">Gagal/Batal</span></td>
                      <td class="td"><span class="badge badge-cancel">Dibatalkan</span></td>
                      <td class="td">Rp 295.000</td>
                      <td class="td">
                        <div class="flex gap-2">
                          <a href="#" class="btn-icon" aria-label="Detail pesanan" data-id="NO-1038"
                            data-email="fajar@gmail.com" data-album="21 Savage - Umbrella" 
                            data-status-pembayaran="Gagal/Batal" data-status-pesanan="Dibatalkan"
                            data-harga="Rp 295.000" onclick="showEdit(this)"><i class="fa-regular fa-eye"></i></a>
                          <a href="#" class="btn-icon btn-icon-brown" aria-label="Edit pesanan" data-id="NO-1038"
                            data-email="fajar@gmail.com" data-album="21 Savage - Umbrella" 
                            data-status-pembayaran="Gagal/Batal" data-status-pesanan="Dibatalkan"
                            data-harga="Rp 295.000" onclick="showEdit(this)"><i class="fa-solid fa-pen"></i></a>
                        </div>
                      </td>
                    </tr> -->

                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </section>
      </main>

    </div>
  </div>

  <!-- Modal Edit Pesanan -->
  <div id="editModal" class="hidden fixed inset-0 z-50">
    <div class="absolute inset-0 bg-black/30" onclick="closeEditModal()"></div>

    <div class="relative mx-auto mt-20 w-[92%] max-w-lg">
      <div class="rounded-2xl bg-white/95 border border-nooise-brown-dark/10 shadow-2xl overflow-hidden">
        <div class="px-5 py-4 border-b border-nooise-brown-dark/10 flex items-start justify-between gap-4">
          <div>
            <h3 class="text-lg font-bold text-nooise-brown-dark">Edit Pesanan</h3>
            <p class="text-sm text-nooise-text/60">Ubah status dan data ringkas pesanan.</p>
          </div>
          <button type="button" class="btn-icon" onclick="closeEditModal()" aria-label="Tutup modal">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <div class="px-5 py-4">
          <div class="grid grid-cols-1 gap-3">
            <div>
              <label class="text-sm font-semibold text-nooise-text/70">ID Pesanan</label>
              <div
                class="mt-1 px-3 py-2 rounded-xl bg-nooise-cream border border-nooise-brown-dark/10 text-sm font-bold text-nooise-brown-dark"
                data-field="id">-</div>
            </div>

            <div>
              <label class="text-sm font-semibold text-nooise-text/70">Email User</label>
              <div
                class="mt-1 px-3 py-2 rounded-xl bg-nooise-cream border border-nooise-brown-dark/10 text-sm font-semibold text-nooise-text"
                data-field="nama">-</div>
            </div>

            <div>
              <label class="text-sm font-semibold text-nooise-text/70">Judul Album</label>
              <div
                class="mt-1 px-3 py-2 rounded-xl bg-nooise-cream border border-nooise-brown-dark/10 text-sm font-semibold text-nooise-text"
                data-field="album">-</div>
            </div>

            <div>
              <label class="text-sm font-semibold text-nooise-text/70">Harga</label>
              <div
                class="mt-1 px-3 py-2 rounded-xl bg-nooise-cream border border-nooise-brown-dark/10 text-sm font-bold text-nooise-brown-dark"
                data-field="harga">-</div>
            </div>


            <div>
              <label class="text-sm font-semibold text-nooise-text/70">Status Pesanan</label>
              <select
                class="mt-1 w-full px-3 py-2 rounded-xl bg-white border border-nooise-brown-dark/15 text-sm outline-none"
                data-field="status_pesanan">
                <option value="Diproses">Diproses</option>
                <option value="Siap Dikirim">Siap Dikirim</option>
                <option value="Dikirim">Dikirim</option>
                <option value="Menunggu">Menunggu</option>
                <option value="Dibatalkan">Dibatalkan</option>
              </select>
            </div>
          </div>
        </div>

        <div class="px-5 py-4 border-t border-nooise-brown-dark/10 flex items-center justify-end gap-3">
          <button type="button" class="btn-soft" onclick="closeEditModal()">
            Batal
          </button>
          <button type="button" class="btn-primary">
            Simpan Perubahan
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="admin-edit-modal.js"></script>
  <script src="admin-dashboard-actions.js"></script>
  <script>
    document.getElementById('year').textContent = new Date().getFullYear();

    // interaktif toggle status dihapus karena tombolnya dihapus
    // (kode sebelumnya: toggle status acak pada baris tabel)

  </script>
</body>

</html>