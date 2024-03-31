<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(["namespace"=>"App\Http\Controllers"],function() {
//     Route::post('auth/login','UserController@login');
//     Route::post('auth/register','UserController@register');
//     Route::post('auth/checkEmail','UserController@checkEmail');
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('checkEmail',[AuthController::class,'checkEmail']);
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    Route::post('category/add',[CategoryController::class,'add']);
    Route::post('category/getCategories',[CategoryController::class,'getCategories']);
    Route::post('product/add',[ProductController::class,'add']);
    Route::post('product/getAll',[ProductController::class,'getAll']);
    Route::post('product/edit',[ProductController::class,'edit']);
    Route::post('product/delete',[ProductController::class,'delete']);
});

