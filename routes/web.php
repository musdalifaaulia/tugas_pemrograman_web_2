<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/Movie', [MovieController::class, 'index']);

Route::get('/Movie', [MovieController::class, 'index'])->name('Movie.index');
Route::get('/Movie/create', [MovieController::class, 'create'])->name('Movie.create');
Route::get('/Movie/store', [MovieController::class, 'store'])->name('Movie.store');

