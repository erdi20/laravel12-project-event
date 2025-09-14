<x-layout.app>
    <main class="container mx-auto px-4 py-12">
        <!-- Filter Section -->
        <section class="mb-12 rounded-xl bg-gray-50 p-6 shadow-lg">
            <div class="flex flex-col items-center justify-between space-y-6 md:flex-row md:space-y-0">
                <h2 class="text-2xl font-bold text-gray-800">Acara Terdekat</h2>

                <div class="flex w-full flex-col space-y-4 md:w-auto md:flex-row md:space-x-4 md:space-y-0">

                    <div class="relative w-full md:w-48">
                        <select class="block w-full cursor-pointer rounded-xl bg-white px-4 py-3 pr-8 text-gray-700 shadow-sm focus:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-400">
                            <option>Pilih Tanggal</option>
                            <option>Hari Ini</option>
                            <option>Minggu Ini</option>
                            <option>Bulan Ini</option>
                        </select>

                    </div>

                    <div class="relative w-full md:w-48">
                        <select class="block w-full cursor-pointer rounded-xl bg-white px-4 py-3 pr-8 text-gray-700 shadow-sm focus:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-400">
                            <option>Urutkan</option>
                            <option>Terbaru</option>
                            <option>Terpopuler</option>
                            <option>Harga Terendah</option>
                            <option>Harga Tertinggi</option>
                        </select>

                    </div>


                </div>
            </div>
        </section>

        <!-- Events Grid -->
        <section>
            <div class="mb-8 flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-800">18 Acara Tersedia</h3>
                <div class="flex space-x-2">
                    <button class="rounded-lg bg-gray-200 p-2 hover:bg-gray-300">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </button>
                    <button class="rounded-lg bg-amber-500 p-2 text-white hover:bg-amber-600">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($events as $event)
                    <a href="/detail-event/{{ $event->slug }}" id="event-{{ $event->id }}" class="group block overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $event->poster_img) }}" alt="Event Poster" class="h-56 w-full object-cover">
                            {{-- <div class="absolute bottom-0 left-0 bg-amber-500 px-3 py-1 text-sm font-bold text-white">
                                Trending
                            </div> --}}
                            {{-- <button class="absolute right-4 top-4 rounded-full bg-white/90 p-2 text-gray-800 transition-colors duration-200 group-hover:bg-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button> --}}
                        </div>
                        <div class="p-5">
                            <div class="mb-2 flex items-center justify-between">
                                @foreach ($event->categories as $category)
                                    <span class="rounded-full bg-teal-100 px-3 py-1 text-xs font-semibold text-teal-800">{{ $category->name }}</span>
                                @endforeach
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-gray-900">{{ $event->name }}</h3>
                            <div class="mb-3 flex items-center text-sm text-gray-600">
                                <svg class="mr-2 h-5 w-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $event->location }}</span>
                            </div>
                            <div class="mb-4 flex items-center text-sm text-gray-600">
                                <svg class="mr-2 h-5 w-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $event->start_date->translatedFormat('d F Y') }} - {{ $event->end_date->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">{{ Number::currency($event->price, 'IDR') }}</span>
                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">Tersedia</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Categories Section -->
        {{-- <section class="mt-16">
            <h2 class="mb-8 text-2xl font-bold text-gray-800">Jelajahi Kategori</h2>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                <a href="#" class="flex flex-col items-center rounded-xl bg-white p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Musik</span>
                </a>
                <a href="#" class="flex flex-col items-center rounded-xl bg-white p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Workshop</span>
                </a>
                <a href="#" class="flex flex-col items-center rounded-xl bg-white p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-green-600">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Jaringan</span>
                </a>
                <a href="#" class="flex flex-col items-center rounded-xl bg-white p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-red-600">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Pameran</span>
                </a>
                <a href="#" class="flex flex-col items-center rounded-xl bg-white p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Seni</span>
                </a>
                <a href="#" class="flex flex-col items-center rounded-xl bg-white p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Olahraga</span>
                </a>
            </div>
        </section> --}}

        <!-- Newsletter Section -->
        {{-- <section class="mt-16 rounded-2xl bg-gradient-to-r from-teal-700 to-teal-500 p-8 text-white shadow-xl">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="mb-4 text-3xl font-bold">Dapatkan Info Event Terbaru</h2>
                <p class="mb-6 text-lg">Berlangganan newsletter kami untuk mendapatkan update event menarik langsung ke email Anda.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
                    <input type="email" placeholder="Alamat email Anda" class="flex-grow rounded-full px-6 py-3 text-gray-800 focus:outline-none ">
                    <button class="rounded-full bg-amber-500 px-8 py-3 font-bold text-white transition-all hover:bg-amber-600 hover:shadow-lg">
                        Berlangganan
                    </button>
                </div>
            </div>
        </section> --}}
    </main>
</x-layout.app>
