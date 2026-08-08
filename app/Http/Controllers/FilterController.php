<?php

namespace App\Http\Controllers;

use App\DTO\GlobalFilterDTO;
use App\Helpers\ApiResponse;
use App\Http\Requests\FilterV2Request;
use App\Services\CatalogFilterV2Service;
use App\Services\GlobalFilterService;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __construct(
        public GlobalFilterService $globalFilterService,
        public CatalogFilterV2Service $catalogFilterV2Service,
    ){}

    public function filter(Request $request)
    {
        try {
            return ApiResponse::success($this->globalFilterService->filter(new GlobalFilterDTO(
                category: $request->input('category'),
                label: $request->input('label') ?? null,
                manufacturer_id: $request->input('manufacturer_id') ?? null,
                type: $request->input('type') ?? null,
                function: $request->input('function') ?? null,
                material: $request->input('material') ?? null,
            )));
        } catch (\Exception $error) {
            return ApiResponse::error($error);
        }
    }

    public function filterV2(FilterV2Request $request)
    {
        try {
            return ApiResponse::success(
                $this->catalogFilterV2Service->filter($request->validated())
            );
        } catch (\Exception $error) {
            return ApiResponse::error($error);
        }
    }
}
