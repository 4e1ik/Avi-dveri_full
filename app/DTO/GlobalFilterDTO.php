<?php

namespace App\DTO;

class GlobalFilterDTO
{
    public function __construct(
        public string       $category,
        public array|null   $label,
        public array|null   $manufacturer_id,
        public string|null  $type,
        public array|null   $function,
        public array|null   $material,
    ) {}
}