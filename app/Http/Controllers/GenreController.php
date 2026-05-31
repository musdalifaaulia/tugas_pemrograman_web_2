<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    return view('genre.index', [
        'title' => 'Genre',
        'genres' => Genre::latest()
            ->when($request->search, function ($query, $search) {
                return $query->where('nama_genre', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->withQueryString(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create', 
        ['title' => 'Tambah Genre',]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
    'nama_genre' => 'required|max:255',
    'deskripsi' => 'required|max:255',
    'status' => 'required|max:255',
], [

    'nama_genre.required' => 'Nama Genre tidak boleh kosong',
    'nama_genre.max' => 'Nama Genre maksimal 255 karakter',

    'deskripsi.required' => 'Deskripsi tidak boleh kosong',
    'deskripsi.max' => 'Deskripsi maksimal 255 karakter',

    'status.required' => 'Status tidak boleh kosong',
    'status.max' => 'Status maksimal 255 karakter',

]);

Genre::create($validated);

return to_route('genre.index')
    ->withSuccess('Data Genre berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('genre.show', 
        ['title' => 'Detail Genre',
        'genre'=> $genre,
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit',[
            'title' => 'Edit Genre',
            'genre' => $genre,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
    'nama_genre' => 'required|max:255',
    'deskripsi' => 'required|max:255',
    'status' => 'required|max:255',
], [

    'nama_genre.required' => 'Nama Genre tidak boleh kosong',
    'nama_genre.max' => 'Nama Genre maximal 255 karakter',

    'deskripsi.required' => 'Deskripsi tidak boleh kosong',
    'deskripsi.max' => 'Deskripsi maximal 255 karakter',
    
    'status.required' => 'Status tidak boleh kosong',
    'status.max' => 'Status maximal 255 karakter',
]);

$genre->update($validated);

return to_route('genre.index')
    ->withSuccess('Data Genre berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete($genre);
            return to_route('genre.index')->withSuccess('Data Genre berhasil dihapus');
    }
}
