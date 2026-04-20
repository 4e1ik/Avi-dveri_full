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
        if ($dto->category !== null && !isset($params['category'])) {
            $params['category'] = $dto->category;
        }
        if ($dto->manufacturer_id !== null && !isset($params['manufacturer_id'])) {
            $params['manufacturer_id'] = $dto->manufacturer_id;
        }
        if ($dto->label !== null && !isset($params['label'])) {
            $params['label'] = $dto->label;
        }
        if ($dto->type !== null && !isset($params['type'])) {
            $params['type'] = $dto->type;
        }
        if ($dto->function !== null && !isset($params['function'])) {
            $params['function'] = $dto->function;
        }
        if ($dto->material !== null && !isset($params['material'])) {
            $params['material'] = $dto->material;
        }

        return app()->make(ProductFilter::class, ['queryParams' => array_filter($params)]);
    }
}