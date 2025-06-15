@extends('layout.main')
@section('title','Mata Pelajaran')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Mata Pelajaran</b></h3>
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
            @if($mataPelajaran->isEmpty())
                <p class="text-center">Belum ada data mata pelajaran.</p>
            @else
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Hari Les</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($mataPelajaran as $item)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_mapel }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td>{{ $item->hari_les }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('mata_pelajaran.show', $item->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('mata_pelajaran.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mata_pelajaran.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->nama_mapel }}'>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            @can('create', App\Models\MataPelajaran::class)
            <div class="mt-3 text-end">
                <a href="{{ route('mata_pelajaran.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            @endcan
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
</div>
<!--end::Row-->
@endsection
