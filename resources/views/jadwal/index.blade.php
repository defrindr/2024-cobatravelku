@extends('layouts.app')

@section('title', 'Jadwal')

@section('content')
    <div class="container-fluid pt-4">


        @include('layouts.flash-message')

        <h4>Jadwal</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default mt-4">
                    <div class="card-header">
                        <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <td>#</td>
                                <td>Nomor Polisi</td>
                                <td>Jenis Mobil</td>
                                <td>Kuota</td>
                                <td>Tanggal</td>
                                <td>Dari</td>
                                <td>Tujuan</td>
                                <td>Aksi</td>
                            </thead>
                            <tbody>
                                @if ($paginate->count() == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($paginate->items() as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->nomor_polisi }}</td>
                                            <td>{{ $item->jenis_mobil }}</td>
                                            <td>{{ $item->kuota }}</td>
                                            <td>{{ date('d F Y, H:i A', strtotime($item->tanggal . ' ' . $item->jam_berangkat)) }}
                                            <td>{{ $item->kotaKeberangkatan->nama }}</td>
                                            <td>{{ $item->kotaTujuan->nama }}</td>
                                            <td>{{ $item->jenis_mobil }}</td>
                                            </td>
                                            <td>
                                                <a href="{{ route('jadwal.show', $item) }}" class="ml-2">
                                                    <i class="fa fa-eye text-primary"></i>
                                                </a>
                                                <a href="{{ route('jadwal.edit', $item) }}" class="ml-2">
                                                    <i class="fa fa-edit text-warning"></i>
                                                </a>
                                                <form action="{{ route('jadwal.destroy', $item) }}" class="d-inline-block"
                                                    onsubmit="return confirm('Yakin ?')" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button style="border: 0; background:transparent">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $paginate->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
