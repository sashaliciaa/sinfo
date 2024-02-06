@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Data Struktur Organisasi</h3>
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
                        <th>Struktur Organisasi</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Tampil/Tidak Tampil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#lihatModal{{ $item->id }}">Lihat Struktur Organisasi Tahun
                                    {{ Str::limit($item->struktur, 4, '') }}</button>
                            </td>
                            <td> {{ Str::limit($item->struktur, 4, '') }}</td>
                            <td>{{ $item->status == 1 ? 'Tampil' : 'Tidak Tampil' }}</td>
                            <td>
                                <form method="GET" action="{{ route('struktur.status', $item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-check form-switch">
                                        <input type="text" value="{{ $item->id }}" name="status" hidden>
                                        <button
                                            class="btn btn-sm {{ $item->status == 1 ? 'btn-success' : 'btn-warning' }} rounded-5 small"
                                            type="submit">{{ $item->status == 1 ? 'Tampilkan' : 'Jangan Tampilkan' }}</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="d-flex">

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
                <form method="POST" action="{{ route('struktur.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Pakan Input -->
                        <div class="form-group">
                            <label for="pakan" class="form-label">Struktur Organisasi</label>
                            <input type="file" class="form-control" name="struktur" required>
                            <small class="text-danger">*Format JPG/PNG</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($data as $item)
        <div class="modal fade" id="lihatModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="max-height: 40px">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Strukrur Organisasi
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" src="../Struktur_Organisasi/{{ $item->struktur }}" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('struktur.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
