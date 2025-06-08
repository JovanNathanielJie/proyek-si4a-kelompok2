@extends('layout.main')
@section('title','Detail Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Pengajar</b></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{ $pengajar->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pengajar</th>
                        <td>{{ $pengajar->nama_pengajar }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $pengajar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $pengajar->tanggal_masuk_pengajar }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $pengajar->alamat_pengajar }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $pengajar->no_telepon_pengajar }}</td>
                    </tr>
                    <tr>
                        <th>Identitas PC</th>
                        <td>{{ $pengajar->identitas_pc }}</td>
                    </tr>
                </table>
                <div class="mt-3 text-end">
                    <a href="{{ route('pengajar.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
