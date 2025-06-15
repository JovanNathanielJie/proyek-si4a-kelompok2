@extends('layout.main')
@section('title','Jadwal Pengajar')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>List Jadwal Pengajar</b></h3>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                @if($jadwalPengajar->isEmpty())
                    <p class="text-center">Belum ada data jadwal pengajar.</p>
                @else
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Les</th>
                            <th>Nama Pengajar</th>
                            <th>Hari Les</th>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($jadwalPengajar as $item)
                            @foreach ($item->jadwalLes->jadwalMapel as $mapel)
                            <tr class="text-center">
                                <td>{{  $no++ }}</td>
                                <td>{{ $item->jadwalLes->tanggal_les }}</td>
                                <td>{{ $item->pengajar->nama_pengajar ?? '-' }}</td>
                                <td>{{ $mapel->mataPelajaran->hari_les ?? '-' }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($mapel->mataPelajaran->waktu_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($mapel->mataPelajaran->waktu_selesai)->format('H:i') }}
                                </td>
                                <td>{{ $mapel->mataPelajaran->nama_mapel ?? '-' }}</td>
                                <td>{{ $item->jadwalLes->ruangan->kode_ruangan ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('jadwal_pengajar.show', $item->id) }}" class="btn btn-info">Show</a>
                                    @can('update', $item)
                                    <a href="{{ route('jadwal_pengajar.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan
                                    @can('delete', $item)
                                    <form action="{{ route('jadwal_pengajar.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger show_confirm"
                                            data-nama='{{ $item->pengajar->nama_pengajar }}'>Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                @endif

                @can('create', App\Models\JadwalPengajar::class)
                <div class="mt-3 text-end">
                    <a href="{{ route('jadwal_pengajar.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
