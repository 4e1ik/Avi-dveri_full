<?php

namespace App\Http\Controllers;

use App\DTO\GlobalFilterDTO;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        try {
            return ApiResponse::success(new GlobalFilterDTO(

            ));
        } catch (\Exception $error) {
            return ApiResponse::error($error);
        }
    }
}
