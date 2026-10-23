# WarungMakan

WarungMakan adalah aplikasi web pemesanan makanan/minuman secara online berbasis **Laravel 10**. Pengguna dapat menjelajahi menu, menambahkan ke keranjang/wishlist, melakukan checkout dan pemesanan, memberikan rating & ulasan, serta berinteraksi dengan chatbot. Admin dapat mengelola kategori, menu (termasuk model 3D), pesanan, pengguna, dan chatbot.

## Fitur

### Customer
- Beranda, halaman About, daftar kategori & menu
- Pencarian menu
- Keranjang belanja (tambah, ubah jumlah, hapus)
- Wishlist
- Checkout & pemesanan (order tracking)
- Rating & ulasan menu (verified purchase)
- Chatbot (Q&A berbasis database)
- Profil pengguna & riwayat pesanan
- Tampilan model 3D menu (model-viewer)

### Admin (role `admin`)
- Dashboard (statistik pesanan pending/completed, menu, kategori, user, rating)
- CRUD Kategori (dengan upload gambar)
- CRUD Menu (dengan upload gambar & model 3D)
- Manajemen Pesanan (pending/completed, update status, riwayat)
- Manajemen Pengguna (daftar & detail)
- CRUD Chatbot (queries/replies)

### Autentikasi
- Login, register, verifikasi email, reset password
- Two-factor authentication (Fortify)
- Role-based access (`role_as`: 1 = admin, 0 = user)

## Teknologi

- PHP ^8.1
- Laravel 10
- Laravel Fortify, Sanctum, Laravel UI
- MySQL/PostgreSQL
- Blade, Bootstrap, Material Dashboard, jQuery, Owl Carousel, Tiny Slider, model-viewer

## Menjalankan di Lokal

### Prasyarat
- PHP >= 8.1 dengan ekstensi: pdo, pdo_mysql (atau pdo_pgsql), mbstring, xml, curl, bcmath, zip
- Composer
- Node.js & npm (opsional, untuk asset frontend)
- MySQL/PostgreSQL

### Langkah

1. Clone repository:
   ```bash
   git clone https://github.com/Hdytalhayat/WarungMakan-Laravel.git
   cd WarungMakan-Laravel
   ```

2. Install dependensi PHP:
   ```bash
   composer install
   ```

3. Salin file environment dan generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Atur koneksi database di `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=warungmakan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Jalankan migrasi & seeder:
   ```bash
   php artisan migrate --seed
   ```

6. (Opsional) Link storage untuk file upload:
   ```bash
   php artisan storage:link
   ```

7. (Opsional) Build asset frontend:
   ```bash
   npm install
   npm run build
   ```

8. Jalankan server development:
   ```bash
   php artisan serve
   ```
   Akses di `http://127.0.0.1:8000`.

### Akun Admin (dari seeder)
- Email: `admin@example.com`
- Password: `password123`

> Segera ganti password default setelah login pertama kali.

## Struktur Direktori Singkat

- `app/Http/Controllers/Admin` — controller panel admin
- `app/Http/Controllers/frontend` — controller sisi customer
- `app/Models` — model Eloquent
- `database/migrations` — skema database
- `resources/views` — template Blade
- `public` — asset statis (css, js, gambar, upload)

## Catatan

- Upload menu/kategori disimpan di `public/assets/uploads/...`.
- Chatbot mencocokkan input pengguna dengan kolom `queries` menggunakan LIKE.
- Model 3D menu di-upload dengan ekstensi file model (mis. `.glb`/`.gltf`).

## Deploy ke Vercel (Catatan)

Konfigurasi Vercel sudah tersedia (`vercel.json`, `api/index.php`, `api/php.ini`). Namun ada beberapa hal yang perlu disiapkan manual:

1. Database eksternal (PostgreSQL, mis. Neon/Vercel Postgres) — set env di Vercel:
   - `DB_CONNECTION=pgsql`
   - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
2. `APP_KEY` (generate dengan `php artisan key:generate --show` dan set di env Vercel)
3. Jalankan migrasi & seeder ke database produksi secara manual:
   `php artisan migrate --force --seed`
4. `APP_DEBUG=false` (sudah di-set di `vercel.json`).
5. Upload file (gambar/model 3D) disimpan ke filesystem lokal server yang read-only di Vercel — untuk produksi gunakan storage eksternal (S3) agar persisten.
6. Pastikan `vendor` di-build oleh Vercel (composer install otomatis oleh runtime `vercel-php`).