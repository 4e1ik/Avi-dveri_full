<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'price_per_set',
        'label',
        'active',
    ];

    public function images(){
        return $this->hasMany(Fitting::class, 'fitting_id', 'id');
    }
}
