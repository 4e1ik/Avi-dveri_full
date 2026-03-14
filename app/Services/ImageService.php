<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Image;
use App\Models\Product;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function __construct(
        public ImageRepository $imageRepository,
    ){}

    public function createImages(
        ?array $image,
        ?array $fitting_image_color,
        ?array $door_image_color,
        ?array $temp_description_image,
        ?array $temp_price,
        ?array $temp_price_per_set,
        ?Product $product
    ): void
    {
        $i = 0;
        // temp_* приходят с ключами id (при редактировании) или 0,1,2 (при создании) — приводим к индексам по порядку
        $temp_price_by_index = $temp_price !== [] ? array_values($temp_price) : [];
        $temp_price_per_set_by_index = $temp_price_per_set !== [] ? array_values($temp_price_per_set) : [];
        $temp_description_by_index = $temp_description_image !== [] ? array_values($temp_description_image) : [];
        $door_color_by_index = $door_image_color !== [] ? array_values($door_image_color) : [];
        $fitting_color_by_index = $fitting_image_color !== [] ? array_values($fitting_image_color) : [];

        foreach ($image as $file) {
            $data = [];
            $name = save_image($file, Image::query());
            $path = Storage::putFileAs('public/images', $file, $name);
            $data['image'] = $path;
            if ($door_color_by_index !== [] && isset($door_color_by_index[$i])) {
                $data['door_color'] = $door_color_by_index[$i];
            }
            if ($fitting_color_by_index !== [] && isset($fitting_color_by_index[$i])) {
                $data['fitting_color'] = $fitting_color_by_index[$i];
            }
            if ($temp_description_by_index !== [] && isset($temp_description_by_index[$i])) {
                $data['description_image'] = $temp_description_by_index[$i];
            }
            if ($temp_price_by_index !== [] && isset($temp_price_by_index[$i])) {
                $data['price'] = $temp_price_by_index[$i];
            }
            if ($temp_price_per_set_by_index !== [] && isset($temp_price_per_set_by_index[$i])) {
                $data['price_per_set'] = $temp_price_per_set_by_index[$i];
            }
            $i++;
            $product->images()->create($data);
        }
    }

    public function deleteImages(Product $product)
    {
        $images = $product->images()->get();
        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                Storage::delete($image->image);
                $this->imageRepository->deleteImage($image);
            }
        }
    }

    public function deleteOldImages(
        string $delete_images,
        Product $product
    ): void
    {
        $ids = array_filter(array_map('intval', explode(',', $delete_images)));
        foreach ($ids as $id) {
            $image = $product->images()->where('id', $id)->first();
            if ($image === null) continue;
            Storage::delete($image->image);
            $this->imageRepository->deleteImage($image);
        }
    }
}