<?php

namespace Database\Seeders;

use App\Helpers\SlugGenerateHelper;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    private array $names = [
        'Металюр',
        'Магнабел',
        'Гарда',
        'Межкомнатные двери Elporta',
        'Входные двери Elporta',
        'Staller',
        'Luxor',
        'Промет',
        'Входные двери Юркас',
        'Межкомнатные двери Юркас',
        'Юни',
        'Динмар',
        'Emalex',
        'Baguette',
        'Contur',
        'Stark',
        'ПМЦ',
        'Геометрика',
        'Вилейка',
        'Входная дверь со стеклом',
        'Межкомнатная дверь со стеклом',
        'Межкомнатная глухая дверь',
        'Офисные двери',
        'Двери в ванную и туалет',
        'Двери на кухню',
        'Двери в тамбур',
        'Двери с шумоизоляцией',
        'Двери внутреннего открывания',
        'Двери с зеркалом',
    ];

    public function run(): void
    {
        $slugger = app(SlugGenerateHelper::class);

        foreach ($this->names as $name) {
            $slug = $slugger->slug($name);
            if (in_array($slug, Tag::RESERVED_SLUGS, true)) {
                $slug .= '-tag';
            }

            Tag::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'is_visible' => false,
                ]
            );
        }
    }
}
