@extends('layout.main')
@section('title','Edit Jadwal Sekolah')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title"><b>Edit Jadwal Sekolah</b></div>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('jadwal_sekolah.update', $jadwalSekolah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="hari_sekolah" class="form-label">Hari Sekolah</label>
                        <input type="text" class="form-control" name="hari_sekolah" value="{{ old('hari_sekolah') ? old('hari_sekolah') : $jadwalSekolah->hari_sekolah }}">
                        @error('hari_sekolah')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" name="jam_mulai" value="{{ old('jam_mulai') ? old('jam_mulai') : $jadwalSekolah->jam_mulai }}">
                        @error('jam_mulai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai" value="{{ old('jam_selesai') ? old('jam_selesai') : $jadwalSekolah->jam_selesai }}">
                        @error('jam_selesai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sekolah_id" class="form-label">Nama Sekolah</label>
                        <select name="sekolah_id" class="form-select">
                            <option value="">-- Pilih Sekolah --</option>
                            @foreach($sekolah as $item)
                                <option value="{{ $item->id }}" {{ old('sekolah_id') == $item->id ? 'selected' : ($jadwalSekolah->sekolah_id == $item->id ? 'selected' : null) }}>
                                    {{ $item->nama_sekolah }}
                                </option>
                            @endforeach
                        </select>
                        @error('sekolah_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--end::Body-->

                <!--begin::Footer-->
                <div class="card-footer">
                    <a href="{{ route('jadwal_sekolah.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Row-->
@endsection
