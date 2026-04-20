<?php

namespace App\Http\Controllers\avi_dveri;

use App\Helpers\ApiResponse;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController
{
    public function manufacturers(Request $request)
    {
        try {
            return ApiResponse::success(Manufacturer::where('type', $request->input('type'))->get());
        } catch (\Exception $error) {
            return ApiResponse::error($error);
        }
    }
}