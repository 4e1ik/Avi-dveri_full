<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/payment-and-delivery', [FrontendController::class, 'payment_and_delivery'])->name('payment_and_delivery');

Route::prefix('catalog')->group(function (){
    Route::get('/', [FrontendController::class, 'catalog'])->name('catalog');
    Route::get('/accessories', [FrontendController::class, 'accessories'])->name('accessories');
    Route::get('/entrance_doors', [FrontendController::class, 'entrance_doors'])->name('entrance_doors');
    Route::get('/interior_doors', [FrontendController::class, 'interior_doors'])->name('interior_doors');
});

Route::get('/product_page', [FrontendController::class, 'show_product'])->name('product_page');