@extends('layout.main')
@section('title','Tambah Jadwal Mapel')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <h3 class="card-title"><b>Tambah Jadwal Mapel</b></h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('jadwal_mapel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
                        <select name="mata_pelajaran_id" class="form-select">
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            @foreach ($mataPelajaran as $item)
                                <option value="{{ $item->id }}" {{ old('mata_pelajaran_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->kode_mapel }} - {{ $item->nama_mapel }}
                                </option>
                            @endforeach
                        </select>
                        @error('mata_pelajaran_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jadwal_les_id" class="form-label">Jadwal Les</label>
                        <select name="jadwal_les_id" class="form-select">
                            <option value="">-- Pilih Jadwal Les --</option>
                            @foreach ($jadwalLes as $item)
                                <option value="{{ $item->id }}" {{ old('jadwal_les_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->hari_les }} | {{ $item->jam_mulai }} - {{ $item->jam_selesai }} | {{ $item->ruangan->kode_ruangan ?? '-' }}
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
                    <a href="{{ route('jadwal_mapel.index') }}" class="btn btn-secondary">Batal</a>
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
