@extends('layout.main')
@section('title','Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Siswa</b></h3>
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
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Masuk Siswa</th>
                    <th>Alamat Siswa</th>
                    <th>Nomor Telepon Siswa</th>
                    <th>Nomor Telepon Ortu</th>
                    <th>Asal Sekolah</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($siswa as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_siswa}}</td>
                    <td>{{ $item->jenis_kelamin}}</td>
                    <td>{{ $item->tanggal_masuk_siswa}}</td>
                    <td>{{ $item->alamat_siswa}}</td>
                    <td>{{ $item->no_telepon_siswa}}</td>
                    <td>{{ $item->no_telepon_orang_tua}}</td>
                    <td>{{ $item->sekolah->nama_sekolah}}</td>
                    <td>
                        <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-info">Show</a>
                        @can('update', $item)
                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $item)
                        <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->nama_siswa }}'>Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            @can('create', App\Models\Siswa::class)
            <div class="mt-3 text-end">
                <a href="{{ route('siswa.create')}}" class="btn btn-primary">Tambah</a>
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
