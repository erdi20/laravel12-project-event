<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'event_categories';

    protected $fillable = [
        'event_id',
        'category_id',
    ];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
