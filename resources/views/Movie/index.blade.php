<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <table class="table table-bordered border-primary">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Sutradara</th>
                <th>Tahun Rilis</th>
                <th>Durasi</th>
                <th>Rating</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>


</x-app>
