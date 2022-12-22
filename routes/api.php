<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\CreateControllerProduct;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('product',controller:App\Http\Controllers\API\ProductController::class);
Route::post('addProduct', [ProductController::class, 'insertProduct']);
Route::get('editProduct/{id}', [ProductController::class, 'editProduct']);
Route::put('updateProduct', [ProductController::class, 'updateProduct']);

Route::apiResource('admin',controller:App\Http\Controllers\API\AdminController::class);
Route::put('updateAdmin', [AdminController::class, 'updateAdmin']);

Route::apiResource('support',controller:App\Http\Controllers\API\SupportController::class);
Route::put('updateSupport', [SupportController::class, 'updateSupport']);

Route::apiResource('tag',controller:App\Http\Controllers\API\TagController::class);


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    // Route::get('boards', [BoardController::class, 'index']);
    // Route::post('boards', [BoardController::class, 'store']);
    // Route::get('/boards/{board}', [BoardController::class, 'show']);
    // Route::put('boards', [BoardController::class, 'update']);
    // Route::delete('boards', [BoardController::class, 'destroy']);

   


    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class, 'logout']);
      Route::get('user', [AuthController::class, 'user']);
    });



    
});

