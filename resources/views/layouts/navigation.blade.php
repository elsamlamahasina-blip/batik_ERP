<nav x-data="{ open: false }" class="bg-batik-900 border-b border-amber-800 text-white shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo & Brand -->
                <div class="shrink-0 flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <span class="text-2xl font-black tracking-wider text-amber-400">SiBatik</span>
                        <span class="text-xs font-semibold px-2 py-0.5 rounded bg-amber-700 text-amber-100 uppercase tracking-widest">ERP/EIS</span>
                    </a>
                </div>

                <!-- Navigation Links based on role -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-8 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-amber-100 hover:text-white hover:bg-batik-800 transition">
                        Dashboard Utama
                    </a>

                    @role('admin')
                        <a href="{{ route('dashboard.admin') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.admin') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            Admin
                        </a>
                    @endrole

                    @role('pembelian')
                        <a href="{{ route('dashboard.pembelian') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.pembelian') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            Pembelian
                        </a>
                    @endrole

                    @role('gudang')
                        <a href="{{ route('dashboard.gudang') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.gudang') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            Gudang
                        </a>
                    @endrole

                    @role('penjualan')
                        <a href="{{ route('dashboard.penjualan') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.penjualan') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            Penjualan
                        </a>
                    @endrole

                    @role('kasir')
                        <a href="{{ route('dashboard.kasir') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.kasir') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            Kasir POS
                        </a>
                    @endrole

                    @role('keuangan')
                        <a href="{{ route('dashboard.keuangan') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.keuangan') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            Keuangan
                        </a>
                    @endrole

                    @role('eksekutif')
                        <a href="{{ route('dashboard.eksekutif') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.eksekutif') ? 'bg-amber-600 text-white font-semibold' : 'text-amber-200 hover:bg-batik-800' }}">
                            EIS Eksekutif
                        </a>
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Role Tag -->
                @if (Auth::user() && Auth::user()->roles->count() > 0)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/40 me-3">
                        Peran: {{ Auth::user()->roles->pluck('name')->join(', ') }}
                    </span>
                @endif

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-amber-700 text-sm leading-4 font-medium rounded-md text-amber-100 bg-batik-800 hover:text-white hover:bg-batik-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil Pengguna
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Keluar (Logout)
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-amber-200 hover:text-white hover:bg-batik-800 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-batik-800 border-t border-amber-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard Utama
            </x-responsive-nav-link>

            @role('admin')
                <x-responsive-nav-link :href="route('dashboard.admin')">Admin</x-responsive-nav-link>
            @endrole
            @role('pembelian')
                <x-responsive-nav-link :href="route('dashboard.pembelian')">Pembelian</x-responsive-nav-link>
            @endrole
            @role('gudang')
                <x-responsive-nav-link :href="route('dashboard.gudang')">Gudang</x-responsive-nav-link>
            @endrole
            @role('penjualan')
                <x-responsive-nav-link :href="route('dashboard.penjualan')">Penjualan</x-responsive-nav-link>
            @endrole
            @role('kasir')
                <x-responsive-nav-link :href="route('dashboard.kasir')">Kasir POS</x-responsive-nav-link>
            @endrole
            @role('keuangan')
                <x-responsive-nav-link :href="route('dashboard.keuangan')">Keuangan</x-responsive-nav-link>
            @endrole
            @role('eksekutif')
                <x-responsive-nav-link :href="route('dashboard.eksekutif')">EIS Eksekutif</x-responsive-nav-link>
            @endrole
        </div>

        <div class="pt-4 pb-1 border-t border-amber-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-amber-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profil Pengguna
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Keluar (Logout)
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
