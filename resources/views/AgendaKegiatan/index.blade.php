@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Agenda Kegiatan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
                <a class="btn btn-primary btn-sm ms-auto" href="{{ route('agendakegiatan.create') }}">+ Tambah
                    Data</a>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-0"></i>
                    DataTable Example

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Lokasi Kegiatan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>
                                    <form action ="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editDataPerangkatDesa"><i class="fas fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Lokasi Kegiatan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit Motor -->
    <div class="modal fade" id="editDataPerangkatDesa" tabindex="-1" role="dialog"
        aria-labelledby="editDataPerangkatDesaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataPerangkatDesaLabel">Edit Data Agenda Kegiatan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="#" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="#" name="#" value="#">
                        </div>

                        <div class="mb-3">
                            <label for="#" class="form-label">Waktu Kegiatan</label>
                            <input type="date" class="form-control" id="#" name="#" value="#">
                        </div>

                        <div class="mb-3">
                            <label for="#" class="form-label">Lokasi Kegiatan</label>
                            <input type="text" class="form-control" id="#" name="#" value="#">
                        </div>

                        <div class="mb-3">
                            <label for="#" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="#" name="#" value="#">
                        </div>


                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
