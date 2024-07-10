@extends('layouts.app')

@section('title', 'Data Kota Tujuan')

@section('content')
    <div class="container-fluid pt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-default">
            <div class="card-header">
                <form action="">
                    <div class="form-group mb-3">
                        <label for="">Kota Keberangkatan</label>
                        <select name="kota_keberangkatan" id="" class="form-control">
                            <option value="">-- Pilih Kota --</option>
                            @foreach ($kotaKeberangkatans as $item)
                                <option @if ($item->id == request()->get('kota_keberangkatan')) selected @endif value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Kota Tujuan</label>
                        <select name="kota_tujuan" id="" class="form-control">
                            <option value="">-- Pilih Kota --</option>
                            @foreach ($kotaTujuans as $item)
                                <option @if ($item->id == request()->get('kota_tujuan')) selected @endif value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Bulan Tahun</label>
                        <input type="month" class="form-control" name="bulan_tahun"
                            value="{{ request()->get('bulan_tahun') ?? date('Y-m') }}">
                    </div>

                    <div class="form-group mb-3">
                        <button name="submit" value="1" class="btn btn-primary">Cari Jadwal</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if (count($items) != 0)
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>#</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal / Jam</th>
                            <th>Jenis Mobil</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> {{ $item->kotaKeberangkatan->nama }} </td>
                                    <td> {{ $item->kotaTujuan->nama }} </td>
                                    <td> {{ date('d F Y', strtotime($item->tanggal)) }},
                                        {{ date('H:i A', strtotime($item->tanggal . ' ' . $item->jam_berangkat)) }} </td>
                                    <td>
                                        {{ $item->jenis_mobil }}
                                    </td>
                                    <td>
                                        <a href="{{ route('pemesanan.create', ['jadwal_id' => $item->id]) }}"
                                            class="btn btn-primary">
                                            Pilih
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    @if (request()->has('submit'))
                        Data belum ada, silahkan hubungi admin untuk menambahkan jadwal tersebut. <a
                            href="https://wa.me/{{ env('NO_TELEPON') }}?text={{ urlencode('Halo admin, saya ' . auth()->user()->name . ' ingin request jadwal untuk ' . request()->bulan_tahun . ' dari ' . \App\Models\KotaKeberangkatan::find(request()->kota_keberangkatan)->nama . ' ke ' . \App\Models\KotaTujuan::find(request()->kota_tujuan)->nama) }}"
                            target="_blank">Klik disini</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
