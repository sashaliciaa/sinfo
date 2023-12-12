@extends('layouts.app')
@section('content')
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4 shadow-lg">
        <div class="card-header bg-primary text-white">
            <small>
                <i class="fas fa-table me-1"></i>
                Form Tambah Data Perangkat Desa
            </small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('perangkatdesa.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Nama Awal Input -->
                    <div class="form-group col-6">
                        <label for="nama_awal" class="form-label">Nama Awal</label>
                        <input type="text" class="form-control" id="nama_awal" name="nama_awal">
                    </div>

                    <!-- Nama Akhir Input -->
                    <div class="form-group col-6">
                        <label for="nama_akhir" class="form-label">Nama Akhir</label>
                        <input type="text" class="form-control" id="nama_akhir" name="nama_akhir">
                    </div>

                    <!-- Email Input -->
                    <div class="form-group col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <!-- Username Input -->
                    <div class="form-group col-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <!-- Telp Input -->
                    <div class="form-group">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp">
                    </div>

                    <!-- Alamat Input -->
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>

                    <!-- Jabatan Input -->
                    <div class="form-group col-6">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-select">
                            <option selected disabled>Pilih Jabatan</option>
                            @foreach ($jabatan as $Jabatanitem)
                                <option value="{{ $Jabatanitem->id }}">{{ $Jabatanitem->jabatan }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" id="jabatan" name="jabatan" > --}}
                    </div>

                    <!-- Tanggal Mulai Jabatan Input -->
                    <div class="form-group col-6">
                        <label for="tgl_mulai_jabat" class="form-label">Tanggal Mulai Jabatan</label>
                        <input type="date" class="form-control" id="tgl_mulai_jabat" name="tgl_mulai_jabat">
                    </div>

                    <!-- Foto Input -->
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
