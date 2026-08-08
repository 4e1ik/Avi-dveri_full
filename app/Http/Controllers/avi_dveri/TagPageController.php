<?php

namespace App\Http\Controllers\avi_dveri;

use App\Enums\ProductPerPageEnum;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagPageController extends Controller
{
    public function __construct(
        public ProductService $productService,
    ) {}

    public function show(Request $request, Tag $tag): View
    {
        if (!$tag->is_visible) {
            abort(404);
        }

        $products = $tag->products()
            ->where('active', true)
            ->with(['images', 'door', 'fitting', 'manufacturer'])
            ->latest()
            ->paginate(ProductPerPageEnum::DEFAULT->value);

        [$start, $end, $totalCount] = array_values(
            $this->productService->productsCounter($products)
        );

        $activeTagSlug = $tag->slug;

        return view('avi-dveri.avi-dveri.tags.show', compact(
            'tag',
            'products',
            'start',
            'end',
            'totalCount',
            'activeTagSlug'
        ));
    }
}
