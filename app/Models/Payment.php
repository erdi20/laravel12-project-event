<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'registration_id',
        'midtrans_order_id',
        'gross_amount',
        'payment_method',
        'transaction_status',
        'transaction_time',
        'currency',
        'json_response'
    ];

    public function Registration()
    {
        return $this->belongsTo(Registration::class);
    }

    protected $casts = [
        'transaction_time' => 'datetime',
        'json_response' => 'json',
    ];
}
