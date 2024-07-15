@extends('layouts.app')

@section('title', 'Admin')

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
                        <h4>Pemesanan</h4>
                        <form action="" class="form">
                            <input type="hidden" name="status_pengiriman" value="{{ request()->get('status_pengiriman') }}">
                            <select name="status_pemesanan" id="" class="form-control  d-inline-block"
                                style="width: 80%">
                                <option value="">-- Pilih --</option>
                                <option value="butuh_konfirmasi">Butuh Konfirmasi</option>
                                <option value="lunas">Lunas</option>
                            </select>
                            <button class="btn btn-primary d-inline-block"><i class="fa fa-search"></i></button>
                        </form>
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
                                            <td>{{ date('d F Y', strtotime($item->jadwal->tanggal)) }}</td>
                                            <td>{{ date('H:i A', strtotime($item->jadwal->jam_berangkat)) }}</td>
                                            <td>{{ ucwords($item->status) }}</td>
                                            <td>
                                                <a href="{{ route('pemesanan-admin.show', $item) }}">
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

                        <h4>
                            Pengiriman
                        </h4>
                        <form action="" class="form">
                            <input type="hidden" name="status_pemesanan" value="{{ request()->get('status_pemesanan') }}">
                            <select name="status_pengiriman" id="" class="form-control  d-inline-block"
                                style="width: 80%">
                                <option value="">-- Pilih --</option>
                                <option value="butuh_konfirmasi">Butuh Konfirmasi</option>
                                <option value="lunas">Lunas</option>
                            </select>
                            <button class="btn btn-primary d-inline-block"><i class="fa fa-search"></i></button>
                        </form>
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
                                            <td>{{ date('d F Y', strtotime($item->jadwal->tanggal)) }}</td>
                                            <td>{{ date('H:i A', strtotime($item->jadwal->jam_berangkat)) }}</td>
                                            <td>{{ ucwords($item->status) }}</td>
                                            <td>
                                                <a href="{{ route('pemesanan-admin.show-barang', $item) }}">
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
