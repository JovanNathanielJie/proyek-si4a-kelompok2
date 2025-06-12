@extends('layout.main')
@section('title','Edit Mata Pelajaran')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Edit Data Mata Pelajaran</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('mata_pelajaran.update', $mata_pelajaran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="kode_mapel" class="form-label">Kode Mapel</label>
                        <input type="text" class="form-control" name="kode_mapel" value="{{ old('kode_mapel', $mata_pelajaran->kode_mapel) }}">
                        @error('kode_mapel')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_mapel" class="form-label">Nama Mapel</label>
                        <input type="text" class="form-control" name="nama_mapel" value="{{ old('nama_mapel', $mata_pelajaran->nama_mapel) }}">
                        @error('nama_mapel')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hari_les" class="form-label">Hari Les</label>
                        <select name="hari_les" class="form-control">
                            <option value="">-- Pilih Hari --</option>
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                <option value="{{ $hari }}" {{ old('hari_les', $mata_pelajaran->hari_les) == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                            @endforeach
                        </select>
                        @error('hari_les')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control" name="waktu_mulai" value="{{ old('waktu_mulai', $mata_pelajaran->waktu_mulai) }}">
                        @error('waktu_mulai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control" name="waktu_selesai" value="{{ old('waktu_selesai', $mata_pelajaran->waktu_selesai) }}">
                        @error('waktu_selesai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!--begin::Footer-->
                <div class="card-footer text-end">
                    <a href="{{ route('mata_pelajaran.index') }}" class="btn btn-secondary">Batal</a>
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
