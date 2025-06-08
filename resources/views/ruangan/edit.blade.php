@extends('layout.main')
@section('title','Edit Ruangan')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Edit Data Ruangan</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                        <input type="text" class="form-control" name="kode_ruangan" maxlength="3" value="{{ old('kode_ruangan') ? old('kode_ruangan') : $ruangan->kode_ruangan }}">
                        @error('kode_ruangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lantai_ruangan" class="form-label">Lantai Ruangan</label>
                        <input type="number" class="form-control" name="lantai_ruangan" min="1" max="10" value="{{ old('lantai_ruangan') ? old('lantai_ruangan') : $ruangan->lantai_ruangan }}">
                        @error('lantai_ruangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                        <input type="number" class="form-control" name="jumlah_kursi" min="1" max="100" value="{{ old('jumlah_kursi') ? old('jumlah_kursi') : $ruangan->jumlah_kursi }}">
                        @error('jumlah_kursi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!--begin::Footer-->
                <div class="card-footer text-end">
                    <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Batal</a>
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
