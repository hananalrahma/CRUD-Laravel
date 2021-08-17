@extends('layout/main')

@section('title', 'Daftar Pegawai')

@section('container')
<div class="container">

    <div class="row">

        <div class="col-6">

            <h1 class="mt-3">Data Pegawai</h1>

            <!-- search -->
            <div>
                <form class="col-md-6" action="/employees" method="get">
                    <div class="input-group">
                        <input type="cari" name="cari" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="/employees/create" class="btn btn-primary my-3">Tambah Data</a>
    <a href="export/" class="btn btn-outline-warning my-3">Export Data</a>
    <!--End search -->
    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('file') }}</strong>
    </span>
    @endif


    <button type="button" class="btn btn-outline-success mr-5 " data-toggle="modal" data-target="#importExcel">
        Import Excel
    </button>
    {{-- notifikasi sukses --}}
    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $sukses }}</strong>
    </div>
    @endif

    <!-- Import Excel -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/employees/import" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--End Import Excel -->

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <table class="table table-bordered table-hover table-responsive-md">
        <tr>
            <thead class="thead-dark">
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Umur</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">No.Hp</th>
                <th scope="col">Aksi</th>
            </thead>
        </tr>

        <tbody>

            @foreach ($employee as $employee)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$employee->nama}}</td>
                <td>{{$employee->jabatan}}</td>
                <td>{{$employee->umur}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->alamat}}</td>
                <td>{{$employee->no_hp}}</td>
                <td>
                    <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary">Edit</a>

                    <form action="/employees/{{$employee->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>
@endsection