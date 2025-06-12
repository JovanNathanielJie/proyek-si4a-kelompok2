@extends('layout.main')
@section('title','Detail Jadwal Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Detail Jadwal Pengajar</b></h3>
            </div>
            <!--end::Header-->

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Pengajar</th>
                            <td>{{ $jadwalPengajar->pengajar->nama_pengajar }}</td>
                        </tr>
                        <tr>
                            <th>Hari Les</th>
                            <td>{{ $jadwalPengajar->jadwalLes->jadwalMapel->mataPelajaran->hari_les }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Les</th>
                            <td>{{ $jadwalPengajar->jadwalLes->tanggal_les }}</td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td>{{ $jadwalPengajar->jadwalLes->jadwalMapel->mataPelajaran->waktu_mulai }} -
                                {{ $jadwalPengajar->jadwalLes->->jadwalMapel->mataPelajaran->waktu_selesai }}</td>
                        </tr>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <td>{{ $jadwalPengajar->jadwalLes->->jadwalMapel->mataPelajaran->nama_mapel }}</td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>{{ $jadwalPengajar->jadwalLes->ruangan->kode_ruangan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jadwalPengajar->jadwalLes->keterangan ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--begin::Footer-->
            <div class="card-footer text-end">
                <a href="{{ route('jadwal_pengajar.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
