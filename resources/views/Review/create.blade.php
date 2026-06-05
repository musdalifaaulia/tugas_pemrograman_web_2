<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('review.store') }}">

        @csrf

        <div class="mb-3">
            <label for="nama_pengguna" class="form-label">Nama Pengguna</label>

            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" id="nama_pengguna"
                name="nama_pengguna" value="{{ old('nama_pengguna') }}">

            @error('nama_pengguna')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>

            <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" name="komentar" rows="3">{{ old('komentar') }}</textarea>

            @error('komentar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>

            <input type="number" min="1" max="10"
                class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating"
                value="{{ old('rating') }}">

            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_review" class="form-label">Tanggal Review</label>

            <input type="date" class="form-control @error('tanggal_review') is-invalid @enderror" id="tanggal_review"
                name="tanggal_review" value="{{ old('tanggal_review') }}">

            @error('tanggal_review')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>

            <select class="form-control @error('genre_id') is-invalid @enderror" id="genre_id" name="genre_id">

                <option value="">-- Pilih Genre --</option>

                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->nama_genre }}
                    </option>
                @endforeach

            </select>

            @error('genre_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>

            @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <a class="btn btn-warning" href="{{ route('review.index') }}" role="button">
            Cancel
        </a>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>

    </form>

</x-app>
