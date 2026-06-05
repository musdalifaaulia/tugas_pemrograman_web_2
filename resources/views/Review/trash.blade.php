@session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

<a class="btn btn-primary mb-3" href="{{ route('review.index') }}" role="button">Kembali</a>
<ul class="list-group">
    @foreach ($reviews as $item)
        <li class="list-group-item">
            {{ $loop->iteration }}.
            {{ $item->nama_pengguna }} --
            {{ $item->komentar }} --
            Rating: {{ $item->rating }} --
            {{ $item->tanggal_review }} --
            {{ $item->genre?->nama_genre }}

            <form action="{{ route('review.restore', $item) }}" method="POST" class="d-inline">
                @method('PUT')
                @csrf

                <button type="submit" class="btn btn-warning btn-sm"
                    onclick="return confirm('Anda yakin ingin mengembalikan data?')">
                    Restore
                </button>
            </form>

            <form action="{{ route('review.forceDelete', $item) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Anda yakin ingin menghapus secara permanen?')">Force Delete</button>
            </form>
        </li>
    @endforeach
</ul>
