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
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
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
                            <td>{{ $item->umur_ternak }}</td>
                            <td>{{ $item->berat_ternak }}</td>
                            <td>{{ $item->jumlah_ternak }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('peternakan.destroy', $item->id) }}" method="POST">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Peternakan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('peternakan.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Jenis Ternak Input -->
                        <div class="form-group">
                            <label for="jenis_ternak" class="form-label">Jenis Ternak</label>
                            <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak"
                                placeholder="Masukkan Jenis Ternak" required>
                        </div>

                        <!-- Hewan Ternak Input -->
                        <div class="form-group">
                            <label for="hewan_ternak" class="form-label">Hewan Ternak</label>
                            <input type="text" class="form-control" id="hewan_ternak" name="hewan_ternak"
                                placeholder="Masukkan Hewan Ternak" required>
                        </div>

                        <!-- Pakan Input -->
                        <div class="form-group">
                            <label for="pakan" class="form-label">Pakan</label>
                            <input type="text" class="form-control" id="pakan" name="pakan"
                                placeholder="Masukkan Pakan" required>
                        </div>

                        <!-- Umur Ternak Input -->
                        <div class="form-group">
                            <label for="umur_ternak" class="form-label">Umur Ternak</label>
                            <input type="number" class="form-control" id="umur_ternak" name="umur_ternak"
                                placeholder="Masukkan Umur Ternak" required>
                        </div>

                        <!-- Berat Ternak Input -->
                        <div class="form-group">
                            <label for="berat_ternak" class="form-label">Berat Ternak</label>
                            <input type="number" class="form-control" id="berat_ternak" name="berat_ternak"
                                placeholder="Masukkan Berat Ternak" required>
                        </div>

                        <!-- Jumlah Ternak Input -->
                        <div class="form-group">
                            <label for="jumlah_ternak" class="form-label">Jumlah Ternak</label>
                            <input type="number" class="form-control" id="jumlah_ternak" name="jumlah_ternak"
                                placeholder="Masukkan Jumlah Ternak" required>
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

    @foreach ($peternakans as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Peternakan
                            {{ $item->jenis_ternak }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('peternakan.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Jenis Ternak Input -->
                            <div class="form-group">
                                <label for="jenis_ternak" class="form-label">Jenis Ternak</label>
                                <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak"
                                    value="{{ $item->jenis_ternak }}" required>
                            </div>

                            <!-- Hewan Ternak Input -->
                            <div class="form-group">
                                <label for="hewan_ternak" class="form-label">Hewan Ternak</label>
                                <input type="text" class="form-control" id="hewan_ternak" name="hewan_ternak"
                                    value="{{ $item->hewan_ternak }}" required>
                            </div>

                            <!-- Pakan Input -->
                            <div class="form-group">
                                <label for="pakan" class="form-label">Pakan</label>
                                <input type="text" class="form-control" id="pakan" name="pakan"
                                    value="{{ $item->pakan }}" required>
                            </div>

                            <!-- Umur Ternak Input -->
                            <div class="form-group">
                                <label for="umur_ternak" class="form-label">Umur Ternak</label>
                                <input type="number" class="form-control" id="umur_ternak" name="umur_ternak"
                                    value="{{ $item->umur_ternak }}" required>
                            </div>

                            <!-- Berat Ternak Input -->
                            <div class="form-group">
                                <label for="berat_ternak" class="form-label">Berat Ternak</label>
                                <input type="number" class="form-control" id="berat_ternak" name="berat_ternak"
                                    value="{{ $item->berat_ternak }}" required>
                            </div>

                            <!-- Jumlah Ternak Input -->
                            <div class="form-group">
                                <label for="jumlah_ternak" class="form-label">Jumlah Ternak</label>
                                <input type="number" class="form-control" id="jumlah_ternak" name="jumlah_ternak"
                                    value="{{ $item->jumlah_ternak }}" required>
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

    <!-- Tambahkan pada modal cetak laporan -->
    <div class="modal fade" id="modalReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="GET" action="{{ route('peternakan.printReport') }}" target="_blank">
                    <div class="modal-body">
                        <!-- Pilihan Bulan dan Tahun -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="bulan">Bulan:</label>
                                <select class="form-select" id="bulan" name="bulan">
                                    <!-- Pilihan bulan disesuaikan dengan kebutuhan -->
                                    <option value="1">Januari</option>
                                    <!-- ... (s/d) -->
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="tahun">Tahun:</label>
                                <select class="form-select" id="tahun" name="tahun">
                                    <!-- Pilihan tahun disesuaikan dengan kebutuhan -->
                                    <option value="2022">2022</option>
                                    <!-- ... (s/d) -->
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
