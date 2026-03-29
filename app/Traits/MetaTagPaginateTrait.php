<?php

namespace App\Traits;

trait MetaTagPaginateTrait
{
    public function metaTitle(int $page): string
    {
        return 'Страница '.$page;
    }

    public function metaDescription(int $page): string
    {
        return 'Страница '.$page.'. Полный каталог смотрите на нашем сайте.';
    }
}
