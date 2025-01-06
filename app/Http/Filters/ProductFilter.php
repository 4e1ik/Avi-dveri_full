<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const PRICE = 'price';
    public const FUNCTION = 'function';
    public const PRICE_FILTER = 'price_filter';

    protected function getCallbacks(): array
    {
        return [
            self::FUNCTION => [$this, 'function'],
            self::PRICE => [$this, 'price'],
        ];
    }

    public function function(Builder $builder, $value)
    {
        $builder
            ->with(['door', 'fitting'])
            ->where(function ($query) use ($value) {
                $query->whereHas('door', function ($q) use ($value) {
                    $q->where('function', $value); // Условие для таблицы doors
                })
                    ->orWhereHas('fitting', function ($q) use ($value) {
                        $q->where('function', $value); // Условие для таблицы fittings
                    });
            });

    }

    public function price(Builder $builder, $value)
    {
        if ((array_key_exists(0, $value) && array_key_exists(1, $value)) && array_key_exists(2, $value)){
            $builder->with(['door','fitting'])
                ->whereBetween('price',  [$value[0], $value[1]])
                ->orderBy('price',  $value[2]);
        } else {
            $builder->with(['door','fitting'])
                ->whereBetween('price',  [$value[0], $value[1]]);
        }

    }
}