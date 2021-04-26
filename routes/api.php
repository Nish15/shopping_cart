<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'API',
    'middleware' => 'auth:api'
], function() {

    Route::group([
        'prefix' => 'category'
    ], function() {
        Route::get('list', [CategoryController::class, 'getCategory']);
        Route::post('create', [CategoryController::class, 'createCategory']);
    });

    Route::group([
        'prefix' => 'product'
    ], function() {
        Route::get('list', [ProductController::class, 'getProduct']);
        Route::post('create', [ProductController::class, 'createProduct']);
    });

    Route::group([
        'prefix' => 'cart'
    ], function() {
        Route::get('list', [CartController::class, 'getCartListByUserId']);
        Route::post('add/{product}', [CartController::class, 'addProductInCart']);
    });
});
