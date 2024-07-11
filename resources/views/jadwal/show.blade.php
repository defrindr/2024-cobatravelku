@extends('layouts.app')

@section('title', 'Detail Jadwal')

@section('content')
    <div class="container-fluid pt-4">
        <h4>Detail Jadwal</h4>

        @include('layouts.flash-message')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default mt-4">
                    <div class="card-header">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-primary">
                            <i class="fa fa-back"></i> kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td>Nomor Polisi</td>
                                    <td>: {{ $jadwal->nomor_polisi }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Mobil</td>
                                    <td>: {{ $jadwal->jenis_mobil }}</td>
                                </tr>
                                <tr>
                                    <td>Kuota Maks</td>
                                    <td>: {{ $jadwal->kuota }} Penumpang</td>
                                </tr>
                                <tr>
                                    <td>Sisa Kuota</td>
                                    @if ($jadwal->sisa_kuota == 0)
                                        <td>: Penuh</td>
                                    @else
                                        <td>: {{ $jadwal->sisa_kuota }} Penumpang</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Harga Travel</td>
                                    <td>: {{ number_format($jadwal->harga_travel, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Harga P. Barang</td>
                                    <td>: {{ number_format($jadwal->harga_barang, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: {{ date('d F Y', strtotime($jadwal->tanggal)) }}</td>
                                </tr>
                                <tr>
                                    <td>Jam Keberangkatan</td>
                                    <td>: {{ date('H:i A', strtotime($jadwal->jam_berangkat)) }}</td>
                                </tr>
                                <tr>
                                    <td>kota_keberangkatan_id</td>
                                    <td>: {{ $jadwal->kotaKeberangkatan->nama }}</td>
                                </tr>
                                <tr>
                                    <td>kota_tujuan_id</td>
                                    <td>: {{ $jadwal->kotaTujuan->nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
