<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\CreateProductDTO;
use App\DTO\UpdateProductDTO;
use App\Enums\ProductPerPageEnum;
use App\Helpers\SlugGenerateHelper;
use App\Models\MetaTemplateProduct;
use App\Models\Product;
use App\Repositories\DoorRepository;
use App\Repositories\FittingRepository;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductService
{
    public function __construct(
        public ImageService $imageService,
        public SlugGenerateHelper $slugGenerateHelper,
        public DoorRepository $doorRepository,
        public FittingRepository $fittingRepository,
        public ProductRepository $productRepository,
    ){}

    public function createProduct(CreateProductDTO $dto): string
    {
        $slug = $this->resolveSlugForCreate($dto->slug, $dto->title);

        $size = self::mergeSizes($dto);
        $routes = [];

        $productType = $dto->category;
        $type = $dto->type;
        $function = $dto->function;
        $material = $dto->material;

        $metaTemplate = MetaTemplateProduct::where('productType', $productType)
        ->where(function ($query) use ($function, $type, $material) {
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
            ->first();

        $titleTemplate = '';
        $descriptionTemplate = '';

        if ($metaTemplate) {
            $titleTemplate = str_replace('{title}', $dto->title, $metaTemplate->titleTemplate);
            $descriptionTemplate = str_replace('{title}', $dto->title, $metaTemplate->descriptionTemplate);
        }

        $product = $this->productRepository->createProduct(
            slug:               $slug,
            title:              $dto->title,
            description:        $dto->description,
            price:              $dto->price,
            category:           $dto->category,
            currency:           $dto->currency,
            label:              $dto->label ?? null,
            active:             $dto->active,
            meta_title:         $dto->meta_title ?? $titleTemplate,
            meta_description:   $dto->meta_description ?? $descriptionTemplate,
        );

        switch ($dto->category) {
            case 'door':

                $this->doorRepository->createDoor(
                    product_id: $product->id,
                    size:       $size,
                    glass:      $dto->glass,
                    type:       $type,
                    function:   $function,
                    material:   $material,
                );

                $routes = [
                    'entrance' => route('admin_entrance_doors'),
                    'interior' => route('admin_interior_doors'),
                ];
                break;

            case 'fitting':
                $this->fittingRepository->createFitting(
                    product_id: $product->id,
                    function:   $function,
                );

                $routes = [
                    'fitting' => route('admin_fittings'),
                ];
                break;
            default:
                throw new \InvalidArgumentException("Unknown category: {$dto->category}");
        }

        if (!empty($dto->image) && $dto->image !== []) {
            $this->imageService->createImages(
                image:                  $dto->image,
                fitting_image_color:    $dto->fitting_image_color ?? [],
                door_image_color:       $dto->door_image_color ?? [],
                temp_description_image: $dto->temp_description_image ?? [],
                temp_price:             $dto->temp_price ?? [],
                temp_price_per_set:     $dto->temp_price_per_set ?? [],
                product:                $product
            );
        }

        $type = $dto->type ?? 'fitting';
        if (!isset($routes[$type])) {
            $type = array_key_first($routes);
        }
        return $routes[$type];
    }

    public function updateProduct(UpdateProductDTO $dto, Product $product): string
    {
        $size = self::mergeSizes($dto);
        $routes = [];

        switch ($product->category) {
            case 'door':
                $this->doorRepository->updateDoor(
                    door:       $product->door,
                    product_id: $product->id,
                    size:       $size,
                    glass:      $dto->glass,
                    type:       $dto->type,
                    function:   $dto->function,
                    material:   $dto->material,
                );
                $routes = [
                    'entrance' => route('admin_entrance_doors'),
                    'interior' => route('admin_interior_doors'),
                ];
                break;

            case 'fitting':
                $this->fittingRepository->updateFitting(
                    fitting:    $product->fitting,
                    product_id: $product->id,
                    function:   $dto->function,
                );
                $routes = [
                    'fitting' => route('admin_fittings'),
                ];
                break;
            default:
                throw new \InvalidArgumentException("Unknown category: {$product->category}");
        }

        if ($dto->door_image_color !== [] && is_array($dto->door_image_color)) {
            foreach ($dto->door_image_color as $id => $color) {
                $product->images()->where('id', $id)->update(['door_color' => $color]);
            }
        }

        if ($dto->fitting_image_color !== [] && is_array($dto->fitting_image_color)) {
            foreach ($dto->fitting_image_color as $id => $color) {
                $product->images()->where('id', $id)->update(['fitting_color' => $color]);
            }
        }

        if ($dto->temp_description_image !== [] && is_array($dto->temp_description_image)) {
            foreach ($dto->temp_description_image as $id => $desc) {
                $product->images()->where('id', $id)->update(['description_image' => $desc]);
            }
        }

        if ($dto->temp_price !== [] && is_array($dto->temp_price)) {
            foreach ($dto->temp_price as $id => $price) {
                $product->images()->where('id', $id)->update(['price' => $price]);
            }
        }

        if ($dto->temp_price_per_set !== [] && is_array($dto->temp_price_per_set)) {
            foreach ($dto->temp_price_per_set as $id => $pricePerSet) {
                $product->images()->where('id', $id)->update(['price_per_set' => $pricePerSet]);
            }
        }

        if (!empty($dto->image) && $dto->image !== []) {
            $this->imageService->createImages(
                image:                  $dto->image,
                fitting_image_color:    $dto->fitting_image_color ?? [],
                door_image_color:       $dto->door_image_color ?? [],
                temp_description_image: $dto->temp_description_image ?? [],
                temp_price:             $dto->temp_price ?? [],
                temp_price_per_set:     $dto->temp_price_per_set ?? [],
                product:                $product
            );
        }

        if ($dto->delete_images !== null)
        {
            $this->imageService->deleteOldImages(
                delete_images:  $dto->delete_images,
                product:        $product
            );
        }

        $slug = $this->resolveSlugForUpdate(
            $dto->slug,
            $dto->title ?? $product->title,
            $product
        );

        $this->productRepository->updateProduct(
            slug:               $slug,
            title:              $dto->title ?? $product->title,
            description:        $dto->description ?? $product->description,
            price:              $dto->price ?? $product->price,
            price_per_set:      $dto->price_per_set ?? $product->price_per_set,
            category:           $dto->category ?? $product->category,
            currency:           $dto->currency ?? $product->currency,
            label:              $dto->label ?? $product->label,
            active:             (bool) $dto->active ?? (bool) $product->active,
            meta_title:         $dto->meta_title ?? $product->meta_title,
            meta_description:   $dto->meta_description ?? $product->meta_description,
            product:            $product
        );

        $type = $dto->type ?? 'fitting';
        if (!isset($routes[$type])) {
            $type = array_key_first($routes);
        }
        return $routes[$type];
    }

    public function deleteProduct(Product $product)
    {
        $this->productRepository->deleteProduct(product: $product);
    }

    public function productsCounter(LengthAwarePaginator $products): array
    {
        $perPage = ProductPerPageEnum::DEFAULT->value;
        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        return [
            'start' =>      $start,
            'end' =>        $end,
            'totalCount' => $totalCount
        ];
    }

    private function resolveSlugForCreate(?string $input, string $title): string
    {
        $slug = trim((string) $input);
        if ($slug === '') {
            $slug = $this->slugGenerateHelper->slug($title, false);
        }
        if ($slug === '') {
            $slug = 'product-' . bin2hex(random_bytes(4));
        }
        if (Product::where('slug', $slug)->exists()) {
            throw ValidationException::withMessages([
                'slug' => 'Такой slug уже используется. Выберите другой.',
            ]);
        }
        return $slug;
    }

    private function resolveSlugForUpdate(?string $input, string $title, Product $product): string
    {
        $slug = trim((string) $input);
        if ($slug === '') {
            $slug = $this->slugGenerateHelper->slug($title, false);
        }
        if ($slug === '') {
            $slug = 'product-' . $product->id;
        }
        if (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            throw ValidationException::withMessages([
                'slug' => 'Такой slug уже используется. Выберите другой.',
            ]);
        }
        return $slug;
    }

    private function mergeSizes(CreateProductDTO|UpdateProductDTO $dto): array
    {
        if (property_exists($dto, 'size_diff') && property_exists($dto, 'size_standard')) {
            $size = array_merge($dto->size_standard ?? [], $dto->size_diff ?? []);
        } elseif (property_exists($dto, 'size_diff') && ($dto->size_diff !== null)) {
            $size = $dto->size_diff;
        } elseif (property_exists($dto, 'size_standard') && ($dto->size_standard !== null)) {
            $size = $dto->size_standard;
        } else {
            $size = [];
        }

        return array_values(array_filter($size, fn($v) => $v !== '' && $v !== null));
    }

}