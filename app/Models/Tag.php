<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public const RESERVED_SLUGS = [
        'vhodnye-dveri',
        'mezhkomnatnye-dveri',
        'furnitura',
    ];

    protected $fillable = [
        'name',
        'slug',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    public function scopeWithAssignedActiveProducts(Builder $query): Builder
    {
        return $query->whereHas('products', static function (Builder $q) {
            $q->where('active', true);
        });
    }

    public static function forCatalogDisplay()
    {
        return static::query()
            ->visible()
            ->withAssignedActiveProducts()
            ->orderBy('name')
            ->get();
    }
}
