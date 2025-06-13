@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container mt-4">
    <div class="row">
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="nama_siswa" class="form-control" placeholder="Cari nama siswa..." value="{{ request('nama_siswa') }}">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </div>
    </form>

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

@if(isset($statistikKehadiranSiswa))
<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">Kehadiran Siswa: {{ $namaSiswa }}</div>
        <div class="card-body">
            <div id="kehadiranSiswaChart" style="height: 400px;"></div>
            <p class="mt-3">Persentase Kehadiran: <strong>{{ $persentaseKehadiran }}%</strong></p>
        </div>
    </div>
</div>
@endif

    </div>
</div>

<script>
@if(isset($statistikKehadiranSiswa))
Highcharts.chart('kehadiranSiswaChart', {
    chart: { type: 'column' },
    title: { text: 'Kehadiran Siswa: {{ $namaSiswa }}' },
    xAxis: {
        categories: ['Hadir', 'Izin', 'Sakit', 'Alpa'],
        title: { text: 'Status Kehadiran' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Hari' }
    },
    series: [{
        name: 'Jumlah',
        data: [
            {{ $statistikKehadiranSiswa['Hadir'] ?? 0 }},
            {{ $statistikKehadiranSiswa['Izin'] ?? 0 }},
            {{ $statistikKehadiranSiswa['Sakit'] ?? 0 }},
            {{ $statistikKehadiranSiswa['Alpa'] ?? 0 }}
        ]
    }]
});
@endif

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
