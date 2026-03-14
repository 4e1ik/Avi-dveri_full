<?php

namespace App\DTO;

use App\Http\Requests\ProductRequest;

class CreateProductDTO
{
    public function __construct(
        // product
        public string  $title,
        public ?string $description = null,
        public ?float  $price = null,
        public string  $category,
        public ?string $currency = null,
        public array   $label,
        public bool    $active,
        public ?array  $size = null,
        public ?string $meta_title = null,
        public ?string $meta_description = null,

        // door / fitting domain
        public ?string $type = null,
        public ?string $function = null,
        public ?string $material = null,
        public ?string $glass = null,

        // image
        public ?array $image = [],
        public ?array $fitting_image_color = [],
        public ?array $door_image_color = [],
        public ?array $temp_description_image = [],
        public ?array $temp_price = [],
        public ?array $temp_price_per_set = [],
    ){}
}