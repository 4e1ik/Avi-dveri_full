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
//            self::FUNCTION => [$this, 'function'],
//            self::MATERIAL => [$this, 'material'],
            self::PRICE_FILTER => [$this, 'price_filter'],
        ];
    }

//    public function function(Builder $builder, $value)
//    {
//        $builder
//            ->with(['door', 'fitting'])
//            ->where(function ($query) use ($value) {
//                $query->whereHas('door', function ($q) use ($value) {
//                    $q->where('function', $value); // Условие для таблицы doors
//                })
//                    ->orWhereHas('fitting', function ($q) use ($value) {
//                        $q->where('function', $value); // Условие для таблицы fittings
//                    });
//            });
//
//    }
//
//    public function material(Builder $builder, $value)
//    {
//        $builder
//            ->with(['door', 'fitting'])
//            ->where(function ($query) use ($value) {
//                $query->whereHas('door', function ($q) use ($value) {
//                    $q->where('material', $value); // Условие для таблицы doors
//                })
//                    ->orWhereHas('fitting', function ($q) use ($value) {
//                        $q->where('material', $value); // Условие для таблицы fittings
//                    });
//            });
//
//    }

    public function price_filter(Builder $builder, $value)
    {
//        dd($value);
        $builder->with(['door', 'fitting'])->orderBy('price', $value);
    }
}