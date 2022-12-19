@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-4">
        <center><h1 class="my-4">Halaman Data Pegawai</h1></center>
        
        <div class="card mb-3">
            {{-- membuat tabel  --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- melakukan looping data  --}}
                    @foreach ($pegawai as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->jabatan }}</td>
                            <td>{{ $p->umur }}</td>
                            <td>{{ $p->alamat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
        <h2>Current Page: {{ $pegawai->currentPage() }}</h2><br>
        Jumlah Data: {{ $pegawai->total() }}<br>
        Data perhalaman: {{ $pegawai->perPage() }}<br>
        <br>
        {{ $pegawai->links() }}
    </div>
</body>

@endsection
