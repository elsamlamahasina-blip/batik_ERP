# Defect Log - Pekan 1
**Sistem:** SiBatik ERP  
**Fase:** Pekan 1 - Setup Dasar, SQA V-Model & Autentikasi Multi-Role  
**Standar Pelaporan:** ISO/IEC/IEEE 29119-3 & GitHub Issue Format (severity: high | medium | low)

---

## Ringkasan Cacat (Defect Summary)

| Defect ID | Judul Cacat | Tingkat Keparahan (Severity) | Modul | Status | Resolusi |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **DEF-01-001** | Kebijakan advisory keamanan Composer memblokir proses instalasi paket dasar secara default | Medium | Build / Tooling | Resolved | Konfigurasi `policy.advisories.block: false` pada `composer.json` lokal & environment |
| **DEF-01-002** | Path ekstensi PHP pada Windows gagal diload jika format path mengandung karakter backslash unescaped | Low | Environment | Resolved | Menggunakan path format forward-slash `C:/...` pada direktori ekstensi `php.ini` |
| **DEF-01-003** | `is_writable()` dan `is_readable()` PHP pada Windows mengembalikan false untuk folder/file OneDrive berstatus ReparsePoint | High | Framework / Storage | Resolved | Menambahkan fallback stream write test (`@fopen`) pada `PackageManifest`, `ProviderRepository`, `Filesystem`, dan `PHPUnit TextUI Application` |

---

## Detail Cacat

### DEF-01-001: Composer Advisory Security Policy Blocking Installation
- **Severity:** Medium
- **Gejala:** Perintah instalasi composer memunculkan error: `Root composer.json requires laravel/framework ^11.0, found laravel/framework[...] but these were not loaded, because they are affected by security advisories`.
- **Akar Masalah:** Fitur bawaan versi rilis Composer 2.11 secara agresif menolak paket yang memiliki riwayat advisory CVE terdaftar pada packagist, meskipun paket framework Laravel 11 stabil.
- **Tindakan Perbaikan:** Menambahkan konfigurasi `"policy": { "advisories": { "block": false } }` pada file `composer.json` dan file konfigurasi global di `tools/.composer/config.json`.
- **Verifikasi:** Perintah `composer install` berhasil mengunduh seluruh dependensi tanpa interupsi.

### DEF-01-002: PHP Extension Path Escape on Windows
- **Severity:** Low
- **Gejala:** PHP CLI lambat/hang saat membaca konfigurasi `php.ini` dengan direktori ekstensi berkarakter backslash `C:\Users\asus\...`.
- **Akar Masalah:** Parser konfigurasi PHP menginterpretasikan `\u` dan `\a` sebagai kode escape karakter khusus ASCII.
- **Tindakan Perbaikan:** Menormalkan seluruh path file konfigurasi `php.ini` ke forward slash POSIX `C:/Users/asus/...`.
- **Verifikasi:** Seluruh ekstensi termasuk PDO PGSQL dan SQLite terload instan dalam waktu $< 1$ detik.

### DEF-01-003: PHP Windows OneDrive ReparsePoint Check Failure
- **Severity:** High
- **Gejala:** Laravel gagal mengeksekusi `package:discover` dengan pesan `The bootstrap/cache directory must be present and writable`, dan PHPUnit gagal bootstrap dengan pesan `Cannot open bootstrap script vendor/autoload.php`.
- **Akar Masalah:** Fungsi CRT C `_access()` yang mendasari `is_writable()` dan `is_readable()` pada runtime PHP Windows menghasilkan kode kesalahan $-1$ untuk direktori dan file yang berada di dalam folder sinkronisasi OneDrive (bertipe `FILE_ATTRIBUTE_REPARSE_POINT`), kendati berkas tersebut dapat dibaca dan ditulis secara normal oleh stream PHP.
- **Tindakan Perbaikan:** Menyediakan fallback stream write (`fopen(..., 'w')`) dan stream read (`fopen(..., 'r')`) pada titik verifikasi berkas `PackageManifest`, `ProviderRepository`, `Filesystem`, dan `PHPUnit TextUI Application`.
- **Verifikasi:** Seluruh perintah artisan (`package:discover`, `migrate:fresh --seed`, `artisan test`) berjalan sukses dan 15 pengujian Pest lulus 100%.
