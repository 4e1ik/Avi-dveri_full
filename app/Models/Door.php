<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use HasFactory;

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
}
