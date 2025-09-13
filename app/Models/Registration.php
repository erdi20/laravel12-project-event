<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';

    protected $fillable = [
        'user_id',
        'event_id',
        'name',
        'email',
        'phone_number',
        'unique_number',
        'registration_date',
        'status',
        'payment_id'
    ];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }

    public function Payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'registration_date' => 'datetime',
    ];
}
