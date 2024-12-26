<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class DoorFilter extends AbstractFilter
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
//        dd($value[2]);
        if ((array_key_exists(0, $value) && array_key_exists(1, $value)) && array_key_exists(2, $value)){
            $builder->whereBetween('price_per_canvas',  [$value[0], $value[1]])->orderBy('price_per_canvas',  $value[2]);
        } else {
            $builder->whereBetween('price_per_canvas',  [$value[0], $value[1]]);
        }

    }
}