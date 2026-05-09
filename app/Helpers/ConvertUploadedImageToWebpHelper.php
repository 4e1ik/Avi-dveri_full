<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

final class ConvertUploadedImageToWebpHelper
{
    public function __construct(
        private readonly ImageManager $imageManager,
    ) {
    }

    public function storeAsWebp(UploadedFile $file, string $fileName, int $quality = 85): string
    {
        $relativePath = 'public/images/' . $fileName;
        $absolutePath = Storage::path($relativePath);
        File::ensureDirectoryExists(\dirname($absolutePath));

        $image = $this->imageManager->read($file);
        $image->toWebp($quality)->save($absolutePath);

        return $relativePath;
    }
}
