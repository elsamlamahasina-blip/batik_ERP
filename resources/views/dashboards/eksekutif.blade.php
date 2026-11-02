<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800 border border-purple-200">
                Peran: Eksekutif / Pemilik UMKM
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-purple-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Executive Information System (EIS) Dashboard</h3>
            <p class="text-sm text-stone-600">
                Dashboard eksekutif menyajikan ringkasan strategis bisnis UMKM Batik Pamekasan: Tren Omzet Harian/Bulanan, Produk Batik Terlaris, Peringatan Stok Kritis, serta Rasio Piutang dan Utang Berjalan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Omzet Penjualan Bulan Ini</span>
                <p class="text-2xl font-black text-emerald-600 mt-2">Rp 0</p>
                <span class="text-xs text-stone-400 mt-1 block">Chart.js visualisasi di Pekan 09</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Produk Batik Terlaris</span>
                <p class="text-2xl font-black text-stone-800 mt-2">-</p>
                <span class="text-xs text-stone-400 mt-1 block">Motif Sekar Jagad / Tarum</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Peringatan Stok Kritis</span>
                <p class="text-2xl font-black text-emerald-600 mt-2">0 Item</p>
                <span class="text-xs text-stone-400 mt-1 block">Semua varian aman</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Total Piutang Berjalan</span>
                <p class="text-2xl font-black text-amber-600 mt-2">Rp 0</p>
                <span class="text-xs text-stone-400 mt-1 block">Aging piutang reseller</span>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-stone-200 p-6">
            <h4 class="font-bold text-stone-900 mb-2">Roadmap Penjaminan Mutu EIS</h4>
            <p class="text-sm text-stone-600">
                Pada Pekan 9, modul ini akan diuji menggunakan <strong>k6 Load Testing</strong> dengan skenario 100, 300, dan 500 pengguna virtual serentak guna menguji ketahanan query agregasi dan efektivitas cache.
            </p>
        </div>
    </div>
</x-app-layout>

