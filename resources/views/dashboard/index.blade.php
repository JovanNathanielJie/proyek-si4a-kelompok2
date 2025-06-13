@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container mt-4">
    <div class="row">

        <!-- Jadwal Mapel per Hari -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Jadwal Mapel per Hari</div>
                <div class="card-body">
                    <div id="jadwalMapelChart" style="height: 400px;"></div>
                </div>
            </div>
        </div>

        <!-- Jenis Kelamin Siswa -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-success text-white">Statistik Jenis Kelamin Siswa</div>
                <div class="card-body">
                    <div id="genderSiswaChart" style="height: 400px;"></div>
                </div>
            </div>
        </div>

        <!-- Jenis Kelamin Pengajar -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-info text-white">Statistik Jenis Kelamin Pengajar</div>
                <div class="card-body">
                    <div id="genderPengajarChart" style="height: 400px;"></div>
                </div>
            </div>
        </div>

        <!-- Statistik Kehadiran Pengajar -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-warning text-white">Kehadiran Pengajar (On-Time vs Terlambat)</div>
                <div class="card-body">
                    <div id="kehadiranPengajarChart" style="height: 500px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
// Jadwal Mapel per Hari
Highcharts.chart('jadwalMapelChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Jadwal Mapel per Hari'
    },
    xAxis: {
        categories: [
            @foreach ($jadwalMapelPerHari as $item)
                '{{ $item->hari_les }}',
            @endforeach
        ],
        title: { text: 'Hari' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Mapel' }
    },
    series: [{
        name: 'Jumlah',
        data: [
            @foreach ($jadwalMapelPerHari as $item)
                {{ $item->jumlah }},
            @endforeach
        ]
    }]
});

// Jenis Kelamin Siswa
Highcharts.chart('genderSiswaChart', {
    chart: { type: 'pie' },
    title: { text: 'Jenis Kelamin Siswa' },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Laki-laki',
            y: {{ $jumlahLaki }}
        }, {
            name: 'Perempuan',
            y: {{ $jumlahPerempuan }}
        }]
    }]
});

// Jenis Kelamin Pengajar
Highcharts.chart('genderPengajarChart', {
    chart: { type: 'pie' },
    title: { text: 'Jenis Kelamin Pengajar' },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Laki-laki',
            y: {{ $jumlahPengajarLaki }}
        }, {
            name: 'Perempuan',
            y: {{ $jumlahPengajarPerempuan }}
        }]
    }]
});

// Statistik Kehadiran Pengajar
Highcharts.chart('kehadiranPengajarChart', {
    chart: { type: 'bar' },
    title: { text: 'Kehadiran Pengajar' },
    xAxis: {
        categories: [
            @foreach ($statistikKehadiranPengajar as $item)
                '{{ $item->nama }}',
            @endforeach
        ],
        title: { text: 'Pengajar' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Kehadiran' }
    },
    series: [{
        name: 'On-Time',
        data: [
            @foreach ($statistikKehadiranPengajar as $item)
                {{ $item->on_time }},
            @endforeach
        ]
    }, {
        name: 'Terlambat',
        data: [
            @foreach ($statistikKehadiranPengajar as $item)
                {{ $item->terlambat }},
            @endforeach
        ]
    }]
});
</script>
@endsection
