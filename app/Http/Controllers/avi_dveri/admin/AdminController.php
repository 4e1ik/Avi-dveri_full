<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index()
    {
        return view('layouts.admin.admin');
    }
}
