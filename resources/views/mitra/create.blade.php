@extends('layouts.app')

@section('title', 'Tambah Data Kendaraan Mitra')

@section('content')
    <div class="container">
        <h1>Tambah Kendaraan Mitra</h1>
        <form action="{{ route('mitra.store') }}" method="POST">
            @csrf
            @if (auth()->user()->role == 'pemilik')
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">-- Pilih Mitra --</option>
                        @foreach ($mitras as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @else
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}" required>
            @endif
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"
                    required>
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}"
                    required>
                @error('no_telepon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nomor_polisi">Nomor Polisi</label>
                <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi"
                    value="{{ old('nomor_polisi') }}" required>
                @error('nomor_polisi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_mobil">Jenis Mobil</label>
                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil"
                    value="{{ old('jenis_mobil') }}" required>
                @error('jenis_mobil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga_sewa">Harga Sewa</label>
                <input type="text" class="form-control" id="harga_sewa" name="harga_sewa"
                    value="{{ old('harga_sewa') }}" required>
                @error('harga_sewa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
