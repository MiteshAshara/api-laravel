<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::apiResource('products',ProductController::class);
    Route::get('/movies', [MovieController::class, 'fetchAll'])->name('movies.fetch');
});