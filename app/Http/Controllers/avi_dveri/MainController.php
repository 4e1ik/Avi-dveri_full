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

    function fittings(FilterRequest $request)
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

        

        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        return view('avi-dveri.avi-dveri.fittings.fittings', compact(
            'products',
            
            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
        ));
    }

    function economy_fittings(FilterRequest $request)
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
            ->whereHas('fitting', function ($query) {
                $query->where('function', 'Эконом');
            })
            ->with(['images', 'fitting'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        return view('avi-dveri.avi-dveri.fittings.economy_fittings', compact(
            'products',

            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
        ));
    }

    function standard_fittings(FilterRequest $request)
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
            ->whereHas('fitting', function ($query) {
                $query->where('function', 'Стандарт');
            })
            ->with(['images', 'fitting'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        return view('avi-dveri.avi-dveri.fittings.standard_fittings', compact(
            'products',

            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
        ));
    }

    function premium_fittings(FilterRequest $request)
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
            ->whereHas('fitting', function ($query) {
                $query->where('function', 'Премиум');
            })
            ->with(['images', 'fitting'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        return view('avi-dveri.avi-dveri.fittings.premium_fittings', compact(
            'products',

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

        

        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        return view('avi-dveri.avi-dveri.doors.entrance_doors.entrance_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
        ));
    }

    function street_doors(FilterRequest $request)
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
                $query->where('type', 'entrance')
                    ->where('function', 'Улица');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        return view('avi-dveri.avi-dveri.doors.entrance_doors.street_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
        ));
    }

    function apartment_doors(FilterRequest $request)
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
                $query->where('type', 'entrance')
                    ->where('function', 'Квартира');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        return view('avi-dveri.avi-dveri.doors.entrance_doors.apartment_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
        ));
    }

    function thermal_break_doors(FilterRequest $request)
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
                $query->where('type', 'entrance')
                ->where('function', 'Терморазрыв');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);

        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        return view('avi-dveri.avi-dveri.doors.entrance_doors.thermal_break_doors', compact(
            'products',
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
//        dd($data);
        if (array_key_exists('price', $data)){
            preg_match_all('/\d+/', $data['price'], $matches);
            $data['price'] = array_map('intval', $matches[0]);
            if (array_key_exists('price_filter', $data)){
                array_push($data['price'], $data['price_filter']);
            }
        }

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
//        dd($filter);
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

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.doors.interior_doors.interior_doors', compact(
            'products',
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

//    function price_filter()
//    {
//        $products = Product::where('active', [1])->get();
//
//        return response()->json([
//            'html' => view('includes.products', compact('products'))->render()
//        ]);
//    }

    function eco_veneer_doors(FilterRequest $request)
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
                $query->where('type', 'interior')
                ->where('material', 'Экошпон');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);
        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);

        

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.doors.interior_doors.eco_veneer_doors', compact(
            'products',
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

    function polypropylene_doors(FilterRequest $request)
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
                $query->where('type', 'interior')
                    ->where('material', 'Полипропилен');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);
//        dd($products);
        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.doors.interior_doors.polypropylene_doors', compact(
            'products',
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

    function enamel_doors(FilterRequest $request)
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
                $query->where('type', 'interior')
                    ->where('material', 'Эмаль');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);
        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.doors.interior_doors.enamel_doors', compact(
            'products',
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

    function hidden_doors(FilterRequest $request)
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
                $query->where('type', 'interior')
                    ->where('material', 'Скрытые');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);
//        dd($products);
        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.doors.interior_doors.hidden_doors', compact(
            'products',
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

    function solid_doors(FilterRequest $request)
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
                $query->where('type', 'interior')
                    ->where('material', 'Массив');
            })
            ->with(['images', 'door'])
            ->filter($filter)
            ->latest()
            ->paginate($perPage);
//        dd($products);
        $totalCount  = $products->total();
        $currentPage = $products->currentPage();
        $start = ($currentPage - 1) * $perPage + 1;
        $end = min($start + $perPage - 1, $totalCount);



        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        return view('avi-dveri.avi-dveri.doors.interior_doors.solid_doors', compact(
            'products',
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

    function show_product($head, $direction, Product $product)
    {
        $metaTitle = $product->meta_title;
        $metaDescription = $product->meta_description;

        if ($product->category == 'door'){
            $colors = add_doors_colors();
            return view('avi-dveri.avi-dveri.product_page', compact('product', 'colors', 'metaTitle', 'metaDescription'));
        }

        return view('avi-dveri.avi-dveri.product_page', compact('product', 'metaTitle', 'metaDescription'));
    }

}
