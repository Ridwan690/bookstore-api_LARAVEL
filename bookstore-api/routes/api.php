<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShopController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nama', function () {
    return 'Bookstore API';
});

Route::get('category/{id}', function ($id) {
    $categories = [
        1 => 'Matematika',
        2 => 'Bahasa',
        3 => 'Teknologi',
    ];
    $id = (int) $id;
    if($id==0) return 'Silahkan Pilih Kategori';
    else return 'Anda Memilih Kategori <b>' .$categories[$id]. '</b>';
});

Route::get('book/{id}', function () {
    return 'Menampilkan Buku';
})->where('id', '[0-9]+');


Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::group(['middleware' => 'cors'], function () {
        Route::post('logout',[AuthController::class,'logout']);
        Route::post('shipping', [ShopController::class, 'shipping']);
        Route::post('services', [ShopController::class, 'services']);
    });

    Route::get('books', [BookController::class, 'index']);
    Route::get('categories', [BookController::class, 'categories']);
    Route::get('book/{id}', [BookController::class, 'view'])->where('id', '[0-9]+');

    Route::get('categories/random/{count}', [CategoryController::class, 'random']);
    Route::get('books/top/{count}', [BookController::class, 'top']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('books', [BookController::class, 'index']);
    Route::get('categories/slug/{slug}', [CategoryController::class, 'slug']);
    Route::get('books/slug/{slug}', [BookController::class, 'slug']);
    Route::get('books/search/{keyword}', [BookController::class, 'search']);
    Route::get('provinces', [ShopController::class, 'provinces']);
    Route::get('cities', [ShopController::class, 'cities']);
    Route::get('couriers', [ShopController::class, 'couriers']);
    
});



Route::get('buku/{title}', 'App\Http\Controllers\BookController@print');

Route::middleware(['cors'])->group(function () {
    Route::get('buku/{title}', 'App\Http\Controllers\BookController@print');
});
