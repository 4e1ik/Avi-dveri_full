<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\View\View;

class PromotionsController extends Controller
{
    public function __construct(
        public ProductRepository $productRepository,
        public ProductService $productService,
    ) {}

    public function index(?string $slug = null): View
    {
        $tabs = config('promotions.tabs');
        $activeTab = 'all';
        $label = null;
        $pageTitle = $tabs['all']['h1'];

        if ($slug !== null) {
            $matched = false;
            foreach ($tabs as $key => $tab) {
                if ($tab['slug'] === $slug) {
                    $activeTab = $key;
                    $label = $tab['label'];
                    $pageTitle = $tab['h1'];
                    $matched = true;
                    break;
                }
            }
            if (!$matched) {
                abort(404);
            }
        }

        $products = $this->productRepository->getByLabel($label);
        $counterArray = $this->productService->productsCounter(products: $products);

        $meta = MetaTag::where('slug', 'akcii')->first();
        $metaTitle = $meta?->meta_title ?? $pageTitle . ' | АВИ-двери';
        $metaDescription = $meta?->meta_description;

        return view('avi-dveri.avi-dveri.promotions', [
            'products' => $products,
            'totalCount' => $counterArray['totalCount'],
            'start' => $counterArray['start'],
            'end' => $counterArray['end'],
            'activeTab' => $activeTab,
            'pageTitle' => $pageTitle,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'canonicalUrl' => $slug === null
                ? route('promotions')
                : route('promotions.tab', ['slug' => $slug]),
        ]);
    }
}
