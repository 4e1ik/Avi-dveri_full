<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\DTO\Manufacturer\CreateManufacturerDTO;
use App\DTO\Manufacturer\DestroyManufacturerDTO;
use App\DTO\Manufacturer\UpdateManufacturerDTO;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Manufacturer;
use App\Services\ManufacturerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('avi-dveri.admin.reviews.reviews');
    }
}
