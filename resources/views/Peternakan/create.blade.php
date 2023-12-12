@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Peternakan</h1>
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
                            <Label>Jenis Ternak</Label>
                            <input type="text" class="form-control" name="3" placeholder="Masukkan Jenis Ternak..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Pakan Ternak</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Pakan Ternak..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Umur Ternak</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Umur Ternak..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Berat Ternak</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Berat Ternak..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Jumlah Ternak</Label>
                            <input type="text" class="form-control" name="#"
                                placeholder="Masukkan Jumlah Ternak..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Hewan Ternak</Label>
                            <input type="text" class="form-control" name="#"
                                placeholder="Masukkan Hewan Ternak..">
                        </div>
                        <center><input type="submit" class="btn btn-primary btn-sm ms-auto" value="Simpan Data" />
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
