@extends('layout.main')
@section('title','Detail Jadwal Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Detail Jadwal Siswa</b></h3>
            </div>
            <!--end::Header-->

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">Nama Siswa</th>
                            <td>{{ $jadwalSiswa->siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <th>Hari Les</th>
                            <td>{{ $jadwalSiswa->jadwalLes->hari_les }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Les</th>
                            <td>{{ $jadwalSiswa->jadwalLes->tanggal_les }}</td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td>{{ $jadwalSiswa->jadwalLes->jam_mulai }} - {{ $jadwalSiswa->jadwalLes->jam_selesai }}</td>
                        </tr>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <td>{{ $jadwalSiswa->jadwalLes->mata_pelajaran }}</td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>{{ $jadwalSiswa->jadwalLes->ruangan->kode_ruangan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jadwalSiswa->jadwalLes->keterangan ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--begin::Footer-->
            <div class="card-footer text-end">
                <a href="{{ route('jadwal_siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
