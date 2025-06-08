@extends('layout.main')
@section('title','Detail Kehadiran')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Kehadiran</b></h3>
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
                        <td>{{ $kehadiran->id }}</td>
                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td>{{ $kehadiran->departemen }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($kehadiran->tanggal)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th>Jam Hadir</th>
                        <td>{{ $kehadiran->jam_hadir }}</td>
                    </tr>
                </table>
                <div class="mt-3 text-end">
                    <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
