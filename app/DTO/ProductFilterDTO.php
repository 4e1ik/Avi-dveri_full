<?php

namespace App\DTO;

class ProductFilterDTO
{
    public function __construct(
        public array $queryParams,    // price_filter и др.
        public string $category,      // door|fitting
        public ?string $doorType = null,
        public ?string $doorFunction = null,
        public ?string $doorMaterial = null,
        public ?string $fittingFunction = null,
        public int $perPage = 21,
    ) {}
}