@extends('layouts.app')
@section('content')
    <h5>Tambah Data Kendaraan</h5>
    <form action="{{ route('kendaraan.update', $veh->no_reg) }}" method="POST" class="mt-5">
        @method('put')
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                No. Registrasi Kendaraan
                <input type="text" class="form-control {{ $errors->has('no_reg') ? 'is-invalid' : '' }}" name="no_reg"
                    value="{{ $veh->no_reg }}">
                @if ($errors->has('no_reg'))
                    <p class="text-danger">{{ $errors->first('no_reg') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Tahun Pembuatan
                <input type="text" maxlength="4" class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}"
                    name="tahun" value="{{ old('tahun') ?: $veh->tahun }}">
                @if ($errors->has('tahun'))
                    <p class="text-danger">{{ $errors->first('tahun') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Nama Pemilik
                <input type="text" class="form-control {{ $errors->has('nama_pemilik') ? 'is-invalid' : '' }}"
                    name="nama_pemilik" value="{{ old('nama_pemilik') ?: $veh->nama_pemilik }}">
                @if ($errors->has('nama_pemilik'))
                    <p class="text-danger">{{ $errors->first('nama_pemilik') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Kapasitas Silinder
                <input type="number" min="0"
                    class="form-control {{ $errors->has('silinder') ? 'is-invalid' : '' }}" name="silinder"
                    value="{{ old('silinder') ?: $veh->silinder }}">
                @if ($errors->has('silinder'))
                    <p class="text-danger">{{ $errors->first('silinder') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Merk Kendaraan
                <input type="text" class="form-control {{ $errors->has('merk') ? 'is-invalid' : '' }}" name="merk"
                    value="{{ old('merk') ?: $veh->merk }}">
                @if ($errors->has('merk'))
                    <p class="text-danger">{{ $errors->first('merk') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Warna Kendaraan
                <select name="warna" class="form-select {{ $errors->has('warna') ? 'is-invalid' : '' }}" id="">
                    <option value="">Pilih Warna</option>
                    <option value="Merah" @if (old('warna') || $veh->warna == 'Merah') selected @endif>Merah</option>
                    <option value="Hitam" @if (old('warna') || $veh->warna == 'Hitam') selected @endif>Hitam</option>
                    <option value="Biru" @if (old('warna') || $veh->warna == 'Biru') selected @endif>Biru</option>
                    <option value="Abu-Abu" @if (old('warna') || $veh->warna == 'Abu-Abu') selected @endif>Abu-Abu</option>
                </select>
                @if ($errors->has('warna'))
                    <p class="text-danger">{{ $errors->first('warna') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Alamat Pemilik Kendaraan
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat"
                    id="exampleFormControlTextarea1" rows="3">{{ old('alamat') ?: $veh->alamat }}</textarea>
                @if ($errors->has('alamat'))
                    <p class="text-danger">{{ $errors->first('alamat') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                Bahan Bakar
                <input type="text" class="form-control {{ $errors->has('bahan_bakar') ? 'is-invalid' : '' }}"
                    name="bahan_bakar" value="{{ old('bahan_bakar') ?: $veh->bahan_bakar }}">
                @if ($errors->has('bahan_bakar'))
                    <p class="text-danger">{{ $errors->first('bahan_bakar') }}</p>
                @endif
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Ubah">
        <a href="{{ route('kendaraan') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
