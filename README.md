Velocity Child Theme Paket Toko Online Toko 14
=================
[toko14.velocitydeveloper.com](https://toko14.velocitydeveloper.com/)

Child Theme for the Velocity System WordPress theme.

### Required
Theme Velocity versi 2.7.0 keatas, [Download](https://github.com/VelocityDeveloper/velocity/releases)

### Required Plugins
**VD Store**, [Download](https://github.com/Velocity-Developer/vd-store/releases) — produk `store_product`,
kategori `store_product_cat`, merek `brand`. Sejak 1.1.0 tema tidak lagi memakai plugin Velocity Toko
maupun Kirki.

Integrasi VD Store ada di `inc/vd-store.php`, `css/vd-store.css`, dan template override di folder
`vd-store/` (arsip, kategori, merek, detail produk). Pencarian mencari produk.

### Beranda
Beranda = `index.php` (Settings > Reading: tulisan terbaru): slider selebar halaman di atas kedua sidebar, judul situs, 6 produk terbaru +
tombol "Produk lainnya" ke arsip produk, 2 artikel terbaru.

### Widget
Dua sidebar: **main-sidebar** (kolom kiri) dan **Secondary Sidebar** (`secondary-sidebar`, kolom kanan).
Shortcode untuk widget Teks (susunan demo, dibaca installer lewat `velocity_tema_widget_sidebar()` dan
`velocity_tema_widget_area()`):

- main-sidebar: `[toko14_kategori]`, `[toko14_sosmed facebook="…" twitter="…" instagram="…" youtube="…"]`, `[toko14_info_terbaru]`, `[toko14_kontak]`, `[toko14_ekspedisi]`
- secondary-sidebar: `[toko14_best_seller jumlah="5"]`, `[toko14_produk_terbaru jumlah="5"]`, `[toko14_testimoni jumlah="5"]` (ulasan produk VD Store), `[toko14_bank]`, `[toko14_kategori_blog]`
- Footer: tanpa widget (hanya hak cipta)

### Halaman
Arsip produk (`/produk/`, kategori, merek, pencarian produk): kolom kiri berisi daftar kategori untuk
berpindah kategori (yang aktif ditandai) + Filter & Urutkan VD Store; sidebar kanan disembunyikan supaya
kartu produk lebar.
Template **Velocity Toko Pricelist** (`page-pricelist.php`): tabel semua produk + tombol Cetak.
Halaman Katalog & Profil Saya VD Store (`page_catalog`/`page_profile`, `[wp_store_catalog]`/`[wp_store_profile]`) selalu tanpa sidebar.

### Customizer
Appearance > Customize > **Velocity Toko 14**: Warna (utama, sekunder), Popup Sambutan (aktif/nonaktif +
isi HTML, tampil sekali sehari per pengunjung), Font (judul & teks), Slider Home (5 slot gambar).
Logo & gambar header: Site Identity / Header Image. Latar website: Background tema induk. Warna teks/link:
Theme Colors tema induk.

### Usage
Simply download the zip and upload the zip (velocity-toko14.zip) under your WordPress dashboard at Appearance > Themes. Or extract and upload via FTP at wp-content/themes/.
