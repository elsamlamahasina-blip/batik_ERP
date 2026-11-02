<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800 border border-indigo-200">
                Peran: Bagian Penjualan
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Modul Penjualan Grosir & Reseller (Sales)</h3>
            <p class="text-sm text-stone-600">
                Alur kerja: Pembuatan Penawaran (Quotation) &rarr; Konfirmasi Pesanan (Sales Order) &rarr; Pemicu Otomatis Delivery Order &rarr; Kebijakan Faktur: <em>Invoice what is ordered</em> &rarr; Aturan Diskon Pelanggan Reseller/Umum.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Sales Order Aktif</span>
                <p class="text-2xl font-black text-stone-800 mt-2">0 SO</p>
                <span class="text-xs text-stone-400 mt-1 block">Decision Table Pricing di Pekan 04</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Total Pelanggan Terdaftar</span>
                <p class="text-2xl font-black text-indigo-600 mt-2">10 Mitra</p>
                <span class="text-xs text-stone-500 mt-1 block">Umum & Reseller Terverifikasi</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">DO Otomatis Terbit</span>
                <p class="text-2xl font-black text-emerald-600 mt-2">0 Pengiriman</p>
                <span class="text-xs text-stone-400 mt-1 block">Pemicu Konfirmasi SO</span>
            </div>
        </div>
    </div>
</x-app-layout>

