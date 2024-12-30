<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', [MovieController::class, 'index'])->name('index');
Route::post('/movies/store', [MovieController::class, 'store'])->name('movie.store');
Route::get('/movies/edit/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movies/update/{movie}', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movies/delete/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');