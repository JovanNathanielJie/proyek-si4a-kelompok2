@extends('layout.main')
@section('title','Jadwal Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>List Jadwal Siswa</b></h3>
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
                <div style="overflow-x: auto;">
                @if($jadwalSiswa->isEmpty())
                    <p class="text-center">Belum ada data jadwal siswa.</p>
                @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Les</th>
                            <th>Nama Siswa</th>
                            <th>Hari Les</th>
                            <th>Jam</th>
                            <th>Mapel</th>
                            <th>Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($jadwalSiswa as $jadwal)
                            @foreach ($jadwal->jadwalLes->jadwalMapel as $jadwalMapel)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $jadwal->jadwalLes->tanggal_les }}</td>
                                    <td>{{ $jadwal->siswa->nama_siswa ?? '-' }}</td>
                                    <td>{{ $jadwalMapel->mataPelajaran->hari_les }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($jadwalMapel->mataPelajaran->waktu_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($jadwalMapel->mataPelajaran->waktu_selesai)->format('H:i') }}
                                    </td>
                                    <td>{{ $jadwalMapel->mataPelajaran->nama_mapel ?? '-' }}</td>
                                    <td>{{ $jadwal->jadwalLes->ruangan->kode_ruangan ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('jadwal_siswa.show', $jadwal->id) }}" class="btn btn-info">Show</a>
                                        @can('update', $jadwal)
                                        <a href="{{ route('jadwal_siswa.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                                        @endcan
                                        @can('delete', $jadwal)
                                        <form action="{{ route('jadwal_siswa.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" title='Delete'
                                                data-nama='{{ $jadwal->siswa->nama_siswa }}'>Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                @endif

                @can('create', App\Models\JadwalSiswa::class)
                <div class="mt-3 text-end">
                    <a href="{{ route('jadwal_siswa.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
</div>
<!--end::Row-->
@endsection
