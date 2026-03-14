<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Enums\ProductPerPageEnum;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function __construct(
        public ImageService $imageService,
    ){}

    public function createProduct(
        ?string $title,
        ?string $description,
        ?float  $price,
        ?string $category,
        ?string $currency,
        ?array  $label,
        ?bool   $active,
        ?string $meta_title,
        ?string $meta_description,
    )
    {
        return Product::create([
            'title' =>              $title,
            'description' =>        $description,
            'price' =>              $price,
            'category' =>           $category,
            'currency' =>           $currency,
            'label' =>              $label,
            'active' =>             $active,
            'meta_title' =>         $meta_title,
            'meta_description' =>   $meta_description,
        ]);
    }

    public function updateProduct(
        ?string $title,
        ?string $description,
        ?float  $price,
        ?float  $price_per_set,
        ?string $category,
        ?string $currency,
        ?array  $label,
        ?bool   $active,
        ?string $meta_title,
        ?string $meta_description,
        Product $product
    )
    {
        return $product->update([
            'title' =>              $title,
            'description' =>        $description,
            'price' =>              $price,
            'price_per_set' =>      $price_per_set,
            'category' =>           $category,
            'currency' =>           $currency,
            'label' =>              $label,
            'active' =>             $active ?? true,
            'meta_title' =>         $meta_title,
            'meta_description' =>   $meta_description,
        ]);
    }

    public function deleteProduct(Product $product)
    {
        $this->imageService->deleteImages(product: $product);
        return $product->delete();
    }

    public function getProducts($filter, string $productType, string $function = null, string $material = null, string $type = null): LengthAwarePaginator
    {
        return Product::where('active', [1])
            ->whereHas($productType, function ($query) use ($function, $type, $material) {
                if ($type !== null) {
                    $query->where('type', $type);
                }
                if ($material !== null) {
                    $query->where('material', $material);
                }
                if ($function !== null) {
                    $query->where('function', $function);
                }
            })
            ->with(['images', $productType])
            ->filter($filter)
            ->latest()
            ->paginate(ProductPerPageEnum::DEFAULT->value);


    }
}
