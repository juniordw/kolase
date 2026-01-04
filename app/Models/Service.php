<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'short_description',
        'full_description',
        'features',
        'target_clients',
        'cases_handled',
        'duration_minutes',
        'price',
        'price_note',
        'icon',
        'image',
        'available_types',
        'is_active',
        'is_featured',
        'badge',
        'badge_color',
        'launch_date',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'target_clients' => 'array',
        'cases_handled' => 'array',
        'available_types' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'launch_date' => 'date',
        'price' => 'decimal:2',
    ];

    /**
     * Get consultations for this service
     */
    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    /**
     * Get testimonials for this service
     */
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    /**
     * Scope to get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get featured services
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to order by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
