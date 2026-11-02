<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                Peran: Bagian Gudang
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-amber-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Modul Persediaan & Gudang Batik (Inventory)</h3>
            <p class="text-sm text-stone-600">
                Alur kerja: Penerimaan Barang (Goods Receipt) dari PO &rarr; Penyimpanan terpisah (Gudang Batik & Gudang Bahan) &rarr; Pengeluaran Barang otomatis (Delivery Order dari Sales Order) &rarr; Reordering Rule.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Lokasi Gudang</span>
                <p class="text-2xl font-black text-stone-800 mt-2">2 Lokasi</p>
                <span class="text-xs text-stone-500 mt-1 block">Gudang Batik & Gudang Lainnya</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Katalog Produk & Varian</span>
                <p class="text-2xl font-black text-stone-800 mt-2">15 Varian</p>
                <span class="text-xs text-stone-500 mt-1 block">Ukuran S-XL & Motif Pamekasan</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Goods Receipt Menunggu</span>
                <p class="text-2xl font-black text-amber-600 mt-2">0 Dokumen</p>
                <span class="text-xs text-stone-400 mt-1 block">Integrasi Pekan 06</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Stok Kritis (Min Stock)</span>
                <p class="text-2xl font-black text-rose-600 mt-2">Aman</p>
                <span class="text-xs text-stone-400 mt-1 block">Reordering Rule Service</span>
            </div>
        </div>
    </div>
</x-app-layout>

