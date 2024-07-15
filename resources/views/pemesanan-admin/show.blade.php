@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="container-fluid pt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-default mt-4">
            <div class="card-header">
                <a href="{{ route('pemesanan-admin.index') }}" class="btn btn-default">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Ref Kode</td>
                            <td>: {{ $pemesanan->ref_code }}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>: {{ $pemesanan->jumlah_bayar }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>: {{ $pemesanan->customer->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Penjemputan</td>
                            <td>:
                                <a href="{{ $pemesanan->lokasi_penjemputan }}" target="_blank">
                                    {{ $pemesanan->lokasi_penjemputan }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Pengantaran</td>
                            <td>:
                                <a href="{{ $pemesanan->lokasi_pengantaran }}" target="_blank">
                                    {{ $pemesanan->lokasi_pengantaran }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: {{ $pemesanan->nomor_telepon }}</td>
                        </tr>
                        <tr>
                            <td>Estimasi Waktu Pembayaran</td>
                            <td>: {{ $pemesanan->waktu_mulai_bayar }}</td>
                        </tr>
                        <tr>
                            <td>Estimasi Waktu Deadline Bayar</td>
                            <td>: {{ $pemesanan->waktu_selesai_bayar }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $pemesanan->status }}</td>
                        </tr>
                        <tr>
                            <td>Bukti Bayar</td>
                            <td>:
                                <a target="_blank" href="{{ asset('uploads/' . $pemesanan->bukti_bayar) }}"
                                    class="btn btn-primary">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                        @if ($pemesanan->status != 'lunas')
                            <tr>
                                <td>Aksi</td>
                                <td>:
                                    <form action="{{ route('pemesanan-admin.konfirmasi', $pemesanan) }}" method="post"
                                        class="d-inline-block"
                                        onsubmit="return confirm('Yakin menyetujui pemesanan ?')">
                                        @csrf
                                        <button class="btn btn-primary">Setujui</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
