<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $roleTitle }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                Peran: Bagian Keuangan & Akuntansi
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-emerald-600 p-6">
            <h3 class="text-lg font-bold text-stone-900 mb-2">Modul Faktur & Pelunasan (Invoicing & Accounting)</h3>
            <p class="text-sm text-stone-600">
                Fitur akuntansi: Tagihan Vendor (Vendor Bill) dengan kontrol kuantitas diterima &rarr; Faktur Pelanggan (Customer Invoice) dari SO/POS &rarr; Pelacakan status bayar (belum dibayar, sebagian, lunas).
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Faktur Pelanggan Terbit</span>
                <p class="text-2xl font-black text-stone-800 mt-2">0 Faktur</p>
                <span class="text-xs text-stone-400 mt-1 block">Status: Draft/Terbit/Lunas</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Tagihan Vendor (Vendor Bill)</span>
                <p class="text-2xl font-black text-stone-800 mt-2">0 Tagihan</p>
                <span class="text-xs text-stone-400 mt-1 block">Kontrol Received Quantities</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Total Piutang Berjalan</span>
                <p class="text-2xl font-black text-amber-600 mt-2">Rp 0</p>
                <span class="text-xs text-stone-400 mt-1 block">Pelanggan Konsinyasi/Reseller</span>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-sm border border-stone-200">
                <span class="text-xs font-semibold text-stone-500 uppercase">Total Utang Usaha</span>
                <p class="text-2xl font-black text-rose-600 mt-2">Rp 0</p>
                <span class="text-xs text-stone-400 mt-1 block">Vendor Kain & Bahan Pewarna</span>
            </div>
        </div>
    </div>
</x-app-layout>
