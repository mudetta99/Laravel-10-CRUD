<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProductController;



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

Route::get('/', function () {
    return redirect() -> route('products.index');
});


Route::get('/home', function () {
    return redirect() -> route('products.index');
});


// Route::resource('products', ProductController::class)-> auth('middleware'); => WRONG

// Route::resource('products', ProductController::class)-> middleware ('auth');
Route::resource('products', ProductController::class);





Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
