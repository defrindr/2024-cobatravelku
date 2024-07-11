@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
    <div class="container-fluid pt-4">
        <h3>Tambah Jadwal</h3>
        @include('layouts.flash-message')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        <form action="{{ route('jadwal.store') }}" class="form" method="post">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nomor_polisi">Nomor Polisi</label>
                                        <input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi"
                                            value="{{ old('nomor_polisi') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_mobil">Jenis Mobil</label>
                                        <input type="text" class="form-control" name="jenis_mobil" id="nomor_polisi"
                                            value="{{ old('jenis_mobil') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kuota">Kuota Mobil</label>
                                        <input type="number" min="1" class="form-control" name="kuota"
                                            id="nomor_polisi" value="{{ old('kuota') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_travel">Harga Travel</label>
                                        <input type="number" min="50000" class="form-control" name="harga_travel"
                                            id="nomor_polisi" value="{{ old('harga_travel') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_barang">Harga P. Barang</label>
                                        <input type="number" min="50000" class="form-control" name="harga_barang"
                                            id="nomor_polisi" value="{{ old('harga_barang') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="nomor_polisi"
                                            value="{{ old('tanggal') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jam_berangkat">Jam berangkat</label>
                                        <input type="time" class="form-control" name="jam_berangkat" id="nomor_polisi"
                                            value="{{ old('jam_berangkat') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kota_keberangkatan_id">Kota Keberangkatan</label>
                                        <select name="kota_keberangkatan_id" id="kota_keberangkatan_id" class="form-control"
                                            required>
                                            <option value="">-- Pilih Kota --</option>
                                            @foreach ($kotaKeberangkatans as $item)
                                                <option @if ($item->id == old('kota_keberangkatan_id')) selected @endif
                                                    value="{{ $item->id }}">
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kota_tujuan_id">Kota Tujuan</label>
                                        <select name="kota_tujuan_id" id="kota_tujuan_id" class="form-control" required>
                                            <option value="">-- Pilih Kota --</option>
                                            @foreach ($kotaTujuans as $item)
                                                <option @if ($item->id == old('kota_tujuan_id')) selected @endif
                                                    value="{{ $item->id }}">
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" id="submit">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
