<?php

namespace App\Services;

use App\Models\Fitting;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class FittingService
{
    public function storeFitting($data, $files, $hasImage)
    {
        $fitting = Fitting::create($data);

        $data['fitting_id'] = $fitting->id;

        $i = 0;
        if ($hasImage) {
            foreach ($files as $file) {
                $name = save_image($file, Image::query());
                $path = Storage::putFileAs('public/images', $file, $name); // Даем путь к этому файлу
                $data['image'] = $path;
                if (array_key_exists('temp_description_image', $data)){
                    $data['description_image'] = $data['temp_description_image'][$i];
                }
                $i++;
                $fitting->images()->create($data);
            }
        }
    }
}