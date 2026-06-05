<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('review.create') }}" role="button">Create</a>

    <form action="">

        <div class="row g-3 mb-3">

            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search reviewer name ..." value="{{ request('keyword') }}">
            </div>

            <div class="col-md-4">

                <select class="form-select" id="genre_id" name="genre_id">

                    <option value="">All Genre</option>

                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->nama_genre }}
                        </option>
                    @endforeach

                </select>

            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>

        </div>

    </form>

    <table class="table table-bordered border-primary">

        <thead class="table-primary">

            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Komentar</th>
                <th>Rating</th>
                <th>Tanggal Review</th>
                <th>Genre</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $reviews->firstItem() + $loop->index }}</td>
                    <td>{{ $review->nama_pengguna }}</td>
                    <td>{{ $review->komentar }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->tanggal_review }}</td>
                    <td>{{ $review->genre->nama_genre }}</td>
                    <td>{{ $review->gender }}</td>
                    <td style="white-space: nowrap;">
                        <a class="btn btn-info btn-sm" href="{{ route('review.show', $review) }}"
                            role="button">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('review.edit', $review) }}"
                            role="button">Edit</a>
                        <form action="{{ route('review.destroy', $review) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Anda yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Data Review Tidak Ditemukan
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{ $reviews->links() }}

</x-app>
