@extends('layout.main')
@section('title','Jadwal Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>List Jadwal Pengajar</b></h3>
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
                @if($jadwalPengajar->isEmpty())
                    <p class="text-center">Belum ada data jadwal pengajar.</p>
                @else
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Pengajar</th>
                        <th>Hari Les</th>
                        <th>Jam</th>
                        <th>Mapel</th>
                        <th>Ruangan</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach ($jadwalPengajar as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pengajar->nama_pengajar ?? '-' }}</td>
                        <td>{{ $item->jadwalLes->hari_les ?? '-' }}</td>
                        <td>
                            {{ $item->jadwalLes->jam_mulai ?? '-' }} -
                            {{ $item->jadwalLes->jam_selesai ?? '-' }}
                        </td>
                        <td>{{ $item->jadwalLes->mata_pelajaran ?? '-' }}</td>
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
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->pengajar->nama }}'>Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
                @can('create', App\Models\JadwalPengajar::class)
                <div class="mt-3 text-end">
                    <a href="{{ route('jadwal_pengajar.create') }}" class="btn btn-primary">Tambah</a>
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
