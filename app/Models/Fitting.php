<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitting extends Model
{
    use HasFactory;
    use Filterable;

    protected $casts = [
        'label' => 'array', // Автоматическое преобразование JSON в массив
    ];

    protected $fillable = [
        'title',
        'description',
        'price',
        'price_per_set',
        'currency',
        'function',
        'label',
        'active',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
