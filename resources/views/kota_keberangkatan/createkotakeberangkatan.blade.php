@extends('layouts.app')

@section('title', 'Tambah Kota Keberangkatan')

@section('content')
<div class="container mt-4">
    <h1>Tambah Kota Keberangkatan</h1>

    <form action="{{ route('kota_keberangkatan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kota Keberangkatan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
