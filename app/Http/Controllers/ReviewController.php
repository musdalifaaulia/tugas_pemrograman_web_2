<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::latest();
        $keyword = request('keyword');

        if ($keyword) {
        $reviews->where('nama_pengguna', 'like', '%' . $keyword . '%');}

        $genre_id = request('genre_id');

        if ($genre_id) {
        $reviews->where('genre_id', $genre_id);}

        return view('review.index', [
        'title' => 'Review',

        'genres' => Genre::latest()->get(),

        'reviews' => $reviews->paginate(5)->withQueryString(),

]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review.create', 
        ['title' => 'Tambah Review',
        'genres' => Genre::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

    'nama_pengguna' => 'required|max:255',

    'komentar' => 'required|max:255',

    'rating' => 'required|integer|min:1|max:10',

    'tanggal_review' => 'required|date',

    'genre_id' => 'required|exists:genres,id',

    'gender' => 'required|in:Laki-laki,Perempuan',

], [

    'nama_pengguna.required' => 'Nama Pengguna tidak boleh kosong',
    'nama_pengguna.max' => 'Nama Pengguna maksimal 255 karakter',

    'komentar.required' => 'Komentar tidak boleh kosong',
    'komentar.max' => 'Komentar maksimal 255 karakter',

    'rating.required' => 'Rating tidak boleh kosong',
    'rating.integer' => 'Rating harus berupa angka',
    'rating.min' => 'Rating minimal 1',
    'rating.max' => 'Rating maksimal 10',

    'tanggal_review.required' => 'Tanggal Review tidak boleh kosong',
    'tanggal_review.date' => 'Format Tanggal Review tidak valid',

    'genre_id.required' => 'Genre tidak boleh kosong',
    'genre_id.exists' => 'Genre yang dipilih tidak ditemukan',

    'gender.required' => 'Gender tidak boleh kosong',
    'gender.in' => 'Gender tidak valid',
        ]);

    try {
        DB::beginTransaction(); 
        Review::create($validated);
        DB::commit();

    return to_route('review.index')
        ->withSuccess('Data Review berhasil ditambahkan');

    }
    catch (\Exception $e) {

    DB::rollBack();

    return to_route('review.create')
        ->withError('Data Review gagal ditambahkan');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('review.show', [
            'title' => 'Detail Review',
            'review' => $review,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('review.edit', [
            'title' => 'Edit Review',
            'review' => $review,
            'genres' => Genre::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
    'nama_pengguna' => 'required|max:255',
    'komentar' => 'required|max:255',
    'rating' => 'required|integer|min:1|max:10',
    'tanggal_review' => 'required|date',
    'genre_id' => 'required|exists:genres,id',
], [

    'nama_pengguna.required' => 'Nama Pengguna tidak boleh kosong',
    'nama_pengguna.max' => 'Nama Pengguna maksimal 255 karakter',

    'komentar.required' => 'Komentar tidak boleh kosong',
    'komentar.max' => 'Komentar maksimal 255 karakter',

    'rating.required' => 'Rating tidak boleh kosong',
    'rating.integer' => 'Rating harus berupa angka',
    'rating.min' => 'Rating minimal 1',
    'rating.max' => 'Rating maksimal 10',

    'tanggal_review.required' => 'Tanggal Review tidak boleh kosong',
    'tanggal_review.date' => 'Tanggal Review tidak valid',

    'genre_id.required' => 'Genre tidak boleh kosong',
    'genre_id.exists' => 'Genre yang dipilih tidak ditemukan',
]);

$review->update($validated);

return to_route('review.index')
    ->withSuccess('Data Review berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
    $review->delete();
        return to_route('review.index')->withSuccess('Data Dusun berhasil dihapus');
    }
}
