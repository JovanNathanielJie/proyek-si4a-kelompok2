@extends('layout.main')
@section('title','Detail Jadwal Pengajar')

@section('content')
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Jadwal Pengajar</b></h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama Pengajar</th>
                        <td>{{ $jadwalPengajar->pengajar->nama_pengajar ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Les</th>
                        <td>{{ $jadwalPengajar->jadwalLes->tanggal_les ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Ruangan</th>
                        <td>{{ $jadwalPengajar->jadwalLes->ruangan->kode_ruangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $jadwalPengajar->jadwalLes->keterangan ?? '-' }}</td>
                    </tr>
                </table>

                <h5 class="mt-4 mb-2"><b>Detail Mata Pelajaran</b></h5>
                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Hari Les</th>
                            <th>Jam</th>
                            <th>Nama Mapel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwalPengajar->jadwalLes->jadwalMapel as $i => $mapel)
                            <tr class="text-center">
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $mapel->mataPelajaran->hari_les ?? '-' }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($mapel->mataPelajaran->waktu_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($mapel->mataPelajaran->waktu_selesai)->format('H:i') }}
                                </td>
                                <td>{{ $mapel->mataPelajaran->nama_mapel ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data mapel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('jadwal_pengajar.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
