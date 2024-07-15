@extends('layouts.app')

@section('title', 'Edit Mitra')

@section('content')
    <div class="container">
        <h1>Edit Mitra</h1>
        <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_name">Nama</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                    value="{{ old('user_name', $mitra->user->name) }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mitra->alamat }}"
                    required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                    value="{{ $mitra->no_telepon }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_polisi">Nomor Polisi</label>
                <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi"
                    value="{{ $mitra->nomor_polisi }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_mobil">Jenis Mobil</label>
                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil"
                    value="{{ $mitra->jenis_mobil }}" required>
            </div>
            <div class="form-group">
                <label for="harga_sewa">Harga Sewa</label>
                <input type="text" class="form-control" id="harga_sewa" name="harga_sewa"
                    value="{{ $mitra->harga_sewa }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
