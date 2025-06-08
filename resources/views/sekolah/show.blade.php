@extends('layout.main')
@section('title','Detail Sekolah')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Detail Sekolah</b></h3>
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
                <tr>
                    <th>No</th>
                    <td>{{ $sekolah->id}}</td>
                </tr>
                <tr>
                    <th>Nama Sekolah</th>
                    <td>{{ $sekolah->nama_sekolah}}</td>
                </tr>
                <tr>
                    <th>Dekan</th>
                    <td>{{ $sekolah->alamat_sekolah}}</td>
                </tr>
            </table>
                <div class="mt-3 text-end">
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </div>
      </div>
        <!-- /.card -->
    </div>
</div>
<!--end::Row-->
@endsection

