@extends('layouts.app')

@section('content')
    <form class="">
        <div class="card mt-3">
            <h5 class="card-header">Aplikasi Data Kendaraan</h5>
            <div class="card-body">
                <div class="col-8">
                    No Registrasi
                    <input type="text" class="form-control" name="noreg" id="noreg">
                </div>
                <div class="col-8 mt-3">
                    Nama Pemilik
                    <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3 gap-2">
            <input type="submit" class="btn btn-primary" value="Search">
            <a href="{{ route('kendaraan.tambah') }}" class="btn btn-primary">Add</a>
        </div>
    </form>
    @include('components.alert')
    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <tr class="table-primary">
                <th>No</th>
                <th>No Registrasi</th>
                <th>Nama Pemilik</th>
                <th>Merk Kendaraan</th>
                <th>Tahun Pembuatan</th>
                <th>Kapasitas</th>
                <th>Warna</th>
                <th>Bahan Bakar</th>
                <th>Action</th>
            </tr>
            @forelse ($veh as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->no_reg }}</td>
                    <td>{{ $v->nama_pemilik }}</td>
                    <td>{{ $v->merk }}</td>
                    <td>{{ $v->tahun }}</td>
                    <td>{{ $v->silinder }} cc</td>
                    <td>{{ $v->warna }}</td>
                    <td>{{ $v->bahan_bakar }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('kendaraan.edit', $v->no_reg) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9"> Tidak ada data</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
