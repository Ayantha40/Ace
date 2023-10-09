<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::post('add-product',[ProductsController::class,'adding']);


Route::middleware(['auth:sanctum', 'ability:admin'])->group(function(){

    Route::controller(ProductController::class)
			->prefix('products')
			->group(function() {
				Route::get('/all', 'index');
                Route::get('/product/{id}', 'getSingle');
				Route::post('/new', 'addNew');
				Route::put('/{id}/update', 'update');
				Route::delete('/{id}/delete', 'delete');
			});

	Route::controller(CustomerController::class)
			->prefix('customers')
			->group(function() {
				Route::get('/all', 'index');
                Route::get('/customer/{id}', 'getSingle');
				Route::post('/new', 'addNew');
				Route::put('/{id}/update', 'update');
				Route::delete('/{id}/delete', 'delete');
			});
});