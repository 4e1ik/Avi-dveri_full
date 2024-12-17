<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Models\Door;
use App\Models\Fitting;

class AdminController extends Controller
{
    function index()
    {
        return view('avi-dveri.admin.admin');
    }

    function entrance_doors()
    {
        $doors = Door::whereIn('type',  ['entrance'])->latest()->get();
        return view('avi-dveri.admin.doors.entrance_doors', compact('doors'));
    }

    function interior_doors()
    {
        $doors = Door::whereIn('type',  ['interior'])->latest()->get();
        return view('avi-dveri.admin.doors.interior_doors', compact('doors'));
    }

    function fittings()
    {
        $fittings = Fitting::latest()->get();

        return view('avi-dveri.admin.fittings.fittings', compact('fittings'));
    }
}
