@extends('layout.main')
@section('title','Jadwal Sekolah')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Jadwal Sekolah</b></h3>
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
            @if($jadwalSekolah->isEmpty())
                <p class="text-center">Belum ada data jadwal sekolah.</p>
            @else
            <table class="table table-bordered table-striped">
                <tr class="text-center">
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Sekolah</th>
                    <th>Aksi</th>
                </tr>

                @foreach ($jadwalSekolah as $item)
                <tr class="text-center">
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->hari_sekolah }}</td>
                    <td>{{ $item->jam_mulai }}</td>
                    <td>{{ $item->jam_selesai }}</td>
                    <td>{{ $item->sekolah->nama_sekolah }}</td>
                    <td>
                        <a href="{{ route('jadwal_sekolah.show', $item->id) }}" class="btn btn-info">Show</a>
                        @can('update', $item)
                        <a href="{{ route('jadwal_sekolah.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $item)
                        <form action="{{ route('jadwal_sekolah.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->sekolah->nama_sekolah }}'>Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
            @can('create', App\Models\JadwalSekolah::class)
            <div class="mt-3 text-end">
                <a href="{{ route('jadwal_sekolah.create')}}" class="btn btn-primary">Tambah</a>
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
