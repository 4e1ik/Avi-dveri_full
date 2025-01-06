<?php

function add_doors_colors()
{
    $colors = []; // Массив для хранения данных о файлах
    $directories = [
        public_path('avi-dveri_assets/admin/img/elporta'),
        public_path('avi-dveri_assets/admin/img/yrkas'),
    ];
    foreach ($directories as $directory) {
        // Проверяем, существует ли директория
        if (is_dir($directory)) {
            // Получаем список файлов в директории
            $files = scandir($directory);
            foreach ($files as $file) {
                // Пропускаем служебные записи "." и ".."
                if ($file === '.' || $file === '..') {
                    continue;
                }
                // Формируем полный путь к файлу
                $filePath = $directory . DIRECTORY_SEPARATOR . $file;
                // Проверяем, что это файл (а не директория)
                if (is_file($filePath)) {
                    $originalFileName = pathinfo($file, PATHINFO_FILENAME); // Имя файла без расширения
                    $fileName = str_replace('_', ' ', $originalFileName); // Заменяем "_" на пробелы
                    $colors[] = [
                        'name' => $fileName, // Имя файла без расширения
                        'value' => $originalFileName, // Имя файла c "_" вместо пробелов
                        'image' => asset(str_replace(public_path(), '', $filePath)), // Генерируем URL
                    ];
                }
            }
        }
    }

    return $colors;
}
