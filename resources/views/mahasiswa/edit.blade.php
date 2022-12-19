@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            @if (session('Sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('Sukses') }}
                </div>
            @endif

            <h1 class="py-3">Edit Data Mahasiswa</h1>

            <div class="row">
                <form method="post" action="/mahasiswa/{{ $mahasiswa->id }}/update">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="text" class="form-control mt-2" id="exampleInputEmail1"
                            aria-describedby="EmailHelp" placeholder="Nama Mahasiswa" value="{{ $mahasiswa->nama }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">NIM</label>
                        <input name="nim" type="text" class="form-control mt-2" id="exampleInputEmail1"
                            aria-describedby="EmailHelp" placeholder="Nomor Induk Mahasiswa" value="{{ $mahasiswa->nim }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea name="alamat" class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Alamat Mahasiswa">{{ $mahasiswa->alamat }}</textarea>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/mahasiswa" class="btn btn-danger mx-3">Cancel</a>
                    </div>
                </form>
            </div>
    </body>
@endsection
