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
    ];

    protected $fillable = [
        'title',
        'description',
        'price',
        'price_per_set',
        'category',
        'currency',
        'label',
        'active',
        'meta_title',
        'meta_description',
    ];

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
}
