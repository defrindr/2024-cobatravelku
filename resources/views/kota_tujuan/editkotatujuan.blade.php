@extends('layouts.app')

@section('title', 'Edit Kota Tujuan')

@section('content')
<div class="container mt-4">
    <h1>Edit Kota Tujuan</h1>

    <form action="{{ route('kota_tujuan.update', $kota_tujuan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kota Tujuan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kota_tujuan->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
