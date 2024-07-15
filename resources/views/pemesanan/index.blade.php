@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')
    <div class="container-fluid pt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">

                <div class="card card-default mt-4">
                    <div class="card-header">
                        <h4>Travel</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <td>#</td>
                                <td>Dari</td>
                                <td>Ke</td>
                                <td>Tanggal</td>
                                <td>Jam</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </thead>
                            <tbody>
                                @if (count($pemesanan) == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($pemesanan as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->jadwal->kotaKeberangkatan->nama }}</td>
                                            <td>{{ $item->jadwal->kotaTujuan->nama }}</td>
                                            <td>{{ $item->jadwal->tanggal }}</td>
                                            <td>{{ date('H:i A', strtotime($item->jadwal->jam_berangkat)) }}</td>
                                            <td>{{ ucwords($item->status) }}</td>
                                            <td>
                                                <a href="{{ route('pemesanan.show', $item) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-default mt-4">
                    <div class="card-header">
                        <h4>Barang</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <td>#</td>
                                <td>Dari</td>
                                <td>Ke</td>
                                <td>Tanggal</td>
                                <td>Jam</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </thead>
                            <tbody>
                                @if (count($pengiriman) == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($pengiriman as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->jadwal->kotaKeberangkatan->nama }}</td>
                                            <td>{{ $item->jadwal->kotaTujuan->nama }}</td>
                                            <td>{{ $item->jadwal->tanggal }}</td>
                                            <td>{{ date('H:i A', strtotime($item->jadwal->jam_berangkat)) }}</td>
                                            <td>{{ ucwords($item->status) }}</td>
                                            <td>
                                                <a href="{{ route('pemesanan.show-barang', $item) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
