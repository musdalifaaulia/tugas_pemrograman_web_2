<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('genre.update', $genre) }}">

        @method('PUT')
        @csrf

        <div class="mb-3">

            <label for="nama_genre" class="form-label">Nama Genre</label>

            <input type="text" class="form-control @error('nama_genre') is-invalid @enderror" id="nama_genre"
                name="nama_genre" value="{{ old('nama_genre', $genre->nama_genre) }}">

            @error('nama_genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>


        <div class="mb-3">

            <label for="deskripsi" class="form-label">Deskripsi</label>

            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $genre->deskripsi) }}</textarea>

            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">

            <label for="status" class="form-label">Status</label>

            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                name="status" value="{{ old('status', $genre->status) }}">

            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <a class="btn btn-warning" href="{{ route('genre.index') }}" role="button">Cancel</a>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>

</x-app>
