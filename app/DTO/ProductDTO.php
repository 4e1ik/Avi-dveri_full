<?php

namespace App\DTO;

use App\Http\Requests\ProductRequest;

class ProductDTO
{
    public string $title;
    public string $description;
    public float $price;
    public float $price_per_set;
    public string $category;
    public string $currency;
    public array $label;
    public bool $active;
    public array $size;
    public string $type;
    public string $function;
    public string $material;

    public function __construct(
        string $title,
        string $description,
        float $price,
        float $price_per_set,
        string $category,
        string $currency,
        array $label,
        array $image,
        bool $active,
        array $size,
        string $type,
        string $function,
        string $material,
        string $product_id,
        array $door_image_color,
        array $temp_description_image
    ){
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->price_per_set = $price_per_set;
        $this->category = $category;
        $this->currency = $currency;
        $this->label = $label;
        $this->image = $image;
        $this->active = $active;
        $this->size = $size;
        $this->type = $type;
        $this->function = $function;
        $this->material = $material;
        $this->product_id = $product_id;
        $this->door_image_color = $door_image_color;
        $this->temp_description_image = $temp_description_image;
    }

    public static function formRequest(ProductRequest $request): ProductDTO
    {
        return new static(
            $request->get('title'),
            $request->get('description', ''),
            $request->get('price'),
            $request->get('price_per_set'),
            $request->get('category'),
            $request->get('currency'),
            $request->get('label', []),
            $request->get('image', []),
            $request->get('active', '1'),
            $request->get('size', []),
            $request->get('type'),
            $request->get('function'),
            $request->get('material'),
            $request->get('product_id', ''),
            $request->get('door_image_color', []),
            $request->get('temp_description_image', []),
        );
    }

    public function toArray(): array
    {
        $array = [];
        $array['title'] = $this->title;
        $array['description'] = $this->description;
        $array['price'] = $this->price;
        $array['price_per_set'] = $this->price_per_set;
        $array['category'] = $this->category;
        $array['currency'] = $this->currency;
        $array['label'] = $this->label;
        $array['image'] = $this->image;
        $array['active'] = $this->active;
        $array['size'] = $this->size;
        $array['type'] = $this->type;
        $array['function'] = $this->function;
        $array['material'] = $this->material;
        $array['product_id'] = $this->product_id;
        $array['door_image_color'] = $this->product_id;
        $array['temp_description_image'] = $this->product_id;
        return $array;
    }
}