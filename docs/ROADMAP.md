# ROADMAP PENGEMBANGAN SiBatik ERP (16 PEKAN)
Acuan: RPS Mata Kuliah Manajemen dan Proyek SI (MKB020204, Universitas Islam Madura) & Studi Kasus Toko Batik Rumah Merah Lasem (Sulistiono, Hediyanto, & Budiyono, 2026).

---

## TECH STACK

- Backend: **Laravel 11 (PHP 8.3)**; frontend **Blade + Alpine.js + Tailwind CSS**
- Database: **PostgreSQL 16** (tanpa PostGIS)
- Auth dan role: Laravel Breeze + spatie/laravel-permission; API token: Laravel Sanctum
- Grafik dashboard EIS: Chart.js
- Unit/feature test dan coverage: **Pest** + PCOV
- API testing: **Postman + Newman**
- E2E otomatis: **Playwright**
- Load test: **k6**
- Security scan: **OWASP ZAP** (baseline scan)
- Defect tracking: **GitHub Issues** (label `bug`, `severity:high|medium|low`)
- ETL: **Python 3.12 + pandas + SQLAlchemy**
- Kontainer: **Docker + Docker Compose** (app php-fpm, nginx, postgres)
- CI/CD: **GitHub Actions** ke VPS Linux via SSH
- Dokumentasi: Markdown di `docs/`

---

## MODUL (mengikuti artikel Rumah Merah Lasem)

1. **Purchase:** RFQ → Purchase Order (dengan persetujuan oleh role berwenang) → vendor. Pembelian dihubungkan ke penerimaan barang.
2. **Inventory:** master produk dengan **varian ukuran dan motif**, satuan, lokasi gudang (pisahkan gudang batik dan lainnya), **Goods Receipt** dari PO, **Delivery Order otomatis** dari Sales Order yang dikonfirmasi, **Reordering Rules** (stok minimum → saran pembelian otomatis), stok real-time.
3. **Sales:** Quotation → Sales Order, diskon, pricelist, konfirmasi pelanggan. Kebijakan invoice: *invoice what is ordered*.
4. **Point of Sale (POS):** sesi kasir (buka/tutup), pembayaran, diskon per baris, stok berkurang real-time, laporan penjualan harian otomatis.
5. **Invoicing:** Vendor Bill (dari PO dan penerimaan, dengan kontrol "received quantities") dan Customer Invoice (dari SO atau POS), pelacakan status pembayaran (belum dibayar, sebagian, lunas).
6. **EIS (khusus RPS):** dashboard eksekutif berisi omzet harian/bulanan, produk terlaris, stok kritis, piutang dan utang berjalan.
7. **Kebutuhan dari temuan penguji pada artikel (wajib dipenuhi):**
   - penanganan error untuk **input redundan/duplikat** (validasi unik, deteksi duplikat vendor/pelanggan/produk, pesan error jelas);
   - **notifikasi/arahan** bagi pengguna saat mengubah data atau saat aksi gagal (flash message, tooltip, status yang jelas).

---

## MODEL DATA (ringkas)

`users`, `roles`, `permissions`, `vendors`, `customers` (tipe: umum/reseller), `products` (kategori: batik tulis, batik cap, kain, pakaian), `product_variants` (ukuran, motif, sku, harga, stok_min), `warehouses`, `stock_moves` (receipt, delivery, pos, adjustment), `purchase_orders` + `purchase_order_lines`, `goods_receipts`, `sales_orders` + `sales_order_lines`, `delivery_orders`, `pos_sessions`, `pos_orders` + lines, `invoices` (tipe vendor/customer, status bayar), `payments`, `pricelists`, `reorder_rules`, `audit_logs`.

**Status (untuk state transition testing):**
- PO: `rfq → menunggu_persetujuan → disetujui → diterima_sebagian → diterima → dibatalkan`
- SO: `quotation → dikonfirmasi → dikirim → diinvoice → lunas → dibatalkan`
- Invoice: `draft → terbit → sebagian_dibayar → lunas → void`

**Aturan diskon (untuk decision table):** kombinasi jenis pelanggan (umum/reseller), total qty (<10, 10–49, ≥50), dan voucher (ada/tidak) menentukan persen diskon. Definisikan tabel aturan secara eksplisit di `docs/pekan-04`.

**Data seeder (dummy):** 3 vendor (kain, pewarna, aksesori), 10 pelanggan, 15 produk batik dengan varian ukuran S–XL dan 3–4 motif contoh, 2 gudang, 5 user (satu per role).

