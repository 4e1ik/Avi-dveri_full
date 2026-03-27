<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use App\Models\Product;

class MainController extends Controller
{
    function index()
    {
        $meta = MetaTag::where('slug', 'home')->first();
        $products = Product::whereIn('active', [1])
            ->with(['door'])
            ->with(['fitting'])
            ->whereJsonContains('label', 'hit')
            ->inRandomOrder()
            ->get();

        $metaTitle = $meta?->meta_title;
        $metaDescription = $meta?->meta_description;
        return view('avi-dveri.avi-dveri.index', compact('products', 'metaTitle', 'metaDescription'));
    }

    function catalog()
    {
        $meta = MetaTag::where('slug', 'katalog')->first();
        $metaTitle = $meta?->meta_title;
        $metaDescription = $meta?->meta_description;
        return view('avi-dveri.avi-dveri.catalog', compact('metaTitle', 'metaDescription'));
    }

    function payment_and_delivery()
    {
        $meta = MetaTag::where('slug', 'oplata-dostavka')->first();
        $metaTitle = $meta?->meta_title;
        $metaDescription = $meta?->meta_description;
        return view('avi-dveri.avi-dveri.payment_and_delivery', compact('metaTitle', 'metaDescription'));
    }

    function show_product($head, $direction, Product $product)
    {
        $metaTitle = $product->meta_title;
        $metaDescription = $product->meta_description;

        if ($product->category == 'door'){
            $colors = add_doors_colors();
        } else {
            $colors = add_fittings_colors();
        }

        return view('avi-dveri.avi-dveri.product_page', compact('product', 'colors', 'metaTitle', 'metaDescription'));
    }

}
