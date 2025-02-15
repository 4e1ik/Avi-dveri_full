<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Http\Filters\DoorFilter;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Door;
use App\Models\Fitting;
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
        $label_distance = 15;
        return view('avi-dveri.avi-dveri.index', compact('products', 'label_distance'));
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
        if (array_key_exists('price', $data)){
            preg_match_all('/\d+/', $data['price'], $matches);
            $data['price'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price'], $data['price_filter']);
            }
        }

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $perPage = 21;
        $products = Product::where('active', [1])
            ->where('category', 'fitting')
            ->with(['images', 'fitting'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        $label_distance = 15;

        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        return view('avi-dveri.avi-dveri.accessories', compact(
            'products',
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
        if (array_key_exists('price', $data)){
            preg_match_all('/\d+/', $data['price'], $matches);
            $data['price'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price'], $data['price_filter']);
            }
        }

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $perPage = 21;
        $products = Product::where('active', [1])
            ->whereHas('door', function ($query) {
                $query->where('type', 'entrance');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        $label_distance = 15;

        $streetTotalCount = Door::where('function', 'Улица')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->count();

        return view('avi-dveri.avi-dveri.entrance_doors', compact(
            'products',
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
        if (array_key_exists('price', $data)){
            preg_match_all('/\d+/', $data['price'], $matches);
            $data['price'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price'], $data['price_filter']);
            }
        }

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $perPage = 21;
        $products = Product::where('active', [1])
            ->whereHas('door', function ($query) {
                $query->where('type', 'interior');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        $label_distance = 15;

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.interior_doors', compact(
            'products',
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

    function show_product(Product $product)
    {
        $metaTitle = $product->meta_title;
        $metaDescription = $product->meta_description;

//        dd($metaDescription);
        if ($product->category == 'door'){
            $colors = add_doors_colors();
            return view('avi-dveri.avi-dveri.product_page', compact('product', 'colors', 'metaTitle', 'metaDescription'));
        }

        return view('avi-dveri.avi-dveri.product_page', compact('product', 'metaTitle', 'metaDescription'));
    }

}
