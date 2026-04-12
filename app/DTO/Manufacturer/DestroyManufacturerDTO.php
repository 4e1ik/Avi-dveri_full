<?php

namespace App\DTO\Manufacturer;

use App\Models\Manufacturer;

class DestroyManufacturerDTO
{
    public function __construct(
        public Manufacturer $manufacturer,
    ){}
}