<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reviewable_id',
        'reviewable_type',
        'name',
        'rating',
        'comment',
        'is_hidden',
        'fake',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_hidden' => 'boolean',
        'fake' => 'boolean',
    ];

    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeVisible($query)
    {
        return $query->where('is_hidden', false);
    }
}
