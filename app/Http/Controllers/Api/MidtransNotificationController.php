<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class MidtransNotificationController extends Controller
{
    public function handle(Request $request)
    {
        \Midtrans\Config::$serverKey = \config('midtrans.server_key');
        \Midtrans\Config::$isProduction = \config('midtrans.is_production');
        // Ambil data notifikasi
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $signatureKey = hash('sha512', $notification->order_id . $notification->status_code . $notification->gross_amount . config('midtrans.server_key'));
        if ($signatureKey != $notification->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        // Cari payment
        $payment = Payment::where('midtrans_order_id', $notification->order_id)->first();
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Update status pembayaran
        $payment->update([
            'transaction_status' => $notification->transaction_status,
            'payment_method' => $notification->payment_type,
            'transaction_time' => $notification->transaction_time,
            'json_response' => $payload,
        ]);

        // Update status pendaftaran
        if ($notification->transaction_status === 'settlement') {
            $payment->registration->update(['status' => 'paid']);
        } elseif ($notification->transaction_status === 'expire' || $notification->transaction_status === 'cancel') {
            $payment->registration->update(['status' => 'cancelled']);
        }

        return response()->json(['message' => 'Success'], 200);
    }
}
