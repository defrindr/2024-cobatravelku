@extends('layouts.app')

@section('title', 'Edit Kota Keberangkatan')

@section('content')
<div class="container mt-4">
    <h1>Edit Kota Keberangkatan</h1>

    <form action="{{ route('kota_keberangkatan.update', $kotaKeberangkatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kota Keberangkatan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kotaKeberangkatan->nama_kota_keberangkatan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
