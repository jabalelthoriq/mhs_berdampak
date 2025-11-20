<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desa TamanKursi - Explore Nature</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


  <style>
    body {
      background-color: #0a0a0a;
      color: #f1f1f1;
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
      overflow-x: hidden;
    }

    /* ===== NAVBAR ===== */
    nav.navbar {
      background: transparent;
      transition: all 0.4s ease;
      z-index: 1000;
    }
    nav.navbar.scrolled {
      background: rgba(10, 10, 10, 0.95);
      box-shadow: 0 2px 10px rgba(255,255,255,0.05);
    }
    nav.navbar .nav-link {
      color: #fff !important;
      font-weight: 500;
    }
    nav.navbar .nav-link:hover {
      color: #00b4d8 !important;
    }
    .navbar-brand {
      color: #fff !important;
      font-weight: 700;
    }

    /* ===== HERO CAROUSEL ===== */
    .hero-carousel {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }
    .hero-carousel .carousel-item {
      height: 100vh;
      position: relative;
    }
    .hero-carousel .carousel-item .parallax-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 110%;
      background-size: cover;
      background-position: center;
      transition: transform 0.2s linear;
      will-change: transform;
      z-index: 0;
    }

    .hero-carousel .carousel-item::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
      z-index: 1;
    }

    .hero-carousel::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 200px;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, #0a0a0a 100%);
      z-index: 3;
    }

    .hero-caption {
      position: relative;
      z-index: 2;
      top: 50%;
      transform: translateY(-50%);
      text-align: center;
      color: #fff;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .carousel-item.active .hero-caption {
      opacity: 1;
    }

    .hero-caption h1 {
      font-size: 3rem;
      font-weight: 700;
      animation: fadeDown 1.2s ease forwards;
    }

    .hero-caption p {
      animation: fadeUp 1.4s ease forwards;
    }

    @keyframes fadeDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }


    /* ===== SECTION ===== */
    .section-dark {
      background-color: #000;
      padding: 100px 0;
    }
    .card-dark {
      background-color: #1a1a1a;
      color: #fff;
      border: none;
      transition: transform 0.4s;
    }
    .card-dark:hover {
      transform: scale(1.03);
      box-shadow: 0 0 15px rgba(0,180,216,0.3);
    }

    /* ===== CTA ===== */
    .cta {
      background: url('{{ asset('image/hero3.jpg') }}') center/cover no-repeat fixed;
      position: relative;
      text-align: center;
      padding: 120px 20px;
      color: #fff;
      overflow: hidden;
    }
    .cta::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.6);
    }
    .cta .content {
      position: relative;
      z-index: 2;
    }

    /* ===== FOOTER ===== */
    footer {
      background: #000;
      padding: 30px 0;
      text-align: center;
      color: #aaa;
      font-size: 0.9rem;
    }
    footer a {
      color: #fff;
      margin: 0 8px;
      font-size: 1.2rem;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .hero-caption h1 { font-size: 2rem; }
      .carousel-control-prev-icon, .carousel-control-next-icon {
        width: 2.2rem;
        height: 2.2rem;
      }
    }

    /* ===== Statistik Card Styling ===== */
.stat-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  box-shadow: 0 0 25px rgba(0, 180, 216, 0.08);
  transition: all 0.3s ease;
}
.stat-card:hover {
  background: rgba(0, 180, 216, 0.12);
  box-shadow: 0 0 35px rgba(0, 180, 216, 0.4);
  transform: translateY(-5px);
}

/* Icon lingkaran kecil di kiri setiap card */
.icon-circle {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0, 180, 216, 0.15);
  color: #00b4d8;
  font-size: 1.6rem;
  box-shadow: 0 0 12px rgba(0,180,216,0.2);
  transition: all 0.3s ease;
}
.stat-card:hover .icon-circle {
  background: rgba(0, 180, 216, 0.3);
  transform: scale(1.1);
}
/* === Efek Glow di Belakang Gambar Tengah === */
.glow-ring {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 450px;
  height: 450px;
  transform: translate(-50%, -50%);
  background: radial-gradient(circle, rgba(0,180,80,0.35) 0%, rgba(255,215,0,0.1) 40%, transparent 70%);
  filter: blur(50px);
  z-index: 0;
  animation: glowPulse 4s ease-in-out infinite;
}
@keyframes glowPulse {
  0%, 100% { opacity: 0.7; transform: translate(-50%, -50%) scale(1); }
  50% { opacity: 1; transform: translate(-50%, -50%) scale(1.05); }
}

