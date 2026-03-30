<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\UpdateMetaTagsProductDTO;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class MetaTagsProductService
{
    public function __construct(

    ){}

    public function updateMetTagsProductTemplate(UpdateMetaTagsProductDTO $dto)
    {
        return DB::transaction(function () use ($dto) {
            $dto->metaTemplateProduct->update([
                'titleTemplate' =>          $dto->titleTemplate,
                'descriptionTemplate' =>    $dto->descriptionTemplate,
            ]);

            $productType = $dto->productType;
            $type = $dto->type;
            $function = $dto->function;
            $material = $dto->material;

            $products = Product::whereHas($productType, function ($query) use ($function, $type, $material) {
                if ($type !== null) {
                    $query->where('type', $type);
                }
                if ($material !== null) {
                    $query->where('material', $material);
                }
                if ($function !== null) {
                    $query->where('function', $function);
                }
            })->get();

            $rows = [];
            foreach ($products as $product) {
                $rows[] = [
                    'id' =>                 $product->id,
                    'slug' =>               $product->slug,
                    'meta_title' =>         str_replace('{title}', $product->title, $dto->metaTemplateProduct->titleTemplate ?? ''),
                    'meta_description' =>   str_replace('{title}', $product->title, $dto->metaTemplateProduct->descriptionTemplate ?? ''),
                    'updated_at' =>         now(),
                ];
            }
            if (!empty($rows)) {
                Product::upsert($rows, ['id'], ['meta_title', 'meta_description', 'updated_at']);
            }

            return true;
        });
    }

}