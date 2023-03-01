<?php

use App\Http\Controllers\Lichi\IndexController;
use App\Http\Controllers\TssController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/web', [WebController::class, 'index']);
Route::get('/tss', [TssController::class, 'index']);

Route::group(['namespace' => 'Lichi','prefix' => 'lichi' ], function(){
    Route::get('/test1', [IndexController::class, '__invoke']);
    Route::get('/test2', [IndexController::class, '__invoke']);
    Route::get('/test3', [IndexController::class, '__invoke']);
    Route::get('/test4', [IndexController::class, '__invoke']);
    Route::get('/test5', [IndexController::class, '__invoke']);
});
Auth::routes();


