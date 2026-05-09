<?php

function save_image($file, $image)
{

    $name = $file->getClientOriginalName();

    // Хешируем имя файла; на диске всегда WebP
    $hashedName = hash('md5', $name) . '.webp';

    // Проверяем наличие совпадений в базе данных
    $tmp_arr = [];
    $existingImages = $image->pluck('image')->toArray();
    foreach ($existingImages as $existingImage) {
        $tmp_name = explode('/', $existingImage);
        $tmp_arr[] = end($tmp_name);
    }

    $i = 1;
    while (in_array($hashedName, $tmp_arr)) {
        $i++;
        $hashedName = hash('md5', $name . '(' . $i . ')') . '.webp';
    }

    return $hashedName;
}
