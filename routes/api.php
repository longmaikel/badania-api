<?php

use App\Http\Controllers\Api\TestCategoryController;
use App\Http\Controllers\Api\TestController;
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

Route::get('tests', [TestController::class, 'index']);
Route::post('tests', [TestController::class, 'store']);
Route::put('tests/{test}', [TestController::class, 'update']);
Route::delete('tests/{test}', [TestController::class, 'destroy']);

Route::get('test-categories', [TestCategoryController::class, 'index']);
Route::post('test-categories', [TestCategoryController::class, 'store']);
Route::put('test-categories/{test_category}', [TestCategoryController::class, 'update']);
Route::delete('test-categories/{test_category}', [TestCategoryController::class, 'destroy']);

//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
