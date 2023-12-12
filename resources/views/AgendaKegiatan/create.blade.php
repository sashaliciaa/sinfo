@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Agenda Kegiatan</h1>
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
                            <Label>Nama Kegiatan</Label>
                            <input type="text" class="form-control" name="3"
                                placeholder="Masukkan Nama Kegiatan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Waktu Kegiatan</Label>
                            <input type="date" class="form-control" name="#"
                                placeholder="Masukkan Waktu Kegiatan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Lokasi Kegiatan</Label>
                            <input type="text" class="form-control" name="3"
                                placeholder="Masukkan Lokasi Kegiatan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Deskripsi Kegiatan</Label>
                            <input type="text" class="form-control" name="3"
                                placeholder="Masukkan Deskripsi Kegiatan..">
                        </div>
                        <center><input type="submit" class="btn btn-primary btn-sm ms-auto" value="Simpan Data" />
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
