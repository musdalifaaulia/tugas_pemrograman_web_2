<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Movie', function () {
    return view('Movie.index', ['title' => 'Movie']);
});

Route::get('/Movie/create', function () {
    return view('Movie.create', ['title' => 'Create Movie']);
});