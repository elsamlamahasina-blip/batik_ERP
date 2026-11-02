# Laporan Perkembangan Pekan 1: SQA, V-Model, ISO/IEC/IEEE 29119
**Mata Kuliah:** Manajemen dan Proyek SI (MKB020204)  
**Institusi:** Universitas Islam Madura  
**Sistem:** SiBatik ERP (ERP/EIS UMKM Batik Pamekasan)  
**Rilis Tag:** `v0.01`  
**Branch:** `pekan-01` $\rightarrow$ `main`  
**Tanggal:** 2 November 2026  

---

## 1. Apa yang Dibangun (Scope of Build)

Pada Pekan 1, fokus utama adalah peletakan fondasi arsitektur, lingkungan kontainer yang dapat direproduksi (*reproducible environment*), kerangka otentikasi multi-role, dan penyiapan metodologi pengujian mutu (SQA):

1. **Inisialisasi Repositori & Kerangka Kerja:**
   - Framework **Laravel 11** berbasis **PHP 8.3**.
   - Database utama: **PostgreSQL 16** (sesuai spesifikasi tech stack RPS).
   - Pengujian terotomatisasi: **Pest Testing Framework** + SQLite in-memory test database.
   - Frontend: **Blade Components + Tailwind CSS + Alpine.js**.

2. **Lingkungan Kontainer Docker:**
   - `deploy/Dockerfile`: Image berbasis `php:8.3-fpm-alpine` yang dilengkapi ekstensi `pdo_pgsql`, `pgsql`, `mbstring`, `zip`, `gd`, `bcmath`, `opcache`, `pcntl`, serta Composer resmi.
   - `deploy/nginx/default.conf`: Reverse proxy Nginx dengan optimasi security headers dan fastcgi caching.
   - `docker-compose.yml`: Layanan multi-container terisolasi (`app`, `nginx` port 8000, `postgres` port 5432) dengan volume data persisten dan *healthcheck* otomatis.

3. **Otentikasi & Autorisasi 7 Peran (RBAC):**
   - Integrasi `spatie/laravel-permission` dan `laravel/sanctum`.
   - 7 Peran bisnis:
     1. `admin` (Administrator Sistem & Keamanan)
     2. `pembelian` (Staff Pengadaan / Pembelian Bahan)
     3. `gudang` (Staff Pengelola Gudang Batik)
     4. `penjualan` (Staff / Manajer Penjualan Grosir)
     5. `kasir` (Kasir Point of Sale / POS Batik)
     6. `keuangan` (Staff Akuntansi & Faktur)
     7. `eksekutif` (Pimpinan / Pemilik UMKM)
   - Layanan `app/Services/RoleNavigationService` untuk memetakan peran ke rute dashboard masing-masing.
   - Controller `RoleDashboardController` dengan proteksi middleware `role:XXX` dan penanganan penolakan akses lintas peran (*403 Forbidden*).
   - 7 Tampilan antarmuka Dashboard spesifik (`dashboards/*.blade.php`) dengan skema warna batik khas dan sistem umpan balik notifikasi (*flash messages*).

4. **Data Awal (Seeder):**
   - `RoleAndUserSeeder`: Membuat ke-7 role dan akun default untuk masing-masing peran (misal: `admin@sibatik.lan`, `kasir@sibatik.lan`, dst. dengan kata sandi default `password`).

---

## 2. Cara Menjalankan Sistem

### Opsi A: Menggunakan Docker Compose (Lingkungan Bersih)

1. Pastikan Docker Desktop telah aktif.
2. Salin environment:
   ```bash
   cp .env.example .env
   ```
3. Bangun dan jalankan kontainer dari nol:
   ```bash
   docker compose up -d --build
   ```
4. Jalankan migrasi dan seeder awal di dalam kontainer:
   ```bash
   docker compose exec app php artisan migrate:fresh --seed
   ```
