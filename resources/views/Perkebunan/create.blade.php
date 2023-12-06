@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Perkebunan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-0"></i>
                    Tambah Data

                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3">
                            <Label>Jenis Tanaman</Label>
                            <input type="text" class="form-control" name="3" placeholder="Masukkan Jenis Tanaman..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Waktu Tanam</Label>
                            <input type="text" class="form-control" name="#"
                                placeholder="Masukkan Waktu Tanam..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Waktu Panen</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Waktu Panen..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Luas Wilayah</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Luas Wilayah..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Foto</Label>
                            <input type="file" class="form-control" name="#">
                        </div>
                        <center><input type="submit" class="btn btn-primary btn-sm ms-auto" value="Simpan Data" />
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
