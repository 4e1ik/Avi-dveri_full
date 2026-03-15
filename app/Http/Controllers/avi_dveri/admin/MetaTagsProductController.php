<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\DTO\GetMetaTagsProductDTO;
use App\DTO\UpdateMetaTagsProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\MetaTemplateProductRequest;
use App\Models\MetaTemplateProduct;
use App\Repositories\MetaTagsProductRepository;
use App\Services\MetaTagsProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MetaTagsProductController extends Controller
{
    public function __construct(
        public MetaTagsProductService $metaTagsProductService,
        public MetaTagsProductRepository $metaTagsProductRepository,
    ){}

    private const FITTINGS = [
        'Эконом' => 'Эконом',
        'Стандарт' => 'Стандарт',
        'Премиум' => 'Премиум',
    ];

    private const ENTRANCE = [
        'Улица' => 'Улица',
        'Квартира' => 'Квартира',
        'Терморазрыв' => 'Терморазрыв',
    ];

    private const INTERIOR = [
        'Экошпон' => 'Экошпон',
        'Полипропилен' => 'Полипропилен',
        'Эмаль' => 'Эмаль',
        'Скрытые' => 'Скрытые',
        'Массив' => 'Массив',
    ];

    public function products(Request $request): View|RedirectResponse
    {
        $fittings = self::FITTINGS;
        $entrance = self::ENTRANCE;
        $interior = self::INTERIOR;
        return view('avi-dveri.admin.meta.products.products', compact('fittings', 'entrance', 'interior'));
    }

    public function editProductTemplate(Request $request): View|RedirectResponse
    {
        $repository = $this->metaTagsProductRepository->getMetaTagsProductTemplate(new GetMetaTagsProductDTO(
                productType:    $request->input('productType'),
                type:           $request->input('type'),
                function:       $request->input('function'),
                material:       $request->input('material')
        ));

        $metaTemplateProduct = $repository['metaTemplateProduct'];
        $title = $repository['title'];

        return view('avi-dveri.admin.meta.products.product_edit', compact('metaTemplateProduct', 'title'));
    }

    public function updateProductTemplate(MetaTemplateProductRequest $request, MetaTemplateProduct $metaTemplateProduct): RedirectResponse
    {
        $success = $this->metaTagsProductService->updateMetTagsProductTemplate(new UpdateMetaTagsProductDTO(
            productType:            $request->input('productType'),
            type:                   $request->input('type'),
            function:               $request->input('function'),
            material:               $request->input('material'),
            titleTemplate:          $request->input('titleTemplate'),
            descriptionTemplate:    $request->input('descriptionTemplate'),
            metaTemplateProduct:    $metaTemplateProduct
        ));

        if ($success) {
            return redirect()->route('admin_meta_products')->with('success', 'Шаблон сохранён!');
        } else {
            return redirect()->route('admin_meta_products')->with('false', 'Упс. Что-то пошло не так, обратитесь к разработчику!');
        }
    }
}