/* === Gambar Tengah === */
.tembakau-center-img {
  position: relative;
  width: 380px;
  height: auto;
  border-radius: 10px;
  z-index: 2;
  transition: all 0.4s ease;
  margin-bottom: 30px; /* memberi jarak bawah gambar */
}
.tembakau-center-img:hover {
  transform: scale(1.05);
  box-shadow: 0 0 40px rgba(255,215,0,0.3);
}

/* === Spacing antar deskripsi agar lebih longgar === */
#tembakau .col-lg-4 > div {
  margin-bottom: 35px; /* tambahkan jarak antar box */
}
#tembakau .col-lg-4 > div:last-child {
  margin-bottom: 0; /* hindari jarak ekstra di akhir */
}

/* === Penyesuaian teks agar seimbang di kiri kanan === */
#tembakau h5 {
  font-size: 1.05rem;
  line-height: 1.4;
}
#tembakau p {
  font-size: 0.92rem;
  line-height: 1.6;
  max-width: 95%;
}

/* === Responsif untuk layar kecil === */
@media (max-width: 992px) {
  .tembakau-center-img { width: 280px; margin-bottom: 20px; }
  #tembakau .col-lg-4 > div { margin-bottom: 25px; }
}



/* ===== SECTION LOKASI (EFEK PARALLAX SINKRON DENGAN HERO) ===== */
#lokasi {
  position: relative;
  overflow: hidden;
  padding: 150px 0;
  color: #fff;
  z-index: 1;
}

/* === Background Parallax === */
.lokasi-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 130%; /* lebih tinggi sedikit agar tidak ada celah saat bergeser */
  background: url('{{ asset('image/padi.jpg') }}') center / cover no-repeat;
  z-index: 0;
  filter: brightness(0.9);
  transform: translateY(0);
  transition: transform 0.2s linear;
  will-change: transform;
}

/* === Lapisan gelap seperti kontak === */
.lokasi-bg::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.55);
  z-index: 1;
}

/* === Kontainer konten === */
#lokasi .container {
  position: relative;
  z-index: 2;
}

/* === Hapus overlay lama === */
.lokasi-overlay {
  display: none !important;
  visibility: hidden;
  pointer-events: none;
}


/* === Isi konten lokasi === */
.lokasi-content {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 40px;
}

/* Aktivitas (kiri) */
.aktivitas-group {
  flex: 1 1 48%;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.aktivitas-card {
  display: flex;
  align-items: center;
  gap: 15px;
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.15);
  padding: 18px 20px;
  border-radius: 16px;
  backdrop-filter: blur(4px);
  transition: all 0.4s ease;
}
.aktivitas-card:hover {
  background: rgba(0,180,216,0.25);
  transform: translateY(-4px);
  box-shadow: 0 0 20px rgba(0,180,216,0.35);
}

.aktivitas-card .icon-circle {
  width: 55px;
  height: 55px;
  background: rgba(0,180,216,0.2);
  color: #00b4d8;
  font-size: 1.7rem;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
}

/* Peta (kanan) */
.map-wrapper {
  flex: 1 1 48%;
  border-radius: 18px;
  overflow: hidden;
  border: 2px solid rgba(0,180,216,0.3);
  box-shadow: 0 0 25px rgba(0,180,216,0.25);
}
.map-wrapper iframe {
  width: 100%;
  height: 420px;
  border: none;
  filter: brightness(1.05) contrast(1.1);
}

/* === Responsif === */
@media (max-width: 992px) {
  .lokasi-content {
    flex-direction: column;
    align-items: center;
  }
  .map-wrapper {
    width: 100%;
  }
  .map-wrapper iframe {
    height: 320px;
  }
}

/* === POTENSI (FIX: tidak menumpuk + tombol selalu terlihat) === */
.potensi-slider{
  position: relative;
  overflow: hidden;
  padding-bottom: 96px;          /* ruang untuk tombol */
}
@media (min-width: 992px){ .potensi-slider{ min-height: 560px; } }
@media (max-width: 991.98px){ .potensi-slider{ min-height: 760px; padding-bottom: 110px; } }

