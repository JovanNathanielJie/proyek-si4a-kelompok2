@extends('layout.main')
@section('title','Detail Jadwal Mapel')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Detail Jadwal Mapel</b></h3>
            </div>
            <!--end::Header-->

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Kode Mata Pelajaran</th>
                            <td>{{ $jadwalMapel->mataPelajaran->kode_mapel ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Mata Pelajaran</th>
                            <td>{{ $jadwalMapel->mataPelajaran->nama_mapel ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Hari Les</th>
                            <td>{{ $jadwalMapel->mataPelajaran->hari_les ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Les</th>
                            <td>{{ $jadwalMapel->jadwalLes->tanggal_les ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td>
                                {{ $jadwalMapel->mataPelajaran->waktu_mulai ?? '-' }} -
                                {{ $jadwalMapel->mataPelajaran->waktu_selesai ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>{{ $jadwalMapel->jadwalLes->ruangan->kode_ruangan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jadwalMapel->jadwalLes->keterangan ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--begin::Footer-->
            <div class="card-footer text-end">
                <a href="{{ route('jadwal_mapel.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
