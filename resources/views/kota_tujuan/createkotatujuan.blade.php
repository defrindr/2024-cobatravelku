@extends('layouts.app')

@section('title', 'Tambah Kota Tujuan')

@section('content')
<div class="container mt-4">
    <h1>Tambah Kota Tujuan</h1>

    <form action="{{ route('kota_tujuan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kota Tujuan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
