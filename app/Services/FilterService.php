<?php
declare(strict_types=1);
namespace App\Services;
use App\DTO\FilterDTO;
use App\Http\Filters\ProductFilter;
class FilterService
{
    public function filter(FilterDTO $dto): ProductFilter
    {
        $params = [];
        if ($dto->price !== null && $dto->price !== '') {
            preg_match_all('/\d+/', $dto->price, $matches);
            $params['price'] = array_map('intval', $matches[0] ?? []);
            if ($dto->priceFilter !== null) {
                $params['price'][] = $dto->priceFilter;
            }
        }
        if ($dto->priceFilter !== null && !isset($params['price'])) {
            $params['price_filter'] = $dto->priceFilter;
        }

        return app()->make(ProductFilter::class, ['queryParams' => array_filter($params)]);
    }
}