/* hanya slide .active yang benar2 terlihat */
.potensi-item{
  position: absolute;
  inset: 0;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  transform: translateX(100%);
  transition: transform .7s ease, opacity .5s ease, visibility .5s ease;
}
.potensi-item.active{
  position: relative;            /* biar tinggi container mengikuti konten aktif */
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
  transform: translateX(0);
}
.potensi-item.slide-out-left{
  transform: translateX(-20%);
  opacity: 0;
}

/* gambar tengah diperkecil & seragam */
.tembakau-center-img{ width: 300px; height: auto; margin-bottom: 12px; }
.glow-ring{ width: 340px; height: 340px; filter: blur(45px); }
@media (max-width: 992px){
  .tembakau-center-img{ width: 240px; }
  .glow-ring{ width: 280px; height: 280px; }
}

/* tombol konsisten di sudut bawah */
#nextPotensiBtn{ position: absolute; bottom: 48px; z-index: 5; }
.potensi-btn-right{ right: 28px; left: auto; }
.potensi-btn-left{  left: 28px;  right: auto; }

@media (max-width: 768px){
  #nextPotensiBtn{
    bottom: 36px; /* biar pas di HP */
  }
}


  </style>
</head>

<body>

  <!-- ===== NAVBAR ===== -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">🌾 Desa TamanKursi</a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#potensi">Potensi</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
          

        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== HERO SLIDER ===== -->
  <div id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="parallax-bg" style="background-image: url('{{ asset('image/hero1.jpg') }}');"></div>
        <div class="hero-caption">
          <h1>VISIT <span>DESA TAMANKURSI</span></h1>
          <p class="lead mt-3">Nikmati keindahan alam dan budaya yang menenangkan jiwa</p>
          <a href="#about" class="btn btn-outline-light rounded-pill px-4 mt-3">Tentang Desa</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="parallax-bg" style="background-image: url('{{ asset('image/hero2.jpg') }}');"></div>
        <div class="hero-caption">
          <h1>EXPLORE <span>KEINDAHAN</span></h1>
          <p class="lead mt-3">Desa dengan panorama yang menenangkan hati</p>
          <a href="#potensi" class="btn btn-outline-light rounded-pill px-4 mt-3">Lihat potensi</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="parallax-bg" style="background-image: url('{{ asset('image/hero3.jpg') }}');"></div>
        <div class="hero-caption">
          <h1>NIKMATI <span>BUDAYA LOKAL</span></h1>
          <p class="lead mt-3">Warisan tradisi yang masih hidup hingga kini</p>
          <a href="#kontak" class="btn btn-outline-light rounded-pill px-4 mt-3">Hubungi Kami</a>
        </div>
      </div>
    </div>

    <!-- Arrows -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Berikutnya</span>
    </button>
  </div>

  <!-- ======= ABOUT ======= -->
<section id="about" class="section-dark">
  <div class="container" data-aos="fade-up">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white">Tentang Desa TamanKursi</h2>
      <p class="mb-4 text-light opacity-75">Desa TamanKursi - surga tersembunyi di kaki pegunungan dengan alam yang asri dan masyarakat yang ramah.</p>
    </div>

    <div class="row align-items-center g-5">
      <!-- Video YouTube -->
      <div class="col-lg-6" data-aos="fade-right">
        <div class="ratio ratio-16x9 shadow-lg rounded-4 overflow-hidden" style="border: 2px solid rgba(0,180,216,0.3);">
          <iframe
            src="https://www.youtube.com/embed/jfKfPfyJRdk?autoplay=0&mute=1&rel=0"
            title="Video Profil Desa TamanKursi"
            allowfullscreen
            style="border:0;">
          </iframe>
        </div>
      </div>

      <!-- Statistik -->
      <div class="col-lg-6 text-start" data-aos="fade-left">
        <p class="mb-4 text-light opacity-75">
          Desa TamanKursi memiliki keindahan alam yang memikat, dikelilingi oleh pegunungan hijau dan sungai jernih.
          Kehidupan masyarakatnya berpadu antara kearifan lokal dan inovasi modern.
        </p>

      <div class="d-flex flex-column gap-3">
  <div class="stat-card p-4 rounded-4 d-flex align-items-center" data-aos="fade-up" data-aos-delay="0">
    <div class="icon-circle me-3">
      <i class="bi bi-people-fill"></i>
    </div>
    <div>
      <h4 class="fw-bold mb-1 text-white">{{ $totalMasyarakat }} orang</h4>
      <p class="mb-0 text-secondary">Total Penduduk</p>
    </div>
  </div>

  <div class="stat-card p-4 rounded-4 d-flex align-items-center" data-aos="fade-up" data-aos-delay="150">
    <div class="icon-circle me-3">
      <i class="bi bi-aspect-ratio"></i>
    </div>
    <div>
      <h4 class="fw-bold mb-1 text-white">14.5 km²</h4>
      <p class="mb-0 text-secondary">Luas Wilayah</p>
    </div>
  </div>

  <div class="stat-card p-4 rounded-4 d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
    <div class="icon-circle me-3">
      <i class="bi bi-house-door-fill"></i>
    </div>
    <div>
      <h4 class="fw-bold mb-1 text-white">7 dusun</h4>
      <p class="mb-0 text-secondary">Jumlah Dusun</p>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
