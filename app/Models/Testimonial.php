<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    protected $fillable = [
        'service_id',
        'client_name',
        'client_photo',
        'rating',
        'testimonial',
        'service_date',
        'is_featured',
        'is_approved',
        'sort_order',
    ];

    protected $casts = [
        'service_date' => 'date',
        'is_featured' => 'boolean',
        'is_approved' => 'boolean',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
