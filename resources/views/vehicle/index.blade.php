@extends('layouts.app')

@section('content')
    <form class="{{ route('kendaraan') }}" method="GET">
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
                    <td class="text-center">{{ $v->no_reg }}</td>
                    <td>{{ $v->nama_pemilik }}</td>
                    <td class="text-center">{{ $v->merk ?: '-' }}</td>
                    <td class="text-center">{{ $v->tahun ?: '-' }}</td>
                    <td>{{ $v->silinder ? $v->silinder . ' cc' : '-' }}</td>
                    <td>{{ $v->warna ?: '-' }}</td>
                    <td class="text-center">{{ $v->bahan_bakar ?: '-' }}</td>
                    <td>
                        <a href="{{ route('kendaraan.view', $v->no_reg) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('kendaraan.edit', $v->no_reg) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#deleteData" data-noreg="{{ $v->no_reg }}">
                            Delete
                        </button>
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

@section('modal')
    <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Menghapus Data Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kendaraan.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Anda yakin menghapus data <span id="noreg"></span> ?
                        <input type="hidden" name="noreg" id="noregup">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Ok">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $('#deleteData').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var noreg = button.data('noreg');

            var modal = $(this);
            modal.find('.modal-body #noreg').text(noreg);
            modal.find('.modal-body #noregup').val(noreg);
        });
    </script>
@endsection
