@extends('layouts.app')
@section('content')
    <h3 class="mt-4 text-center">Jabatan Perangkat Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    Data Jabatan
                </span>
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Tambah Data
                </button>
                <!-- Button trigger modal -->
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
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini..?')"><i
                                                class="fas fa-trash-alt"></i> </button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jabatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('jabatan.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Nama Awal Input -->
                        <div class="form-group">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                placeholder="Masukkan Jabatan" autofocus required autocomplete="">
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

    {{-- @foreach ($users as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User {{ $item->username }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('perangkatdesa.update', $item->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <!-- Nama Awal Input -->
                                <div class="form-group col-6">
                                    <label for="nama_awal" class="form-label">Nama Awal</label>
                                    <input type="text" class="form-control" id="nama_awal" name="nama_awal"
                                        value="{{ $item->nama_awal }}" required>
                                </div>

                                <!-- Nama Akhir Input -->
                                <div class="form-group col-6">
                                    <label for="nama_akhir" class="form-label">Nama Akhir</label>
                                    <input type="text" class="form-control" id="nama_akhir" name="nama_akhir"
                                        value="{{ $item->nama_akhir }}" required>
                                </div>

                                <!-- Email Input -->
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $item->email }}" required>
                                </div>

                                <!-- Username Input -->
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $item->username }}" required>
                                </div>

                                <!-- Password Input -->
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="******">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin merubah password.</small>
                                </div>

                                <!-- Telp Input -->
                                <div class="form-group">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telp" name="telp"
                                        value="{{ $item->telp }}" required>
                                </div>

                                <!-- Alamat Input -->
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required>{{ $item->alamat }}</textarea>
                                </div>

                                <!-- Jabatan Input -->
                                <div class="form-group col-6">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                                        value="{{ $item->jabatan }}" required>
                                </div>

                                <!-- Tanggal Mulai Jabatan Input -->
                                <div class="form-group col-6">
                                    <label for="tgl_mulai_jabat" class="form-label">Tanggal Mulai Jabatan</label>
                                    <input type="date" class="form-control" id="tgl_mulai_jabat"
                                        name="tgl_mulai_jabat" value="{{ $item->tgl_mulai_jabat }}" required>
                                </div>

                                <!-- Foto Input -->
                                <div class="form-group">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin merubah foto.</small>
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
    @endforeach --}}
@endsection
