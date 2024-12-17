<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoorRequest;
use App\Models\Door;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

class DoorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

        return view('avi-dveri.admin.doors.create_door', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoorRequest $request)
    {
        $data = $request->all();

        $door = Door::create($data);

        $data['door_id'] = $door->id;

        $i = 0;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = save_image($file, Image::query());
                $path = Storage::putFileAs('public/images', $file, $name); // Даем путь к этому файлу
                $data['image'] = $path;
                if($data['door_image_color']){
                    $data['door_color'] = $data['door_image_color'][$i];
                }
                if($data['temp_description_image']){
                    $data['description_image'] = $data['temp_description_image'][$i];
                }
                $i++;
                $door->images()->create($data);
            }
        }

        $type = $data['type'];

        $doorRoutes = [
            'entrance' => route('admin_entrance_doors'),
            'interior' => route('admin_interior_doors'),
        ];

        return redirect($doorRoutes[$type]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Door $door)
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
                            'value' => $originalFileName, // Имя файла без расширения
                            'image' => asset(str_replace(public_path(), '', $filePath)), // Генерируем URL
                        ];
                    }
                }
            }
        }
//        dd($door->size);

        return view('avi-dveri.admin.doors.edit_door', compact('door', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoorRequest $request, Door $door)
    {

        $data = $request->all();
        if (array_key_exists('door_image_color', $data)){
            foreach ($data['door_image_color'] as $key => $value) {
                $door->images()->where('id', $key)->update(['door_color' => $value]);
            }
        }
        if (array_key_exists('temp_description_image', $data)){
            foreach ($data['temp_description_image'] as $key => $value) {
                $door->images()->where('id', $key)->update(['description_image' => $value]);
            }
        }

        $door->fill($data)->save();

        $data['door_id'] = $door->id;

        $i = 0;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = save_image($file, Image::query());
                $path = Storage::putFileAs('public/images', $file, $name); // Даем путь к этому файлу
                $data['image'] = $path;
                if($data['door_image_color']){
                    $data['door_color'] = $data['door_image_color'][$i];
                }
                if($data['temp_description_image']){
                    $data['description_image'] = $data['temp_description_image'][$i];
                }
                $i++;
                $door->images()->create($data);
            }
        }

        $id_delete_images = explode(',', $data['delete_images']);

        foreach ($id_delete_images as $id) {
            $door->images()->where('id', $id)->delete();
        }

        $type = $data['type'];

        $doorRoutes = [
            'entrance' => route('admin_entrance_doors'),
            'interior' => route('admin_interior_doors'),
        ];

        return redirect($doorRoutes[$type]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Door $door)
    {

        $images = $door->images()->where('imageable_id', $door->id)->get();
        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                Storage::delete($image->image);
                $image->delete();
            }
        }
        $door->delete();
        return back();
    }
}
