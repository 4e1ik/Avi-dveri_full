<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use HasFactory;

    protected $casts = [
        'size' => 'array', // Автоматическое преобразование JSON в массив
        'label' => 'array', // Автоматическое преобразование JSON в массив
    ];

    protected $fillable = [
        'title',
        'description',
        'price_per_canvas',
        'price_per_set',
        'size',
        'glass',
        'type',
        'function',
        'material',
        'label',
        'active',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
