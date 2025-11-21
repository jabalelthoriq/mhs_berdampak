<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <title>Dashboard Admin</title>
</head>
<style>
    body {
        font-family: 'Poppins', 'Roboto', -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .vertical-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 80px;
        height: 92vh;
        background-color: #ffffff;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding-left: 16px;
        z-index: 1000;
        border-radius: 15px;
        margin: 30px 30px;
        transition: width 0.4s ease-in-out, padding 0.4s ease-in-out;
    }

    .vertical-navbar:hover {
        width: 250px;
        align-items: flex-start;
        padding-left: 16px;
    }

    .vertical-navbar:hover .nav-text {
        opacity: 1;
        visibility: visible;
    }

    .nav-text {
        margin-left: 15px;
        white-space: nowrap;
        opacity: 0;
        transform: translateX(-10px);
        visibility: hidden;
        transition: opacity 0.3s ease, transform 0.8s ease;
        font-family: 'Poppins', 'Roboto', sans-serif;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .vertical-navbar:hover .nav-text {
        opacity: 1;
        transform: translateX(0);
        visibility: visible;
    }

    .nav-icon a {
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        height: 100%;
    }

    .nav-indicator {
        position: absolute;
        left: 0;
        width: 4px;
        height: 48px;
        background-color: #00b8d4;
        border-radius: 0 4px 4px 0;
        transition: top 0.3s ease;
        pointer-events: none;
    }

    .nav-icon {
        width: 48px;
        height: 48px;
        margin: 12px 0;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border-radius: 8px;
        color: #777;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.2s ease;
        padding-left: 14px;
    }

    .nav-icon:hover {
        background-color: #f0f0f0;
        transform: scale(1.05);
        width: 90%;
    }

    .nav-icon.active {
        background-color: #00b8d4;
        color: white;
        transition: background-color 1s ease;
        width: 90%;
        padding-left: 19px;
    }

    .nav-icon.logout {
        margin-top: auto;
        color: #f44336;
    }

    /* PERBAIKAN UTAMA: Main Content Lebih Compact */
    .main-content {
        margin-left: 80px;
        padding: 2rem 2rem 2rem 3rem; /* Reduced right padding */
        width: calc(100% - 80px - 2rem); /* Account for reduced padding */
        max-width: none; /* Remove max-width restriction */
        margin-right: 0;
        box-sizing: border-box;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
        align-items: center;
    }

    .nav-logo {
        width: 65px;
        height: 65px;
        margin: 0 0 12px 0;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border-radius: 8px;
        transition: all 0.2s ease;
        padding-right: 14px;
    }

    .nav-logo span {
        white-space: nowrap;
        opacity: 0;
        transform: translateX(-10px);
        visibility: hidden;
        transition: opacity 0.3s ease, transform 0.8s ease;
        color: #00b8d4;
        width: 20px;
        height: 20px;
    }

    .nav-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .nav-logo:hover img {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 24px;
        height: 100%;
    }

    .stats-card {
        height: 140px;
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        border-radius: 12px;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .icon-container {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .stats-card:hover .icon-container {
        transform: scale(1.1);
    }

    .card-body {
        padding: 1.5rem !important;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table>:not(caption)>*>* {
        padding: 1rem 1.25rem;
        vertical-align: middle;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        margin-right: 12px;
        font-size: 14px;
    }

    .table-card {
        min-height: 400px;
    }

    .table-card .card-body {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .table-responsive {
        flex: 1;
        overflow-y: auto;
        max-height: 350px;
    }

    .large-table-card {
        min-height: 500px;
    }

    .large-table-card .table-responsive {
        max-height: 450px;
    }

    /* === Tab Button Styling === */
    .nav-link {
        border: none;
        background-color: #f5f5f5;
        color: #333;
        border-radius: 20px;
        padding: 6px 18px;
        font-weight: 500;
        transition: all 0.3s ease;
        min-width: 180px;
    }

    .nav-link.active {
        background-color: #00b8d4;
        color: #fff;
        box-shadow: 0 2px 8px rgba(0,184,212,0.4);
    }

    .nav-link:hover {
        background-color: #e0f7fa;
    }

    /* === Container Chart Kesehatan - FIXED === */
    .health-chart-container {
        padding: 1.5rem !important;
    }

    .health-chart-container h6 {
        font-weight: 600;
        letter-spacing: 0.3px;
        color: #000;
        margin-bottom: 0.5rem !important;
    }

    .health-chart-container #healthTabs {
        margin-top: 0 !important;
        margin-bottom: 0.5rem !important;
        padding: 0 !important;
    }

    .health-chart-container .tab-content {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        min-height: 260px;
    }

    .health-chart-container .tab-content .tab-pane {
        margin: 0 !important;
        padding: 0 !important;
        height: 100%;
    }

    .health-chart-container .tab-content canvas {
        margin: 0 !important;
        padding: 0 !important;
        display: block !important;
        height: 260px !important;
        width: 100% !important;
    }

    /* === Container Chart Pelayanan === */
    .pelayanan-chart-container {
        padding: 1.5rem !important;
    }

    .pelayanan-chart-container h6 {
        font-weight: 600;
        letter-spacing: 0.3px;
        color: #000 !important;
        text-align: left !important;
        margin-bottom: 0.75rem !important;
    }

    .pelayanan-chart-container canvas {
        margin-top: 0 !important;
        padding-top: 0 !important;
        height: 260px !important;
        width: 100% !important;
    }

    /* PERBAIKAN: Compact Layout untuk Mengurangi Space Kanan */
    .compact-container {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .row.g-4 {
        --bs-gutter-x: 1rem;
        --bs-gutter-y: 1rem;
    }

    /* Responsive Design dengan Lebih Compact */
    @media (max-width: 1400px) {
        .main-content {
            padding: 2rem 1.5rem 2rem 2.5rem;
        }
    }

    @media (max-width: 1200px) {
        .main-content {
            padding: 1.5rem 1rem 1.5rem 2rem;
        }

        .health-chart-container,
        .pelayanan-chart-container {
            padding: 1rem !important;
        }
    }

    @media (max-width: 768px) {
        .vertical-navbar {
            width: 60px;
            margin: 15px 15px;
        }

        .main-content {
            margin-left: 60px;
            width: calc(100% - 60px);
            padding: 1rem;
        }

        .nav-icon {
            width: 40px;
            height: 40px;
        }

        .stats-card {
            height: auto;
            min-height: 120px;
        }

        .nav-logo {
            width: 50px;
            height: 50px;
        }

        .health-chart-container .tab-content canvas {
            height: 220px !important;
        }

        .nav-link {
            min-width: 140px;
            padding: 5px 12px;
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .main-content {
            padding: 0.75rem;
        }

        .header-container h2 {
            font-size: 1.5rem;
        }

        .stats-card .display-6 {
            font-size: 1.5rem;
        }

        .health-chart-container,
        .pelayanan-chart-container {
            padding: 0.75rem !important;
        }
    }

    /* Pastikan chart menggunakan width 100% */
    .chart-container {
        width: 100% !important;
        position: relative;
    }

    .chart-container canvas {
        width: 100% !important;
        max-width: 100% !important;
    }
</style>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Vertical Navbar -->
    <div class="vertical-navbar">
        <div class="nav-logo">
            <img src="{{ asset('image/logo_polije.png') }}" alt="Logo">
            <span class="nav-text">POLIJE SIP</span>
        </div>
        <div class="nav-icon active">
            <a href="dashboard">
                <i class="fas fa-th-large"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </div>
        <div class="nav-icon">
            <a href="data">
                <i class="fas fa-clinic-medical"></i>
                <span class="nav-text">Data Masyarakat</span>
            </a>
        </div>
        <div class="nav-icon">
            <a href="setting">
                <i class="fas fa-cog"></i>
                <span class="nav-text">Pengaturan</span>
            </a>
        </div>
        <div class="nav-icon logout" onclick="handleLogout()">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-text">Logout</span>
        </div>
    </div>

    <!-- Main Content - Compact -->
    <div class="main-content">
        <div class="header-container">
            <h2 class="fs-3 fw-bold m-0">Dashboard</h2>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4"> <!-- Reduced gutter -->
            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-3"> <!-- Reduced padding -->
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Total Masyarakat</p>
                            <h2 class="display-6 fw-bold mb-0">{{ number_format($totalMasyarakat) }}</h2>
                        </div>
                        <div class="icon-container bg-primary bg-opacity-10 rounded-circle p-2"> <!-- Reduced padding -->
                            <i class="bi bi-people-fill text-primary fs-4"></i> <!-- Smaller icon -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Total Orang Tua</p>
                            <h2 class="display-6 fw-bold mb-0">{{ number_format($totalOrangtua) }}</h2>
                        </div>
                        <div class="icon-container bg-warning bg-opacity-10 rounded-circle p-2">
                            <i class="bi bi-person-badge-fill text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Total Anak</p>
                            <h2 class="display-6 fw-bold mb-0">{{ number_format($totalAnak) }}</h2>
                        </div>
                        <div class="icon-container bg-success bg-opacity-10 rounded-circle p-2">
                            <i class="bi bi-person-fill text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section - Compact -->
        <div class="row g-3 mb-4"> <!-- Reduced gutter -->
            <!-- Health Chart -->
            <div class="col-lg-6 col-md-12">
                <div class="card shadow-sm health-chart-container h-100">
                    <h6 class="fw-bold mb-2">Data Kesehatan ({{ date('Y') }})</h6>

                    <div class="d-flex justify-content-start mb-2" id="healthTabs">
                        <button class="nav-link active me-2" id="tab-gizi">Gizi Anak</button>
                        <button class="nav-link" id="tab-penyakit">Riwayat Penyakit Orang Tua</button>
                    </div>

                    <div class="tab-content chart-container">
                        <div class="tab-pane fade show active" id="chartGiziContainer">
                            <canvas id="chartGizi"></canvas>
                        </div>
                        <div class="tab-pane fade" id="chartPenyakitContainer">
                            <canvas id="chartPenyakit"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Chart -->
            <div class="col-lg-6 col-md-12">
                <div class="card shadow-sm pelayanan-chart-container h-100">
                    <h6 class="fw-bold mb-2">Pelayanan Kesehatan ({{ date('Y') }})</h6>
                    <div class="chart-container">
                        <canvas id="chartPelayanan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables Section - Compact -->
        <div class="row g-3">
            <!-- Parents Table -->
            <div class="col-lg-6">
                <div class="card table-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-bold mb-0">Data Orang Tua</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Usia</th>
                                        <th>Gender</th>
                                        <th>Jenis Penyakit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orangtua as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- <div class="avatar bg-primary">{{ substr($data->nama_orangtua, 0, 2) }}</div> --}}
                                                    <span class="small">{{ $data->nama_orangtua }}</span>
                                                </div>
                                            </td>
                                            <td class="small">{{ $data->nik }}</td>
                                            <td class="small">{{ $data->usia_orangtua }}</td>
                                            <td class="small">{{ $data->jenis_kelamin_orangtua }}</td>
                                            <td class="small">{{ $data->jenis_penyakit }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center small">Tidak ada data orang tua</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Children Table -->
            <div class="col-lg-6">
                <div class="card table-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-bold mb-0">Data Anak</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Anak</th>
                                        <th>Nik</th>
                                        <th>Usia</th>
                                        <th>Gender</th>
                                        <th>Status Gizi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($anak as $child)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- <div class="avatar bg-success">{{ substr($child->nama_anak, 0, 2) }}</div> --}}
                                                    <span class="small">{{ $child->nama_anak }}</span>
                                                </div>
                                            </td>
                                            <td class="small">{{ $child->nik }}</td>
                                            <td class="small">{{ $child->usia_anak }}</td>
                                            <td class="small">{{ $child->jenis_kelamin_anak }}</td>
                                            <td class="small">{{ $child->kesimpulan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center small">Tidak ada data anak</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // Handle logout
    function handleLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari aplikasi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ route('logout') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Accept": "application/json"
                    }
                })
                .then(() => {
                    Swal.fire({
                        title: 'Berhasil Logout!',
                        text: 'Anda telah keluar dari aplikasi',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: true
                    }).then(() => window.location.href = '/');
                })
                .catch((error) => console.error("Logout error:", error));
            }
        });
    }

    // ==========================
    // AMBIL DATA DARI CONTROLLER
    // ==========================
    const labels = @json($bulanList);
    const dataStunting = @json($dataStunting);
    const dataGiziKurang = @json($dataGiziKurang);
    const dataGiziBaik = @json($dataGiziBaik);

    const dataPenyakitMenular = @json($dataPenyakitMenular);
    const dataPenyakitTidakMenular = @json($dataPenyakitTidakMenular);

    const dataPelayanan = @json($dataPelayanan);

    // ==========================
    // GRADIENT HELPER
    // ==========================
    function makeGradient(ctx, color1, color2) {
        const g = ctx.createLinearGradient(0, 0, 0, 250);
        g.addColorStop(0, color1);
        g.addColorStop(1, color2);
        return g;
    }

    // ==========================
    // RENDER CHART
    // ==========================
    document.addEventListener('DOMContentLoaded', function () {

        // -----------------------------
        // 1. Chart Gizi Anak
        // -----------------------------
        const ctxGizi = document.getElementById('chartGizi').getContext('2d');
        new Chart(ctxGizi, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Stunting',
                        data: dataStunting,
                        fill: true,
                        borderColor: '#ff4d6d',
                        backgroundColor: makeGradient(ctxGizi, 'rgba(255,99,132,0.35)', 'rgba(255,99,132,0)'),
                        tension: 0.4,
                        pointRadius: 3,
                        pointBackgroundColor: '#ff4d6d',
                        borderWidth: 2,
                    },
                    {
                        label: 'Gizi Kurang',
                        data: dataGiziKurang,
                        fill: true,
                        borderColor: '#ffb347',
                        backgroundColor: makeGradient(ctxGizi, 'rgba(255,206,86,0.3)', 'rgba(255,206,86,0)'),
                        tension: 0.4,
                        pointRadius: 3,
                        pointBackgroundColor: '#ffb347',
                        borderWidth: 2,
                    },
                    {
                        label: 'Gizi Baik',
                        data: dataGiziBaik,
                        fill: true,
                        borderColor: '#00b8d4',
                        backgroundColor: makeGradient(ctxGizi, 'rgba(0,184,212,0.3)', 'rgba(0,184,212,0)'),
                        tension: 0.4,
                        pointRadius: 3,
                        pointBackgroundColor: '#00b8d4',
                        borderWidth: 2,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11 }, padding: 10 }
                    }
                }
            }
        });

        // -----------------------------
        // 2. Chart Penyakit Orang Tua
        // -----------------------------
        const ctxPenyakit = document.getElementById('chartPenyakit').getContext('2d');
        new Chart(ctxPenyakit, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Penyakit Menular',
                        data: dataPenyakitMenular,
                        fill: true,
                        borderColor: '#6a1b9a',
                        backgroundColor: makeGradient(ctxPenyakit, 'rgba(106,27,154,0.35)', 'rgba(106,27,154,0.0)'),
                        tension: 0.4,
                        pointRadius: 3,
                        pointBackgroundColor: '#6a1b9a',
                        borderWidth: 2,
                    },
                    {
                        label: 'Tidak Menular',
                        data: dataPenyakitTidakMenular,
                        fill: true,
                        borderColor: '#9c27b0',
                        backgroundColor: makeGradient(ctxPenyakit, 'rgba(156,39,176,0.25)', 'rgba(156,39,176,0.0)'),
                        tension: 0.4,
                        pointRadius: 3,
                        pointBackgroundColor: '#9c27b0',
                        borderWidth: 2,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11 }, padding: 10 }
                    }
                }
            }
        });

        // -----------------------------
        // 3. Chart Pelayanan
        // -----------------------------
        const ctxPelayanan = document.getElementById('chartPelayanan').getContext('2d');
        const gradientPelayanan = ctxPelayanan.createLinearGradient(0, 0, 0, 400);
        gradientPelayanan.addColorStop(0, '#b3e5fc');
        gradientPelayanan.addColorStop(0.5, '#4fc3f7');
        gradientPelayanan.addColorStop(1, '#0288d1');

        new Chart(ctxPelayanan, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pelayanan',
                    data: dataPelayanan,
                    backgroundColor: gradientPelayanan,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });

        // ==========================
        // TAB SWITCHING
        // ==========================
        document.getElementById('tab-gizi').addEventListener('click', function () {
            this.classList.add('active');
            document.getElementById('tab-penyakit').classList.remove('active');
            document.getElementById('chartGiziContainer').classList.add('show', 'active');
            document.getElementById('chartPenyakitContainer').classList.remove('show', 'active');
        });

        document.getElementById('tab-penyakit').addEventListener('click', function () {
            this.classList.add('active');
            document.getElementById('tab-gizi').classList.remove('active');
            document.getElementById('chartPenyakitContainer').classList.add('show', 'active');
            document.getElementById('chartGiziContainer').classList.remove('show', 'active');
        });

    });
</script>

</body>
</html>
