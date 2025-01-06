<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Models\Door;
use App\Models\Fitting;
use App\Models\Product;

class AdminController extends Controller
{
    function index()
    {
        return view('avi-dveri.admin.admin');
    }

    function entrance_doors()
    {
        $products = Product::where('category', 'door')
            ->with(['door' => function ($query) {
                $query->whereIn('type', ['entrance']);
            }])
            ->get();
        return view('avi-dveri.admin.doors.entrance_doors', compact('products'));
    }

    function interior_doors()
    {
        $products = Product::where('category', 'door')
            ->with(['door' => function ($query) {
                $query->whereIn('type', ['interior']);
            }])
            ->get();
        return view('avi-dveri.admin.doors.interior_doors', compact('products'));
    }

    function fittings()
    {
        $products = Product::where('category', 'fitting')
            ->with(['fitting'])
            ->get();
        return view('avi-dveri.admin.fittings.fittings', compact('products'));
    }
}
