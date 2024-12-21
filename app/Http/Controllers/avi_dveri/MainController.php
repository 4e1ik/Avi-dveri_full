<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Http\Filters\DoorFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Door;
use App\Models\Fitting;

class MainController extends Controller
{

    function index()
    {
        $results = collect();
        $doors = Door::whereIn('active', [1])->with(['images'])->whereJsonContains('label', 'hit')->inRandomOrder()->get();
        $fittings = Fitting::whereIn('active', [1])->with(['images'])->whereJsonContains('label', 'hit')->inRandomOrder()->get();
        $results = $results->merge($fittings)->merge($doors);
        $label_distance = 15;
//        dd($results);
        return view('avi-dveri.avi-dveri.index', compact('results', 'label_distance'));
    }

    function catalog()
    {
        return view('avi-dveri.avi-dveri.catalog');
    }

    function payment_and_delivery()
    {
        return view('avi-dveri.avi-dveri.payment_and_delivery');
    }

    function accessories(FilterRequest $request)
    {
        $data = $request->all();
        if (array_key_exists('price_per_canvas', $data)){
            preg_match_all('/\d+/', $data['price_per_canvas'], $matches);
            $data['price_per_canvas'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price_per_canvas'], $data['price_filter']);
            }
        }

        $filter = app()->make(DoorFilter::class, ['queryParams' => array_filter($data)]);
        $perPage = 9;
        $fittings = Fitting::whereIn('active', [1])->with(['images'])->filter($filter)->latest()->paginate($perPage);
        $totalCount  = $fittings->total();
        $currentPage = $fittings->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        $label_distance = 15;

        $economyTotalCount = Fitting::where('function', 'economy')->count();
        $standardTotalCount = Fitting::where('function', 'standard')->count();
        $premiumTotalCount = Fitting::where('function', 'premium')->count();

        return view('avi-dveri.avi-dveri.accessories', compact(
            'fittings',
            'label_distance',
            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
        ));
    }

    function entrance_doors(FilterRequest $request)
    {
        $data = $request->all();
        if (array_key_exists('price_per_canvas', $data)){
            preg_match_all('/\d+/', $data['price_per_canvas'], $matches);
            $data['price_per_canvas'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price_per_canvas'], $data['price_filter']);
            }
        }

        $filter = app()->make(DoorFilter::class, ['queryParams' => array_filter($data)]);

        $products = Door::whereIn('active', [1])->with(['images'])->latest();
        $perPage = 9;
        $doors = $products->where('type', 'entrance')->filter($filter)->paginate($perPage);

        $totalCount  = $doors->total();
        $currentPage = $doors->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        $label_distance = 15;

        $streetTotalCount = Door::where('function', 'street')->count();
        $apartmentTotalCount = Door::where('function', 'apartment')->count();
        $thermal_breakTotalCount = Door::where('function', 'thermal_break')->count();

        return view('avi-dveri.avi-dveri.entrance_doors', compact(
            'doors',
            'label_distance',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
        ));
    }

    function interior_doors(FilterRequest $request)
    {
        $data = $request->all();
        if (array_key_exists('price_per_canvas', $data)){
            preg_match_all('/\d+/', $data['price_per_canvas'], $matches);
            $data['price_per_canvas'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price_per_canvas'], $data['price_filter']);
            }
        }

        $filter = app()->make(DoorFilter::class, ['queryParams' => array_filter($data)]);
        $products = Door::whereIn('active', [1])->with(['images'])->latest();
        $perPage = 9;
        $doors = $products->where('type', 'interior')->filter($filter)->paginate($perPage);


        $totalCount  = $doors->total();
        $currentPage = $doors->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        $label_distance = 15;

        $eco_veneerTotalCount = Door::where('function', 'eco-veneer')->count();
        $polypropyleneTotalCount = Door::where('function', 'polypropylene')->count();
        $enamelTotalCount = Door::where('function', 'enamel')->count();
        $hiddenTotalCount = Door::where('function', 'hidden')->count();
        $solidTotalCount = Door::where('function', 'solid')->count();

        return view('avi-dveri.avi-dveri.interior_doors', compact(
            'doors',
            'label_distance',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
        ));
    }

    function show_product($class ,$id)
    {
//        dd($class);
        $products = collect();
        $doors = Door::where('id', $id)->latest()->get();
        $fittings = Fitting::where('id', $id)->latest()->get();
        if ($class == 'App\Models\Door'){
            $products = $products->merge($doors);
        } else {
            $products = $products->merge($fittings);
        }
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
