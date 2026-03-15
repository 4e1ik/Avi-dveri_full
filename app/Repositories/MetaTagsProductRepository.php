<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\GetMetaTagsProductDTO;
use App\Models\MetaTemplateProduct;

class MetaTagsProductRepository
{
    public function __construct(

    ){}

    private const PRODUCTS = [
        'door' => [ //productType
            'entrance' => [ //type
                'Улица' => 'Входные двери - Улица', //function
                'Квартира' => 'Входные двери - Квартира', //function
                'Терморазрыв' => 'Входные двери - Терморазрыв' //function
            ],
            'interior' => [ //type
                'Экошпон' => 'Входные двери - Экошпон', //material
                'Полипропилен' => 'Входные двери - Полипропилен', //material
                'Эмаль' => 'Входные двери - Эмаль', //material
                'Скрытые' => 'Входные двери - Скрытые', //material
                'Массив' => 'Входные двери - Массив', //material
            ]
        ],
        'fitting' => [ //productType
            'Эконом' => 'Фурнитура - Эконом', //function
            'Стандарт' => 'Фурнитура - Стандарт', //function
            'Премиум' => 'Фурнитура - Премиум', //function
        ]
    ];

    public function getMetaTagsProductTemplate(GetMetaTagsProductDTO $dto): array
    {
        $material = $dto->material;
        $type = $dto->type;
        $productType = $dto->productType;
        $function = $dto->function;

        $products = self::PRODUCTS;
        $title = 'Шаблон';
        if (!$material && !$type) {
            $title = $products[$productType][$function] ?? $title;
        } elseif (!$material && $type) {
            $title = $products[$productType][$type][$function] ?? $title;
        } elseif (!$function && $type) {
            $title = $products[$productType][$type][$material] ?? $title;
        }

        $metaTemplateProduct = MetaTemplateProduct::where('productType', $productType)->where(function ($query) use ($type, $function, $material) {
            if ($type !== null) {
                $query->where('type', $type);
            }
            if ($function !== null) {
                $query->where('function', $function);
            }
            if ($material !== null) {
                $query->where('material', $material);
            }
        })->first();

        if (!$metaTemplateProduct)
        {
            $metaTemplateProduct = MetaTemplateProduct::create([
                'productType' => $productType,
                'type' => $type,
                'function' => $function,
                'material' => $material,
                'titleTemplate' => '',
                'descriptionTemplate' => ''
            ]);
        }

        return ['metaTemplateProduct' => $metaTemplateProduct, 'title' => $title];
    }
}
