@extends('layouts.app')
@section('content')
    <h3 class="mt-4">Edit Data Perangkat Desa</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Edit Data
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('perangkatdesa.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Email Input -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{ $user->email }}">
                </div>

                <!-- Username Input -->
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required
                        value="{{ $user->username }}">
                </div>

                <!-- Nama Awal Input -->
                <div class="form-group">
                    <label for="nama_awal" class="form-label">Nama Awal</label>
                    <input type="text" class="form-control" id="nama_awal" name="nama_awal" required
                        value="{{ $user->nama_awal }}">
                </div>

                <!-- Nama Akhir Input -->
                <div class="form-group">
                    <label for="nama_akhir" class="form-label">Nama Akhir</label>
                    <input type="text" class="form-control" id="nama_akhir" name="nama_akhir" required
                        value="{{ $user->nama_akhir }}">
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <!-- Alamat Input -->
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required
                        value="{{ $user->alamat }}">
                </div>

                <!-- Telp Input -->
                <div class="form-group">
                    <label for="telp" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" required
                        value="{{ $user->telp }}">
                </div>

                <!-- Jabatan Input -->
                <div class="form-group">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required
                        value="{{ $user->jabatan }}">
                </div>

                <!-- Tanggal Mulai Jabatan Input -->
                <div class="form-group">
                    <label for="tgl_mulai_jabat" class="form-label">Tanggal Mulai Jabatan</label>
                    <input type="date" class="form-control" id="tgl_mulai_jabat" name="tgl_mulai_jabat" required
                        value="{{ $user->tgl_mulai_jabat }}">
                </div>

                <!-- Foto Input -->
                <div class="form-group">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Perangkat Desa" class="mt-2"
                        style="max-width: 200px;">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
