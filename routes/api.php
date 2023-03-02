<?php

use App\Http\Controllers\Lichi\Test1Controller;
use App\Http\Controllers\Lichi\Test2Controller;
use App\Http\Controllers\Lichi\Test3Controller;
use App\Http\Controllers\Lichi\Test41Controller;
use App\Http\Controllers\Lichi\Test4Controller;
use App\Http\Controllers\People\IndexController;
use App\Http\Controllers\People\StoreController;
use App\Http\Controllers\TssController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'tss' ], function(){
    Route::get('/all', [TssController::class, 'index']);
});
Route::group(['namespace' => 'People','prefix' => 'people' ], function(){
    Route::get('/', [IndexController::class, '__invoke']);
    Route::post('/add', [StoreController::class, '__invoke']);
});
Route::group(['namespace' => 'Lichi','prefix' => 'lichi'], function(){
    Route::get('/test1', [Test1Controller::class, '__invoke']);
    Route::get('/test2', [Test2Controller::class, '__invoke']);
    Route::get('/test3', [Test3Controller::class, '__invoke']);
    Route::get('/test4', [Test4Controller::class, '__invoke']);
    Route::post('/test41', [Test41Controller::class, '__invoke']);
});
