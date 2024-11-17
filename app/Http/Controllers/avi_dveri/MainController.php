<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    function index()
    {
        return view('avi-dveri.avi-dveri.index');
    }

    function catalog()
    {
        return view('avi-dveri.avi-dveri.catalog');
    }

    function payment_and_delivery()
    {
        return view('avi-dveri.avi-dveri.payment_and_delivery');
    }

    function accessories()
    {
        return view('avi-dveri.avi-dveri.accessories');
    }

    function entrance_doors()
    {
        return view('avi-dveri.avi-dveri.entrance_doors');
    }

    function interior_doors()
    {
        return view('avi-dveri.avi-dveri.interior_doors');
    }
    function show_product()
    {
        return view('avi-dveri.avi-dveri.product_page');
    }

}
