<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Movie.index', [
        'title' => 'Data Movie',
        'movies' => Movie::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Movie.create', 
        ['title' => 'Tambah Data Movie']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
    'judul' => 'required|max:255',
    'sutradara' => 'required|max:255',
    'tahun_rilis' => 'required|numeric',
    'durasi' => 'required|numeric',
    'rating' => 'required|numeric|between:1,10',
], [
    'judul.required' => 'Judul film tidak boleh kosong',
    'judul.max' => 'Judul film maksimal 255 karakter',

    'sutradara.required' => 'Nama sutradara tidak boleh kosong',
    'sutradara.max' => 'Nama sutradara maksimal 255 karakter',

    'tahun_rilis.required' => 'Tahun rilis tidak boleh kosong',
    'tahun_rilis.numeric' => 'Tahun rilis harus berupa angka',

    'durasi.required' => 'Durasi tidak boleh kosong',
    'durasi.numeric' => 'Durasi harus berupa angka',

    'rating.required' => 'Rating tidak boleh kosong',
    'rating.numeric' => 'Rating harus berupa angka',
    'rating.between' => 'Rating harus antara 1 sampai 10',
]);

Movie::create($validated);

return to_route('Movie.index')
    ->withSuccess('Data movie berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('Movie.edit',[
            'title' => 'Edit Movie',
            'movie' => $movie,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
    'judul' => 'required|max:255',
    'sutradara' => 'required|max:255',
    'tahun_rilis' => 'required|numeric',
    'durasi' => 'required|numeric',
    'rating' => 'required|numeric|between:1,10',
], [
    'judul.required' => 'Judul film tidak boleh kosong',
    'judul.max' => 'Judul film maksimal 255 karakter',

    'sutradara.required' => 'Nama sutradara tidak boleh kosong',
    'sutradara.max' => 'Nama sutradara maksimal 255 karakter',

    'tahun_rilis.required' => 'Tahun rilis tidak boleh kosong',
    'tahun_rilis.numeric' => 'Tahun rilis harus berupa angka',

    'durasi.required' => 'Durasi tidak boleh kosong',
    'durasi.numeric' => 'Durasi harus berupa angka',

    'rating.required' => 'Rating tidak boleh kosong',
    'rating.numeric' => 'Rating harus berupa angka',
    'rating.between' => 'Rating harus antara 1 sampai 10',
]);

$movie->update($validated);

return to_route('Movie.index')
    ->withSuccess('Data movie berhasil diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
