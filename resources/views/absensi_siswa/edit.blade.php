@extends('layout.main')
@section('title','Edit Absensi Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Edit Absensi Siswa</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('absensi_siswa.update', $absensiSiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Nama Siswa</label>
                        <select name="siswa_id" id="siswa_id" class="form-select">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}" {{ (old('siswa_id') ?? $absensiSiswa->siswa_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_siswa }}
                                </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kehadiran_id" class="form-label">Kehadiran</label>
                        <select name="kehadiran_id" id="kehadiran_id" class="form-select">
                            <option value="">-- Pilih Kehadiran --</option>
                            @foreach ($kehadiran as $item)
                                <option value="{{ $item->id }}" {{ (old('kehadiran_id') ?? $absensiSiswa->kehadiran_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->departemen }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }} - {{ $item->jam_hadir }}
                                </option>
                            @endforeach
                        </select>
                        @error('kehadiran_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!--begin::Footer-->
                <div class="card-footer text-end">
                    <a href="{{ route('absensi_siswa.index') }}" class="btn btn-secondary">Batal</a>
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
