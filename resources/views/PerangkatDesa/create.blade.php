@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Perangkat Desa</h1>
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
                            <Label>Nama Depan</Label>
                            <input type="text" class="form-control" name="3" placeholder="Masukkan Nama Depan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Nama Belakang</Label>
                            <input type="text" class="form-control" name="#"
                                placeholder="Masukkan Nama Belakang..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Alamat</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Alamat..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>No Telpon</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan No Telpon..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Email</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Email..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Username</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Username..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Password</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Password..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Jabatan</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Jabatan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Tanggal Mulai Jabat</Label>
                            <input type="date" class="form-control" name="#"
                                placeholder="Masukkan Tanggal Mulai Jabat..">
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
