<?php

use App\Http\Controllers\catalog\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('catalog.home'); antes era asi
// });




// grupo para aplicar login obligatorio a estas rutas:
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'getHome']);

    Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

    Route::get('catalog/create', [CatalogController::class, 'getCreate']);

    Route::post('catalog/create', [CatalogController::class, 'postCreate']);

    Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);
    Route::put('catalog/edit/{id}', [CatalogController::class, 'putEdit']);

    Route::get('catalog', [CatalogController::class, 'getIndex']);

    Route::put('catalog/rent/{id}', [CatalogController::class, 'putRent']);
    Route::put('catalog/return/{id}', [CatalogController::class, 'putReturn']);
    Route::delete('catalog/delete/{id}', [CatalogController::class, 'deleteMovie']);
});



Auth::routes();
//Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