</section>


<section id="lokasi" class="position-relative">
  <div class="lokasi-bg"></div>
  <div class="lokasi-overlay"></div>

  <div class="container" data-aos="fade-up">
    <h2 class="fw-bold text-center mb-5">Aktivitas dan Lokasi Desa TamanKursi</h2>

    <div class="lokasi-content">
      <!-- Kolom Kiri: Aktivitas -->
      <div class="aktivitas-group" >
        <div class="aktivitas-card" data-aos="fade-right" data-aos-delay="0">
          <div class="icon-circle"><i class="bi bi-tree-fill"></i></div>
          <div>
            <h5>Pertanian Tembakau</h5>
            <p>Petani mengelola ladang tembakau dengan teknik tradisional ramah lingkungan.</p>
          </div>
        </div>

        <div class="aktivitas-card" data-aos="fade-right" data-aos-delay="150">
          <div class="icon-circle"><i class="bi bi-people-fill"></i></div>
          <div>
            <h5>Kegiatan Gotong Royong</h5>
            <p>Warga rutin bekerja sama menjaga kebersihan dan memperbaiki fasilitas umum.</p>
          </div>
        </div>

        <div class="aktivitas-card" data-aos="fade-right" data-aos-delay="300">
          <div class="icon-circle"><i class="bi bi-flower3"></i></div>
          <div>
            <h5>Kerajinan Lokal</h5>
            <p>Masyarakat menghasilkan kerajinan anyaman dan olahan hasil bumi khas desa.</p>
          </div>
        </div>
      </div>

      <!-- Kolom Kanan: Peta -->
      <div class="map-wrapper" data-aos="zoom-in" data-aos-delay="200">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63228.46045607635!2d113.58045723646963!3d-7.918161695305611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6e5dcee028df5%3A0xd2d789ec1aab3a00!2sTamankursi%2C%20Kec.%20Sumbermalang%2C%20Kabupaten%20Situbondo%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1759665992767!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- ===== POTENSI (Tembakau, Jagung, dan Padi) ===== -->
