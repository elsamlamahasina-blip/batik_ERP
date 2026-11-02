<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-teal-100 text-teal-800 border border-teal-200">
                Peran: Kasir Toko Batik
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-teal-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Modul Kasir Toko Batik (Point of Sale / POS)</h3>
            <p class="text-sm text-stone-600">
                Fitur kasir: Buka/Tutup Sesi Kasir &rarr; Scan Varian Ukuran/Motif Batik &rarr; Diskon per Baris &rarr; Pengurangan Stok Real-time &rarr; Laporan Penjualan Harian Otomatis.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Status Sesi Kasir</span>
                <p class="text-2xl font-black text-rose-600 mt-2">Sesi Ditutup</p>
                <span class="text-xs text-stone-400 mt-1 block">Buka sesi baru di Pekan 07</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Transaksi Ritel Hari Ini</span>
                <p class="text-2xl font-black text-stone-800 mt-2">0 Struk</p>
                <span class="text-xs text-stone-400 mt-1 block">Omzet Rp 0</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Pengurangan Stok Real-Time</span>
                <p class="text-2xl font-black text-teal-600 mt-2">Siap</p>
                <span class="text-xs text-stone-400 mt-1 block">Sinkronisasi Gudang Toko</span>
            </div>
        </div>
    </div>
</x-app-layout>
