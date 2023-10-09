<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('home');
})->name('home');

Route::post('/create-checkout-session', [App\Http\Controllers\StripeController::class, 'checkout'])->name('checkout');

Route::post('/create-order', [App\Http\Controllers\StripeController::class, 'checkout'])->name('checkout');
Route::post('/save-order', [App\Http\Controllers\StripeController::class, 'saveOrder'])->name('save.order');
Route::get('/branches', 'App\Http\Controllers\BranchController@index');

Auth::routes();
Route::post('/uploadteam',[App\Http\Controllers\AdminController::class,'uploadteam']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', 'App\Http\Controllers\MessageController@store')->name("messages.store");
Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name("user.edit");
Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name("user.update");
Route::delete('/{id}', 'App\Http\Controllers\UserController@destroy')->name("user.destroy");
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
          

/*Admin*/

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('index');
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
    Route::get("/search",[App\Http\Controllers\Admin\AdminController::class,'search']);
    Route::get('/users/{id}', [App\Http\Controllers\Admin\AdminController::class, 'getUserDetails']);

});