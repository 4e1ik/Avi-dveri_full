<?php

namespace App\Services;

use App\DTO\GlobalFilterDTO;
use App\Enums\ProductPerPageEnum;
use App\Models\Product;

class GlobalFilterService
{
    public function filter(GlobalFilterDTO $dto)
    {
        return Product::with([$dto->category, 'manufacturer', 'images'])
            ->where('active', true)
            ->whereHas($dto->category, function ($query) use ($dto) {
                if ($dto->type !== null) {
                    $query->where('type', $dto->type);
                }
                if ($dto->material !== null) {
                    $query->whereIn('material', $dto->material);
                }
                if ($dto->function !== null) {
                    $query->whereIn('function', $dto->function);
                }
            })
            ->where('category', $dto->category)
            ->when($dto->label !== null, function ($query) use ($dto) {
                $query->where(function ($q) use ($dto) {
                    foreach ($dto->label as $label) {
                        $q->orWhereJsonContains('label', $label);
                    }
                });
            })
            ->when($dto->manufacturer_id !== null,
                fn ($q) => $q->whereIn('manufacturer_id', $dto->manufacturer_id)
            )
            ->paginate(ProductPerPageEnum::DEFAULT->value);
    }
}