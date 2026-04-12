<?php

namespace App\DTO\Manufacturer;

use App\Models\Manufacturer;

class UpdateManufacturerDTO
{
    public function __construct(
        public string $name,
        public string $slug,
        public string|null $type = 'general',
        public bool $active,
        public Manufacturer $manufacturer,
    ){}
}