<?php

use App\Http\Controllers\avi_dveri\admin\AdminController;
use App\Http\Controllers\avi_dveri\admin\LoginController;
use App\Http\Controllers\avi_dveri\admin\ProductController;
use App\Http\Controllers\avi_dveri\admin\RegisterController;
use App\Http\Controllers\avi_dveri\MailController;
use App\Http\Controllers\avi_dveri\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/payment-and-delivery', [MainController::class, 'payment_and_delivery'])->name('payment_and_delivery');

Route::prefix('catalog')->group(function (){
    Route::get('/', [MainController::class, 'catalog'])->name('catalog');

    Route::prefix('fittings')->group(function () {
        Route::get('/', [MainController::class, 'fittings'])->name('fittings');

        Route::prefix('economy_fittings')->group(function () {
            Route::get('/', [MainController::class, 'economy_fittings'])->name('economy_fittings');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('standard_fittings')->group(function () {
            Route::get('/', [MainController::class, 'standard_fittings'])->name('standard_fittings');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('premium_fittings')->group(function () {
            Route::get('/', [MainController::class, 'premium_fittings'])->name('premium_fittings');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });
    });

    Route::prefix('interior_doors')->group(function () {
        Route::get('/', [MainController::class, 'interior_doors'])->name('interior_doors');

        Route::prefix('eco_veneer_doors')->group(function () {
            Route::get('/', [MainController::class, 'eco_veneer_doors'])->name('eco_veneer_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('polypropylene_doors')->group(function () {
            Route::get('/', [MainController::class, 'polypropylene_doors'])->name('polypropylene_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('enamel_doors')->group(function () {
            Route::get('/', [MainController::class, 'enamel_doors'])->name('enamel_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('hidden_doors')->group(function () {
            Route::get('/', [MainController::class, 'hidden_doors'])->name('hidden_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('solid_doors')->group(function () {
            Route::get('/', [MainController::class, 'solid_doors'])->name('solid_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });
    });

    Route::prefix('entrance_doors')->group(function () {
        Route::get('/', [MainController::class, 'entrance_doors'])->name('entrance_doors');

        Route::prefix('street_doors')->group(function () {
            Route::get('/', [MainController::class, 'street_doors'])->name('street_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('apartment_doors')->group(function () {
            Route::get('/', [MainController::class, 'apartment_doors'])->name('apartment_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
        });

        Route::prefix('thermal_break_doors')->group(function () {
            Route::get('/', [MainController::class, 'thermal_break_doors'])->name('thermal_break_doors');
            Route::get('/{product}', [MainController::class, 'show_product'])->name('product_page');
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

    Route::resources([
        'products' => ProductController::class,
    ]);

    Route::get('/products/create/{type}', [ProductController::class, 'create'])->name('products.create');
});