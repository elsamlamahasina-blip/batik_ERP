<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                Peran: Administrator
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Info Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-red-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Pusat Kendali Sistem SiBatik ERP</h3>
            <p class="text-sm text-stone-600">
                Selamat datang di panel administrator. Modul ini bertanggung jawab atas otorisasi pengguna, pemeliharaan basis data, audit log aktivitas transaksi, dan konfigurasi master sistem UMKM Batik Pamekasan.
            </p>
        </div>

        <!-- Metric Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Total Peran Sistem</span>
                <p class="text-2xl font-black text-stone-800 mt-2">7 Role</p>
                <span class="text-xs text-emerald-600 mt-1 block">&bull; Sesuai spesifikasi RPS</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Pengguna Terdaftar</span>
                <p class="text-2xl font-black text-stone-800 mt-2">Aktif</p>
                <span class="text-xs text-stone-500 mt-1 block">Otentikasi Multi-Role</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Status Basis Data</span>
                <p class="text-2xl font-black text-emerald-600 mt-2">Normal</p>
                <span class="text-xs text-stone-500 mt-1 block">PostgreSQL 16 Enterprise</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Tahap Proyek</span>
                <p class="text-2xl font-black text-amber-700 mt-2">Pekan 01</p>
                <span class="text-xs text-amber-600 mt-1 block">SQA & V-Model Foundation</span>
            </div>
        </div>

        <!-- Role Overview Table -->
        <div class="bg-white rounded-lg shadow-sm border border-stone-200 p-6">
            <h4 class="font-bold text-stone-900 mb-4 text-base">Daftar Hak Akses & Pembagian Tugas Peran</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-stone-600">
                    <thead class="bg-stone-50 text-stone-700 text-xs uppercase font-semibold border-b">
                        <tr>
                            <th class="py-3 px-4">Nama Peran</th>
                            <th class="py-3 px-4">Tanggung Jawab Operasional</th>
                            <th class="py-3 px-4">Akses Modul</th>
                            <th class="py-3 px-4">Status Pengujian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">admin</td>
                            <td class="py-3 px-4">Kelola user, role, backup, audit trail, security hardening</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-red-100 text-red-800 font-semibold">Semua Modul</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">pembelian</td>
                            <td class="py-3 px-4">Pengajuan RFQ, Purchase Order bahan batik, persetujuan pengadaan</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-blue-100 text-blue-800 font-semibold">Purchase & Vendor</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">gudang</td>
                            <td class="py-3 px-4">Penerimaan barang (GR), pengeluaran (DO), mutasi stok batik, reorder rule</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-amber-100 text-amber-800 font-semibold">Inventory & Warehouses</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">penjualan</td>
                            <td class="py-3 px-4">Penawaran harga, pesanan penjualan batik grosir, diskon reseller</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-indigo-100 text-indigo-800 font-semibold">Sales & Customers</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">kasir</td>
                            <td class="py-3 px-4">Buka/tutup sesi kasir, transaksi penjualan ritel, cetak struk</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-teal-100 text-teal-800 font-semibold">Point of Sale (POS)</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">keuangan</td>
                            <td class="py-3 px-4">Faktur penjualan, tagihan pembelian (Vendor Bill), pelunasan kas</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-emerald-100 text-emerald-800 font-semibold">Invoicing & Accounting</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-bold text-stone-900">eksekutif</td>
                            <td class="py-3 px-4">Monitoring KPI bisnis, omzet berkala, stok kritis, piutang macet</td>
                            <td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-xs bg-purple-100 text-purple-800 font-semibold">EIS Executive Dashboard</span></td>
                            <td class="py-3 px-4"><span class="text-emerald-600 font-medium">&check; Smoke Test Passed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

