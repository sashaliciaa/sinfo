@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Perikanan</h1>
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
                            <Label>Jenis Ikan</Label>
                            <input type="text" class="form-control" name="3" placeholder="Masukkan Jenis Ikan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Pakan Ikan</Label>
                            <input type="text" class="form-control" name="#" placeholder="Masukkan Pakan Ikan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Jumlah Ikan</Label>
                            <input type="text" class="form-control" name="#"
                                placeholder="Masukkan Jumlah Ikan..">
                        </div>
                        <div class="form-group mb-3">
                            <Label>Berat Ikan</Label>
                            <input type="text" class="form-control" name="#"
                                placeholder="Masukkan Berat Ikan..">
                        </div>
                        <center><input type="submit" class="btn btn-primary btn-sm ms-auto" value="Simpan Data" />
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
