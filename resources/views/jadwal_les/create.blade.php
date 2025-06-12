@extends('layout.main')
@section('title','Tambah Jadwal Les')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Tambah Jadwal Les</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('jadwal_les.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tanggal_les" class="form-label">Tanggal Les</label>
                        <input type="date" class="form-control" name="tanggal_les" value="{{ old('tanggal_les') }}">
                        @error('tanggal_les')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
                        @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ruangan_id" class="form-label">Ruangan</label>
                        <select name="ruangan_id" class="form-select">
                            <option value="">-- Pilih Ruangan --</option>
                            @foreach ($ruangan as $r)
                                <option value="{{ $r->id }}">
                                    {{ $r->kode_ruangan }}
                                </option>
                            @endforeach
                        </select>
                        @error('ruangan_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!--begin::Footer-->
                <div class="card-footer">
                    <a href="{{ route('jadwal_les.index') }}" class="btn btn-secondary">Batal</a>
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
