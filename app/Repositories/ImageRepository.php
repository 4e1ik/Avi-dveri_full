<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{
    public function deleteImage(Image $image): bool
    {
        return $image->delete();
    }
}