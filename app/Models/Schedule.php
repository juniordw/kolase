<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'time',
        'end_time',
        'type',
        'max_bookings',
        'current_bookings',
        'is_available',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'end_time' => 'datetime',
        'is_available' => 'boolean',
    ];

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)
            ->whereColumn('current_bookings', '<', 'max_bookings');
    }

    public function getIsFullAttribute()
    {
        return $this->current_bookings >= $this->max_bookings;
    }
}
