<?php

namespace App\DTO;

class CatalogProductDTO
{
    public function __construct(
        public int $id,
        public ?string $slug,
        public string $title,
        public ?float $price,
        public ?string $currency,
        public bool $availability,
        public ?array $label,
        public ?float $rating_avg,
        public ?string $image,
        public ?string $url,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'price' => $this->price,
            'currency' => $this->currency,
            'availability' => $this->availability,
            'label' => $this->label,
            'rating_avg' => $this->rating_avg,
            'image' => $this->image,
            'url' => $this->url,
        ];
    }
}
