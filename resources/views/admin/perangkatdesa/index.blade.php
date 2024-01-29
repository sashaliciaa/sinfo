@extends('layouts.app')
@section('content')
    <h3 class="mt-4 text-center">Perangkat Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4">
    </ol>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('fail'))
        <div class="alert alert-danger my-auto">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-table me-1"></i>
                    Data Perangkat Desa
                </span>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Tambah Data
                </button>
                <!-- Button trigger modal -->
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>Telephone</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $userItem)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $userItem->nama_awal }} {{ $userItem->nama_akhir }}</td>
                            <td>{{ $userItem->alamat }}</td>
                            <td>{{ $userItem->telp }}</td>
                            <td>{{ $userItem->jabatans->jabatan }}</td>
                            <td>
                                @if ($userItem->status == 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td><img width="100px" src="{{ url('Foto_perangkat_desa/' . $userItem->foto) }}"></td>
                            <td>
                                <div class="d-flex">
                                    <!-- Detail Button -->
                                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $userItem->id }}">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning me-3" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $userItem->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $userItem->id }}">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('perangkatdesa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 m-3">
                        <div class="col-md-6">
                            <label for="nama_awal" class="form-label">Nama Awal</label>
                            <input type="text" class="form-control" id="nama_awal" name="nama_awal"
                                placeholder="Masukkan Nama Awal">
                        </div>

                        <div class="col-md-6">
                            <label for="nama_akhir" class="form-label">Nama Akhir</label>
                            <input type="text" class="form-control" id="nama_akhir" name="nama_akhir"
                                placeholder="Masukkan Nama Akhir">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email">
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan Username">
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan Password">
                        </div>

                        <div class="col-md-6">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                placeholder="Masukkan Telepon">
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-select">
                                <option selected disabled>Pilih Jabatan</option>
                                @foreach ($dataJabatan as $Jabatanitem)
                                    <option value="{{ $Jabatanitem->id }}">{{ $Jabatanitem->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="tgl_mulai_jabat" class="form-label">Tanggal Mulai Jabatan</label>
                            <input type="date" class="form-control" id="tgl_mulai_jabat" name="tgl_mulai_jabat">
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option selected disabled>Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success w-100">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Add -->

    <!-- Modal Edit -->
    @foreach ($users as $EditItem)
        <div class="modal fade" id="modalEdit{{ $EditItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning" style="max-height: 40px">
                        <h5 class="modal-title" style="text-align: center; width: 100%;">Edit Data
                            {{ $EditItem->nama_awal }}
                            {{ $EditItem->nama_akhir }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('perangkatdesa.update', $EditItem->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                @if ($EditItem->foto)
                                    <img src="{{ asset('Foto_perangkat_desa/' . $EditItem->foto) }}" alt="Previous Photo"
                                        class="img-fluid mb-2 mx-auto d-block"
                                        style="max-width: 150px; max-height: 150px;">
                                @else
                                    <p>No photo available</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_awal" class="form-label">Nama Awal</label>
                                    <input type="text" class="form-control" id="nama_awal" name="nama_awal"
                                        value="{{ $EditItem->nama_awal }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nama_akhir" class="form-label">Nama Akhir</label>
                                    <input type="text" class="form-control" id="nama_akhir" name="nama_akhir"
                                        value="{{ $EditItem->nama_akhir }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $EditItem->email }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $EditItem->username }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="******">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin merubah password.</small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telp" name="telp"
                                        value="{{ $EditItem->telp }}" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required>{{ $EditItem->alamat }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-select">
                                        <option selected value="{{ $EditItem->jabatan_id }}">
                                            {{ $EditItem->jabatans->jabatan }}
                                        </option>
                                        @foreach ($dataJabatan as $JabatanEditItem)
                                            <option value="{{ $JabatanEditItem->id }}">{{ $JabatanEditItem->jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tgl_mulai_jabat" class="form-label">Tanggal Mulai Jabatan</label>
                                    <input type="date" class="form-control" id="tgl_mulai_jabat"
                                        name="tgl_mulai_jabat" value="{{ $EditItem->tgl_mulai_jabat }}" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option selected value="{{ $EditItem->status }}">
                                            {{ $EditItem->status }}
                                        </option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin merubah foto.</small>
                                </div>
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
    <!-- End Modal Edit -->

    <!-- Modal Delete -->
    @foreach ($users as $deleteItem)
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
                        <p>Anda yakin ingin menghapus <b>{{ $deleteItem->nama_awal }} {{ $deleteItem->nama_akhir }}</b> ?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('perangkatdesa.destroy', $deleteItem->id) }}" method="POST">
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


    <!-- Modal Detail -->
    @foreach ($users as $item)
        <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white" style="max-height: 40px">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <p style="text-align: center">
                                @if ($item->foto)
                                    <img src="{{ asset('Foto_perangkat_desa/' . $item->foto) }}" alt="User Foto"
                                        class="img-fluid" style="max-width: 150px">
                                @else
                                    <p>No photo available</p>
                                @endif
                            </p>
                            <tr>
                                <th>Nama Awal</th>
                                <td>:</td>
                                <td>{{ $item->nama_awal }}</td>
                            </tr>
                            <tr>
                                <th>Nama Akhir</th>
                                <td>:</td>
                                <td>{{ $item->nama_akhir }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $item->username }}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td>{{ $item->telp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $item->username }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>:</td>
                                <td>{{ $item->jabatans->jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Mulai Jabatan</th>
                                <td>:</td>
                                <td>{{ $item->tgl_mulai_jabat }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Detail -->
@endsection
