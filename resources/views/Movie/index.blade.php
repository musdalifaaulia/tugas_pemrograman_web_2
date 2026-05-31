<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('Movie.create') }}" role="button">Create</a>

    <table class="table table-bordered border-primary">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Sutradara</th>
                <th>Tahun Rilis</th>
                <th>Durasi</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($movies as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->sutradara }}</td>
                    <td>{{ $item->tahun_rilis }}</td>
                    <td>{{ $item->durasi }} menit</td>
                    <td>{{ $item->rating }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('Movie.edit', $item) }}" role="button">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</x-app>