---

## RENCANA 16 PEKAN (build + pengujian + artefak)

Format tiap pekan: **Bangun** (fitur), **Uji** (pengujian yang wajib dibuat dan dijalankan), **Artefak** (dokumen RPS).

### PEKAN 1: SQA, V-Model, ISO/IEC/IEEE 29119
- **Bangun**: repo, Docker Compose (app, nginx, postgres), Laravel + Breeze + permission, role (admin, pembelian, gudang, penjualan, kasir, keuangan, eksekutif), layout dasar dan dashboard kosong per role.
- **Uji**: Pest terpasang; test smoke (halaman login terbuka, redirect per role) hijau; `docker compose up` jalan dari nol.
- **Artefak**: `docs/pekan-01/vmodel.md` (pemetaan V-Model: kebutuhan→UAT, desain sistem→integrasi, modul→unit test) dan ringkasan verifikasi vs validasi untuk proyek ini.

### PEKAN 2: Test Planning
- **Bangun**: CRUD master data (vendor, pelanggan, produk + varian ukuran/motif, gudang) dengan validasi unik dan deteksi duplikat (kebutuhan dari artikel). Seeder dummy.
- **Uji**: feature test CRUD dan duplikat ditolak dengan pesan jelas.
- **Artefak**: draf `qa/test-plan/TEST_PLAN.md` (ruang lingkup, strategi, estimasi sumber daya, **entry/exit criteria**, analisis risiko, jadwal per pekan).

### PEKAN 3: Black-box (Equivalence Partitioning dan Boundary Value Analysis)
- **Bangun**: form PO dan SO (qty, harga, diskon, tanggal) dengan aturan batas nilai (qty 1–9999, harga > 0, diskon 0–100%).
- **Uji**: test case EP/BVA terdokumentasi dan diotomatiskan sebagai Pest dataset (nilai batas: min−1, min, min+1, max−1, max, max+1).
- **Artefak**: `qa/test-plan/testcases-ep-bva.md` (tabel partisi, batas, expected result).

### PEKAN 4: Decision Table dan State Transition
- **Bangun**: `PricingService` (aturan diskon dari decision table), mesin status PO dan SO (transisi tidak valid ditolak).
- **Uji**: satu test per aturan decision table; satu test per transisi valid dan invalid.
- **Artefak**: `docs/pekan-04/decision-table.md`, diagram state PO/SO (Mermaid), test case terkait.

### PEKAN 5: White-box (Control Flow Graph, Cyclomatic Complexity, Coverage)
- **Bangun**: `HppService` (harga pokok dengan biaya angkut, diskon vendor, pembulatan), `ReorderService` (stok minimum → saran PO), `KpiService`. Sengaja ada beberapa percabangan.
- **Uji**: unit test mencapai **branch coverage minimal 80%** pada folder `app/Services` (laporan PCOV).
- **Artefak**: `docs/pekan-05/cfg.md` (CFG dalam Mermaid untuk `HppService`, hitung **V(G)** dan jalur independen), laporan coverage.

### PEKAN 6: API dan Integration Testing
- **Bangun**: Goods Receipt dari PO, Delivery Order otomatis dari SO terkonfirmasi (stok berkurang), Customer Invoice dan Vendor Bill dengan status bayar; REST API `/api/v1` (stok, produk, sales order, invoice) dengan Sanctum.
- **Uji**: Postman collection (status code, payload, skenario negatif 401/403/404/422) dijalankan via **Newman** dan hasilnya dilampirkan; feature test integrasi PO→receipt→stok bertambah, SO→DO→stok berkurang.
- **Artefak**: `qa/postman/*.json`, `qa/postman/report.html`.

### PEKAN 7: Test Automation E2E dan Defect Management
- **Bangun**: modul POS (sesi kasir, pembayaran, laporan harian), notifikasi/arahan pengguna.
- **Uji**: skrip **Playwright**: login; PO→approve→receipt→vendor bill; SO→confirm→DO→invoice→bayar; POS checkout. Catat setiap bug (judul, langkah, severity) di GitHub Issues.
- **Artefak (RPS)**: **Test Plan final + Test Case Matrix** (traceability: kebutuhan → test case → hasil) di `qa/test-plan/`, skrip E2E, `defects.md` awal.

