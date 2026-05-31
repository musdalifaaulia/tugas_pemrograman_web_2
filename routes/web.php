<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/Movie', [MovieController::class, 'index']);

Route::get('/Movie', [MovieController::class, 'index'])->name('Movie.index');
Route::get('/Movie/create', [MovieController::class, 'create'])->name('Movie.create');
Route::post('/Movie/store', [MovieController::class, 'store'])->name('Movie.store');
Route::get('/Movie/{movie}/edit', [MovieController::class, 'edit'])->name('Movie.edit');
Route::put('/Movie/{movie}', [MovieController::class, 'update'])->name('Movie.update');
Route::delete('/Movie/{movie}', [MovieController::class, 'destroy'])->name('Movie.destroy');

Route::resource('genre', GenreController::class);