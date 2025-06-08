@extends('layout.main')
@section('title','Absensi Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Absensi Siswa</b></h3>
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
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Departemen</th>
                        <th>Tanggal Hadir</th>
                        <th>Jam Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($absensiSiswa as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->siswa->nama_siswa ?? '-' }}</td>
                    <td>{{ $item->kehadiran->departemen ?? '-' }}</td>
                    <td>{{ isset($item->kehadiran->tanggal) ? \Carbon\Carbon::parse($item->kehadiran->tanggal)->format('d M Y') : '-' }}</td>
                    <td>{{ $item->kehadiran->jam_hadir ?? '-' }}</td>
                    <td>
                        <a href="{{ route('absensi_siswa.show', $item->id) }}" class="btn btn-info">Show</a>
                        @can('update', $item)
                        <a href="{{ route('absensi_siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $item)
                        <form action="{{ route('absensi_siswa.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus absensi siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @can('create', App\Models\AbsensiSiswa::class)
            <div class="mt-3 text-end">
                <a href="{{ route('absensi_siswa.create') }}" class="btn btn-primary">Tambah</a>
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
