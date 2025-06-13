@extends('layout.main')
@section('title','Tambah Absensi Pengajar')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Tambah Absensi Pengajar</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('absensi_pengajar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label for="pengajar_id" class="form-label">Nama Pengajar</label>
                        <select name="pengajar_id" id="pengajar_id" class="form-select">
                            <option value="">-- Pilih Pengajar --</option>
                            @foreach ($pengajar as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_pengajar }}
                                </option>
                            @endforeach
                        </select>
                        @error('pengajar_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kehadiran_id" class="form-label">Kehadiran</label>
                        <select name="kehadiran_id" id="kehadiran_id" class="form-select">
                            <option value="">-- Pilih Kehadiran --</option>
                            @foreach ($kehadiran as $item)
                                <option value="{{ $item->id }}">
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
                    <a href="{{ route('absensi_pengajar.index') }}" class="btn btn-secondary">Batal</a>
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
