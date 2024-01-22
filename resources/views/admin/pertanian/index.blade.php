@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Data Pertanian Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    Data Pertanian
                </span>
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        Tambah Data
                    </button>
                    <a href="{{ route('pertanian.printReport') }}" class="btn btn-dark" target="_blank"><i
                            class="fas fa-print"></i> Print</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table id="datatablesSimple" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Tanaman</th>
                        <th>Waktu Tanam</th>
                        <th>Waktu Panen</th>
                        <th>Luas Wilayah Tanam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pertanians as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis_tanaman }}</td>
                            <td>{{ $item->waktu_tanam }}</td>
                            <td>{{ $item->waktu_panen }}</td>
                            <td>{{ $item->luas_wilayah_tanam }} m<sup>2</sup></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('pertanian.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini..?')">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pertanian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('pertanian.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Jenis Tanaman Input -->
                        <div class="form-group">
                            <label for="jenis_tanaman" class="form-label">Jenis Tanaman</label>
                            <input type="text" class="form-control" id="jenis_tanaman" name="jenis_tanaman"
                                placeholder="Masukkan Jenis Tanaman" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <!-- Waktu Tanam Input -->
                                    <div class="form-group">
                                        <label for="waktu_tanam" class="form-label">Waktu Tanam</label>
                                        <input type="date" class="form-control" id="waktu_tanam" name="waktu_tanam"
                                            required>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Waktu Panen Input -->
                                    <div class="form-group">
                                        <label for="waktu_panen" class="form-label">Waktu Panen</label>
                                        <input type="date" class="form-control" id="waktu_panen" name="waktu_panen"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Luas Wilayah Tanam Input -->
                        <div class="form-group">
                            <label for="luas_wilayah_tanam" class="form-label">Luas Wilayah Tanam</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukkan Luas Wilayah Tanam"
                                    id="luas_wilayah_tanam" name="luas_wilayah_tanam"
                                    aria-label="Masukkan Luas Wilayah Tanam" aria-describedby="basic-addon2" required>
                                <span class="input-group-text" id="basic-addon2">m<sup>2</sup></span>
                            </div>
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

    @foreach ($pertanians as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pertanian
                            {{ $item->jenis_tanaman }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('pertanian.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Jenis Tanaman Input -->
                            <div class="form-group">
                                <label for="jenis_tanaman" class="form-label">Jenis Tanaman</label>
                                <input type="text" class="form-control" id="jenis_tanaman" name="jenis_tanaman"
                                    value="{{ $item->jenis_tanaman }}" required>
                            </div>

                            <!-- Waktu Tanam Input -->
                            <div class="form-group">
                                <label for="waktu_tanam" class="form-label">Waktu Tanam</label>
                                <input type="date" class="form-control" id="waktu_tanam" name="waktu_tanam"
                                    value="{{ $item->waktu_tanam }}" required>
                            </div>

                            <!-- Waktu Panen Input -->
                            <div class="form-group">
                                <label for="waktu_panen" class="form-label">Waktu Panen</label>
                                <input type="date" class="form-control" id="waktu_panen" name="waktu_panen"
                                    value="{{ $item->waktu_panen }}" required>
                            </div>

                            <!-- Luas Wilayah Tanam Input -->
                            <div class="form-group">
                                <label for="luas_wilayah_tanam" class="form-label">Luas Wilayah Tanam</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan Luas Wilayah Tanam"
                                        id="luas_wilayah_tanam" name="luas_wilayah_tanam"
                                        aria-label="Masukkan Luas Wilayah Tanam" aria-describedby="basic-addon2"
                                        value="{{ $item->luas_wilayah_tanam }}" required>
                                    <span class="input-group-text" id="basic-addon2">m<sup>2</sup></span>
                                </div>
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