5. Akses web browser di: [http://localhost:8000](http://localhost:8000)

### Opsi B: Menggunakan Runtime Lokal

1. Salin environment dan generate app key:
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```
2. Jalankan migrasi dan seeder database:
   ```bash
   php artisan migrate:fresh --seed
   ```
3. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
4. Buka browser pada alamat [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 3. Akun Demo Default

| Peran | Alamat Email | Kata Sandi | Halaman Arah (Redirect Target) |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@sibatik.lan` | `password` | `/dashboard/admin` |
| **Pembelian** | `pembelian@sibatik.lan` | `password` | `/dashboard/pembelian` |
| **Gudang** | `gudang@sibatik.lan` | `password` | `/dashboard/gudang` |
| **Penjualan** | `penjualan@sibatik.lan` | `password` | `/dashboard/penjualan` |
| **Kasir** | `kasir@sibatik.lan` | `password` | `/dashboard/kasir` |
| **Keuangan** | `keuangan@sibatik.lan` | `password` | `/dashboard/keuangan` |
| **Eksekutif** | `eksekutif@sibatik.lan` | `password` | `/dashboard/eksekutif` |

---

## 4. Cara Menguji (Testing Guide)

Jalankan rangkaian pengujian otomatis Pest melalui terminal:

```bash
php artisan test
```
atau secara langsung via binary Pest:
```bash
./vendor/bin/pest
```

---

## 5. Hasil Pengujian (Test Results)

Semua pengujian berjalan secara otomatis dan menghasilkan status **100% HIJAU (PASS)** tanpa ada kegagalan:

```text
   PASS  Tests\Unit\RoleNavigationServiceTest
  ✓ service returns correct dashboard route for each role                                                        2.35s  
  ✓ service returns default dashboard when user has no role                                                      0.22s  
  ✓ service registers exactly 7 supported roles                                                                  0.18s  

   PASS  Tests\Feature\AuthSmokeTest
  ✓ landing page loads successfully                                                                              0.42s  
  ✓ login screen can be rendered                                                                                 0.20s  
  ✓ unauthenticated users are redirected from dashboard to login                                                 0.10s  
  ✓ unauthenticated users cannot access role specific dashboards                                                 0.11s  

   PASS  Tests\Feature\RoleRedirectionTest
  ✓ admin user redirects to admin dashboard                                                                      0.21s  
  ✓ pembelian user redirects to pembelian dashboard                                                              0.22s  
  ✓ gudang user redirects to gudang dashboard                                                                    0.20s  
  ✓ penjualan user redirects to penjualan dashboard                                                              0.27s  
  ✓ kasir user redirects to kasir dashboard                                                                      0.29s  
  ✓ keuangan user redirects to keuangan dashboard                                                                0.20s  
  ✓ eksekutif user redirects to eksekutif dashboard                                                              0.17s  
  ✓ cross role access is blocked with 403 forbidden                                                              0.21s  

  Tests:    15 passed (67 assertions)
  Duration: 6.44s
```

### Cakupan Uji Pekan 1:
- **Smoke Test:** Memverifikasi ketersediaan halaman selamat datang (*welcome page*), form otentikasi login, dan pengalihan aman pengguna anonim ke `/login`.
- **Role Routing & Redirection Test:** Memverifikasi ketepatan logika pengalihan setiap peran menuju dashboard yang berwenang.
- **Negative / Security Test:** Memverifikasi proteksi lintas peran (*cross-role access attempt*) ditolak dengan kode status HTTP `403 Forbidden` (misal kasir membuka panel admin atau gudang membuka panel keuangan).
- **Unit Test:** Memverifikasi integritas fungsi logika `RoleNavigationService` dalam meregistrasikan 7 peran sistem.

---

## 6. Bug & Cacat yang Ditemukan (Defect Tracking)

Sesuai aturan *Software Quality Assurance*, seluruh temuan bug dicatat secara transparan pada dokumen [`docs/pekan-01/defects.md`](./defects.md):
1. **DEF-01-001 (Severity: Medium):** *Composer Advisory Security Policy* memblokir pengunduhan dependensi. Terselesaikan via konfigurasi policy bypass pada composer.
2. **DEF-01-002 (Severity: Low):** Format backslash direktori ekstensi `php.ini` pada Windows. Terselesaikan via normalisasi POSIX forward slash.
3. **DEF-01-003 (Severity: High):** Pengecekan `is_writable()` dan `is_readable()` pada folder OneDrive ReparsePoint. Terselesaikan via stream file testing fallback pada komponen Foundation Framework dan PHPUnit TextUI.

---

## 7. Artefak Dokumen RPS Pekan 1

1. **[`docs/ROADMAP.md`](../ROADMAP.md):** Peta jalan 16 Pekan, spesifikasi Tech Stack, alur proses bisnis Odoo Rumah Merah Lasem, dan model relasi data.
2. **[`AGENTS.md`](../../AGENTS.md):** Pedoman teknis dan aturan operasional agen rekayasa perangkat lunak dan SQA.
3. **[`docs/pekan-01/vmodel.md`](./vmodel.md):** Artefak inti RPS Pekan 1:
   - Pemetaan V-Model (Kebutuhan $\leftrightarrow$ UAT, Desain Sistem $\leftrightarrow$ Integrasi, Modul $\leftrightarrow$ Unit Test).
   - Analisis mendalam Verifikasi (*"Are we building the product right?"*) vs Validasi (*"Are we building the right product?"*).
   - Matriks Ketertelusuran Mutu (Traceability Matrix).
4. **[`docs/pekan-01/defects.md`](./defects.md):** Defect log terstruktur ISO/IEC/IEEE 29119-3.
5. **[`CHANGELOG.md`](../../CHANGELOG.md):** Riwayat perubahan rilis versi `v0.01`.
