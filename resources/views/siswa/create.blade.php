@extends('layout.main')
@section('title','Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Tambah Siswa</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') }}">
                        @error('nama_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}> Laki-laki
                            <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}> Perempuan
                            @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_masuk_siswa" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk_siswa" value="{{ old('tanggal_masuk_siswa') }}">
                        @error('tanggal_masuk_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
                        <input type="text" class="form-control" name="alamat_siswa" value="{{ old('alamat_siswa') }}">
                        @error('alamat_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon_siswa" class="form-label">Nomor Telepon Siswa</label>
                        <input type="text" class="form-control" name="no_telepon_siswa" value="{{ old('no_telepon_siswa') }}">
                        @error('no_telepon_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon_orang_tua" class="form-label">Nomor Telepon Orang Tua</label>
                        <input type="text" class="form-control" name="no_telepon_orang_tua" value="{{ old('no_telepon_orang_tua') }}">
                        @error('no_telepon_orang_tua')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sekolah_id" class="form-label">Asal Sekolah</label>
                        <select name="sekolah_id" class="form-select">
                            <option value="">-- Pilih Sekolah --</option>
                            @foreach($sekolah as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_sekolah }}
                            </option>
                            @endforeach
                        </select>
                        @error('sekolah_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!--begin::Footer-->
                <div class="card-footer">
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
