<?php

namespace App\Http\Controllers\avi_dveri;

use App\DTO\FilterDTO;
use App\Enums\ProductPerPageEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Fitting;
use App\Models\MetaTag;
use App\Repositories\ProductRepository;
use App\Services\FilterService;
use App\Services\ProductService;
use App\Traits\MetaTagPaginateTrait;
use Illuminate\Support\Facades\URL;

class FittingController extends Controller
{
    use MetaTagPaginateTrait;
    public function __construct(
        public ProductRepository $productRepository,
        public ProductService $productService,
        public FilterService $filterService,
    ){}

    function fittings(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price:           $request->input('price'),
            priceFilter:     $request->input('price_filter'),
            perPage:         ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter:     $filter,
            productType:       'fitting',
        );

        $counterArray = $this->productService->productsCounter(products: $products);

        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'furnitura')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('fittings'));

        return view('avi-dveri.avi-dveri.fittings.fittings', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function economy_fittings(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price:           $request->input('price'),
            priceFilter:     $request->input('price_filter'),
            perPage:         ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter:      $filter,
            productType: 'fitting',
            function:    'Эконом'
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'ekonom')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('economy_fittings'));

        return view('avi-dveri.avi-dveri.fittings.economy_fittings', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function standard_fittings(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price:           $request->input('price'),
            priceFilter:     $request->input('price_filter'),
            perPage:         ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter:      $filter,
            productType: 'fitting',
            function:    'Стандарт'
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'standart')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('standard_fittings'));

        return view('avi-dveri.avi-dveri.fittings.standard_fittings', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function premium_fittings(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price:           $request->input('price'),
            priceFilter:     $request->input('price_filter'),
            perPage:         ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter:      $filter,
            productType: 'fitting',
            function:    'Премиум'
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $economyTotalCount = Fitting::where('function', 'Эконом')->count();
        $standardTotalCount = Fitting::where('function', 'Стандарт')->count();
        $premiumTotalCount = Fitting::where('function', 'Премиум')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'premium')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('premium_fittings'));

        return view('avi-dveri.avi-dveri.fittings.premium_fittings', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'economyTotalCount',
            'standardTotalCount',
            'premiumTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

}
