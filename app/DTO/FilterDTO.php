<?php

namespace App\DTO;

class FilterDTO
{
    public function __construct(

        public ?string      $price = null,
        public ?string      $priceFilter = null,
        public string       $category,
        public array|null   $label,
        public array|null   $manufacturer_id,
        public string|null  $type,
        public array|null   $function,
        public array|null   $material,

        public int $perPage,
    ) {}
}