<section id="potensi" class="section-dark" style="position: relative; overflow: hidden;">
  <div class="container text-center position-relative" data-aos="fade-up">
    <h2 class="fw-bold mb-5 text-white">Potensi Utama Desa TamanKursi</h2>

    <div class="potensi-slider position-relative" style="min-height: 600px;">

      <!-- === TEMBAKAU === -->
      <div class="potensi-item active" id="potensi-tembakau">
        <div class="row align-items-center justify-content-center g-4">
          <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
            <div><h5 class="fw-bold text-info"><i class="bi bi-sun me-2"></i>Iklim Pegunungan yang Ideal</h5><p class="small opacity-75">Suhu sejuk dan kelembapan stabil membuat daun tembakau tumbuh sempurna dengan aroma khas.</p></div>
            <div><h5 class="fw-bold text-info"><i class="bi bi-brightness-high me-2"></i>Pencahayaan Matahari Merata</h5><p class="small opacity-75">Paparan sinar matahari optimal membantu menghasilkan warna dan kadar nikotin seimbang.</p></div>
            <div><h5 class="fw-bold text-info"><i class="bi bi-tree me-2"></i>Tanah Subur dan Kaya Mineral</h5><p class="small opacity-75">Struktur tanah gembur dengan kandungan mineral alami memberi cita rasa tembakau yang lembut.</p></div>
          </div>

          <div class="col-lg-4 col-md-8 text-center position-relative">
            <img src="{{ asset('image/tembakau.png') }}" alt="Tembakau" class="tembakau-center-img shadow-lg mx-auto">
            <div class="glow-ring"></div>
          </div>

          <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
            <div><h5 class="fw-bold text-info"><i class="bi bi-flower3 me-2"></i>Budidaya Tradisional Ramah Lingkungan</h5><p class="small opacity-75">Petani menjaga warisan teknik tanam alami dengan pupuk organik dan sistem rotasi tanaman.</p></div>
            <div><h5 class="fw-bold text-info"><i class="bi bi-droplet-half me-2"></i>Proses Pemanenan Teliti</h5><p class="small opacity-75">Panen dilakukan dengan seleksi daun matang dan pengeringan alami untuk hasil tembakau premium.</p></div>
            <div><h5 class="fw-bold text-info"><i class="bi bi-people me-2"></i>Dukungan Komunitas Petani</h5><p class="small opacity-75">Kelompok tani bekerja sama meningkatkan mutu, efisiensi produksi, dan pemasaran hingga luar daerah.</p></div>
          </div>
        </div>
      </div>

      <!-- === JAGUNG === -->
      <div class="potensi-item" id="potensi-jagung">
        <div class="row align-items-center justify-content-center g-4">
          <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
            <div><h5 class="fw-bold text-warning"><i class="bi bi-sunrise me-2"></i>Lahan Subur & Berlimpah</h5><p class="small opacity-75">Tanah vulkanik kaya nutrisi membuat jagung tumbuh besar dan sehat.</p></div>
            <div><h5 class="fw-bold text-warning"><i class="bi bi-droplet-half me-2"></i>Irigasi Alam Pegunungan</h5><p class="small opacity-75">Air pegunungan jernih menjaga kelembapan lahan dan meningkatkan hasil panen.</p></div>
            <div><h5 class="fw-bold text-warning"><i class="bi bi-box-seam me-2"></i>Produk Olahan Jagung</h5><p class="small opacity-75">Jagung diolah menjadi pakan ternak dan makanan ringan khas desa.</p></div>
          </div>

          <div class="col-lg-4 col-md-8 text-center position-relative">
            <img src="{{ asset('image/jagung.png') }}" alt="Jagung" class="tembakau-center-img shadow-lg mx-auto">
            <div class="glow-ring" style="background: radial-gradient(circle, rgba(255,215,0,0.35) 0%, rgba(255,255,0,0.1) 40%, transparent 70%);"></div>
          </div>

          <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
            <div><h5 class="fw-bold text-warning"><i class="bi bi-recycle me-2"></i>Teknik Ramah Lingkungan</h5><p class="small opacity-75">Petani menerapkan sistem tanam bergilir menjaga kesuburan tanah.</p></div>
            <div><h5 class="fw-bold text-warning"><i class="bi bi-basket2-fill me-2"></i>Panen Melimpah</h5><p class="small opacity-75">Hasil panen jagung berkualitas tinggi untuk pasar lokal dan regional.</p></div>
            <div><h5 class="fw-bold text-warning"><i class="bi bi-people-fill me-2"></i>Kelompok Petani Jagung</h5><p class="small opacity-75">Komunitas petani berkolaborasi meningkatkan produksi dan inovasi.</p></div>
          </div>
        </div>
      </div>

      <!-- === PADI === -->
      <div class="potensi-item" id="potensi-padi">
        <div class="row align-items-center justify-content-center g-4">
          <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
            <div><h5 class="fw-bold text-success"><i class="bi bi-cloud-sun-fill me-2"></i>Iklim Sejuk dan Kelembapan Ideal</h5><p class="small opacity-75">Padi tumbuh subur di daerah dengan curah hujan merata dan suhu stabil.</p></div>
            <div><h5 class="fw-bold text-success"><i class="bi bi-water me-2"></i>Sistem Irigasi Tradisional</h5><p class="small opacity-75">Sawah memanfaatkan aliran air alami dari pegunungan, menjaga kesuburan tanah.</p></div>
            <div><h5 class="fw-bold text-success"><i class="bi bi-seedling me-2"></i>Varietas Unggul Lokal</h5><p class="small opacity-75">Petani menanam padi lokal dengan cita rasa khas dan hasil panen melimpah.</p></div>
          </div>

          <div class="col-lg-4 col-md-8 text-center position-relative">
            <img src="{{ asset('image/padi2.png') }}" alt="Padi" class="tembakau-center-img shadow-lg mx-auto">
            <div class="glow-ring" style="background: radial-gradient(circle, rgba(0,255,0,0.25) 0%, rgba(0,255,0,0.1) 40%, transparent 70%);"></div>
          </div>

          <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
            <div><h5 class="fw-bold text-success"><i class="bi bi-basket-fill me-2"></i>Panen Berkualitas Tinggi</h5><p class="small opacity-75">Hasil panen padi dikenal berkualitas, dengan bulir padat dan warna cerah.</p></div>
            <div><h5 class="fw-bold text-success"><i class="bi bi-box2-heart me-2"></i>Produk Olahan Padi</h5><p class="small opacity-75">Diolah menjadi beras dan produk turunan seperti emping dan tepung beras.</p></div>
            <div><h5 class="fw-bold text-success"><i class="bi bi-people-fill me-2"></i>Dukungan Komunitas Petani</h5><p class="small opacity-75">Petani padi bekerja sama menjaga tradisi menanam dan panen bersama.</p></div>
          </div>
        </div>
      </div>
    </div>

    <!-- === Tombol Navigasi === -->
    <button id="nextPotensiBtn" class="btn btn-outline-info rounded-pill px-4 mt-5 position-absolute potensi-btn-right">
      Next <i class="bi bi-arrow-right-circle ms-2"></i>
    </button>
  </div>
