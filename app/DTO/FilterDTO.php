<?php

namespace App\DTO;

class FilterDTO
{
    public function __construct(

        public ?string $price = null,
        public ?string $priceFilter = null,

        public int $perPage,
    ) {}
}