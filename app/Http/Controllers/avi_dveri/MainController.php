<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Models\Product;

class MainController extends Controller
{
    function index()
    {
        $products = Product::whereIn('active', [1])
            ->with(['door'])
            ->with(['fitting'])
            ->whereJsonContains('label', 'hit')
            ->inRandomOrder()
            ->get();
        
        return view('avi-dveri.avi-dveri.index', compact('products'));
    }

    function catalog()
    {
        return view('avi-dveri.avi-dveri.catalog');
    }

    function payment_and_delivery()
    {
        return view('avi-dveri.avi-dveri.payment_and_delivery');
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
