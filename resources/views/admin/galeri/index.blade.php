@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Galeri Foto</h3>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-images me-1"></i>
                    Galeri Foto
                </span>
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Tambah Foto
                </button>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('fail'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Foto</th>
                        <th>Foto Galeri</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_foto }}</td>
                            <td>
                                <img width="100px" src="{{ asset('Foto_galeri/' . $item->foto_galeri) }}"
                                    class="img-thumbnail" alt="Foto Galeri">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('galeri.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Foto Ini..?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Foto Galeri</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Nama Foto Input -->
                        <div class="form-group">
                            <label for="nama_foto" class="form-label">Nama Foto</label>
                            <input type="text" class="form-control" id="nama_foto" name="nama_foto"
                                placeholder="Masukkan Nama Foto" required>
                        </div>
                        <!-- Foto Galeri Input -->
                        <div class="form-group">
                            <label for="foto_galeri" class="form-label">Foto Galeri</label>
                            <input type="file" class="form-control" id="foto_galeri" name="foto_galeri" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($galeri as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Galeri</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('galeri.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Nama Foto Input -->
                            <div class="form-group">
                                <label for="nama_foto" class="form-label">Nama Foto</label>
                                <input type="text" class="form-control" id="nama_foto" name="nama_foto"
                                    value="{{ $item->nama_foto }}" required>
                            </div>
                            <!-- Foto Galeri Input -->
                            <div class="form-group">
                                <label for="foto_galeri" class="form-label">Foto Galeri</label>
                                <input type="file" class="form-control" id="foto_galeri" name="foto_galeri">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
