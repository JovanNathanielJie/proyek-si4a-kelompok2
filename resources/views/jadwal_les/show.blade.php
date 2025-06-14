@extends('layout.main')
@section('title','Detail Jadwal Les')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Jadwal Les</b></h3>
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
                        <th>Tanggal Les</th>
                        <td>{{ $jadwalLes->tanggal_les }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $jadwalLes->keterangan }}</td>
                    </tr>
                    <tr>
                        <th>Ruangan</th>
                        <td>{{ $jadwalLes->ruangan->kode_ruangan}}</td>
                    </tr>
                    <tr>
                        <th>Lantai Ruangan</th>
                        <td>{{ $jadwalLes->ruangan->lantai_ruangan}}</td>
                    </tr>
                    <tr>
                        <th>Kapasitas Ruangan</th>
                        <td>{{ $jadwalLes->ruangan->jumlah_kursi}}</td>
                    </tr>
                </table>
                <div class="mt-3 text-end">
                    <a href="{{ route('jadwal_les.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
