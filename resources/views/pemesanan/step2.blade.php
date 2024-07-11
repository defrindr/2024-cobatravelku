@extends('layouts.app')

@section('title', 'Data Kota Tujuan')

@section('content')
    <div class="container-fluid pt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif

        <div class="card card-default">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="{{ route('pemesanan.store') }}" method="POST" onsubmit="return confirm('Yakin ?')">
                    @csrf
                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                    <div class="form-group">
                        <label for="">Kota Tujuan</label>
                        <input class="form-control" type="text" name="kota_tujuan" readonly
                            value="{{ $jadwal->kotaTujuan->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kota Keberangkatan</label>
                        <input class="form-control" type="text" name="kota_keberangkatan" readonly
                            value="{{ $jadwal->kotaKeberangkatan->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Keberangkatan</label>
                        <input class="form-control" type="text" name="tanggal" readonly value="{{ $jadwal->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Keberangkatan</label>
                        <input class="form-control" type="text" name="jam_berangkat" readonly
                            value="{{ $jadwal->jam_berangkat }}">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Travel</label>
                        <input class="form-control" type="text" name="harga_travel" readonly
                            value="{{ number_format($jadwal->harga_travel, 2, ',', '.') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Pengiriman</label>
                        <input class="form-control" type="text" name="harga_barang" readonly
                            value="{{ number_format($jadwal->harga_barang, 2, ',', '.') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Layanan</label>
                        <select name="jenis_layanan" id="" class="form-control" onchange="changeLayanan(event)">
                            <option value="">-- Pilih Layanan --</option>
                            <option @if (request()->get('jenis_layanan') == 'pengiriman') selected @endif value="pengiriman">Pengiriman Barang
                            </option>
                            <option @if (request()->get('jenis_layanan') == 'travel') selected @endif value="travel">Travel</option>
                        </select>
                    </div>
                    @if (request()->get('jenis_layanan'))
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Lokasi Penjemputan</label>
                                    <input value="{{ old('lokasi_penjemputan') }}" type="text" class="form-control"
                                        name="lokasi_penjemputan">
                                    <span class="text-xs">* Link gmap</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Lokasi Pengantaran</label>
                                    <input value="{{ old('lokasi_pengantaran') }}" type="text" class="form-control"
                                        name="lokasi_pengantaran">
                                    <span class="text-xs">* Link gmap</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_pembayaran">Jenis Pembayaran</label>
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control">
                                <option value="">-- Pilih Pembayaran --</option>
                                <option @if (request()->get('jenis_pembayaran') == 'tf') selected @endif value="tf">Transfer
                                </option>
                                <option @if (request()->get('jenis_pembayaran') == 'cash') selected @endif value="cash">Cash</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input value="{{ old('nomor_telepon') ?? auth()->user()->customer->nomor_telepon }}"
                                class="form-control" name="nomor_telepon" placeholder="08**********">
                        </div>
                        @if (request()->get('jenis_layanan') == 'travel')
                            <div class="form-group">
                                <label for="">Jumlah Kursi</label>
                                <input value="{{ old('jumlah_kursi') }}" onchange="ubahPenumpang(event.target.value)"
                                    type="number" class="form-control" name="jumlah_kursi" min="1"
                                    max="{{ $jadwal->sisa_kuota }}">
                                <span class="text-sm">Gunakan Tombol Disebelah Kanan / Keyboard Arah</span>
                            </div>
                            <div class="form-group">
                                <label for="">Biaya</label>
                                <input value="{{ old('biaya') }}" name="biaya" id="biaya" class="form-control"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Jadwal Estimasi Pembayaran</label>
                                <input value="{{ $jadwal->estimasiPembayaran }}" type="text" class="form-control"
                                    readonly>
                            </div>
                        @endif
                    @endif

                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let harga_barang = {{ $jadwal->harga_barang }};
        let harga_travel = {{ $jadwal->harga_barang }};
        if (document.querySelector("[type='number']"))
            document.querySelector("[type='number']").addEventListener('keypress', function(evt) {
                evt.preventDefault();
            });

        const changeLayanan = (event) => {
            const queryString = window.location.search;
            const searchParam = new URLSearchParams(queryString);
            if (searchParam.has('jenis_layanan')) {
                searchParam.delete('jenis_layanan')
            }
            searchParam.append('jenis_layanan', event.target.value)

            let href = window.location.href.replace(queryString, '');
            window.location.href = href + "?" + searchParam.toString();
        }


        const ubahPenumpang = (value) => {
            document.querySelector('#biaya').value = value * harga_travel;
        }
    </script>
@endsection
