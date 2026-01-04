<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Consultation extends Model
{
    protected $fillable = [
        'booking_code',
        'service_id',
        'schedule_id',
        'status',
        'consultation_type',
        'scheduled_date',
        'scheduled_time',
        'mother_name',
        'mother_phone',
        'mother_email',
        'mother_city',
        'mother_address',
        'feeding_status',
        'pregnancy_trimester',
        'baby_name',
        'baby_birthdate',
        'baby_age_months',
        'baby_weight',
        'concerns',
        'notes',
        'admin_notes',
        'confirmed_at',
        'completed_at',
        'cancelled_at',
        'cancellation_reason',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'referrer',
    ];

    protected $casts = [
        'scheduled_date' => 'date',
        'scheduled_time' => 'datetime',
        'baby_birthdate' => 'date',
        'confirmed_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($consultation) {
            if (empty($consultation->booking_code)) {
                $consultation->booking_code = 'KLS-' . strtoupper(Str::random(8));
            }
        });
    }

    /**
     * Get the service for this consultation
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the schedule for this consultation
     */
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    /**
     * Scope for pending consultations
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for confirmed consultations
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope for today's consultations
     */
    public function scopeToday($query)
    {
        return $query->whereDate('scheduled_date', today());
    }

    /**
     * Get baby age in months
     */
    public function getBabyAgeAttribute()
    {
        if (!$this->baby_birthdate) {
            return null;
        }

        return $this->baby_birthdate->diffInMonths(now());
    }
}
