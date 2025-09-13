<header class="bg-gradient-to-r from-teal-800 to-teal-600 px-6 py-4 text-white shadow-lg">
    <div class="container mx-auto flex flex-col items-center justify-between md:flex-row">
        <div class="mb-4 flex items-center space-x-8 md:mb-0">
            <a href="{{ url('/') }}" class="bg-gradient-to-r from-amber-300 to-amber-200 bg-clip-text text-3xl font-bold tracking-tighter text-transparent">EventKu</a>
            <nav class="hidden space-x-8 text-lg md:flex">
                <a href="{{ url('/events') }}" class="font-medium transition-colors duration-200 hover:text-amber-200">Acara</a>
                <a href="{{ url('/my-registrations') }}" class="font-medium transition-colors duration-200 hover:text-amber-200">Riwayat</a>
            </nav>
        </div>

        <div class="mx-auto w-full max-w-2xl flex-grow px-4 md:w-auto md:px-0">
            <div class="relative">
                <input type="text" placeholder="Cari event dan atraksi di sini..." class="w-full rounded-full bg-white py-3 pl-12 pr-6 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400">
                <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div class="mt-4 flex items-center space-x-6 md:mt-0">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center rounded-md border border-transparent bg-teal-600 px-3 py-2 text-sm font-medium leading-4 text-amber-100 transition duration-150 ease-in-out hover:bg-teal-600 hover:text-amber-50 focus:outline-none focus:ring-2 focus:ring-amber-400">
                                        <div>{{ Str::limit(Auth::user()->name, 10) }}</div>

                                        <div class="ms-1">
                                            <svg class="h-4 w-4 fill-current text-amber-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content" class="bg-teal-800">
                                    <div class="bg-teal-800 text-white">
                                        <x-dropdown-link :href="route('profile.edit')" class="block w-full px-4 py-3 text-left text-sm text-white transition-colors duration-150 hover:bg-teal-600 hover:text-amber-50">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit()" class="block w-full px-4 py-3 text-left text-sm text-white transition-colors duration-150 hover:bg-teal-600 hover:text-amber-50">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-8 py-2.5 font-semibold text-white shadow-md transition-all duration-300 hover:from-amber-600 hover:to-amber-700 hover:shadow-lg">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-8 py-2.5 font-semibold text-white shadow-md transition-all duration-300 hover:from-amber-600 hover:to-amber-700 hover:shadow-lg">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
            {{-- @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:ms-6 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center rounded-md border border-transparent bg-teal-600 px-3 py-2 text-sm font-medium leading-4 text-amber-100 transition duration-150 ease-in-out hover:bg-teal-600 hover:text-amber-50 focus:outline-none focus:ring-2 focus:ring-amber-400">
                                <div>{{ Str::limit(Auth::user()->name, 10) }}</div>

                                <div class="ms-1">
                                    <svg class="h-4 w-4 fill-current text-amber-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content" class="bg-teal-800">
                            <div class="bg-teal-800 text-white">
                                <x-dropdown-link :href="route('profile.edit')" class="block w-full px-4 py-3 text-left text-sm text-amber-100 transition-colors duration-150 hover:bg-teal-600 hover:text-amber-50">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit()" class="block w-full px-4 py-3 text-left text-sm text-amber-100 transition-colors duration-150 hover:bg-teal-600 hover:text-amber-50">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth --}}
        </div>
    </div>
</header>
