<?php

namespace App\DTO\Manufacturer;

class CreateManufacturerDTO
{
    public function __construct(
        public string $name,
        public string $slug,
        public string|null $type = 'general',
        public bool $active,
    ){}
}