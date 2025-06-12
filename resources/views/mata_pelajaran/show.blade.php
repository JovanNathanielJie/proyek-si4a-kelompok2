@extends('layout.main')
@section('title','Detail Mata Pelajaran')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Mata Pelajaran</b></h3>
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
                        <th>No</th>
                        <td>{{ $mataPelajaran->id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Mapel</th>
                        <td>{{ $mataPelajaran->kode_mapel }}</td>
                    </tr>
                    <tr>
                        <th>Nama Mapel</th>
                        <td>{{ $mataPelajaran->nama_mapel }}</td>
                    </tr>
                    <tr>
                        <th>Hari Les</th>
                        <td>{{ $mataPelajaran->hari_les }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Mulai</th>
                        <td>{{ \Carbon\Carbon::parse($mataPelajaran->waktu_mulai)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Selesai</th>
                        <td>{{ \Carbon\Carbon::parse($mataPelajaran->waktu_selesai)->format('H:i') }}</td>
                    </tr>
                </table>
                <div class="mt-3 text-end">
                    <a href="{{ route('mata_pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
