<header class="bg-gradient-to-r from-teal-800 to-teal-600 px-6 py-4 text-white shadow-lg">
    <div class="container mx-auto flex flex-col items-center justify-between md:flex-row">
        <div class="mb-4 flex w-full items-center justify-between md:mb-0 md:w-auto">
            <div class="flex items-center space-x-8">
                <a href="{{ url('/') }}" class="bg-gradient-to-r from-amber-300 to-amber-200 bg-clip-text text-3xl font-bold tracking-tighter text-transparent">EventKu</a>
                <nav class="hidden space-x-8 text-lg md:flex">
                    <a href="{{ url('/events') }}" class="{{ request()->is('events') ? 'text-amber-300' : '' }} font-medium transition-colors duration-200 hover:text-amber-200">Acara</a>
                    <a href="{{ url('/my-registrations') }}" class="{{ request()->is('my-registrations') ? 'text-amber-300' : '' }} font-medium transition-colors duration-200 hover:text-amber-200">Riwayat</a>
                </nav>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden" id="mobile-menu-button">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <div class="mx-auto w-full max-w-2xl flex-grow px-4 md:w-auto md:px-0">
            <form action="{{ route('events.index') }}" method="GET" class="mb-6 md:mb-0">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari event dan atraksi di sini..." class="w-full rounded-full bg-white py-3 pl-12 pr-6 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400" value="{{ request('search') }}">
                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </form>
        </div>

        <div class="mt-4 flex items-center space-x-6 md:mt-0" id="auth-buttons">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center rounded-md border border-transparent bg-teal-700 px-4 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-amber-400">
                                        <div class="flex items-center">
                                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            {{ Str::limit(Auth::user()->name, 10) }}
                                        </div>

                                        <div class="ms-1">
                                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="rounded-md bg-teal-700 py-1 text-white shadow-lg">
                                        <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-3 text-sm text-white transition-colors duration-150 hover:bg-teal-600">
                                            <i class="fas fa-user-circle mr-2"></i>{{ __('Profile') }}
                                        </x-dropdown-link>

                                        <x-dropdown-link href="{{ url('/my-registrations') }}" class="block px-4 py-3 text-sm text-white transition-colors duration-150 hover:bg-teal-600">
                                            <i class="fas fa-history mr-2"></i>{{ __('Riwayat Pendaftaran') }}
                                        </x-dropdown-link>

                                        <div class="my-1 border-t border-teal-600"></div>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit()" class="block px-4 py-3 text-sm text-white transition-colors duration-150 hover:bg-teal-600">
                                                <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <!-- Mobile auth menu (hidden on desktop) -->
                        <div class="sm:hidden">
                            <a href="{{ route('profile.edit') }}" class="mr-4 text-amber-100 hover:text-amber-300">
                                <i class="fas fa-user-circle text-xl"></i>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-amber-100 hover:text-amber-300">
                                    <i class="fas fa-sign-out-alt text-xl"></i>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-2 font-semibold text-white shadow-md transition-all duration-300 hover:from-amber-600 hover:to-amber-700 hover:shadow-lg">
                            Masuk
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-2 font-semibold text-white shadow-md transition-all duration-300 hover:from-amber-600 hover:to-amber-700 hover:shadow-lg">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div class="hidden border-t border-teal-700 pt-4 md:hidden" id="mobile-menu">
        <div class="container mx-auto space-y-3 pb-4">
            <a href="{{ url('/events') }}" class="{{ request()->is('events') ? 'bg-teal-700 text-amber-300' : '' }} block rounded-lg px-4 py-2 font-medium transition-colors duration-200 hover:bg-teal-700">
                <i class="fas fa-calendar-alt mr-2"></i>Acara
            </a>
            <a href="{{ url('/my-registrations') }}" class="{{ request()->is('my-registrations') ? 'bg-teal-700 text-amber-300' : '' }} block rounded-lg px-4 py-2 font-medium transition-colors duration-200 hover:bg-teal-700">
                <i class="fas fa-history mr-2"></i>Riwayat
            </a>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle functionality
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>
