# Changelog - SiBatik ERP

Semua perubahan penting pada proyek SiBatik ERP didokumentasikan dalam berkas ini.
Format penulisan mengacu pada [Keep a Changelog](https://keepachangelog.com/id/1.0.0/) dan prinsip [Conventional Commits](https://www.conventionalcommits.org/).

## [v0.01] - 2026-11-02 (Pekan 1: SQA, V-Model, ISO/IEC/IEEE 29119)

### Ditambahkan (Added)
- **Fondasi Repositori:** Struktur dasar direktori proyek ERP/EIS SiBatik untuk UMKM Batik Pamekasan.
- **Docker Compose:** Definisi kontainer layanan `app` (PHP 8.3 FPM), `nginx` (web server port 8000), dan `postgres` (PostgreSQL 16 port 5432) dengan volume persisten data dan network bridge terisolasi.
- **Framework & Autentikasi:** Laravel 11 terkonfigurasi dengan `spatie/laravel-permission` dan `laravel/sanctum`.
- **Manajemen Peran (Role Management):** 7 peran hak akses spesifik sistem:
  1. `admin` (Administrator Sistem)
  2. `pembelian` (Staff / Kepala Pembelian)
  3. `gudang` (Staff / Kepala Gudang)
  4. `penjualan` (Staff / Kepala Penjualan)
  5. `kasir` (Kasir POS Batik)
  6. `keuangan` (Staff / Akuntan Keuangan)
  7. `eksekutif` (Pimpinan / Pemilik UMKM)
- **Role Routing & Dashboard:** Kontroller routing berbasis peran (`RoleDashboardController`) yang mengarahkan pengguna secara otomatis ke dashboard modul masing-masing pasca login.
- **Tampilan Antarmuka (Blade Layout):** Layout dasar terintegrasi Tailwind CSS dan Alpine.js dengan sidebar dinamis, navigasi peran, serta feedback status.
- **Pengujian Otomatis (Testing Suite):** Pengujian Pest terpasang mencakup:
  - Smoke test: Halaman login terbuka dengan kode status 200.
  - Role redirection test: Verifikasi alur login dan pengalihan ke dashboard spesifik masing-masing dari ke-7 peran.
  - Hak akses terproteksi: Memastikan pengguna tanpa otentikasi diarahkan kembali ke halaman login.
- **Artefak RPS:**
  - `docs/ROADMAP.md`: Peta jalan 16 pekan, arsitektur modul, dan model data.
  - `AGENTS.md`: Aturan agen AI dalam pengembangan dan penjaminan mutu.
  - `docs/pekan-01/vmodel.md`: Pemetaan V-Model (ISO/IEC/IEEE 29119) dan analisis Verifikasi vs Validasi.
  - `docs/pekan-01/defects.md`: Log pencatatan dan resolusi cacat Pekan 1.
  - `docs/pekan-01/README.md`: Panduan eksekusi dan pelaporan hasil uji Pekan 1.

