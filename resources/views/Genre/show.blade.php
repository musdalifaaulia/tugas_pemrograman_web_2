<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-warning mb-3" href="{{ route('genre.index') }}" role="button">Back</a>

    {{-- genre --}}

    <h6>Data Genre</h6>

    <ul class="list-group mb-3">

        <li class="list-group-item">Nama Genre : {{ $genre->nama_genre }}</li>

        <li class="list-group-item">Status : {{ $genre->status }}</li>

        <li class="list-group-item">Deskripsi : {{ $genre->deskripsi }}</li>

        <li class="list-group-item">Created At : {{ $genre->created_at->format('d F Y H:i:s') }}</li>

        <li class="list-group-item">Last Update : {{ $genre->updated_at->diffForHumans() }}</li>

    </ul>


</x-app>
