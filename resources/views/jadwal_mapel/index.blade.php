@extends('layout.main')
@section('title','Jadwal Mapel')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>List Jadwal Mapel</b></h3>
                <div class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        title="Collapse"
                    >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if($jadwalMapel->isEmpty())
                    <p class="text-center">Belum ada data jadwal mata pelajaran.</p>
                @else
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Hari Les</th>
                        <th>Tanggal Les</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach ($jadwalMapel as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mataPelajaran->kode_mapel ?? '-' }}</td>
                        <td>{{ $item->mataPelajaran->nama_mapel ?? '-' }}</td>
                        <td>{{ $item->mataPelajaran->hari_les ?? '-' }}</td>
                        <td>{{ $item->jadwalLes->tanggal_les ?? '-' }}</td>
                        <td>
                            {{ $item->mataPelajaran->waktu_mulai ?? '-' }} -
                            {{ $item->mataPelajaran->waktu_selesai ?? '-' }}
                        </td>
                        <td>
                            <a href="{{ route('jadwal_mapel.show', $item->id) }}" class="btn btn-info">Show</a>
                            @can('update', $item)
                            <a href="{{ route('jadwal_mapel.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            @endcan
                            @can('delete', $item)
                            <form action="{{ route('jadwal_mapel.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger show_confirm"
                                data-nama='{{ $item->mataPelajaran->nama_mapel }}'>Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
                @can('create', App\Models\JadwalMapel::class)
                <div class="mt-3 text-end">
                    <a href="{{ route('jadwal_mapel.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                @endcan
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!--end::Row-->
@endsection
