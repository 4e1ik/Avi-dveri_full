<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Door extends Model
{
    use HasFactory;
    use Filterable;

    protected $casts = [
        'size' => 'array', // Автоматическое преобразование JSON в массив
    ];

    protected $fillable = [
        'product_id',
        'size',
        'glass',
        'type',
        'function',
        'material',
    ];
}
