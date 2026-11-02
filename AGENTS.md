# ATURAN AGENT - SiBatik ERP

- UI dan dokumen berbahasa Indonesia; kode, variabel, dan commit message berbahasa Inggris (Conventional Commits).
- Satu pekan = satu branch `pekan-XX`, merge ke `main`, beri tag `v0.XX`.
- Hanya kerjakan lingkup pekan yang diminta. Jangan membangun fitur pekan berikutnya.
- Setiap fitur wajib punya test. Jangan menyatakan selesai jika test merah.
- Logika bisnis di `app/Services`, bukan di controller. Validasi lewat Form Request. Tidak ada raw SQL dari input pengguna.
- Perubahan skema hanya lewat migration baru. Jangan hapus migration lama.
- Jangan hardcode secret; gunakan `.env` dan sediakan `.env.example`.
- Setiap akhir pekan: perbarui `CHANGELOG.md` dan `docs/pekan-XX/README.md` berisi: apa yang dibangun, cara menjalankan, cara menguji, hasil test, bug yang diketahui, dan artefak RPS pekan itu.
- Jangan menyembunyikan bug demi test hijau. Bug yang ditemukan dicatat di `docs/pekan-XX/defects.md` (dan GitHub Issues bila tersedia).
