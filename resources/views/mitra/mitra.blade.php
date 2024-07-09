@extends('layouts.app')

@section('title', 'Data Mitra')

@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h1>Data Mitra</h1>
        </div>
        <div class="col text-right">
            <a href="{{ route('mitra.create') }}" class="btn btn-primary">Tambah Mitra</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mitra</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>No Polisi</th>
                <th>Jenis Mobil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mitra as $mitra)
            <tr>
                <td>{{ $mitra->id }}</td>
                <td>{{ $mitra->nama }}</td>
                <td>{{ $mitra->alamat }}</td>
                <td>{{ $mitra->email }}</td>
                <td>{{ $mitra->no_telepon }}</td>
                <td>{{ $mitra->nomor_polisi }}</td>
                <td>{{ $mitra->jenis_mobil }}</td>
                <td>
                    <a href="{{ route('mitra.edit', $mitra->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
