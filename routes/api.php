<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::post('/category', [CategoryController::class, 'create']);
Route::put('/category', [CategoryController::class, 'update']);
Route::get('/category/{id}', [CategoryController::class, 'get']);
Route::delete('/category/{id}', [CategoryController::class, 'delete']);
Route::get('/category', [CategoryController::class, 'getAll']);

Route::post('/product', [ProductController::class, 'create']);
Route::put('/product', [ProductController::class, 'update']);
Route::get('/product/{id}', [ProductController::class, 'get']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
Route::get('/product', [ProductController::class, 'getAll']);
