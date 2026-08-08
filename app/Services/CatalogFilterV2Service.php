<?php

namespace App\Services;

use App\DTO\CatalogProductDTO;
use App\DTO\FilterDTO;
use App\Enums\ProductPerPageEnum;
use App\Helpers\ProductUrlHelper;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CatalogFilterV2Service
{
    public function __construct(
        public FilterService $filterService,
    ) {}

    public function filter(array $input): LengthAwarePaginator
    {
        $category = $input['category'];
        $priceFilter = isset($input['price_filter'])
            ? strtoupper((string) $input['price_filter'])
            : null;

        $filter = $this->filterService->filter(new FilterDTO(
            price: null,
            priceFilter: $priceFilter,
            category: $category,
            label: $input['label'] ?? null,
            manufacturer_id: $input['manufacturer_id'] ?? null,
            type: $input['type'] ?? null,
            function: $input['function'] ?? null,
            material: $input['material'] ?? null,
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $paginator = Product::query()
            ->where('active', true)
            ->where('category', $category)
            ->with(['images', $category, 'manufacturer'])
            ->filter($filter)
            ->latest()
            ->paginate(ProductPerPageEnum::DEFAULT->value);

        return $paginator->through(function (Product $product) {
            $firstImage = $product->images->first();

            return (new CatalogProductDTO(
                id: $product->id,
                slug: $product->slug,
                title: $product->title,
                price: $product->price !== null ? (float) $product->price : null,
                currency: $product->currency,
                availability: (bool) $product->availability,
                label: $product->label,
                rating_avg: $product->rating_avg !== null ? (float) $product->rating_avg : null,
                image: $firstImage ? asset('storage/' . $firstImage->image) : null,
                url: ProductUrlHelper::url($product),
            ))->toArray();
        });
    }
}
