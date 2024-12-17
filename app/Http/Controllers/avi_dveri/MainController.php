<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Models\Door;
use App\Models\Fitting;

class MainController extends Controller
{
    function index()
    {
        return view('avi-dveri.avi-dveri.index');
    }

    function catalog()
    {
        return view('avi-dveri.avi-dveri.catalog');
    }

    function payment_and_delivery()
    {
        return view('avi-dveri.avi-dveri.payment_and_delivery');
    }

    function accessories()
    {
        $fittings = Fitting::whereIn('active', [1])->with(['images'])->latest()->paginate(9);
        $count = $fittings->count();
        $label_distance = 15;
        return view('avi-dveri.avi-dveri.accessories', compact('fittings', 'label_distance', 'count'));
//        return view('avi-dveri.avi-dveri.accessories');
    }

    function entrance_doors()
    {
        $products = Door::whereIn('active', [1])->with(['images'])->latest();
        $doors = $products->where('type', 'entrance')->paginate(9);
        $count = $products->count();
        $label_distance = 15;
        return view('avi-dveri.avi-dveri.entrance_doors', compact('doors', 'label_distance', 'count'));
    }

    function interior_doors()
    {
        $products = Door::whereIn('active', [1])->with(['images'])->latest();
        $doors = $products->where('type', 'interior')->paginate(9);
        $count = $products->count();
        $label_distance = 15;
        return view('avi-dveri.avi-dveri.interior_doors', compact('doors', 'label_distance', 'count'));
    }
    function show_product($id)
    {
        $products = collect();
        $doors = Door::where('id', $id)->latest()->get();
        $fittings = Fitting::where('id', $id)->latest()->get();
        $products = $products->merge($doors)->merge($fittings);
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
                            'value' => $originalFileName, // Имя файла без расширения
                            'image' => asset(str_replace(public_path(), '', $filePath)), // Генерируем URL
                        ];
                    }
                }
            }
        }
//        dd($products);
        return view('avi-dveri.avi-dveri.product_page', compact('products', 'colors'));
    }

}
