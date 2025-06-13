@extends('layout.main')
@section('title','Edit Jadwal Les')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Edit Jadwal Les</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('jadwal_les.update', $jadwalLes->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="tanggal_les" class="form-label">Tanggal Les</label>
                        <input type="date" class="form-control" name="tanggal_les" value="{{ old('tanggal_les') ? old('tanggal_les') : $jadwalLes->tanggal_les }}">
                        @error('tanggal_les')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') ? old('keterangan') : $jadwalLes->keterangan }}">
                        @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ruangan_id" class="form-label">Ruangan</label>
                        <select name="ruangan_id" class="form-select">
                            <option value="">-- Pilih Ruangan --</option>
                            @foreach ($ruangan as $r)
                                <option value="{{ $r->id }}" {{ (old('ruangan_id') ?? $jadwalLes->ruangan_id) == $r->id ? 'selected' : null }}>
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
                <div class="card-footer text-end">
                    <a href="{{ route('jadwal_les.index') }}" class="btn btn-secondary">Batal</a>
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
