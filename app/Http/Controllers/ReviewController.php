<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Genre;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
