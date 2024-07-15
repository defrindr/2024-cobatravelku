@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')
    <div class="container-fluid pt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-default mt-4">
            <div class="card-header">
                <a href="{{ route('pemesanan.index') }}" class="btn btn-default">Kembali</a>
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
                            <td>Status</td>
                            <td>: {{ $pemesanan->status }}</td>
                        </tr>
                        @if ($pemesanan->status == 'pending')
                            <tr>
                                <td>No Rekening Pembayaran</td>
                                <td>
                                    BNI <br />
                                    Ridmawan santoso <br />
                                    1234567890
                                </td>
                            </tr>
                            <tr>
                                <td>Form Upload Bukti</td>
                                <td>
                                    <form action="{{ route('pemesanan.bayar-barang', $pemesanan) }}" method="post"
                                        enctype="multipart/form-data" class="d-inline-block"
                                        onsubmit="return confirm('Yakin ?')">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Bayar</button>
                                        </div>
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