</section>







  <!-- ===== CTA ===== -->
  <section class="cta" id="kontak">
  <div class="content" data-aos="zoom-in">
    <h2>TRAVEL AND ENJOY YOUR HOLIDAY</h2>
    <p class="lead">Choose your next adventure in Desa TamanKursi</p>
    <a id="contactButton"
       href="#"
       class="btn btn-outline-light rounded-pill px-4 mt-3 d-inline-flex align-items-center gap-2">
       <i class="bi bi-envelope-fill" style="font-size: 1.2rem; color: #e70303;"></i>
       Hubungi Kami
    </a>
  </div>
</section>

  <!-- ===== FOOTER ===== -->
  <footer>
    <p>© 2025 Desa TamanKursi — All Rights Reserved</p>
  </footer>
<!-- ===== SCRIPT ===== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>


  // === Inisialisasi AOS ===
  AOS.init({
    duration: 900,
    once: false,
    mirror: true,
    offset: 100
  });

  // === Navbar Scroll ===
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');
  });

// === Efek Parallax Lembut untuk Hero & Lokasi ===
window.addEventListener('scroll', () => {
  const scrolled = window.scrollY;

  // === Hero (seluruh layar) ===
  document.querySelectorAll('.parallax-bg').forEach(bg => {
    bg.style.transform = `translateY(${scrolled * 0.3}px)`; // 0.3 = lembut
  });

  // === Lokasi (gerak relatif di dalam section) ===
  const lokasi = document.querySelector('#lokasi');
  const lokasiBg = document.querySelector('.lokasi-bg');
  if (lokasi && lokasiBg) {
    const rect = lokasi.getBoundingClientRect();
    const sectionTop = rect.top + window.scrollY;           // posisi awal section
    const relativeScroll = window.scrollY - sectionTop;     // seberapa jauh scroll di section lokasi

    // Gerakan sama seperti hero → translateY(scrolled * 0.3)
    // tapi dihitung relatif supaya tidak loncat
    lokasiBg.style.transform = `translateY(${relativeScroll * 0.3}px)`;
  }
});


  // === Carousel Auto Slide ===
  document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('heroCarousel');
    if (el && window.bootstrap?.Carousel) {
      new bootstrap.Carousel(el, {
        interval: 3000,
        ride: 'carousel',
        pause: false,
        wrap: true
      });
    }
  });

  // === Refresh AOS saat klik navbar ===
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      setTimeout(() => {
        AOS.refreshHard();
      }, 800);
    });
  });

  // === Refresh AOS saat carousel berganti slide ===
  const heroCarousel = document.getElementById('heroCarousel');
  if (heroCarousel) {
    heroCarousel.addEventListener('slid.bs.carousel', () => {
      AOS.refresh();
    });
  }

  // === Refresh animasi saat scroll ke atas ===
  let lastScroll = 0;
  window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
    if (currentScroll < lastScroll && currentScroll < 300) {
      AOS.refreshHard();
    }
    lastScroll = currentScroll;
  });

  // === COUNTER ANIMASI ANGKA DENGAN SATUAN ===
  const counters = document.querySelectorAll('.stat-card h4');
  const options = { threshold: 0.6 };

  const animateCounter = (entry) => {
    const el = entry.target;
    const target = parseFloat(el.getAttribute('data-target'));
    const unit = el.getAttribute('data-unit') || "";
    if (!target) return;

    let start = 0;
    const duration = 1800;
    const stepTime = Math.max(Math.floor(duration / target), 20);

    const counterTimer = setInterval(() => {
      start += target / (duration / stepTime);
      if (start >= target) {
        start = target;
        clearInterval(counterTimer);
      }

      let display;
      // Format angka dengan koma atau titik sesuai satuan
      if (Number.isInteger(target)) {
        display = Math.floor(start).toLocaleString();
      } else {
        display = start.toFixed(1);
      }

      el.textContent = `${display} ${unit}`;
    }, stepTime);
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry);
      }
    });
  }, options);

  counters.forEach(counter => {
    const val = counter.innerText.replace(/[^\d.]/g, '');
    const unit = counter.innerText.replace(/[\d.,\s]/g, '');
    counter.setAttribute('data-target', val);
    counter.setAttribute('data-unit', unit.trim());
    counter.innerText = `0 ${unit}`;
    observer.observe(counter);
  });


   // === Tombol Hubungi Kami dengan fallback Gmail/mailto ===
  document.getElementById("contactButton").addEventListener("click", function (e) {
    e.preventDefault();

    const email = "j.elthoriq@gmail.com";
    const subject = "Pertanyaan tentang Desa TamanKursi";
    const body = "Halo Admin Desa TamanKursi,%0A%0ASaya ingin bertanya mengenai destinasi dan aktivitas di desa.%0A%0ATerima kasih.";

    // URL Gmail Compose
    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${encodeURIComponent(subject)}&body=${body}`;
    // URL mailto fallback
    const mailtoUrl = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${body}`;

    // Deteksi apakah kemungkinan besar user pakai Gmail/Chrome
    const isGmailUser = /gmail|chrome|android/i.test(navigator.userAgent);

    // Buka Gmail kalau bisa, fallback ke mailto jika tidak
    if (isGmailUser) {
      window.open(gmailUrl, "_blank");
    } else {
      window.location.href = mailtoUrl;
    }
  });

 /* === SLIDE POTENSI (3 Slide: Tembakau → Jagung → Padi → balik lagi) === */
