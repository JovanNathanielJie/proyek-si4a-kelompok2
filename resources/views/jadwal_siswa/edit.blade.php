@extends('layout.main')
@section('title','Edit Jadwal Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Edit Jadwal Siswa</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('jadwal_siswa.update', $jadwalSiswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Nama Siswa</label>
                        <select name="siswa_id" class="form-select">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}" {{ (old('siswa_id') ?? $jadwalSiswa->siswa_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_siswa }}
                                </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jadwal_les_id" class="form-label">Jadwal Les</label>
                        <select name="jadwal_les_id" class="form-select">
                            <option value="">-- Pilih Jadwal Les --</option>
                            @foreach ($jadwalLes as $item)
                                <option value="{{ $item->id }}" {{ (old('jadwal_les_id') ?? $jadwalSiswa->jadwal_les_id) == $item->id ? 'selected' : '' }}>
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
                <div class="card-footer text-end">
                    <a href="{{ route('jadwal_siswa.index') }}" class="btn btn-secondary">Batal</a>
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
