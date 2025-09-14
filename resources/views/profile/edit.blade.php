<x-app-layout>
    <div class="relative w-full overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 py-16 px-4 text-white sm:px-6 lg:px-8">
        <div class="relative z-10 mx-auto max-w-4xl text-center">
            <div class="relative mx-auto mb-6 inline-block">
                @if (auth()->user()->profile_photo_path)
                    <img src="{{ Storage::url(auth()->user()->profile_photo_path) }}" alt="Foto Profil" class="h-32 w-32 rounded-full border-4 border-white object-cover shadow-lg" />
                @else
                    <div class="flex h-32 w-32 items-center justify-center rounded-full bg-gradient-to-br from-purple-400 to-blue-500 text-5xl font-bold uppercase text-white shadow-lg">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                @endif
            </div>

            <h1 class="mb-2 text-4xl font-bold">{{ auth()->user()->name }}</h1>
            <p class="mb-4 text-xl">{{ auth()->user()->email }}</p>

            <div class="mt-8 flex justify-center space-x-8">
                <div class="text-center">
                    <div class="text-2xl font-bold">{{ auth()->user()->created_at->diffForHumans() }}</div>
                    <div class="text-sm text-blue-200">Bergabung Sejak</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold">{{ auth()->user()->updated_at->diffForHumans() }}</div>
                    <div class="text-sm text-blue-200">Terakhir Diperbarui</div>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 bg-black opacity-30"></div>
    </div>

    <div class="relative z-20 -mt-24 px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-2">
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg">
                        <div class="flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4">
                            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                <svg class="mr-2 h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi Profil
                            </h3>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg">
                        <div class="flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-amber-50 to-orange-50 px-6 py-4">
                            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                <svg class="mr-2 h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Ubah Kata Sandi
                            </h3>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="space-y-6 lg:col-span-1">
                    <div class="overflow-hidden rounded-2xl border-2 border-red-200 bg-white shadow-lg">
                        <div class="border-b border-red-200 bg-gradient-to-r from-red-50 to-pink-50 px-6 py-4">
                            <h3 class="flex items-center text-lg font-semibold text-red-900">
                                <svg class="mr-2 h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                Hapus Akun
                            </h3>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>

                    {{-- <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white p-6 shadow-lg">
                        <h3 class="mb-4 flex items-center text-lg font-semibold text-gray-900">
                            <svg class="mr-2 h-5 w-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Riwayat Event
                        </h3>
                        <p class="text-sm text-gray-600">
                            Lihat event yang telah Anda daftarkan.
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
