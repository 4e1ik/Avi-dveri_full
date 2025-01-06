<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Fitting extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'product_id',
        'function',
    ];
}
