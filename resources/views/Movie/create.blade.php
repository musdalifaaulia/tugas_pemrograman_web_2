<x-app>

    <x-slot:title>{{ $title }}</x-slot>
    <form method="POST" action="{{ route('Movie.store') }}">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Film</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                value="{{ old('judul') }}">

            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sutradara" class="form-label">Sutradara</label>
            <input type="text" class="form-control @error('sutradara') is-invalid @enderror" id="sutradara"
                name="sutradara" value="{{ old('sutradara') }}">

            @error('sutradara')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun_rilis" class="form-label">Tahun Rilis</label>
            <input type="number" class="form-control @error('tahun_rilis') is-invalid @enderror" id="tahun_rilis"
                name="tahun_rilis" value="{{ old('tahun_rilis') }}">

            @error('tahun_rilis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (Menit)</label>
            <input type="number" class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                name="durasi" value="{{ old('durasi') }}">

            @error('durasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" class="form-control @error('rating') is-invalid @enderror"
                id="rating" name="rating" value="{{ old('rating') }}">

            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('Movie.index') }}" role="button">Cancel</a>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</x-app>
