<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'event_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        // Cari event yang didaftar
        $event = Event::findOrFail($request->event_id);
        if (Auth::check()) {
            $registrationData['user_id'] = Auth::id();
        }
        // $registration = Registration::create($registrationData);
        // 2. Simpan Data Pendaftar ke Tabel 'registrations'
        $registration = Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'unique_number' => Str::random(10),  // Buat kode unik
            'status' => 'pending_payment',
            'registration_date' => now()
        ]);

        // Update jumlah peserta di tabel events
        $event->increment('current_participants');

        // 3. Inisiasi Pembayaran Midtrans Snap
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $midtransOrderId = 'EVENT-' . $event->id . '-' . Str::random(8) . '-' . $registration->id;
        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => $event->price,
            ],
            'customer_details' => [
                'first_name' => $registration->name,
                'email' => $registration->email,
                'phone' => $registration->phone_number,
            ],
            'item_details' => [
                [
                    'id' => $event->id,
                    'price' => $event->price,
                    'quantity' => 1,
                    'name' => $event->name,
                ]
            ],
        ];

        // Dapatkan snap token dari Midtrans
        $snapToken = '';
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // 4. Simpan Data Pembayaran Awal ke Tabel 'payments'
        $payment = Payment::create([
            'registration_id' => $registration->id,
            'midtrans_order_id' => $midtransOrderId,
            'gross_amount' => $event->price,
            'transaction_status' => 'pending',
            'currency' => 'IDR',
        ]);

        // Hubungkan payment_id ke registration
        $registration->update(['payment_id' => $payment->id]);

        // 5. Kirim snap token ke frontend untuk menampilkan popup
        return view('payments.payment_page', compact('snapToken', 'registration'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function history()
    {
        $allRegistrations = Registration::HistoryUser()->get();
        $registrations = $allRegistrations->groupBy('event_id')->map->first();
        return \view('pages.history', compact('registrations'));
    }
}
