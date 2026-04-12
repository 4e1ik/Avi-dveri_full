<?php

namespace App\Http\Controllers\avi_dveri;

use App\DTO\FilterDTO;
use App\Enums\ProductPerPageEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Door;
use App\Models\MetaTag;
use App\Repositories\ProductRepository;
use App\Services\FilterService;
use App\Services\ProductService;
use App\Traits\MetaTagPaginateTrait;
use Illuminate\Support\Facades\URL;

class DoorController extends Controller
{
    use MetaTagPaginateTrait;

    public function __construct(
        public ProductRepository     $productRepository,
        public ProductService        $productService,
        public FilterService         $filterService,
    )
    {
    }

    function entrance_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            type: 'entrance',
        );

        $counterArray = $this->productService->productsCounter(products: $products);

        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'vhodnye-dveri')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('entrance_doors'));

        return view('avi-dveri.avi-dveri.doors.entrance_doors.entrance_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function street_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            function: 'Улица',
            type: 'entrance'
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'ulica')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('street_doors'));

        return view('avi-dveri.avi-dveri.doors.entrance_doors.street_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function apartment_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            function: 'Квартира',
            type: 'entrance',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'kvartira')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('apartment_doors'));

        return view('avi-dveri.avi-dveri.doors.entrance_doors.apartment_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function thermal_break_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            function: 'Терморазрыв',
            type: 'entrance',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $streetTotalCount = Door::where('function', 'Улица')->where('type', 'entrance')->count();
        $apartmentTotalCount = Door::where('function', 'Квартира')->where('type', 'entrance')->count();
        $thermal_breakTotalCount = Door::where('function', 'Терморазрыв')->where('type', 'entrance')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'termorazryv')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('thermal_break_doors'));

        return view('avi-dveri.avi-dveri.doors.entrance_doors.thermal_break_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'streetTotalCount',
            'apartmentTotalCount',
            'thermal_breakTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function interior_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            type: 'interior',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'mezhkomnatnye-dveri')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('interior_doors'));

        return view('avi-dveri.avi-dveri.doors.interior_doors.interior_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function eco_veneer_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            material: 'Экошпон',
            type: 'interior',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'ekoshpon')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('eco_veneer_doors'));

        return view('avi-dveri.avi-dveri.doors.interior_doors.eco_veneer_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function polypropylene_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            material: 'Полипропилен',
            type: 'interior',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'polipropilen')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('polypropylene_doors'));

        return view('avi-dveri.avi-dveri.doors.interior_doors.polypropylene_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function enamel_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            material: 'Эмаль',
            type: 'interior',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'emal')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('enamel_doors'));

        return view('avi-dveri.avi-dveri.doors.interior_doors.enamel_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function hidden_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            material: 'Скрытые',
            type: 'interior',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'skrytye')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('hidden_doors'));

        return view('avi-dveri.avi-dveri.doors.interior_doors.hidden_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }

    function solid_doors(FilterRequest $request)
    {
        $filter = $this->filterService->filter(new FilterDTO(
            price: $request->input('price'),
            priceFilter: $request->input('price_filter'),
            perPage: ProductPerPageEnum::DEFAULT->value,
        ));

        $products = $this->productRepository->getProducts(
            filter: $filter,
            productType: 'door',
            material: 'Массив',
            type: 'interior',
        );

        $counterArray = $this->productService->productsCounter(products: $products);
        $totalCount = $counterArray['totalCount'];
        $start = $counterArray['start'];
        $end = $counterArray['end'];

        $eco_veneerTotalCount = Door::where('material', 'Экошпон')->count();
        $polypropyleneTotalCount = Door::where('material', 'Полипропилен')->count();
        $enamelTotalCount = Door::where('material', 'Эмаль')->count();
        $hiddenTotalCount = Door::where('material', 'Скрытые')->count();
        $solidTotalCount = Door::where('material', 'Массив')->count();

        $page = $products->currentPage();
        if ($page > 1) {
            $metaTitle = $this->metaTitle(page: $page);
            $metaDescription = $this->metaDescription(page: $page);
        } else {
            $meta = MetaTag::where('slug', 'massiv')->first();
            $metaTitle = $meta?->meta_title;
            $metaDescription = $meta?->meta_description;
        }

        $canonicalUrl = URL::to(route('solid_doors'));

        return view('avi-dveri.avi-dveri.doors.interior_doors.solid_doors', compact(
            'products',
            'totalCount',
            'start',
            'end',
            'eco_veneerTotalCount',
            'polypropyleneTotalCount',
            'enamelTotalCount',
            'hiddenTotalCount',
            'solidTotalCount',
            'metaTitle',
            'metaDescription',
            'canonicalUrl',
        ));
    }
}
