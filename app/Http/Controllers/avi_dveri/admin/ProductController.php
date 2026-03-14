<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\DTO\CreateProductDTO;
use App\DTO\UpdateProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(
        public ProductService $productService,
    ){}

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
                $colors = add_fittings_colors();
                return view('avi-dveri.admin.fittings.create_fitting', compact('colors'));
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $route = $this->productService->createProduct( new CreateProductDTO(
            title:                  $request->input('title'),
            description:            $request->input('description'),
            price:                  $request->input('price'),
            category:               $request->input('category'),
            currency:               $request->input('currency'),
            label:                  $request->input('label', []),
            active:                 $request->input('active', true),
            size:                   $request->input('size', []),
            meta_title:             $request->input('meta_title'),
            meta_description:       $request->input('meta_description'),
            type:                   $request->input('type'),
            function:               $request->input('function'),
            material:               $request->input('material'),
            glass:                  $request->input('glass'),
            image:                  $request->file('image', []),
            fitting_image_color:    $request->input('fitting_image_color'),
            door_image_color:       $request->input('door_image_color'),
            temp_description_image: $request->input('temp_description_image'),
            temp_price:             $request->input('temp_price'),
            temp_price_per_set:     $request->input('temp_price_per_set'),
        ));

        return redirect($route);
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
        if ($product->category === 'door') {
            $door = $product->door;
            if ($door === null) {
                abort(404, 'Product door not found');
            }
            $colors = add_doors_colors();
            if ($door->type === 'entrance') {
                return view('avi-dveri.admin.doors.edit_entrance_door', compact('product', 'colors'));
            }
            if ($door->type === 'interior') {
                return view('avi-dveri.admin.doors.edit_interior_door', compact('product', 'colors'));
            }
            abort(404, 'Unknown door type');
        }
        if ($product->category === 'fitting') {
            $colors = add_fittings_colors();
            return view('avi-dveri.admin.fittings.edit_fitting', compact('product', 'colors'));
        }
        abort(404, 'Unknown product category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $route = $this->productService->updateProduct(new UpdateProductDTO(
            title:                  $request->input('title') ?? $product->title,
            description:           $request->input('description') ?? $product->description,
            price:                  $request->input('price') ?? $product->price,
            price_per_set:         $request->input('price_per_set') ?? $product->price_per_set,
            category:              $request->input('category') ?: $product->category,
            currency:              $request->input('currency') ?: $product->currency,
            label:                 $request->input('label') !== null ? $request->input('label') : $product->label,
            active:                $request->has('active') ? $request->input('active') : $product->active,
            size:                  $request->input('size') ?? $product->size,
            meta_title:            $request->input('meta_title') ?? $product->meta_title,
            meta_description:      $request->input('meta_description') ?? $product->meta_description,
            type:                  $request->input('type') ?? $product->door?->type,
            function:              $request->input('function') ?? $product->door?->function ?? $product->fitting?->function,
            material:              $request->input('material') ?? $product->door?->material,
            glass:                 $request->input('glass') ?? $product->door?->glass,
            image:                 $request->file('image', []),
            fitting_image_color:    $request->input('fitting_image_color'),
            door_image_color:      $request->input('door_image_color'),
            temp_description_image: $request->input('temp_description_image'),
            temp_price:            $request->input('temp_price'),
            temp_price_per_set:    $request->input('temp_price_per_set'),
            delete_images:         $request->input('delete_images'),
        ), $product);

        return redirect($route);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productService->deleteProduct(product: $product);
        return back();
    }
}
