@extends('layout.main')
@section('title','Edit Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Edit Data Pengajar</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('pengajar.update', $pengajar->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_pengajar" class="form-label">Nama Pengajar</label>
                        <input type="text" class="form-control" name="nama_pengajar" value="{{ old('nama_pengajar') ? old('nama_pengajar') : $pengajar->nama_pengajar }}">
                        @error('nama_pengajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" value="L"
                            {{ old('jenis_kelamin', $pengajar->jenis_kelamin ?? 'L') == 'L' ? 'checked' : '' }}> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="P"
                            {{ old('jenis_kelamin', $pengajar->jenis_kelamin ?? 'L') == 'P' ? 'checked' : '' }}> Perempuan
                        @error('jenis_kelamin')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_masuk_pengajar" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk_pengajar" value="{{ old('tanggal_masuk_pengajar') ? old('tanggal_masuk_pengajar') : $pengajar->tanggal_masuk_pengajar }}">
                        @error('tanggal_masuk_pengajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat_pengajar" class="form-label">Alamat Pengajar</label>
                        <input type="text" class="form-control" name="alamat_pengajar" value="{{ old('alamat_pengajar') ? old('alamat_pengajar') : $pengajar->alamat_pengajar }}">
                        @error('alamat_pengajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon_pengajar" class="form-label">Nomor Telepon Pengajar</label>
                        <input type="text" class="form-control" name="no_telepon_pengaja" value="{{ old('no_telepon_pengajar') ? old('no_telepon_pengajar') : $pengajar->no_telepon_pengajar }}">
                        @error('no_telepon_pengajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="identitas_pc" class="form-label">Identitas PC</label>
                        <input type="text" class="form-control" name="identitas_pc" value="{{ old('identitas_pc') ? old('identitas_pc') : $pengajar->identitas_pc }}">
                        @error('identitas_pc')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!--begin::Footer-->
                <div class="card-footer text-end">
                    <a href="{{ route('pengajar.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
