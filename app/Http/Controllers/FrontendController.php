<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        return view('avi-dveri.frontend.index');
    }

    function catalog()
    {
        return view('avi-dveri.frontend.catalog');
    }

    function payment_and_delivery()
    {
        return view('avi-dveri.frontend.payment_and_delivery');
    }

    function accessories()
    {
        return view('avi-dveri.frontend.accessories');
    }

    function entrance_doors()
    {
        return view('avi-dveri.frontend.entrance_doors');
    }

    function interior_doors()
    {
        return view('avi-dveri.frontend.interior_doors');
    }
    function show_product()
    {
        return view('avi-dveri.frontend.product_page');
    }

}
