<?php

use App\Http\Controllers\avi_dveri\admin\AdminController;
use App\Http\Controllers\avi_dveri\admin\LoginController;
use App\Http\Controllers\avi_dveri\admin\MetaTagsPageController;
use App\Http\Controllers\avi_dveri\admin\ManufacturerController;
use App\Http\Controllers\avi_dveri\admin\MetaTagsProductController;
use App\Http\Controllers\avi_dveri\admin\ProductController;
use App\Http\Controllers\avi_dveri\admin\RegisterController;
use App\Http\Controllers\avi_dveri\DoorController;
use App\Http\Controllers\avi_dveri\FittingController;
use App\Http\Controllers\avi_dveri\MailController;
use App\Http\Controllers\avi_dveri\MainController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('index');
Route::get('/spasibo', function (Request $request){
    return view('includes.avi-dveri.thank_you', [
        'referrer' => $request->query('referrer', '/')
    ]);
})->name('thank-you');
Route::get('/oplata-dostavka', [MainController::class, 'payment_and_delivery'])->name('payment_and_delivery');

Route::prefix('katalog')->group(function (){
    Route::get('/', [MainController::class, 'catalog'])->name('catalog');
    Route::get('/{head}/{direction}/{product}', [MainController::class, 'show_product'])->name('product_page');

    Route::prefix('furnitura')->group(function () {
        Route::get('/', [FittingController::class, 'fittings'])->name('fittings');

        Route::prefix('ekonom')->group(function () {
            Route::get('/', [FittingController::class, 'economy_fittings'])->name('economy_fittings');
        });

        Route::prefix('standart')->group(function () {
            Route::get('/', [FittingController::class, 'standard_fittings'])->name('standard_fittings');
        });

        Route::prefix('premium')->group(function () {
            Route::get('/', [FittingController::class, 'premium_fittings'])->name('premium_fittings');
        });
    });

    Route::prefix('mezhkomnatnye-dveri')->group(function () {
        Route::get('/', [DoorController::class, 'interior_doors'])->name('interior_doors');

        Route::prefix('ekoshpon')->group(function () {
            Route::get('/', [DoorController::class, 'eco_veneer_doors'])->name('eco_veneer_doors');
        });

        Route::prefix('polipropilen')->group(function () {
            Route::get('/', [DoorController::class, 'polypropylene_doors'])->name('polypropylene_doors');
        });

        Route::prefix('emal')->group(function () {
            Route::get('/', [DoorController::class, 'enamel_doors'])->name('enamel_doors');
        });

        Route::prefix('skrytye')->group(function () {
            Route::get('/', [DoorController::class, 'hidden_doors'])->name('hidden_doors');
        });

        Route::prefix('massiv')->group(function () {
            Route::get('/', [DoorController::class, 'solid_doors'])->name('solid_doors');
        });
    });

    Route::prefix('vhodnye-dveri')->group(function () {
        Route::get('/', [DoorController::class, 'entrance_doors'])->name('entrance_doors');

        Route::prefix('ulica')->group(function () {
            Route::get('/', [DoorController::class, 'street_doors'])->name('street_doors');
        });

        Route::prefix('kvartira')->group(function () {
            Route::get('/', [DoorController::class, 'apartment_doors'])->name('apartment_doors');
        });

        Route::prefix('termorazryv')->group(function () {
            Route::get('/', [DoorController::class, 'thermal_break_doors'])->name('thermal_break_doors');
        });
    });
});

Route::post('/send_mail', [MailController::class, 'send'])->name('send_mail');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
Route::post('/registration', [RegisterController::class, 'registration'])->name('save');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->where([])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin_fittings', [AdminController::class, 'fittings'])->name('admin_fittings');
    Route::get('/entrance_doors', [AdminController::class, 'entrance_doors'])->name('admin_entrance_doors');
    Route::get('/interior_doors', [AdminController::class, 'interior_doors'])->name('admin_interior_doors');

    Route::prefix('meta')->name('admin_meta_')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', [MetaTagsProductController::class, 'products'])->name('products');
            Route::get('/template/edit', [MetaTagsProductController::class, 'editProductTemplate'])->name('product_template_edit');
            Route::put('/template/{metaTemplateProduct}/update', [MetaTagsProductController::class, 'updateProductTemplate'])->name('product_template_update');
        });
        Route::prefix('pages')->group(function () {
            Route::get('/', [MetaTagsPageController::class, 'pages'])->name('pages');
            Route::get('/edit', [MetaTagsPageController::class, 'editPageTemplate'])->name('page_template_edit');
            Route::put('/update', [MetaTagsPageController::class, 'updatePageTemplate'])->name('page_template_update');
        });
    });

    Route::prefix('manufacturers')->group(function () {
        Route::get('/{type}', [ManufacturerController::class, 'index'])->name('manufacturers');
        Route::get('/create/{type}', [ManufacturerController::class, 'create'])->name('create_manufacturer');
        Route::post('/store', [ManufacturerController::class, 'store'])->name('store_manufacturer');
        Route::get('/{manufacturer}/edit', [ManufacturerController::class, 'edit'])->name('edit_manufacturer');
        Route::put('/{manufacturer}', [ManufacturerController::class, 'update'])->name('update_manufacturer');
        Route::delete('/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('destroy_manufacturer');
    });

    Route::resource('products', ProductController::class)->except(['create', 'index', 'show']);
    Route::get('/products/create/{type}', [ProductController::class, 'create'])->name('products.create');
});