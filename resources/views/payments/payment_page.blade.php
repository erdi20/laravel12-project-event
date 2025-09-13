<x-layout.app>
    <div class="flex h-screen items-center justify-center bg-gray-100">
        <div class="rounded-lg bg-white p-8 text-center shadow-md">
            <h1 class="mb-4 text-2xl font-bold">Pendaftaran Berhasil!</h1>
            <p class="mb-6 text-gray-700">Silakan selesaikan pembayaran untuk mengkonfirmasi pendaftaran Anda.</p>
            <p class="mb-4 text-sm text-gray-500">Order ID: {{ $registration->payment->midtrans_order_id }}</p>
            <button id="pay-button" class="w-full rounded-full bg-blue-600 py-3 font-bold text-white shadow-lg transition hover:bg-blue-700 hover:shadow-xl">
                Bayar Sekarang
            </button>
        </div>
    </div>
    <x-slot:script>
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                // Panggil Midtrans Snap
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        alert("Pembayaran berhasil!");
                        window.location.href = "{{ url('/') }}";
                    },
                    onPending: function(result) {
                        alert("Menunggu pembayaran Anda.");
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal!");
                    },
                    onClose: function() {
                        alert("Anda menutup popup pembayaran tanpa menyelesaikan pembayaran.");
                    }
                });
            };
        </script>
    </x-slot:script>
</x-layout.app>
