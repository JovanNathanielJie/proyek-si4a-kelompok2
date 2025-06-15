@extends('layout.main')

@section('title', 'Info Bimbel Alwi College')

@section('content')

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to bottom right, #fdfbfb, #ebedee);
  }
  .card {
    border-radius: 1rem;
  }
</style>


<h2 class="text-center fw-bold text-primary mb-5" style="font-size: 2rem;">Visi & Misi Bimbel Alwi College</h2>

<div class="row g-4">
  <!-- Visi -->
  <div class="col-md-6">
    <div class="card shadow-sm border-0" style="background-color: #E3F2FD;">
      <div class="card-header bg-transparent border-0">
        <h5 class="fw-semibold text-primary mb-1">Visi</h5>
        <hr class="mb-0 mt-2" style="width: 50px; border-top: 3px solid #2196F3;">
      </div>
      <div class="card-body pt-2">
        <p class="text-muted mb-0"><b>Menjadi bimbingan belajar terbaik dalam membentuk generasi unggul, berakhlak mulia, dan siap menghadapi tantangan global.</b></p>
      </div>
    </div>
  </div>

  <!-- Misi -->
  <div class="col-md-6">
    <div class="card shadow-sm border-0" style="background-color: #FFF3E0;">
      <div class="card-header bg-transparent border-0">
        <h5 class="fw-semibold text-warning mb-1">Misi</h5>
        <hr class="mb-0 mt-2" style="width: 50px; border-top: 3px solid #FFA000;">
      </div>
      <div class="card-body pt-2">
        <ul class="list-unstyled text-muted fw-semibold mb-0">
          <li>📘 Pengajaran berkualitas dengan pendekatan personal.</li>
          <li>💡 Pengembangan karakter & soft skill siswa.</li>
          <li>💻 Pembelajaran berbasis teknologi modern.</li>
          <li>🤝 Komunikasi erat antara guru, siswa, & orang tua.</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Keunggulan -->
<h2 class="text-center fw-bold text-primary mt-5 mb-4" style="font-size: 2rem;">Keunggulan Kami</h2>
<div class="card shadow-sm border-0" style="background-color: #E8F5E9;">
  <div class="card-body">
    <ul class="list-unstyled text-muted fw-semibold mb-0">
      <li>✅ Pengajar profesional & berpengalaman.</li>
      <li>✅ Kurikulum fleksibel & sesuai kebutuhan siswa.</li>
      <li>✅ Kelas kecil (max 15 siswa) untuk fokus belajar.</li>
      <li>✅ Pembelajaran <i>online & offline</i>.</li>
      <li>✅ Evaluasi rutin & tryout berkala.</li>
      <li>✅ Materi tambahan: <i>Life Skill & Character Building</i>.</li>
      <li>✅ Beasiswa untuk siswa berprestasi / kurang mampu.</li>
      <li>✅ Alumni diterima di kampus top dan instansi ternama.</li>
    </ul>
  </div>
</div>

<!-- Alumni -->
<h2 class="text-center fw-bold text-primary mt-5 mb-4" style="font-size: 2rem;">Alumni Sukses</h2>
<div class="row g-4">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow border-0">
      <img src="foto/Alumni 1.jpg" class="card-img-top rounded-top-3" alt="Ahmad Rafi">
      <div class="card-body text-center">
        <h5 class="fw-semibold">Ahmad Rafi</h5>
        <p class="text-muted">Mahasiswa UI - Fakultas Teknik<br>Lulusan 2021</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow border-0">
      <img src="foto/Alumni 3.png" class="card-img-top rounded-top-3" alt="Maria Ulfa">
      <div class="card-body text-center">
        <h5 class="fw-semibold">Maria Ulfa</h5>
        <p class="text-muted">Dokter Muda - FK Unpad<br>Lulusan 2020</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow border-0">
      <img src="foto/Alumni 2.jpg" class="card-img-top rounded-top-3" alt="Raka Aditya">
      <div class="card-body text-center">
        <h5 class="fw-semibold">Raka Aditya</h5>
        <p class="text-muted">Software Engineer - Tokopedia<br>Lulusan 2019</p>
      </div>
    </div>
  </div>
</div>

<!-- Testimoni -->
<h2 class="text-center fw-bold text-primary mt-5 mb-3" style="font-size: 2rem;">Testimoni Alumni</h2>
<div class="text-center mb-5">
  <p class="text-muted">Dengarkan kisah inspiratif mereka dalam meraih mimpi bersama Alwi College.</p>
  <div class="ratio ratio-16x9">
    <iframe class="rounded-3 shadow-sm" src="https://www.youtube.com/embed/ARmY4yQQPxg" title="Testimoni Alumni" allowfullscreen></iframe>
  </div>
</div>

<div class="card shadow-lg border-0 mt-4" style="background-color: #E3F2FD; border-radius: 1rem;">
  <div class="card-header bg-transparent border-0 text-center">
    <h4 class="fw-bold text-primary">Lokasi Bimbel Alwi College</h4>
    <hr class="mx-auto" style="width: 60px; border-top: 3px solid #2196F3;">
  </div>
  <div class="card-body text-center">
    <div class="ratio ratio-16x9">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.432911516537!2d104.7560369967896!3d-2.977277199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b771325da6ff5%3A0x54c125e330c42095!2sALWI%20COLLEGE%20SMA!5e0!3m2!1sid!2sid!4v1749799379180!5m2!1sid!2sid"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
    <p class="mt-3 text-muted">
      <strong>Alamat:</strong> Gg. Sablan, Kepandean Baru, Kec. Ilir Tim. I, Kota Palembang, Sumatera Selatan 30111
    </p>
    <p class="text-muted">
      <strong>Telp:</strong> 0711 ‒ 12345678 | <strong>Email:</strong> info@alwicollege.sch.id
    </p>
  </div>
</div>

@endsection
