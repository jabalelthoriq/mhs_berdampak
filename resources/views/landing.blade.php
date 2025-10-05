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
          <li class="nav-item"><a class="nav-link" href="#destinasi">Destinasi</a></li>
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
          <a href="#destinasi" class="btn btn-outline-light rounded-pill px-4 mt-3">Lihat Destinasi</a>
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
<!-- ===== POTENSI TEMBAKAU (Revisi Gambar Tengah) ===== -->
<section id="tembakau" class="section-dark" style="position: relative; overflow: hidden;">
  <div class="container text-center" data-aos="fade-up">
    <h2 class="fw-bold mb-5 text-white">Kualitas Tembakau Desa TamanKursi</h2>

    <div class="row align-items-center justify-content-center position-relative g-4">

      <!-- Deskripsi Kiri -->
      <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
        <div data-aos="fade-right">
          <h5 class="fw-bold text-info"><i class="bi bi-sun me-2"></i>Iklim Pegunungan yang Ideal</h5>
          <p class="small opacity-75">Suhu sejuk dan kelembapan stabil membuat daun tembakau tumbuh sempurna dengan aroma khas.</p>
        </div>

        <div data-aos="fade-right" data-aos-delay="100">
          <h5 class="fw-bold text-info"><i class="bi bi-brightness-high me-2"></i>Pencahayaan Matahari Merata</h5>
          <p class="small opacity-75">Paparan sinar matahari optimal membantu menghasilkan warna dan kadar nikotin seimbang.</p>
        </div>

        <div data-aos="fade-right" data-aos-delay="200">
          <h5 class="fw-bold text-info"><i class="bi bi-tree me-2"></i>Tanah Subur dan Kaya Mineral</h5>
          <p class="small opacity-75">Struktur tanah gembur dengan kandungan mineral alami memberi cita rasa tembakau yang lembut.</p>
        </div>
      </div>

      <!-- Gambar Tengah tanpa lingkaran -->
      <div class="col-lg-4 col-md-8 text-center position-relative" data-aos="zoom-in">
        <img src="{{ asset('image/tembakau.png') }}"
             alt="Tembakau TamanKursi"
             class="tembakau-center-img shadow-lg mx-auto">
        <div class="glow-ring"></div>
      </div>

      <!-- Deskripsi Kanan -->
      <div class="col-lg-4 col-md-6 text-start text-light d-flex flex-column gap-4">
        <div data-aos="fade-left">
          <h5 class="fw-bold text-info"><i class="bi bi-flower3 me-2"></i>Budidaya Tradisional Ramah Lingkungan</h5>
          <p class="small opacity-75">Petani menjaga warisan teknik tanam alami dengan pupuk organik dan sistem rotasi tanaman.</p>
        </div>

        <div data-aos="fade-left" data-aos-delay="100">
          <h5 class="fw-bold text-info"><i class="bi bi-droplet-half me-2"></i>Proses Pemanenan Teliti</h5>
          <p class="small opacity-75">Panen dilakukan dengan seleksi daun matang dan pengeringan alami untuk hasil tembakau premium.</p>
        </div>

        <div data-aos="fade-left" data-aos-delay="200">
          <h5 class="fw-bold text-info"><i class="bi bi-people me-2"></i>Dukungan Komunitas Petani</h5>
          <p class="small opacity-75">Kelompok tani bekerja sama meningkatkan mutu, efisiensi produksi, dan pemasaran hingga luar daerah.</p>
        </div>
      </div>

    </div>
  </div>
</section>



  <!-- ===== DESTINASI ===== -->
  <section id="destinasi" class="section-dark">
    <div class="container text-center" data-aos="fade-up">
      <h2 class="mb-5">Destinasi Favorit</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card card-dark">
            <img src="{{ asset('image/potensi1.jpg') }}" class="card-img-top rounded-3" alt="Air Terjun Harmoni">
            <div class="card-body">
              <h5 class="fw-bold">1st Place</h5>
              <p>Air Terjun Harmoni</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-dark">
            <img src="{{ asset('image/potensi2.jpg') }}" class="card-img-top rounded-3" alt="Sawah Asri">
            <div class="card-body">
              <h5 class="fw-bold">2nd Place</h5>
              <p>Sawah Asri</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-dark">
            <img src="{{ asset('image/potensi3.jpg') }}" class="card-img-top rounded-3" alt="Bukit Cerah">
            <div class="card-body">
              <h5 class="fw-bold">3rd Place</h5>
              <p>Bukit Cerah</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-dark">
            <img src="{{ asset('image/desa1.jpg') }}" class="card-img-top rounded-3" alt="Danau Biru">
            <div class="card-body">
              <h5 class="fw-bold">4th Place</h5>
              <p>Danau Biru</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta" id="kontak">
    <div class="content" data-aos="zoom-in">
      <h2>TRAVEL AND ENJOY YOUR HOLIDAY</h2>
      <p class="lead">Choose your next adventure in Desa TamanKursi</p>
      <a href="mailto:info@desaharmoni.id" class="btn btn-outline-light rounded-pill px-4 mt-3">Hubungi Kami</a>
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

  // === Parallax Effect ===
  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    document.querySelectorAll('.parallax-bg').forEach(bg => {
      bg.style.transform = `translateY(${scrolled * 0.3}px)`;
    });
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
</script>


</body>
</html>
