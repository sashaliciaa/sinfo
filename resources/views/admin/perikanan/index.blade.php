@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Data Perikanan Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    Data Perikanan
                </span>
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        Tambah Data
                    </button>
                    <a href="{{ route('perikanan.printReport') }}" class="btn btn-dark" target="_blank"><i
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
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Ikan</th>
                        <th>Pakan</th>
                        <th>Jumlah Ikan</th>
                        <th>Berat Ikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perikanans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis_ikan }}</td>
                            <td>{{ $item->pakan }}</td>
                            <td>{{ $item->jumlah_ikan }} Ekor</td>
                            <td>{{ $item->berat_ikan }} Kg</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('perikanan.destroy', $item->id) }}" method="POST">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Perikanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('perikanan.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Jenis Ikan Input -->
                        <div class="form-group">
                            <label for="jenis_ikan" class="form-label">Jenis Ikan</label>
                            <input type="text" class="form-control" id="jenis_ikan" name="jenis_ikan"
                                placeholder="Masukkan Jenis Ikan" required>
                        </div>

                        <!-- Pakan Input -->
                        <div class="form-group">
                            <label for="pakan" class="form-label">Pakan</label>
                            <input type="text" class="form-control" id="pakan" name="pakan"
                                placeholder="Masukkan Pakan" required>
                        </div>

                        <!-- Jumlah Ikan Input -->
                        <div class="form-group">
                            <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
                            <input type="number" class="form-control" id="jumlah_ikan" name="jumlah_ikan"
                                placeholder="Masukkan Jumlah Ikan" required>
                        </div>

                        <!-- Berat Ikan Input -->
                        <div class="form-group">
                            <label for="berat_ikan" class="form-label">Berat Ikan</label>
                            <input type="text" class="form-control" id="berat_ikan" name="berat_ikan"
                                placeholder="Masukkan Berat Ikan" required>
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

    @foreach ($perikanans as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Perikanan {{ $item->jenis_ikan }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('perikanan.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Jenis Ikan Input -->
                            <div class="form-group">
                                <label for="jenis_ikan" class="form-label">Jenis Ikan</label>
                                <input type="text" class="form-control" id="jenis_ikan" name="jenis_ikan"
                                    value="{{ $item->jenis_ikan }}" required>
                            </div>

                            <!-- Pakan Input -->
                            <div class="form-group">
                                <label for="pakan" class="form-label">Pakan</label>
                                <input type="text" class="form-control" id="pakan" name="pakan"
                                    value="{{ $item->pakan }}" required>
                            </div>

                            <!-- Jumlah Ikan Input -->
                            <div class="form-group">
                                <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
                                <input type="number" class="form-control" id="jumlah_ikan" name="jumlah_ikan"
                                    value="{{ $item->jumlah_ikan }}" required>
                            </div>

                            <!-- Berat Ikan Input -->
                            <div class="form-group">
                                <label for="berat_ikan" class="form-label">Berat Ikan</label>
                                <input type="text" class="form-control" id="berat_ikan" name="berat_ikan"
                                    value="{{ $item->berat_ikan }}" required>
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
