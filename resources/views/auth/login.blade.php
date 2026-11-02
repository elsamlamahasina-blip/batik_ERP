<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Notifikasi & Bantuan Login Gmail -->
    <div class="mb-5 p-3.5 bg-amber-50 border border-amber-200 rounded-lg text-xs text-amber-900">
        <div class="font-bold flex items-center text-amber-800 mb-1">
            <svg class="w-4 h-4 mr-1.5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            Dukungan Login Gmail Aktif
        </div>
        <p class="leading-relaxed">
            Anda dapat langsung menggunakan email <strong>@gmail.com</strong> apa saja (cth: <code class="bg-amber-100 text-amber-900 px-1 py-0.5 rounded font-mono font-bold">admin@gmail.com</code> atau Gmail pribadi Anda). Sistem otomatis memberikan hak akses <strong>Administrator</strong>.
        </p>
    </div>

    <!-- Pilihan Cepat Akun Demo -->
    <div class="mb-5">
        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-2">
            Klik Cepat untuk Memilih Akun:
        </label>
        <div class="grid grid-cols-2 gap-2 text-xs">
            <button type="button" onclick="fillCredentials('admin@gmail.com', 'password')" class="flex items-center justify-between p-2 rounded-md bg-stone-50 border border-stone-200 hover:border-amber-500 hover:bg-amber-50 text-stone-700 transition">
                <span class="font-bold text-amber-800">&bull; Admin (Gmail)</span>
                <span class="text-[10px] bg-red-100 text-red-700 px-1 rounded">Admin</span>
            </button>
            <button type="button" onclick="fillCredentials('kasir@sibatik.lan', 'password')" class="flex items-center justify-between p-2 rounded-md bg-stone-50 border border-stone-200 hover:border-teal-500 hover:bg-teal-50 text-stone-700 transition">
                <span class="font-bold text-teal-800">&bull; Kasir POS</span>
                <span class="text-[10px] bg-teal-100 text-teal-700 px-1 rounded">Kasir</span>
            </button>
            <button type="button" onclick="fillCredentials('gudang@sibatik.lan', 'password')" class="flex items-center justify-between p-2 rounded-md bg-stone-50 border border-stone-200 hover:border-amber-500 hover:bg-amber-50 text-stone-700 transition">
                <span class="font-bold text-amber-800">&bull; Gudang</span>
                <span class="text-[10px] bg-amber-100 text-amber-800 px-1 rounded">Gudang</span>
            </button>
            <button type="button" onclick="fillCredentials('eksekutif@sibatik.lan', 'password')" class="flex items-center justify-between p-2 rounded-md bg-stone-50 border border-stone-200 hover:border-purple-500 hover:bg-purple-50 text-stone-700 transition">
                <span class="font-bold text-purple-800">&bull; Eksekutif</span>
                <span class="text-[10px] bg-purple-100 text-purple-700 px-1 rounded">EIS</span>
            </button>
        </div>
    </div>

    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Alamat Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', 'admin@gmail.com')" required autofocus autocomplete="username" placeholder="cth: admin@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex justify-between items-center">
                <x-input-label for="password" value="Kata Sandi (Password)" />
                <span class="text-xs text-stone-400 font-mono">default: password</span>
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            value="password"
                            required autocomplete="current-password"
                            placeholder="Ketik kata sandi Anda" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amber-600 shadow-sm focus:ring-amber-500" name="remember" checked>
                <span class="ms-2 text-sm text-stone-600">Ingat Saya</span>
            </label>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-3 bg-amber-600 hover:bg-amber-500 border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-wider transition shadow-md hover:shadow-lg focus:outline-none">
                Masuk ke Sistem (Log in) &rarr;
            </button>
        </div>
    </form>

    <script>
        function fillCredentials(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
</x-guest-layout>
