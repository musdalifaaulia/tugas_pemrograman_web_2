<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-warning mb-3" href="{{ route('review.index') }}" role="button">Back</a>

    {{-- review --}}

    <h6>Data Review</h6>

    <ul class="list-group mb-3">

        <li class="list-group-item">
            Nama Pengguna: {{ $review->nama_pengguna }}
        </li>

        <li class="list-group-item">
            Komentar: {{ $review->komentar }}
        </li>

        <li class="list-group-item">
            Rating: {{ $review->rating }}
        </li>

        <li class="list-group-item">
            Tanggal Review: {{ $review->tanggal_review }}
        </li>

        <li class="list-group-item">
            Genre: {{ $review->genre?->nama_genre }}
        </li>

        <li class="list-group-item">
            Created At: {{ $review->created_at->format('d F Y H:i:s') }}
        </li>

        <li class="list-group-item">
            Last Update: {{ $review->updated_at->diffForHumans() }}
        </li>

    </ul>

</x-app>
