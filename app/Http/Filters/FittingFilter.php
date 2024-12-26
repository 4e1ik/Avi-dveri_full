<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class FittingFilter extends AbstractFilter
{

    public const FUNCTION = 'function';
    public const PRICE_PER_CANVAS = 'price_per_canvas';

    protected function getCallbacks(): array
    {
        return [
            self::FUNCTION => [$this, 'function'],
            self::PRICE_PER_CANVAS => [$this, 'price_per_canvas'],
        ];
    }

    public function function(Builder $builder, $value)
    {
        $builder->where('function', $value);
    }

    public function price_per_canvas(Builder $builder, $value)
    {
        $builder->where('function', $value);
    }
}