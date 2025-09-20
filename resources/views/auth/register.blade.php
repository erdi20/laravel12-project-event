<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-purple-50 p-6">
        <div class="w-full max-w-md space-y-8">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Header -->
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">Buat Akun Baru</h2>
                <p class="mt-2 text-sm text-gray-600">Isi detail Anda untuk mendaftar</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-700">
                        Nama Lengkap
                    </label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="w-full rounded-xl border border-gray-300 px-4 py-3 shadow-sm transition-all duration-200 hover:shadow-md focus:border-transparent focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan nama lengkap Anda" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700">
                        Alamat Email
                    </label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="w-full rounded-xl border border-gray-300 px-4 py-3 shadow-sm transition-all duration-200 hover:shadow-md focus:border-transparent focus:ring-2 focus:ring-indigo-500" placeholder="nama@example.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700">
                        Kata Sandi
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full rounded-xl border border-gray-300 px-4 py-3 shadow-sm transition-all duration-200 hover:shadow-md focus:border-transparent focus:ring-2 focus:ring-indigo-500" placeholder="Kata sandi minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-700">
                        Konfirmasi Kata Sandi
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full rounded-xl border border-gray-300 px-4 py-3 shadow-sm transition-all duration-200 hover:shadow-md focus:border-transparent focus:ring-2 focus:ring-indigo-500" placeholder="Ketik ulang kata sandi Anda" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="flex w-full items-center justify-center rounded-xl border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm transition-all duration-200 hover:scale-[1.02] hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:scale-[0.98]">
                        Daftar
                    </button>
                </div>
            </form>

            <!-- Divider Line -->
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="bg-white px-2 text-gray-500">Atau daftar dengan</span>
                </div>
            </div>

            <!-- Google Register Button -->
            <div>
                <a href="{{ route('google.login') }}" class="flex w-full items-center justify-center gap-3 rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-sm transition-all duration-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                    </svg>
                    Daftar dengan Google
                </a>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 transition-colors hover:text-indigo-500">
                        Masuk sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
