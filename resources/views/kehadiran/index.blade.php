@extends('layout.main')
@section('title','Kehadiran')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Kehadiran</b></h3>
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
            @if($kehadiran->isEmpty())
                <p class="text-center">Belum ada data kehadiran.</p>
            @else
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Departemen</th>
                        <th>Tanggal</th>
                        <th>Jam Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($kehadiran as $item)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->departemen }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td>{{ $item->jam_hadir }}</td>
                    <td>
                        <a href="{{ route('kehadiran.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                        @can('update', $item)
                        <a href="{{ route('kehadiran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                        @can('delete', $item)
                        <form action="{{ route('kehadiran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus kehadiran ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            @can('create', App\Models\Kehadiran::class)
            <div class="mt-3 text-end">
                <a href="{{ route('kehadiran.create') }}" class="btn btn-primary">Tambah</a>
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
