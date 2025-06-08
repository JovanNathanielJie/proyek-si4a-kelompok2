@extends('layout.main')
@section('title','Tambah Kehadiran')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Tambah Kehadiran</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('kehadiran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label for="departemen" class="form-label">Departemen</label>
                        <input type="text" class="form-control" name="departemen" maxlength="50" value="{{ old('departemen') }}">
                        @error('departemen')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_hadir" class="form-label">Jam Hadir</label>
                        <input type="time" class="form-control" name="jam_hadir" value="{{ old('jam_hadir') }}">
                        @error('jam_hadir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!--begin::Footer-->
                <div class="card-footer">
                    <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Batal</a>
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
