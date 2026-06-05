@session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

<a class="btn btn-warning mb-3" href="{{ route('review.index') }}" role="button">Kembali</a>

<ul class="list-group">
    @foreach ($reviews as $item)
        <li class="list-group-item">
            {{ $loop->iteration }}.
            {{ $item->nama_pengguna }} --
            {{ $item->komentar }} --
            Rating: {{ $item->rating }} --
            {{ $item->tanggal_review }} --
            {{ $item->genre?->nama_genre }}
        </li>
    @endforeach
</ul>
