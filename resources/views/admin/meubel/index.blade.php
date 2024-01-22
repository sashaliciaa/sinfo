@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Data Meubel Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    Data Meubel
                </span>
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        Tambah Data
                    </button>
                    <a href="{{ route('meubel.printReport') }}" class="btn btn-dark" target="_blank"><i
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
                        <th>Jumlah Meubelers</th>
                        <th>Jenis Meubel</th>
                        <!-- Add more columns as needed -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meubels as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jumlah_meubelers }}</td>
                            <td>{{ $item->jenis_meubel }}</td>
                            <!-- Add more columns as needed -->
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('meubel.destroy', $item->id) }}" method="POST">
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

    <!-- Add Modal for Adding Data -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Meubel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('meubel.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Jumlah Meubelers Input -->
                        <div class="form-group">
                            <label for="jumlah_meubelers" class="form-label">Jumlah Meubelers</label>
                            <input type="number" class="form-control" id="jumlah_meubelers" name="jumlah_meubelers"
                                placeholder="Masukkan Jumlah Meubelers" required>
                        </div>

                        <!-- Jenis Meubel Input -->
                        <div class="form-group">
                            <label for="jenis_meubel" class="form-label">Jenis Meubel</label>
                            <input type="text" class="form-control" id="jenis_meubel" name="jenis_meubel"
                                placeholder="Masukkan Jenis Meubel" required>
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


    <!-- Add Modals for Editing Data -->
    @foreach ($meubels as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Meubel {{ $item->jenis_meubel }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('meubel.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Jumlah Meubelers Input -->
                            <div class="form-group">
                                <label for="jumlah_meubelers" class="form-label">Jumlah Meubelers</label>
                                <input type="number" class="form-control" id="jumlah_meubelers" name="jumlah_meubelers"
                                    value="{{ $item->jumlah_meubelers }}" required>
                            </div>

                            <!-- Jenis Meubel Input -->
                            <div class="form-group">
                                <label for="jenis_meubel" class="form-label">Jenis Meubel</label>
                                <input type="text" class="form-control" id="jenis_meubel" name="jenis_meubel"
                                    value="{{ $item->jenis_meubel }}" required>
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
