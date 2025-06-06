<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/services',[ServiceController::class, 'index']);
Route::get('/products',[ProductController::class, 'index']);
Route::get('/team',[TeamController::class, 'index']);

Route::post('/addService',[ServiceController::class, 'store']);
Route::post('/addProduct',[ProductController::class, 'store']);
Route::post('/addTeam',[TeamController::class, 'store']);

Route::get('/delete-service/{id}',[ServiceController::class, 'delete']);
Route::get('/delete-product/{id}',[ProductController::class, 'delete']);
Route::get('/delete-team/{id}',[TeamController::class, 'delete']);


Route::post('/user',[UserController::class, 'store']);
Route::post('/login',[UserController::class, 'login']);

Route::get('/authenticate',[AuthController::class, 'Authentication']);

 