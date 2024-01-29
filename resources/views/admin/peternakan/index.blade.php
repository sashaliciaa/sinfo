@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Data Peternakan Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    Data Peternakan
                </span>
                <div class="ml-auto">
                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        Tambah Data
                    </button>
                    <a href="{{ route('peternakan.printReport') }}" class="btn btn-dark" target="_blank"><i
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
                        <th>Jenis Ternak</th>
                        <th>Hewan Ternak</th>
                        <th>Pakan</th>
                        <th>Umur Ternak</th>
                        <th>Berat Ternak</th>
                        <th>Jumlah Ternak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peternakans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis_ternak }}</td>
                            <td>{{ $item->hewan_ternak }}</td>
                            <td>{{ $item->pakan }}</td>
                            <td>{{ $item->umur_ternak }} Tahun</td>
                            <td>{{ $item->berat_ternak }} Kg</td>
                            <td>{{ $item->jumlah_ternak }} Ekor</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <!-- Delete Button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
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
                <div class="modal-header bg-success text-white" style="max-height: 40px">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Peternakan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('peternakan.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col"><!-- Jenis Ternak Input -->
                                <div class="form-group">
                                    <label for="jenis_ternak" class="form-label">Jenis Ternak</label>
                                    <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak"
                                        placeholder="Masukkan Jenis Ternak" required>
                                </div>
                            </div>
                            <div class="col"><!-- Hewan Ternak Input -->
                                <div class="form-group">
                                    <label for="hewan_ternak" class="form-label">Hewan Ternak</label>
                                    <input type="text" class="form-control" id="hewan_ternak" name="hewan_ternak"
                                        placeholder="Masukkan Hewan Ternak" required>
                                </div>
                            </div>
                        </div>

                        <!-- Pakan Input -->
                        <div class="form-group">
                            <label for="pakan" class="form-label">Pakan</label>
                            <input type="text" class="form-control" id="pakan" name="pakan"
                                placeholder="Masukkan Pakan" required>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- Umur Ternak Input -->
                                <div class="form-group">
                                    <label for="umur_ternak" class="form-label">Umur Ternak</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="umur_ternak" name="umur_ternak"
                                            aria-label="Masukkan Luas Wilayah Tanam" aria-describedby="basic-addon2"
                                            placeholder="Masukkan Umur Ternak" required>
                                        <span class="input-group-text" id="basic-addon2">Thn</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Berat Ternak Input -->
                                <div class="form-group">
                                    <label for="berat_ternak" class="form-label">Berat Ternak</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="berat_ternak" name="berat_ternak"
                                            aria-describedby="basic-addon2" placeholder="Masukkan Berat Ternak" required>
                                        <span class="input-group-text" id="basic-addon2">Kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Ternak Input -->
                        <div class="form-group">
                            <label for="jumlah_ternak" class="form-label">Jumlah Ternak</label>
                            <input type="number" class="form-control" id="jumlah_ternak" name="jumlah_ternak"
                                placeholder="Masukkan Jumlah Ternak" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($peternakans as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning" style="max-height: 40px">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data |
                            {{ $item->jenis_ternak }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('peternakan.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <!-- Jenis Ternak Input -->
                                    <div class="form-group">
                                        <label for="jenis_ternak" class="form-label">Jenis Ternak</label>
                                        <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak"
                                            value="{{ $item->jenis_ternak }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Hewan Ternak Input -->
                                    <div class="form-group">
                                        <label for="hewan_ternak" class="form-label">Hewan Ternak</label>
                                        <input type="text" class="form-control" id="hewan_ternak" name="hewan_ternak"
                                            value="{{ $item->hewan_ternak }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Pakan Input -->
                            <div class="form-group">
                                <label for="pakan" class="form-label">Pakan</label>
                                <input type="text" class="form-control" id="pakan" name="pakan"
                                    value="{{ $item->pakan }}" required>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <!-- Umur Ternak Input -->
                                    <div class="form-group">
                                        <label for="umur_ternak" class="form-label">Umur Ternak</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="umur_ternak"
                                                name="umur_ternak" aria-label="Masukkan Luas Wilayah Tanam"
                                                aria-describedby="basic-addon2" value="{{ $item->umur_ternak }}"
                                                required>
                                            <span class="input-group-text" id="basic-addon2">Thn</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Berat Ternak Input -->
                                    <div class="form-group">
                                        <label for="berat_ternak" class="form-label">Berat Ternak</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="berat_ternak"
                                                name="berat_ternak" aria-describedby="basic-addon2"
                                                value="{{ $item->berat_ternak }}" required>
                                            <span class="input-group-text" id="basic-addon2">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jumlah Ternak Input -->
                            <div class="form-group">
                                <label for="jumlah_ternak" class="form-label">Jumlah Ternak</label>
                                <input type="number" class="form-control" id="jumlah_ternak" name="jumlah_ternak"
                                    value="{{ $item->jumlah_ternak }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning text-white">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Delete -->
    @foreach ($peternakans as $deleteItem)
        <div class="modal fade" id="modalDelete{{ $deleteItem->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus hewan <b>{{ $deleteItem->hewan_ternak }} -</b> jenis <b>
                                {{ $deleteItem->jenis_ternak }}</b> ?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('peternakan.destroy', $deleteItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Delete -->
@endsection
