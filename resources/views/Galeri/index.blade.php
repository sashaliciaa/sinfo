@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Galeri</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
                <a class="btn btn-primary btn-sm ms-auto" href="{{ route('galeri.create') }}">+ Tambah
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
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>
                                    <form action ="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editGaleri"><i class="fas fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit Motor -->
    <div class="modal fade" id="editGaleri" tabindex="-1" role="dialog" aria-labelledby="editGaleriLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGaleriLabel">Edit Galeri</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <img class="img-fluid" src="#" alt="">
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