### PEKAN 8: UTS (Audit Phase 1)
- **Bangun**: tidak ada fitur baru. Stabilisasi, perbaiki bug severity high, bekukan fitur (tag `v0.8-uts`).
- **Uji**: seluruh suite (unit, feature, Newman, Playwright) dijalankan ulang dan dilaporkan.
- **Artefak (RPS)**: **Defect Log + skrip uji otomatis** siap diaudit dan di-peer review; `docs/pekan-08/uts-audit.md`.

### PEKAN 9: Performance/Load Testing
- **Bangun**: dashboard EIS (omzet, produk terlaris, stok kritis, piutang/utang) dengan Chart.js; optimasi query (indeks, eager loading, cache).
- **Uji**: **k6** skenario 100, 300, 500 virtual users pada halaman dashboard dan endpoint API; catat throughput, response time (p95), error rate. Bandingkan sebelum dan sesudah optimasi.
- **Artefak**: `qa/k6/*.js`, `docs/pekan-09/load-test-report.md` (grafik/tabel dan analisis).

### PEKAN 10: Security Testing (OWASP Top 10)
- **Bangun**: hardening: CSRF, validasi dan escaping output, rate limiting login/API, security headers, kebijakan password, otorisasi per role (policy), audit log.
- **Uji**: **OWASP ZAP baseline scan** terhadap staging/lokal; uji manual SQL injection dan XSS pada form input; uji akses lintas role (IDOR).
- **Artefak**: `qa/zap/report.html`, `docs/pekan-10/security-report.md` (temuan, severity, perbaikan, hasil scan ulang).

### PEKAN 11: UAT dan Sign-off
- **Bangun**: perbaikan dari umpan balik UAT; akun demo per role; panduan singkat pengguna.
- **Uji**: eksekusi UAT berbasis skenario (mengikuti pola artikel: butir uji per kelas, misalnya autentikasi, kelola user/vendor/pelanggan/produk, RFQ-PO, goods receipt, vendor bill, quotation-SO, customer invoice, delivery order, POS) dan skala penilaian 1–5.
- **Artefak**: `qa/uat/matriks-uat.md`, template **Berita Acara UAT (Sign-off)**.

### PEKAN 12: Strategi Implementasi dan Change Management
- **Bangun**: fitur impor CSV dari UI (produk, pelanggan, stok awal) dengan validasi dan laporan baris gagal; halaman bantuan.
- **Uji**: test impor (file valid, kolom hilang, duplikat, format salah).
- **Artefak**: `docs/pekan-12/strategi-implementasi.md` (bandingkan direct, parallel, phased, pilot; pilih untuk UMKM batik beserta alasan risiko) dan rencana change management (pelatihan, SOP).

### PEKAN 13: Migrasi Data (ETL), Cutover, Rollback
- **Bangun**: skrip ETL Python di `migration/` yang memigrasikan data legacy **Excel/CSV kotor** (duplikat, format tanggal beragam, satuan campur, nama produk tidak konsisten) ke database; buat dataset legacy kotor sebagai bahan uji.
- **Uji**: test ETL (jumlah baris sumber vs tujuan, data ditolak dicatat, idempotent); rekonsiliasi hasil.
- **Artefak**: `migration/README.md`, `docs/pekan-13/cutover-checklist.md`, `docs/pekan-13/rollback-plan.md`.

### PEKAN 14: CI/CD Deployment
- **Bangun**: GitHub Actions `ci.yml` (lint → Pest → Newman → Playwright) dan `deploy.yml` (build image Docker → deploy ke VPS staging), `deploy/rollback.sh`.
- **Uji**: pipeline hijau; deployment otomatis saat push ke `main`; smoke test pasca-deploy.
- **Artefak (RPS)**: **URL staging + strategi cutover** (`docs/pekan-14/`).

### PEKAN 15: Post-Implementation Review dan Maintenance
- **Bangun**: health check endpoint, logging terstruktur, halaman status sistem sederhana.
- **Uji**: test health check; simulasi kegagalan layanan dan pemulihan.
- **Artefak**: `docs/pekan-15/PIR.md` (tujuan vs hasil, pelajaran), rencana pemeliharaan (corrective, adaptive, perfective, preventive) dan matriks estimasi biaya.

### PEKAN 16: UAS (Final Demo dan Rollback)
- **Bangun**: rilis `v1.0`, bekukan kode.
- **Uji**: jalankan seluruh suite sekali lagi; **simulasi rollback langsung** ke versi sebelumnya dan verifikasi data.
- **Artefak (RPS)**: **Laporan akhir PIR + skrip demo rollback**, bahan presentasi.
