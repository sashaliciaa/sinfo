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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Tambah Data
                </button>
                <!-- Button trigger modal -->
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
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
                            <td>{{ $userItem->username }}</td>
                            <td>{{ $userItem->alamat }}</td>
                            <td>{{ $userItem->telp }}</td>
                            <td>{{ $userItem->jabatans->jabatan }}</td>
                            <td>{{ $userItem->status }}</td>
                            <td><img width="100px" src="{{ url('Foto_perangkat_desa/' . $userItem->foto) }}"></td>
                            <td>
                                <div class="d-flex">
                                    <!-- Detail Button -->
                                    <button type="button" class="btn btn-dark me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $userItem->id }}">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $userItem->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="{{ route('perangkatdesa.destroy', $userItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $userItem->id }}">
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

    <!-- Modal Add -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('perangkatdesa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 m-3">
                        <div class="col-md-6">
                            <label for="nama_awal" class="form-label">Nama Awal</label>
                            <input type="text" class="form-control" id="nama_awal" name="nama_awal">
                        </div>

                        <div class="col-md-6">
                            <label for="nama_akhir" class="form-label">Nama Akhir</label>
                            <input type="text" class="form-control" id="nama_akhir" name="nama_akhir">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="col-md-6">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp">
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
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
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Add -->


    @foreach ($users as $EditItem)
        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit{{ $EditItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User {{ $EditItem->username }}</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('perangkatdesa.update', $EditItem->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="nama_awal" class="form-label">Nama Awal</label>
                                    <input type="text" class="form-control" id="nama_awal" name="nama_awal"
                                        value="{{ $EditItem->nama_awal }}" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="nama_akhir" class="form-label">Nama Akhir</label>
                                    <input type="text" class="form-control" id="nama_akhir" name="nama_akhir"
                                        value="{{ $EditItem->nama_akhir }}" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $EditItem->email }}" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $EditItem->username }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="******">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin merubah password.</small>
                                </div>

                                <div class="form-group">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telp" name="telp"
                                        value="{{ $EditItem->telp }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required>{{ $EditItem->alamat }}</textarea>
                                </div>

                                <div class="form-group col-6">
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

                                <div class="form-group col-6">
                                    <label for="tgl_mulai_jabat" class="form-label">Tanggal Mulai Jabatan</label>
                                    <input type="date" class="form-control" id="tgl_mulai_jabat"
                                        name="tgl_mulai_jabat" value="{{ $EditItem->tgl_mulai_jabat }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option selected value="{{ $EditItem->status }}">
                                            {{ $EditItem->status }}
                                        </option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin merubah foto.</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning text-white">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- End Modal Edit -->
    @endforeach

    <!-- Modal Detail -->
    @foreach ($users as $item)
        <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Detail User: {{ $item->username }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama_awal" class="form-label"><strong>Nama Awal:</strong></label>
                                <p>{{ $item->nama_awal }}</p>

                                <label for="jabatan" class="form-label"><strong>Jabatan:</strong></label>
                                <p>{{ $item->jabatans->jabatan }}</p>


                                <label for="username" class="form-label"><strong>Username:</strong></label>
                                <p>{{ $item->username }}</p>

                                <label for="telp" class="form-label"><strong>Telepon:</strong></label>
                                <p>{{ $item->telp }}</p>

                                <label for="alamat" class="form-label"><strong>Alamat:</strong></label>
                                <p>{{ $item->alamat }}</p>
                            </div>

                            <div class="col-md-6">
                                <label for="nama_akhir" class="form-label"><strong>Nama Akhir:</strong></label>
                                <p>{{ $item->nama_akhir }}</p>


                                <label for="tgl_mulai_jabat" class="form-label"><strong>Tanggal Mulai
                                        Jabatan:</strong></label>
                                <p>{{ $item->tgl_mulai_jabat }}</p>

                                <label for="foto" class="form-label"><strong>Foto:</strong></label>
                                @if ($item->foto)
                                    <img src="{{ asset('Foto_perangkat_desa/' . $item->foto) }}" alt="User Foto"
                                        class="img-fluid">
                                @else
                                    <p>No photo available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Detail -->
@endsection
