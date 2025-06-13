@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
<style>
    .chart-wrapper {
        width: 100%;
        overflow-x: auto;
    }
    #chartMapel, #chartSekolah, #chartGenderSiswa, #chartGenderPengajar, #chartKehadiranPengajar, #chartKehadiranSiswa {
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

    {{-- Statistik Kehadiran Siswa --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Pencarian Kehadiran Siswa</strong>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('dashboard') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Cari nama siswa..." value="{{ old('nama_siswa', $namaSiswa) }}">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </form>

            @if($siswa)
                <h5>Nama: {{ $siswa->nama_siswa }}</h5>
                <p>Persentase Kehadiran: <strong>{{ $persentaseKehadiran }}%</strong></p>
                <div class="chart-wrapper">
                    <div id="chartKehadiranSiswa"></div>
                </div>
            @elseif($namaSiswa)
                <div class="alert alert-danger">Siswa dengan nama "{{ $namaSiswa }}" tidak ditemukan.</div>
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


    @if($statistikKehadiranSiswa)
    Highcharts.chart('chartKehadiranSiswa', {
        chart: { type: 'pie' },
        title: { text: 'Distribusi Kehadiran Siswa' },
        series: [{
            name: 'Jumlah',
            data: [
                @foreach($statistikKehadiranSiswa as $data)
                    {
                        name: 'Kehadiran ID: {{ $data->kehadiran_id }}',
                        y: {{ $data->jumlah }}
                    },
                @endforeach
            ]
        }]
    });
    @endif
</script>
@endsection
