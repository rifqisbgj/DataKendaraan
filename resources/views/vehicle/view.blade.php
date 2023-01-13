@extends('layouts.app')
@section('content')
    <h5>Detail Data Kendaraan</h5>
    <div class="row mt-5">
        <div class="col-md-6">
            <h6>No. Registrasi Kendaraan</h6>
            <p>{{ $vehicle->no_reg }}</p>
        </div>
        <div class="col-md-6">
            <h6>Tahun Pembuatan</h6>
            <p>{{ $vehicle->tahun ?: 'Belum diatur' }}</p>
        </div>
        <hr>
        <div class="col-md-6">
            <h6>Nama Pemilik</h6>
            <p>{{ $vehicle->nama_pemilik }}</p>
        </div>
        <div class="col-md-6">
            <h6>Kapasitas Silinder</h6>
            <p>{{ $vehicle->silinder ? $vehicle->silinder . ' cc' : 'Belum diatur' }}</p>
        </div>
        <hr>
        <div class="col-md-6">
            <h6>Merk Kendaraan</h6>
            <p>{{ $vehicle->merk ?: 'Belum diatur' }}</p>
        </div>
        <div class="col-md-6">
            <h6>Warna Kendaraan</h6>
            <p>{{ $vehicle->warna ?: 'Belum diatur' }}</p>
        </div>
        <hr>
        <div class="col-md-6">
            <h6>Alamat Pemilik Kendaraan</h6>
            <p>{{ $vehicle->alamat ?: 'Belum diatur' }}</p>
        </div>
        <div class="col-md-6">
            <h6>Bahan Bakar</h6>
            <p>{{ $vehicle->bahan_bakar ?: 'Belum diatur' }}</p>
        </div>
        <hr>
    </div>
    <a href="/" class="btn btn-secondary">Kembali</a>
@endsection
