<?php

use App\Http\Controllers\avi_dveri\admin\AdminController;
use App\Http\Controllers\avi_dveri\admin\LoginController;
use App\Http\Controllers\avi_dveri\admin\RegisterController;
use App\Http\Controllers\avi_dveri\admin\DoorController;
use App\Http\Controllers\avi_dveri\admin\FittingController;
use App\Http\Controllers\avi_dveri\admin\ImageController;
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

//require __DIR__.'/auth.php';

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/payment-and-delivery', [MainController::class, 'payment_and_delivery'])->name('payment_and_delivery');

Route::prefix('catalog')->group(function (){
    Route::get('/', [MainController::class, 'catalog'])->name('catalog');
    Route::get('/accessories', [MainController::class, 'accessories'])->name('accessories');
    Route::get('/entrance_doors', [MainController::class, 'entrance_doors'])->name('entrance_doors');
    Route::get('/interior_doors', [MainController::class, 'interior_doors'])->name('interior_doors');
});

Route::get('/product_page', [MainController::class, 'show_product'])->name('product_page');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
Route::post('/registration', [RegisterController::class, 'registration'])->name('save');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->where([])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/entrance_doors', [AdminController::class, 'entrance_doors'])->name('entrance_doors');
    Route::get('/interior_doors', [AdminController::class, 'interior_doors'])->name('interior_doors');

    Route::resources([
        'doors' => DoorController::class,
        'fittings' => FittingController::class,
        'images' => ImageController::class,
    ]);
});