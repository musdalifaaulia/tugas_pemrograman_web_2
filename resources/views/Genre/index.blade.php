<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('genre.create') }}" role="button">Create</a>

    <form action="{{ route('genre.index') }}" method="GET" class="mb-3">
        <div class="row">

            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari Genre..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Search</button>
            </div>

        </div>

    </form>

    <table class="table table-bordered border-primary">

        <thead class="table-primary">

            <tr>
                <th>No</th>
                <th>Nama Genre</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($genres as $item)
                <tr>

                    <td>{{ $genres->firstItem() + $loop->index }}</td>
                    <td>{{ $item->nama_genre }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->status }}</td>
                    <td style="white-space: nowrap;">
                        <a class="btn btn-info btn-sm" href="{{ route('genre.show', $item) }}"role="button">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('genre.edit', $item) }}"role="button">Edit</a>
                        <form action="{{ route('genre.destroy', $item) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Anda yakin?')">Delete</button>
                        </form>

                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Data Genre Tidak Ditemukan
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{ $genres->links() }}

</x-app>
