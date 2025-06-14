@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
<style>
    .chart-wrapper {
        width: 100%;
        overflow-x: auto;
    }
    #chartMapel, #chartSekolah, #chartGenderSiswa, #chartGenderPengajar, #chartKehadiranPengajar, #chartKehadiranSiswa, #chartKehadiranMingguan {
        min-width: 300px;
        height: 400px;
    }
</style>

<div class="container py-4">
    {{-- Grafik Jadwal Mapel --}}
    <div class="card mb-4">
        <div class="card-header"><strong>Statistik Jadwal Mapel per Hari</strong></div>
        <div class="card-body chart-wrapper">
            <div id="chartMapel"></div>
        </div>
    </div>

    {{-- Jumlah Kursi --}}
    <div class="card mb-4">
        <div class="card-header"><strong>Jumlah Kursi per Ruangan</strong></div>
        <div class="card-body chart-wrapper">
            <div id="chartKursiRuangan"></div>
        </div>
    </div>

    {{-- Pie Jenis Kelamin --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header"><strong>Jenis Kelamin Siswa</strong></div>
                <div class="card-body chart-wrapper">
                    <div id="chartGenderSiswa"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header"><strong>Jenis Kelamin Pengajar</strong></div>
                <div class="card-body chart-wrapper">
                    <div id="chartGenderPengajar"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik Siswa per Sekolah --}}
    <div class="card mb-4">
        <div class="card-header"><strong>Jumlah Siswa per Sekolah</strong></div>
        <div class="card-body chart-wrapper">
            <div id="chartSiswaSekolah"></div>
        </div>
    </div>

    {{-- Grafik Siswa per Kelas --}}
    <div class="card mb-4">
        <div class="card-header"><strong>Jumlah Siswa per Kelas</strong></div>
        <div class="card-body chart-wrapper">
            <div id="chartSiswaKelas"></div>
        </div>
    </div>

    {{-- Statistik Kehadiran Siswa --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Pencarian Kehadiran Siswa</strong>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan nama siswa..." value="{{ old('nama_siswa', request('nama_siswa')) }}">
                    <button class="btn btn-outline-primary">Cari</button>
                </div>
            </form>

            @if(request()->has('nama_siswa'))
    @if($siswa)
        <div class="alert alert-success d-flex align-items-start gap-3 align-items-center" role="alert">
            <i class="bi bi-person-check-fill fs-4"></i>
            <div>
                <h5 class="mb-1"><strong>Nama:</strong> {{ $siswa->nama_siswa }}</h5>
                <p class="mb-0"><strong>Jumlah Hadir:</strong> {{ $jumlahHadir }} kali</p>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            Siswa dengan nama <strong>"{{ request('nama_siswa') }}"</strong> tidak ditemukan.
        </div>
    @endif
@endif
        </div>
    </div>
</div>

{{-- Highcharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
    Highcharts.chart('chartMapel', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Mapel per Hari' },
        xAxis: {
            categories: {!! json_encode($jadwalMapelPerHari->pluck('hari_les')) !!},
            title: { text: 'Hari' }
        },
        yAxis: {
            title: { text: 'Jumlah Mapel' }
        },
        series: [{
            name: 'Mapel',
            data: {!! json_encode($jadwalMapelPerHari->pluck('jumlah')) !!}
        }]
    });

    Highcharts.chart('chartKursiRuangan', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Kursi per Ruangan' },
        xAxis: {
            categories: {!! json_encode($jumlahKursiPerRuangan->pluck('kode_ruangan')) !!},
            title: { text: 'Kode Ruangan' }
        },
        yAxis: {
            title: { text: 'Jumlah Kursi' }
        },
        series: [{
            name: 'Kursi',
            data: {!! json_encode($jumlahKursiPerRuangan->pluck('jumlah_kursi')) !!}
        }]
    });

    Highcharts.chart('chartGenderSiswa', {
        chart: { type: 'pie' },
        title: { text: 'Jenis Kelamin Siswa' },
        series: [{
            name: 'Jumlah',
            data: [
                { name: 'Laki-laki', y: {{ $jumlahLaki }} },
                { name: 'Perempuan', y: {{ $jumlahPerempuan }} }
            ]
        }]
    });

    Highcharts.chart('chartGenderPengajar', {
        chart: { type: 'pie' },
        title: { text: 'Jenis Kelamin Pengajar' },
        series: [{
            name: 'Jumlah',
            data: [
                { name: 'Laki-laki', y: {{ $jumlahPengajarLaki }} },
                { name: 'Perempuan', y: {{ $jumlahPengajarPerempuan }} }
            ]
        }]
    });

    Highcharts.chart('chartSiswaSekolah', {
        chart: { type: 'bar' },
        title: { text: 'Jumlah Siswa per Sekolah' },
        xAxis: {
            categories: {!! json_encode($jumlahSiswaPerSekolah->pluck('nama_sekolah')) !!},
            title: { text: 'Sekolah' }
        },
        yAxis: {
            title: { text: 'Jumlah Siswa' }
        },
        series: [{
            name: 'Siswa',
            data: {!! json_encode($jumlahSiswaPerSekolah->pluck('total')) !!}
        }]
    });

    Highcharts.chart('chartSiswaKelas', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Siswa per Kelas' },
        xAxis: {
            categories: {!! json_encode($jumlahSiswaPerKelas->keys()) !!},
            title: { text: 'Kelas' },
            allowDecimals: false
        },
        yAxis: {
            title: { text: 'Jumlah Siswa' },
            allowDecimals: false
        },
        series: [{
            name: 'Siswa',
            data: {!! json_encode($jumlahSiswaPerKelas->values()) !!}
        }]
    });
</script>
@endsection
