@extends('layout.main')
@section('title','Absensi Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Absensi Pengajar</b></h3>
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
            <div style="overflow-x: auto;">
            @if($absensiPengajar->isEmpty())
                <p class="text-center">Belum ada data absensi pengajar.</p>
            @else
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengajar</th>
                        <th>Departemen</th>
                        <th>Tanggal Hadir</th>
                        <th>Jam Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($absensiPengajar as $item)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pengajar->nama_pengajar ?? '-' }}</td>
                    <td>{{ $item->kehadiran->departemen ?? '-' }}</td>
                    <td>{{ isset($item->kehadiran->tanggal) ? \Carbon\Carbon::parse($item->kehadiran->tanggal)->format('d M Y') : '-' }}</td>
                    <td>{{ $item->kehadiran->jam_hadir ?? '-' }}</td>
                    <td>
                        <a href="{{ route('absensi_pengajar.show', $item->id) }}" class="btn btn-info">Show</a>
                        @can('update', $item)
                        <a href="{{ route('absensi_pengajar.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        @can('delete', $item)
                        <form action="{{ route('absensi_pengajar.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->pengajar->nama_pengajar }}'>Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            @can('create', App\Models\AbsensiPengajar::class)
            <div class="mt-3 text-end">
                <a href="{{ route('absensi_pengajar.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            @endcan
        </div>
    </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
<!--end::Row-->
@endsection
