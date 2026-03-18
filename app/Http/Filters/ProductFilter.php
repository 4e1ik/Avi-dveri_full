<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const PRICE = 'price';
    public const FUNCTION = 'function';
    public const MATERIAL = 'material';
    public const PRICE_FILTER = 'price_filter';

    protected function getCallbacks(): array
    {
        return [
            self::PRICE_FILTER => [$this, 'price_filter'],
        ];
    }

    public function price_filter(Builder $builder, $value)
    {
        $builder->orderBy('price', $value);
    }
}