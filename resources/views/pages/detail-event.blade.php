<x-layout.app>
    <section class="container mx-auto px-4 py-12">
        <!-- Breadcrumb -->
        {{-- <div class="mb-6 flex items-center text-sm text-gray-600">
            <a href="#" class="transition-colors hover:text-amber-500">Home</a>
            <svg class="mx-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="#" class="transition-colors hover:text-amber-500">Konser</a>
            <svg class="mx-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-gray-800">Java Jazz Festival 2025</span>
        </div> --}}

        <!-- Event Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-4">
                @foreach ($event->categories as $item)
                    <span class="rounded-full bg-purple-100 px-4 py-1 text-sm font-semibold text-purple-800">{{ $item->name }}</span>
                @endforeach
                {{-- <span class="flex items-center text-sm text-gray-600">
                    <svg class="mr-1 h-4 w-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                    </svg>
                    1.2k Disukai
                </span> --}}
            </div>
            <h1 class="mt-4 text-4xl font-bold text-gray-900">{{ $event->name }}</h1>
            <div class="mt-2 flex items-center text-lg text-gray-600">
                <svg class="mr-2 h-5 w-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ $event->location }}</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <div class="lg:w-2/3">
                <div class="mb-8 overflow-hidden rounded-2xl bg-white shadow-lg">
                    <div class="relative h-96 w-full bg-gray-200">
                        <img src="{{ asset('storage/' . $event->poster_img) }}" alt="Poster Lomba {{ $event->name }}" class="h-full w-full object-cover">
                        {{-- <button class="absolute right-4 top-4 rounded-full bg-white/90 p-3 text-gray-800 hover:bg-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button> --}}
                    </div>
                </div>

                <div class="mb-8 rounded-2xl bg-white p-8 shadow-lg">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Detail Lomba</h2>

                    <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Tanggal Pelaksanaan</h3>
                                <p class="text-gray-600">
                                    {{ $event->start_date->translatedFormat('d F Y') }}
                                    @if ($event->start_date->translatedFormat('d F Y') != $event->end_date->translatedFormat('d F Y'))
                                        - {{ $event->end_date->translatedFormat('d F Y') }}
                                    @endif
                                </p>
                                {{-- <p class="text-gray-600">{{ $event->start_date->format('H:i') }} - {{ $event->end_date->format('H:i') }} WIB</p> --}}
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2h2V1a1 1 0 112 0v2h2a2 2 0 012 2v1h-1a1 1 0 000 2h1v2h-1a1 1 0 000 2h1v2h-1a1 1 0 000 2h1v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1H3a1 1 0 010-2h1v-2H3a1 1 0 010-2h1V8H3a1 1 0 010-2h1V5zm9 3H7v1h6V8zm0 3H7v1h6v-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Pendaftaran</h3>
                                <p class="text-gray-600">{{ $event->registration_open_date->translatedFormat('d F Y, H:i') }}</p>
                                <p class="text-gray-600">Hingga {{ $event->registration_close_date->translatedFormat('d F Y, H:i') }} WIB</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Lokasi</h3>
                                <p class="text-gray-600">{{ $event->location }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10v6a2 2 0 002-2V6a2 2 0 00-2-2H4zm12 8a2 2 0 012-2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4a2 2 0 012-2h2v4a2 2 0 002 2h4zm-4-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Biaya Pendaftaran</h3>
                                <p class="text-gray-600">
                                    @if ($event->price > 0)
                                        Rp. {{ number_format($event->price, 0, ',', '.') }}
                                    @else
                                        Gratis
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.497 3.497 0 0115 11v-1a1 1 0 10-2 0v1a3.497 3.497 0 01-2.25 3.094A5.972 5.972 0 0010 15v3h6zM3 17a1 1 0 102 0v-1a1 1 0 10-2 0v1zM9 17a1 1 0 102 0v-1a1 1 0 10-2 0v1zM11 17a1 1 0 102 0v-1a1 1 0 10-2 0v1z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Kuota Peserta</h3>
                                <p class="text-gray-600">
                                    {{-- <p>Jumlah Peserta Paid: {{ $event->register_paid_count }}</p> --}}
                                    {{-- @if ($event->max_participants) --}}
                                    {{ $event->register_paid_count }} dari {{ $event->max_participants }}
                                    {{-- @else
                                        Tidak Terbatas
                                    @endif --}}
                                </p>
                            </div>
                        </div>

                        {{-- <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Penyelenggara</h3>
                                <p class="text-gray-600">{{ $event->organizer_name ?? 'N/A' }}</p>
                                <p class="text-gray-600">Terverifikasi</p>
                            </div>
                        </div> --}}
                    </div>

                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-gray-900">Deskripsi Lomba</h3>
                        <div class="prose max-w-none text-gray-600">
                            <p>{!! nl2br(e($event->description)) !!}</p>
                        </div>
                    </div>

                    <div>
                        {{-- <h3 class="mb-3 text-xl font-semibold text-gray-900">Persyaratan dan Ketentuan</h3> --}}
                        {{-- <ul class="space-y-2 text-gray-600">
                @foreach (json_decode($event->requirements) as $requirement)
                    <li class="flex items-start">
                        <svg class="mr-2 mt-1 h-5 w-5 flex-shrink-0 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $requirement }}</span>
                    </li>
                @endforeach
            </ul> --}}
                        {{-- <p class="text-gray-600">Lihat deskripsi lomba untuk detail persyaratan dan ketentuan lebih lanjut.</p> --}}
                    </div>
                </div>
            </div>
            <!-- Left Column -->
            {{-- <div class="lg:w-2/3">
                <!-- Event Gallery -->
                <div class="mb-8 overflow-hidden rounded-2xl bg-white shadow-lg">
                    <div class="relative h-96 w-full bg-gray-200">
                        <img src="{{ asset('storage/' . $event->poster_img) }}" alt="Event Poster" class="h-full w-full object-cover">
                        <button class="absolute right-4 top-4 rounded-full bg-white/90 p-3 text-gray-800 hover:bg-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-4 gap-1 bg-gray-100 p-1">
                        <div class="h-24 cursor-pointer bg-gray-300 transition-opacity hover:opacity-80">
                            <img src="https://placehold.co/200x125/FAC898/000000?text=1" alt="Thumbnail 1" class="h-full w-full object-cover">
                        </div>
                        <div class="h-24 cursor-pointer bg-gray-300 transition-opacity hover:opacity-80">
                            <img src="https://placehold.co/200x125/D4B483/000000?text=2" alt="Thumbnail 2" class="h-full w-full object-cover">
                        </div>
                        <div class="h-24 cursor-pointer bg-gray-300 transition-opacity hover:opacity-80">
                            <img src="https://placehold.co/200x125/EACDC2/000000?text=3" alt="Thumbnail 3" class="h-full w-full object-cover">
                        </div>
                        <div class="h-24 cursor-pointer bg-gray-300 transition-opacity hover:opacity-80">
                            <img src="https://placehold.co/200x125/B5EAD7/000000?text=4" alt="Thumbnail 4" class="h-full w-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Event Details -->
                <div class="mb-8 rounded-2xl bg-white p-8 shadow-lg">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Detail Lomba</h2>

                    <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Tanggal & Waktu</h3>
                                <p class="text-gray-600">{{ $event->start_date->translatedFormat('d F Y') }}</p>
                                <p class="text-gray-600">18:00 - 23:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Lokasi</h3>
                                <p class="text-gray-600">Jakarta Convention Center</p>
                                <p class="text-gray-600">Jl. Gatot Subroto, Jakarta Selatan</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Kategori</h3>
                                <p class="text-gray-600">Konser Musik</p>
                                <p class="text-gray-600">Festival</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="mr-4 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900">Organizer</h3>
                                <p class="text-gray-600">Java Jazz Foundation</p>
                                <p class="text-gray-600">Terverifikasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-gray-900">Deskripsi Acara</h3>
                        <div class="prose max-w-none text-gray-600">
                            <p>Java Jazz Festival 2025 kembali menghadirkan pengalaman musik jazz terbaik di Indonesia. Acara tahunan ini akan menampilkan lebih dari 200 artis lokal dan internasional di 10 panggung berbeda selama 3 hari penuh.</p>
                            <p class="mt-4">Nikmati pertunjukan dari musisi jazz legendaris dunia bersama bintang-bintang jazz Indonesia terbaik. Selain konser, festival ini juga akan menyajikan workshop musik, pameran alat musik, dan berbagai kuliner khusus.</p>
                            <p class="mt-4">Lineup artis yang akan tampil:</p>
                            <ul class="mt-2 list-inside list-disc">
                                <li>Diana Krall</li>
                                <li>Snarky Puppy</li>
                                <li>Tommy Emmanuel</li>
                                <li>Indra Lesmana</li>
                                <li>Andien</li>
                                <li>Dan banyak lagi</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <h3 class="mb-3 text-xl font-semibold text-gray-900">Persyaratan Acara</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <svg class="mr-2 mt-1 h-5 w-5 flex-shrink-0 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Usia minimal 12 tahun</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-1 h-5 w-5 flex-shrink-0 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Dilarang membawa makanan dan minuman dari luar</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-1 h-5 w-5 flex-shrink-0 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Wajib menunjukkan e-tiket atau tiket fisik</span>
                            </li>
                        </ul>
                    </div>
                </div>


            </div> --}}

            <!-- Right Column (Ticket Purchase) -->
            <div class="mt-8 lg:mt-0 lg:w-1/3">
                <div class="sticky top-4 rounded-2xl bg-white p-6 shadow-lg">
                    <h3 class="mb-4 text-lg font-bold text-gray-900">Daftar Lomba</h3>

                    <form action="{{ route('registrations.store') }}" method="POST">
                        @csrf

                        <!-- Hidden: Event ID -->
                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-amber-500" placeholder="Masukkan nama lengkap" value="{{ Auth::user()->name }}">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-amber-500" placeholder="contoh@email.com" value="{{ Auth::user()->email }}">
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                            <input type="text" id="phone_number" name="phone_number" required class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-amber-500" placeholder="081234567890">
                        </div>

                        <!-- Submit Button -->
                        @if ($isFull)
                            <div class="text-center">
                                <p class="text-danger-600">Pendaftaran sudah penuh</p>
                            </div>
                        @elseif ($hasRegistered)
                            <div class="text-center">
                                <p class="text-success-600">Anda sudah terdaftar untuk event ini.</p>
                                <p class="text-sm text-gray-500">
                                    Cek status pendaftaran Anda melalui email konfirmasi.
                                </p>
                            </div>
                        @else
                            <button type="submit" class="w-full rounded-full bg-gradient-to-r from-amber-500 to-amber-600 py-3 font-bold text-white shadow-lg transition hover:from-amber-600 hover:to-amber-700 hover:shadow-xl">
                                Daftar & Lanjut ke Pembayaran
                            </button>
                        @endif
                    </form>

                    <div class="mt-4 text-center text-sm text-gray-500">
                        <p>Tiket akan dikirim via email dalam 1x24 jam</p>
                        <p>Pembatalan dapat dilakukan maksimal 7 hari sebelum lomba</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
