<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const PRICE = 'price';
    public const ACTIVE = 'active';
    public const FUNCTION = 'function';
    public const MATERIAL = 'material';

    public const TYPE = 'type';
    public const CATEGORY = 'category';
    public const MANUFACTURER_ID = 'manufacturer_id';
    public const LABEL = 'label';
    public const PRICE_FILTER = 'price_filter';

    protected function getCallbacks(): array
    {
        return [
            self::PRICE_FILTER => [$this, 'price_filter'],
            self::FUNCTION => [$this, 'function'],
            self::MATERIAL => [$this, 'material'],
            self::CATEGORY => [$this, 'category'],
            self::MANUFACTURER_ID => [$this, 'manufacturer_id'],
            self::LABEL => [$this, 'label'],
            self::TYPE => [$this, 'type'],
            self::ACTIVE => [$this, 'active'],
        ];
    }

    public function function(Builder $builder, $value)
    {
        $values = array_values(array_filter(
            is_array($value) ? $value : [$value],
            static fn ($v) => $v !== null && $v !== ''
        ));
        if ($values === []) {
            return;
        }

        $builder->where(function (Builder $q) use ($values) {
            $q->whereHas('door', fn (Builder $dq) => $dq->whereIn(self::FUNCTION, $values))
                ->orWhereHas('fitting', fn (Builder $fq) => $fq->whereIn(self::FUNCTION, $values));
        });
    }

    public function material(Builder $builder, $value)
    {
        $values = array_values(array_filter(
            is_array($value) ? $value : [$value],
            static fn ($v) => $v !== null && $v !== ''
        ));
        if ($values === []) {
            return;
        }

        $builder->whereHas('door', fn (Builder $q) => $q->whereIn(self::MATERIAL, $values));
    }

    public function category(Builder $builder, $value)
    {
        $builder->where(self::CATEGORY, $value);
    }

    public function active(Builder $builder)
    {
        $builder->where(self::ACTIVE, 1);
    }

    public function manufacturer_id(Builder $builder, $value)
    {
        $builder->whereIn(self::MANUFACTURER_ID, $value);
    }

    public function label(Builder $builder, $value)
    {
        $builder->where(function ($q) use ($value) {
            foreach ($value as $label) {
                $q->orWhereJsonContains(self::LABEL, $label);
            }
        });
    }

    public function type(Builder $builder, $value)
    {
        if ($value === null || $value === '' || $value === []) {
            return;
        }

        if (is_array($value)) {
            $values = array_values(array_filter($value, static fn ($v) => $v !== null && $v !== ''));
            if ($values === []) {
                return;
            }
            $builder->whereHas('door', fn (Builder $q) => $q->whereIn(self::TYPE, $values));
            return;
        }

        $builder->whereHas('door', fn (Builder $q) => $q->where(self::TYPE, $value));
    }

    public function price_filter(Builder $builder, $value)
    {
        $builder->orderBy('price', $value);
    }
}