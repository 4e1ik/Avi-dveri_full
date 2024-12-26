<?php

use App\Http\Controllers\avi_dveri\admin\AdminController;
use App\Http\Controllers\avi_dveri\admin\LoginController;
use App\Http\Controllers\avi_dveri\admin\RegisterController;
use App\Http\Controllers\avi_dveri\admin\DoorController;
use App\Http\Controllers\avi_dveri\admin\FittingController;
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

    Route::prefix('accessories')->group(function () {
        Route::get('/', [MainController::class, 'accessories'])->name('accessories');
        Route::get('/{class}/{id}', [MainController::class, 'show_product'])->name('product_page');
    });

    Route::prefix('interior_doors')->group(function () {
        Route::get('/', [MainController::class, 'interior_doors'])->name('interior_doors');
        Route::get('/{class}/{id}', [MainController::class, 'show_product'])->name('product_page');
    });

    Route::prefix('entrance_doors')->group(function () {
        Route::get('/', [MainController::class, 'entrance_doors'])->name('entrance_doors');
        Route::get('/{class}/{id}', [MainController::class, 'show_product'])->name('product_page');
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
        'doors' => DoorController::class,
        'fittings' => FittingController::class,
    ]);
});