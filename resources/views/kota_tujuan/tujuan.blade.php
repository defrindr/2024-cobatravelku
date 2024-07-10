@extends('layouts.app')

@section('title', 'Data Kota Tujuan')

@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h1>Data Kota Tujuan</h1>
        </div>
        <div class="col text-right">
            <a href="{{ route('kota_tujuan.create') }}" class="btn btn-primary">Tambah Kota Tujuan</a>
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
                <th>Nama Kota Tujuan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kota_tujuan as $kota)
            <tr>
                <td>{{ $kota->id }}</td>
                <td>{{ $kota->nama }}</td>
                <td>
                <a href="{{ route('kota_tujuan.edit', $kota->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kota_tujuan.destroy', $kota->id) }}" method="POST" style="display:inline;">
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
