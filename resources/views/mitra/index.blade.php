@extends('layouts.app')

@section('title', 'Daftar Mitra')

@section('content')
    <div class="container">
        <h1>Daftar Mitra</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('mitra.create') }}" class="btn btn-primary mb-3">Tambah Mitra</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Nomor Polisi</th>
                    <th>Jenis Mobil</th>
                    <th>Harga Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitra as $mitra)
                    <tr>
                        <td>{{ $mitra->id }}</td>
                        <td>{{ $mitra->user->name }}</td>
                        <td>{{ $mitra->alamat }}</td>
                        <td>{{ $mitra->no_telepon }}</td>
                        <td>{{ $mitra->nomor_polisi }}</td>
                        <td>{{ $mitra->jenis_mobil }}</td>
                        <td>{{ $mitra->harga_sewa }}</td>
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
