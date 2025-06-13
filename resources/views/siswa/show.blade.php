@extends('layout.main')
@section('title','Detail Siswa')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!--begin::Card-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Siswa</b></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nama Siswa</th>
                        <td>{{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $siswa->tanggal_masuk_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $siswa->alamat_siswa }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon Siswa</th>
                        <td>{{ $siswa->no_telepon_siswa }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon Orang Tua</th>
                        <td>{{ $siswa->no_telepon_orang_tua }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $siswa->sekolah->nama_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Bulan Tahun Ajaran Siswa</th>
                        <td>{{ $siswa->bulan_tahun_ajaran }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $siswa->kelas }}</td>
                    </tr>
                </table>
                <div class="mt-3 text-end">
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Row-->
@endsection
