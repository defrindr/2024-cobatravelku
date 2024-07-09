@extends('layouts.app')

@section('title', 'Tambah Mitra')

@section('content')
<div class="container mt-4">
    <h1>Tambah Mitra</h1>

    <form action="{{ route('mitra.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Mitra</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telp</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
        </div>
        <div class="form-group">
            <label for="nomor_polisi">No Polisi</label>
            <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" required>
        </div>
        <div class="form-group">
            <label for="jenis_mobil">Jenis Mobil</label>
            <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
