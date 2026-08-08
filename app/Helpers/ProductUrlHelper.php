<?php

namespace App\Helpers;

use App\Models\Product;

class ProductUrlHelper
{
    public static function url(Product $product): ?string
    {
        $params = self::routeParams($product);
        if ($params === null) {
            return null;
        }

        return route('product_page', $params);
    }

    public static function routeParams(Product $product): ?array
    {
        $entranceDoors = [
            'Улица' => 'ulica',
            'Квартира' => 'kvartira',
            'Терморазрыв' => 'termorazryv',
        ];

        $interiorDoorsRoutes = array_map(
            static fn (array $material): string => $material['slug'],
            config('door_materials')
        );

        $fittingsRoutes = [
            'Эконом' => 'ekonom',
            'Стандарт' => 'standart',
            'Премиум' => 'premium',
        ];

        if ($product->category === 'door' && $product->door) {
            $type = $product->door->type;
            $head = $type === 'interior' ? 'mezhkomnatnye-dveri' : 'vhodnye-dveri';

            if ($type === 'interior') {
                $direction = $interiorDoorsRoutes[$product->door->material] ?? null;
            } else {
                $direction = $entranceDoors[$product->door->function] ?? null;
            }

            if ($direction === null) {
                return null;
            }

            return [
                'head' => $head,
                'direction' => $direction,
                'product' => $product,
            ];
        }

        if ($product->category === 'fitting' && $product->fitting) {
            $direction = $fittingsRoutes[$product->fitting->function] ?? null;
            if ($direction === null) {
                return null;
            }

            return [
                'head' => 'furnitura',
                'direction' => $direction,
                'product' => $product,
            ];
        }

        return null;
    }
}
