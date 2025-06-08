@extends('layout.main')
@section('title','Tambah Sekolah')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><b>Tambah Sekolah</b></div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('sekolah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
                        @error('nama_sekolah')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                        <input type="text" class="form-control" name="alamat_sekolah" value="{{ old('alamat_sekolah') }}">
                        @error('alamat_sekolah')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>

    </div>
  </div>
  <!--end::Row-->
  @endsection
