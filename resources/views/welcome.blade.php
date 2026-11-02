<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiBatik ERP - Sistem ERP/EIS UMKM Batik Pamekasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,900&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        batik: {
                            50: '#fdf8f6',
                            100: '#f2e8e5',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#78350f',
                            900: '#2b1002',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-stone-900 text-stone-100 min-h-screen flex flex-col font-sans">
    <!-- Navbar -->
    <header class="border-b border-stone-800 bg-stone-950/70 backdrop-blur">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <span class="text-2xl font-black tracking-wider text-amber-500">SiBatik</span>
                <span class="text-xs font-semibold px-2 py-0.5 rounded bg-amber-900/60 text-amber-300 border border-amber-700/50 uppercase tracking-wider">ERP / EIS</span>
            </div>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-md bg-amber-600 hover:bg-amber-500 text-stone-950 font-bold text-sm transition">
                        Buka Dashboard &rarr;
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2 rounded-md bg-amber-500 hover:bg-amber-400 text-stone-950 font-bold text-sm transition shadow-lg shadow-amber-500/20">
                        Masuk Sistem (Login)
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero -->
    <main class="flex-1 max-w-7xl mx-auto px-6 py-16 flex flex-col justify-center">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium bg-amber-950/80 border border-amber-800/60 text-amber-300 mb-6">
                <span>RPS Mata Kuliah MKB020204</span>
                <span>&bull;</span>
                <span>Universitas Islam Madura</span>
                <span>&bull;</span>
                <span class="text-amber-400 font-bold">Pekan 01: SQA & V-Model</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-tight">
                Sistem ERP & EIS Terpadu untuk <span class="text-amber-500">UMKM Batik Pamekasan</span>
            </h1>
            <p class="mt-6 text-lg text-stone-400 leading-relaxed">
                Diadaptasi dari konfigurasi proses operasional dan akuntansi Toko Batik Rumah Merah Lasem (Sulistiono et al., 2026), mengintegrasikan alur Pengadaan (Purchase), Persediaan (Inventory), Penjualan (Sales), POS Kasir, Faktur, dan Dashboard Eksekutif berstandar penjaminan mutu ISO/IEC/IEEE 29119.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('login') }}" class="px-6 py-3 rounded-lg bg-amber-500 hover:bg-amber-400 text-stone-950 font-bold text-base transition shadow-xl shadow-amber-500/20 flex items-center">
                    Masuk ke SiBatik ERP
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <div class="flex items-center text-xs text-stone-400 bg-stone-800/80 px-4 py-3 rounded-lg border border-stone-700">
                    Akun demo default: <code class="text-amber-400 ml-1 font-mono">admin@sibatik.lan</code> / <code class="text-amber-400 ml-1 font-mono">password</code>
                </div>
            </div>
        </div>

        <!-- 7 Role Cards Grid -->
        <div class="mt-16">
            <h2 class="text-xs uppercase tracking-widest font-bold text-amber-500 mb-4">7 Peran Pengguna (Role-Based Access Control)</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-7 gap-3 text-stone-300">
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-red-400 uppercase">1. Admin</span>
                    <p class="text-xs text-stone-400 mt-1">Otorisasi & Keamanan Sistem</p>
                </div>
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-blue-400 uppercase">2. Pembelian</span>
                    <p class="text-xs text-stone-400 mt-1">RFQ & Purchase Order Bahan</p>
                </div>
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-amber-400 uppercase">3. Gudang</span>
                    <p class="text-xs text-stone-400 mt-1">Penerimaan & Mutasi Stok</p>
                </div>
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-indigo-400 uppercase">4. Penjualan</span>
                    <p class="text-xs text-stone-400 mt-1">Quotation, SO & Reseller</p>
                </div>
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-teal-400 uppercase">5. Kasir</span>
                    <p class="text-xs text-stone-400 mt-1">Point of Sale (POS) Toko</p>
                </div>
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-emerald-400 uppercase">6. Keuangan</span>
                    <p class="text-xs text-stone-400 mt-1">Faktur & Status Pelunasan</p>
                </div>
                <div class="bg-stone-800/60 p-4 rounded-lg border border-stone-800">
                    <span class="text-xs font-bold text-purple-400 uppercase">7. Eksekutif</span>
                    <p class="text-xs text-stone-400 mt-1">EIS & KPI Strategis Pemilik</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-stone-800 py-6 text-center text-xs text-stone-500">
        SiBatik ERP &bull; SQA, Pengujian & Strategi Implementasi &bull; Universitas Islam Madura
    </footer>
</body>
</html>
