<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SiBatik ERP') }} - Masuk Sistem</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            batik: {
                                50: '#fdf8f6',
                                100: '#f2e8e5',
                                500: '#b45309',
                                700: '#78350f',
                                800: '#451a03',
                                900: '#2b1002',
                            }
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="font-sans text-stone-800 antialiased bg-stone-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="text-center mb-4">
                <a href="/" class="inline-flex flex-col items-center">
                    <span class="text-3xl font-black tracking-wider text-amber-700">SiBatik ERP</span>
                    <span class="text-xs uppercase tracking-widest text-stone-500 font-semibold mt-1">Sistem ERP/EIS UMKM Batik Pamekasan</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-8 bg-white shadow-lg border border-stone-200 overflow-hidden sm:rounded-xl">
                {{ $slot }}
            </div>
            
            <p class="mt-6 text-xs text-stone-500">
                &copy; {{ date('Y') }} SiBatik ERP &bull; RPS Manajemen dan Proyek SI
            </p>
        </div>
    </body>
</html>
