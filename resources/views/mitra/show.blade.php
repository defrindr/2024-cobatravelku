@extends('layouts.app')

@section('title', 'Detail Mitra')

@section('content')
    <div class="container">
        <h1>Detail Mitra</h1>
        <dl class="row">
            <dt class="col-sm-3">Nama</dt>
            <dd class="col-sm-9">{{ $mitra->user->name }}</dd>

            <dt class="col-sm-3">Alamat</dt>
            <dd class="col-sm-9">{{ $mitra->alamat }}</dd>

            <dt class="col-sm-3">No Telepon</dt>
            <dd class="col-sm-9">{{ $mitra->no_telepon }}</dd>

            <dt class="col-sm-3">Nomor Polisi</dt>
            <dd class="col-sm-9">{{ $mitra->nomor_polisi }}</dd>

            <dt class="col-sm-3">Jenis Mobil</dt>
            <dd class="col-sm-9">{{ $mitra->jenis_mobil }}</dd>

            <dt class="col-sm-3">Harga Sewa</dt>
            <dd class="col-sm-9">{{ $mitra->harga_sewa }}</dd>
        </dl>
        <a href="{{ route('mitra.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
