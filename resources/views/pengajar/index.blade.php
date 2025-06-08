@extends('layout.main')
@section('title','Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Pengajar</b></h3>
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
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pengajar</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Masuk Pengajar</th>
                    <th>Alamat Pengajar</th>
                    <th>Nomor Telepon Siswa</th>
                    <th>Identitas PC</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($siswa as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pengajar}}</td>
                    <td>{{ $item->jenis_kelamin}}</td>
                    <td>{{ $item->tanggal_masuk_pengajar}}</td>
                    <td>{{ $item->alamat_pengajar}}</td>
                    <td>{{ $item->no_telepon_pengajar}}</td>
                    <td>{{ $item->identitas_pc}}</td>
                    <td>
                        <a href="{{ route('pengajar.show', $item->id) }}" class="btn btn-info">Show</a>
                        @can('update', $item)
                        <a href="{{ route('pengajar.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $item)
                        <form action="{{ route('pengajar.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->nama_pengajar }}'>Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            @can('create', App\Models\Pengajar::class)
            <div class="mt-3 text-end">
                <a href="{{ route('pengajar.create')}}" class="btn btn-primary">Tambah</a>
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
