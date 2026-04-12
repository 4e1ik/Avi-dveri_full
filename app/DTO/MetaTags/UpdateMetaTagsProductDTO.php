<?php

namespace App\DTO\MetaTags;

use App\Models\MetaTemplateProduct;

class UpdateMetaTagsProductDTO
{
    public function __construct(
        public string  $productType,
        public ?string $type = null,
        public ?string $function = null,
        public ?string $material = null,
        public string  $titleTemplate = '',
        public string  $descriptionTemplate = '',
        public MetaTemplateProduct $metaTemplateProduct
    ) {}
}