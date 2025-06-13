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
                @if($jadwalSiswa->isEmpty())
                    <p class="text-center">Belum ada data jadwal siswa.</p>
                 @else
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Hari Les</th>
                        <th>Jam</th>
                        <th>Mapel</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach ($jadwalSiswa as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->nama_siswa ?? '-' }}</td>
                        <td>
                            @foreach ( $item->jadwalLes->jadwalMapel as $item)
                                {{ $item->mataPelajaran->hari_les }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ( $item->jadwalLes->jadwalMapel as $item)
                                {{ $item->mataPelajaran->waktu_mulai - $item->mataPelajaran->waktu_selesai }}
                            @endforeach
                        </td>
                        <td>{{ $item->jadwalLes->mata_pelajaran ?? '-' }}</td>
                        <td>
                            <a href="{{ route('jadwal_siswa.show', $item->id) }}" class="btn btn-info">Show</a>
                            @can('update', $item)
                            <a href="{{ route('jadwal_siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            @endcan
                            @can('delete', $item)
                            <form action="{{ route('jadwal_siswa.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item }}'>Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
                @can('create', App\Models\JadwalSiswa::class)
                <div class="mt-3 text-end">
                    <a href="{{ route('jadwal_siswa.create') }}" class="btn btn-primary">Tambah</a>
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
