@extends('layouts.app')
@section('content')
    <h1 class="mt-4">Perangkat Desa Sindangmekar</h1>
    <ol class="breadcrumb mb-4">
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Perangkat Desa
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>Telephone</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_awal }} {{ $item->nama_akhir }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->foto }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
