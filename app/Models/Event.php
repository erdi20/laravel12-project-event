<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'registration_open_date',
        'registration_close_date',
        'location',
        'price',
        'max_participants',
        'current_participants',
        'status',
        'poster_img',
    ];

    // relasi
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function categories()
    {
        return $this
            ->belongsToMany(Category::class, 'event_categories')
            ->withTimestamps();  // Jika ingin menyimpan timestamp
    }

    // scope
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }

    public function scopeRegisterPaid(Builder $query): void
    {
        $query->withCount(['registrations as register_paid_count' => function ($q) {
            $q->where('status', 'paid');
        }]);
    }

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'registration_open_date' => 'datetime',
        'registration_close_date' => 'datetime',
    ];

    public function isFull(): bool
    {
        if ($this->max_participants === null) {
            return false;
        }

        return $this->registrations()->where('status', 'paid')->count() >= $this->max_participants;
    }

    public function hasRegistered(): bool
    {
        if (!Auth::check()) {
            return false;
        }

        return $this->registrations()->where('event_id', $this->id)->where('user_id', Auth::id())->exists();
    }
}
