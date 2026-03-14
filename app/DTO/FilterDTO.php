<?php

namespace App\DTO;

use App\Http\Requests\ProductRequest;

class FilterDTO
{
    public function __construct(
        // параметры фильтра из запроса
        public ?string $price = null,
        public ?string $priceFilter = null,
        // пагинация
        public int $perPage = 21,
    ) {}
}