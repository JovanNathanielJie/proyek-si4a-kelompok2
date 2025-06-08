@extends('layout.main')
@section('title','Tambah Jadwal Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Tambah Jadwal Pengajar</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('jadwal_pengajar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label for="pengajar_id" class="form-label">Nama Pengajar</label>
                        <select name="pengajar_id" class="form-select">
                            <option value="">-- Pilih Pengajar --</option>
                            @foreach ($pengajar as $item)
                                <option value="{{ $item->id }}" {{ old('pengajar_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_pengajar }}
                                </option>
                            @endforeach
                        </select>
                        @error('pengajar_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jadwal_les_id" class="form-label">Jadwal Les</label>
                        <select name="jadwal_les_id" class="form-select">
                            <option value="">-- Pilih Jadwal Les --</option>
                            @foreach ($jadwalLes as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->hari_les }} | {{ $item->jam_mulai }} - {{ $item->jam_selesai }} | {{ $item->mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                        @error('jadwal_les_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!--begin::Footer-->
                <div class="card-footer">
                    <a href="{{ route('jadwal_pengajar.index') }}" class="btn btn-secondary">Batal</a>
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
