<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Door;
use App\Models\Fitting;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
    public function create(string $type)
    {
        switch ($type) {
            case 'entrance_door':
                $colors = add_doors_colors();

                return view('avi-dveri.admin.doors.create_entrance_door', compact('colors'));
                break;

            case 'interior_door':
                $colors = add_doors_colors();

                return view('avi-dveri.admin.doors.create_interior_door', compact('colors'));
                break;

            case 'fitting':
                return view('avi-dveri.admin.fittings.create_fitting');
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if (array_key_exists('size_diff', $data) && array_key_exists('size_standard', $data))
        {
            $data['size'] = array_merge($data['size_standard'], $data['size_diff']);
        }
        elseif(array_key_exists('size_diff', $data))
        {
            $data['size'] = $data['size_diff'];

        } elseif (array_key_exists('size_standard', $data))
        {
            $data['size'] = $data['size_standard'];
        }

        $i = 0;

        $product = Product::create($data);

        $data['product_id'] = $product->id;

        switch ($data['category']) {
            case 'door':
                Door::create($data);

                $routes = [
                    'entrance' => route('admin_entrance_doors'),
                    'interior' => route('admin_interior_doors'),
                ];
                break;

            case 'fitting':
                Fitting::create($data);

                $routes = [
                    'fitting' => route('admin_fittings'),
                ];
                break;
        }

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = save_image($file, Image::query());
                $path = Storage::putFileAs('public/images', $file, $name); // Даем путь к этому файлу
                $data['image'] = $path;
                if ($data['door_image_color']) {
                    $data['door_color'] = $data['door_image_color'][$i];
                }
                if ($data['temp_description_image']) {
                    $data['description_image'] = $data['temp_description_image'][$i];
                }
                $i++;
                $product->images()->create($data);
            }
        }

        $type = $data['type'] ?? 'fitting';

        return redirect($routes[$type]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if ($product->category == 'door') {
            $colors = add_doors_colors();
//            dd($product->door->type);
            if($product->door->type == 'entrance'){
                return view('avi-dveri.admin.doors.edit_entrance_door', compact('product', 'colors'));
            } elseif ($product->door->type == 'interior'){
                return view('avi-dveri.admin.doors.edit_interior_door', compact('product', 'colors'));
            }
        } elseif ($product->category == 'fitting') {
            return view('avi-dveri.admin.fittings.edit_fitting', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        $i = 0;

        switch ($product->category) {
            case 'door':
                $model = $product->door;
                $routes = [
                    'entrance' => route('admin_entrance_doors'),
                    'interior' => route('admin_interior_doors'),
                ];
                break;

            case 'fitting':
                $model = $product->fitting;
                $routes = [
                    'fitting' => route('admin_fittings'),
                ];
                break;
        }

        if (array_key_exists('door_image_color', $data)) {
            foreach ($data['door_image_color'] as $key => $value) {
                $product->images()->where('id', $key)->update(['door_color' => $value]);
            }
        }
        if (array_key_exists('temp_description_image', $data)) {
            foreach ($data['temp_description_image'] as $key => $value) {
                $product->images()->where('id', $key)->update(['description_image' => $value]);
            }
        }

        $product->fill($data)->save();

        $data['product_id'] = $product->id;

        $model->fill($data)->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = save_image($file, Image::query());
                $path = Storage::putFileAs('public/images', $file, $name); // Даем путь к этому файлу
                $data['image'] = $path;
                if ($data['door_image_color']) {
                    $data['door_color'] = $data['door_image_color'][$i];
                }
                if ($data['temp_description_image']) {
                    $data['description_image'] = $data['temp_description_image'][$i];
                }

                $i++;
                $product->images()->create($data);
            }
        }

        $id_delete_images = explode(',', $data['delete_images']);

        foreach ($id_delete_images as $id) {
            $product->images()->where('id', $id)->delete();
        }

        $type = $data['type'] ?? 'fitting';

        return redirect($routes[$type]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $images = $product->images()->where('imageable_id', $product->id)->get();
        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                Storage::delete($image->image);
                $image->delete();
            }
        }
        $product->delete();
        return back();
    }
}
