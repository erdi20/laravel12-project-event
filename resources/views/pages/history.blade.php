<x-layout.app>

    <div class="py-12">
        <h2 class="mb-[15px] text-center text-3xl font-bold leading-tight text-gray-800">
            {{ __('Riwayat Pendaftaran Saya') }}
        </h2>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">

                    @if ($registrations->isEmpty())
                        <p class="text-center text-gray-500">Anda belum mendaftar untuk event apa pun.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="text-center">
                                    <th class="bg-gray-50 px-6 py-3 text-xs font-medium uppercase tracking-wider text-gray-500">Nama Event</th>
                                    <th class="bg-gray-50 px-6 py-3 text-xs font-medium uppercase tracking-wider text-gray-500">Tanggal Daftar</th>
                                    <th class="bg-gray-50 px-6 py-3 text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                                    <th class="bg-gray-50 px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-center">
                                @foreach ($registrations as $registration)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $registration->event->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $registration->created_at->format('d M Y') }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <span
                                                class="@if ($registration->status == 'paid') bg-green-100 text-green-800
                                                @elseif($registration->status == 'pending_payment') bg-yellow-100 text-yellow-800
                                                @else bg-red-100 text-red-800 @endif inline-flex rounded-full px-2 text-xs font-semibold leading-5">
                                                {{ ucfirst($registration->status) }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                            @if ($registration->status == 'pending_payment')
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Lihat Pembayaran</a>
                                            @else
                                                <p class="text-center">tidak ada pembayaran</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-layout.app>
