@extends('layout/main')

@section('title', 'Ubah Data Pegawai')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Ubah Data Pegwai</h1>

            <form method="post" action="/employees/{{$employee->id}}">
                @method('patch')
                @csrf

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama" name="nama" value="{{$employee->nama}}">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" placeholder="Masukkan jabatan" name="jabatan" value="{{$employee->jabatan}}">

                </div>

                <div class=" form-group">
                    <label for="jurusan">Umur</label>
                    <input type="text" class="form-control" id="umur" placeholder="Masukkan Umur" name="umur" value="{{$employee->umur}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan email" name="email" value="{{$employee->email}}">
                </div>

                <div class="form-group">
                    <label for="email">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat" value="{{$employee->alamat}}">
                </div>

                <div class="form-group">
                    <label for="email">Nomor Hp</label>
                    <input type="text" class="form-control" id="no_hp" placeholder="Masukkan no.hp" name="no_hp" value="{{$employee->no_hp}}">
                </div>

                <button type=" submit" class="btn btn-primary">Ubah Data</button>
                <a href="/employees" class="btn btn-success">Kembali</a>

            </form>

        </div>
    </div>
</div>
@endsection