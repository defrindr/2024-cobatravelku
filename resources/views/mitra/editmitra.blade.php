@extends('layouts.app')

@section('title', 'Edit Mitra')

@section('content')
<div class="container mt-4">
    <h1>Edit Mitra</h1>

    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Mitra</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mitra->nama }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mitra->alamat }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mitra->email }}" required>
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telp</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $mitra->no_telepon }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_polisi">No Polisi</label>
            <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="{{ $mitra->nomor_polisi }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_mobil">Jenis Mobil</label>
            <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil" value="{{ $mitra->jenis_mobil }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
