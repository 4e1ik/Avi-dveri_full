<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'image',
        'door_color',
        'fitting_color',
        'description_image',
        'price',
        'price_per_set',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
