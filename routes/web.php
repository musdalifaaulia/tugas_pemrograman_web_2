<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/Movie', [MovieController::class, 'index']);
Route::get('/Movie/create', [MovieController::class, 'create']);

