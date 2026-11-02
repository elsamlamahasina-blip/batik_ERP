<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                Peran: Pembelian & Pengadaan
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Modul Pengadaan Bahan Baku Batik (Purchase)</h3>
            <p class="text-sm text-stone-600">
                Alur kerja: Permintaan Penawaran (RFQ) &rarr; Purchase Order dengan kontrol persetujuan &rarr; Konfirmasi Vendor &rarr; Terhubung ke Penerimaan Gudang.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">RFQ Menunggu Persetujuan</span>
                <p class="text-2xl font-black text-stone-800 mt-2">0 Dokumen</p>
                <span class="text-xs text-stone-400 mt-1 block">State machine aktif di Pekan 03 & 04</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Purchase Order Berjalan</span>
                <p class="text-2xl font-black text-blue-600 mt-2">0 PO</p>
                <span class="text-xs text-stone-400 mt-1 block">Kontrol kuantitas diterima</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Vendor Terdaftar</span>
                <p class="text-2xl font-black text-stone-800 mt-2">3 Vendor</p>
                <span class="text-xs text-stone-400 mt-1 block">Kain Mori, Pewarna, Aksesori</span>
            </div>
        </div>

        <div class="bg-amber-50 border border-amber-200 rounded-lg p-5 text-amber-900 text-sm">
            <div class="font-bold flex items-center mb-1">
                <svg class="w-5 h-5 mr-2 text-amber-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                Pemberitahuan Tahapan Pengembangan:
            </div>
            Form RFQ, batas input kuantitas (BVA: 1 - 9999), validasi duplikasi nomor order, dan integrasi persetujuan akan diaktifkan secara bertahap pada Pekan 2, 3, dan 4.
        </div>
    </div>
</x-app-layout>

