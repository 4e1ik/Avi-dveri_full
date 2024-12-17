<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Fitting extends Model
{
    use HasFactory;

    protected $casts = [
        'label' => 'array', // Автоматическое преобразование JSON в массив
    ];

    protected $fillable = [
        'title',
        'description',
        'price',
        'price_per_set',
        'function',
        'label',
        'active',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
