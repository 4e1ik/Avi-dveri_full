<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Filterable;

    protected $casts = [
        'label' => 'array', // Автоматическое преобразование JSON в массив
        'size' => 'array', // Автоматическое преобразование JSON в массив
        'additional_colors' => 'array', // Автоматическое преобразование JSON в массив
        'availability' => 'boolean',
        'rating_avg' => 'float',
    ];

    protected $fillable = [
        'slug',
        'title',
        'description',
        'price',
        'price_per_set',
        'category',
        'currency',
        'label',
        'active',
        'additional_colors',
        'meta_title',
        'meta_description',
        'manufacturer_id',
        'availability',
        'rating_avg',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function door()
    {
        return $this->hasOne(Door::class, 'product_id', 'id');
    }

    public function fitting()
    {
        return $this->hasOne(Fitting::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