const nextBtn = document.getElementById('nextPotensiBtn');
const slides = [
  document.getElementById('potensi-tembakau'),
  document.getElementById('potensi-jagung'),
  document.getElementById('potensi-padi')
];

let idx = 0;               // posisi awal = tembakau
let forward = true;        // arah awal = maju (Next)

function setActive(n) {
  slides.forEach((s, i) => {
    if (i === n) {
      s.classList.add('active');
      s.classList.remove('slide-out-left');
    } else {
      s.classList.remove('active', 'slide-out-left');
    }
  });
}

nextBtn.addEventListener('click', () => {
  const out = slides[idx];
  out.classList.add('slide-out-left');

  // Hitung slide selanjutnya berdasarkan arah
  if (forward) {
    idx++;
    if (idx >= slides.length - 1) {
      forward = false;
      nextBtn.innerHTML = '<i class="bi bi-arrow-left-circle me-2"></i> Prev';
      nextBtn.classList.remove('potensi-btn-right');
      nextBtn.classList.add('potensi-btn-left');
    } else {
      nextBtn.innerHTML = 'Next <i class="bi bi-arrow-right-circle ms-2"></i>';
      nextBtn.classList.remove('potensi-btn-left');
      nextBtn.classList.add('potensi-btn-right');
    }
  } else {
    idx--;
    if (idx <= 0) {
      forward = true;
      nextBtn.innerHTML = 'Next <i class="bi bi-arrow-right-circle ms-2"></i>';
      nextBtn.classList.remove('potensi-btn-left');
      nextBtn.classList.add('potensi-btn-right');
    } else {
      nextBtn.innerHTML = '<i class="bi bi-arrow-left-circle me-2"></i> Prev';
      nextBtn.classList.remove('potensi-btn-right');
      nextBtn.classList.add('potensi-btn-left');
    }
  }


  setTimeout(() => {
    setActive(idx);
  }, 500);
});



</script>


</body>
</html>
