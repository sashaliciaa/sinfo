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
                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
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
                        <th>Jumlah Meubeler</th>
                        <th>Jenis Meubel</th>
                        <!-- Add more columns as needed -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meubels as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jumlah_meubeler }}</td>
                            <td>{{ $item->jenis_meubel }}</td>
                            <!-- Add more columns as needed -->
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

    <!-- Modal Add -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white" style="max-height: 40px">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Meubel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('meubel.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Jumlah meubeler Input -->
                        <div class="form-group">
                            <label for="jumlah_meubeler" class="form-label">Jumlah Meubeler</label>
                            <input type="number" class="form-control" id="jumlah_meubeler" name="jumlah_meubeler"
                                placeholder="Masukkan Jumlah meubeler" required>
                        </div>

                        <!-- Jenis Meubel Input -->
                        <div class="form-group">
                            <label for="jenis_meubel" class="form-label">Jenis Meubel</label>
                            <input type="text" class="form-control" id="jenis_meubel" name="jenis_meubel"
                                placeholder="Masukkan Jenis Meubel" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    @foreach ($meubels as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning" style="max-height: 40px">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data | {{ $item->jenis_meubel }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('meubel.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Jumlah meubeler Input -->
                            <div class="form-group">
                                <label for="jumlah_meubeler" class="form-label">Jumlah Meubeler</label>
                                <input type="number" class="form-control" id="jumlah_meubeler" name="jumlah_meubeler"
                                    value="{{ $item->jumlah_meubeler }}" required>
                            </div>

                            <!-- Jenis Meubel Input -->
                            <div class="form-group">
                                <label for="jenis_meubel" class="form-label">Jenis Meubel</label>
                                <input type="text" class="form-control" id="jenis_meubel" name="jenis_meubel"
                                    value="{{ $item->jenis_meubel }}" required>
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
    @foreach ($meubels as $deleteItem)
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
                        <p>Anda yakin ingin menghapus <b>{{ $deleteItem->jenis_meubel }}</b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('meubel.destroy', $deleteItem->id) }}" method="POST">
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
