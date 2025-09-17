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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard Admin</title>
</head>
<style>
    body {
       margin: 0;
       padding: 0;
       background-color: #F6F8FB;
       font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
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
       align-items: center;
       padding: 20px 0;
       z-index: 1000;
       border-radius: 15px 15px 15px 15px;
       margin: 30px 30px;
   }

   .nav-icon a {
       text-decoration: none;
       color: inherit;
       display: flex;
       align-items: center;
       justify-content: center;
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
       justify-content: center;
       border-radius: 8px;
       color: #777;
       font-size: 20px;
       cursor: pointer;
       transition: all 0.2s ease;
   }

   .nav-icon:hover {
       background-color: #f0f0f0;
       transform: scale(1.2);
   }

   .nav-icon.active {
       background-color: #00b8d4;
       color: white;
       transition: background-color 1s ease;
   }

   .nav-icon.logout {
       margin-top: auto;
       color: #f44336;
   }

   .main-content {
       margin-left: 80px;
       padding-left: 5rem;
       padding-top: 3rem;
       width: calc(100% - 80px);
       max-width: 1440px;
       margin-right: auto;
   }

   .header-container {
       display: flex;
       justify-content: space-between;
       margin-bottom: 24px;
       align-items: center;
   }

   .search-container {
        position: relative;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .search-container input {
        padding-left: 30px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .search-container i {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .vertical-navbar {
            width: 60px;
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
    }

    .nav-logo {
    width: 65px;
    height: 65px;
    margin: 0 0 12px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.2s ease;
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

    @media (max-width: 992px) {
        .stats-card {
            height: 120px;
        }

        .icon-container {
            width: 56px;
            height: 56px;
        }

        .display-6 {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 768px) {
        .stats-card {
            height: auto;
            min-height: 120px;
        }

        .nav-logo {
            width: 50px;
            height: 50px;
        }
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

    /* Additional styles for better table layout */
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

    /* Custom styles for the large table */
    .large-table-card {
        min-height: 500px;
    }

    .large-table-card .table-responsive {
        max-height: 450px;
    }

    .card1 {
        background: linear-gradient(135deg, #e9d5ff, #ddd6fe);
        border-radius: 24px;
        padding: 40px 50px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(139, 92, 246, 0.15);
        width: 100%;
        max-width: none;
        margin-left: 0;
        margin-right: 0;
    }

    .decorative-dots {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .dot {
        position: absolute;
        border-radius: 50%;
        opacity: 0.6;
    }

    .dot-1 {
        width: 12px;
        height: 12px;
        background: #8b5cf6;
        top: 20px;
        right: 80px;
    }

    .dot-2 {
        width: 8px;
        height: 8px;
        background: #6366f1;
        top: 50px;
        right: 50px;
    }

    .dot-3 {
        width: 6px;
        height: 6px;
        background: #a855f7;
        bottom: 60px;
        left: 60px;
    }

    .dot-4 {
        width: 10px;
        height: 10px;
        background: #7c3aed;
        bottom: 100px;
        left: 40px;
    }

    .content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .text-section {
        flex: 1;
    }

    .greeting {
        font-size: 42px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 16px;
        letter-spacing: -0.5px;
    }

    .message {
        font-size: 18px;
        color: #6b7280;
        line-height: 1.6;
        font-weight: 400;
    }

    .illustration {
        flex-shrink: 0;
        position: relative;
    }

    .person {
        width: 180px;
        height: 180px;
        position: relative;
    }

    .chair {
        position: absolute;
        bottom: -10px;
        left: 20px;
        width: 140px;
        height: 80px;
        background: linear-gradient(145deg, #7c3aed, #6d28d9);
        border-radius: 15px 15px 8px 8px;
    }

    .chair::before {
        content: '';
        position: absolute;
        top: -60px;
        left: 10px;
        width: 120px;
        height: 70px;
        background: linear-gradient(145deg, #8b5cf6, #7c3aed);
        border-radius: 12px 12px 0 0;
    }

    .desk {
        position: absolute;
        bottom: -20px;
        left: 0;
        width: 180px;
        height: 12px;
        background: linear-gradient(90deg, #e5e7eb, #d1d5db);
        border-radius: 6px;
    }

    .laptop {
        position: absolute;
        bottom: 15px;
        right: 10px;
        width: 70px;
        height: 45px;
        background: linear-gradient(145deg, #6d28d9, #5b21b6);
        border-radius: 6px;
        transform: perspective(100px) rotateX(15deg);
    }

    .laptop::before {
        content: '';
        position: absolute;
        top: -35px;
        left: 0;
        width: 70px;
        height: 35px;
        background: linear-gradient(145deg, #4c1d95, #3730a3);
        border-radius: 6px 6px 0 0;
    }

    .person-body {
        position: absolute;
        bottom: 30px;
        left: 40px;
        width: 60px;
        height: 80px;
        background: linear-gradient(145deg, #fbbf24, #f59e0b);
        border-radius: 20px 20px 0 0;
    }

    .person-head {
        position: absolute;
        top: 10px;
        left: 50px;
        width: 40px;
        height: 40px;
        background: #fef3c7;
        border-radius: 50%;
    }

    .hair {
        position: absolute;
        top: 5px;
        left: 45px;
        width: 50px;
        height: 35px;
        background: linear-gradient(145deg, #5b21b6, #4c1d95);
        border-radius: 25px 25px 15px 15px;
    }

    .hair::before {
        content: '';
        position: absolute;
        right: -10px;
        top: 5px;
        width: 25px;
        height: 40px;
        background: linear-gradient(145deg, #5b21b6, #4c1d95);
        border-radius: 0 15px 15px 0;
    }

    .coffee {
        position: absolute;
        bottom: 50px;
        left: 10px;
        width: 16px;
        height: 20px;
        background: #f3f4f6;
        border-radius: 0 0 8px 8px;
    }

    .coffee::before {
        content: '';
        position: absolute;
        right: -4px;
        top: 5px;
        width: 6px;
        height: 8px;
        border: 2px solid #d1d5db;
        border-left: none;
        border-radius: 0 4px 4px 0;
    }

    @media (max-width: 640px) {
        .card1 {
            padding: 30px 25px;
        }

        .content {
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }

        .greeting {
            font-size: 36px;
        }

        .message {
            font-size: 16px;
        }

        .person {
            width: 160px;
            height: 160px;
        }

        .desk {
            width: 160px;
        }
    }
</style>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="vertical-navbar">
        <div class="nav-logo">
            <img src="{{ asset('image/logo polije.png') }}" alt="Logo">
        </div>
        <div class="nav-icon active">
            <a href="dashboard">
                <i class="fas fa-th-large"></i>
            </a>
        </div>

        <div class="nav-icon">
            <a href="input">
            <i class="fas fa-edit"></i>
            </a>
        </div>

        <div class="nav-icon">
            <a href="data">
                <i class="fas fa-clinic-medical"></i>
            </a>
        </div>

        <div class="nav-icon logout" onclick="handleLogout()">
            <i class="fas fa-sign-out-alt"></i>
        </div>
    </div>

     <!-- Main Content -->
     <div class="main-content">
        <div class="header-container">
            <h2 class="fs-3 fw-bold m-0">Dashboard</h2>
        </div>

        {{-- <!-- Card 1 yang sudah diperlebar -->
        <div class="card1">
            <div class="decorative-dots">
                <div class="dot dot-1"></div>
                <div class="dot dot-2"></div>
                <div class="dot dot-3"></div>
                <div class="dot dot-4"></div>
            </div>

            <div class="content">
                <div class="text-section">
                    <h1 class="greeting">Hi, Alyssa</h1>
                    <p class="message">Ready to start your day with some pitch decks?</p>
                </div>

                <div class="illustration">
                    <div class="person">
                        <div class="desk"></div>
                        <div class="chair"></div>
                        <div class="laptop"></div>
                        <div class="person-body"></div>
                        <div class="person-head"></div>
                        <div class="hair"></div>
                        <div class="coffee"></div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row g-4 mb-4">
            <!-- Card 1 - Total Users -->
            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Total Warga</p>
                            <h2 class="display-6 fw-bold mb-0">{{ number_format($totalMasyarakat) }}</h2>
                        </div>
                        <div class="icon-container bg-primary bg-opacity-10 rounded-circle p-3">
                            <svg class="text-primary" style="width: 32px; height: 32px;" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - User Pregnant -->
            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2"> Kunjungan Kesehatan</p>
                            <h2 class="display-6 fw-bold mb-0">{{ number_format($totalKunjunganKesehatan) }}</h2>
                        </div>
                        <div class="icon-container bg-warning bg-opacity-10 rounded-circle p-3">
                            <svg class="text-warning" style="width: 32px; height: 32px;" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Total Appointment -->
            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Imunisasi</p>
                            <h2 class="display-6 fw-bold mb-0">{{ number_format($totalImunisasi) }}</h2>
                        </div>
                        <div class="icon-container bg-success bg-opacity-10 rounded-circle p-3">
                            <svg class="text-success" style="width: 32px; height: 32px;" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table 1: Data Masyarakat (Full Width) -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card table-card large-table-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Masyarakat</h5>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. HP</th>
                                        <th>Gender</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($masyarakat as $warga)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-primary">{{ substr($warga->nama, 0, 2) }}</div>
                                                    <span class="text-truncate">{{ $warga->nama }}</span>
                                                </div>
                                            </td>
                                            <td class="text-truncate">{{ $warga->nik }}</td>
                                            <td class="text-truncate">{{ $warga->no_hp }}</td>
                                            <td class="text-truncate">{{ $warga->jenis_kelamin }}</td>

                                            <td class="text-truncate">{{ $warga->alamat ?? '-' }}</td>
                                            <td class="text-truncate">{{ isset($warga->tanggal_lahir) ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data masyarakat</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables in 2 Columns (Bottom Row) -->
        <div class="row mb-5 g-4">
            <!-- Table 2: Data Kunjungan -->
            <div class="col-lg-6">
                <div class="card table-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Kunjungan</h5>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Diagnosa</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kunjungan as $kesehatan)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-warning">
                                                        {{ substr($kesehatan->masyarakat->nama ?? 'N/A', 0, 2) }}
                                                    </div>
                                                    <span class="text-truncate">{{ $kesehatan->masyarakat->nama ?? 'N/A' }}</span>
                                                </div>
                                            </td>
                                            <td class="text-truncate">{{ $kesehatan->diagnosa }}</td>
                                            <td class="text-truncate">
                                                {{ \Carbon\Carbon::parse($kesehatan->tanggal_kunjungan)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data kunjungan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table 3: Data Imunisasi -->
            <div class="col-lg-6">
                <div class="card table-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Imunisasi</h5>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($imunisasi as $vaksin)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-success">
                                                        {{ substr($vaksin->masyarakat->nama ?? 'N/A', 0, 2) }}
                                                    </div>
                                                    <span class="text-truncate">{{ $vaksin->masyarakat->nama ?? 'N/A' }}</span>
                                                </div>
                                            </td>
                                            <td class="text-truncate">{{ $vaksin->jenis_imunisasi }}</td>
                                            <td class="text-truncate">
                                                {{ \Carbon\Carbon::parse($vaksin->tanggal_imunisasi)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data imunisasi</td>
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

<script>
    @if(session('swal'))
        Swal.fire({
            icon: '{{ session('swal.type') }}',
            title: '{{ session('swal.title') }}',
            text: '{{ session('swal.text') }}',
            @if(isset(session('swal')['timer']))
                timer: {{ session('swal.timer') }},
                showConfirmButton: true
            @endif
        });
    @endif

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
                Swal.fire({
                    title: 'Berhasil Logout!',
                    text: 'Anda telah keluar dari aplikasi',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: true
                }).then(() => {
                    window.location.href = '/';
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const navIcons = document.querySelectorAll('.nav-icon:not(:first-child):not(.logout)');

        const indicator = document.createElement('div');
        indicator.className = 'nav-indicator';
        document.querySelector('.vertical-navbar').appendChild(indicator);

        const activeIcon = document.querySelector('.nav-icon.active');
        if (activeIcon) {
            positionIndicator(activeIcon);
        }

        navIcons.forEach(icon => {
            icon.addEventListener('click', function(e) {
                if (e.target.tagName === 'I') {
                    e.preventDefault();
                    const href = this.querySelector('a').getAttribute('href');
                    handleNavClick(this, href);
                }
            });
        });

        document.querySelectorAll('.nav-icon a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const navIcon = this.parentElement;
                const href = this.getAttribute('href');
                handleNavClick(navIcon, href);
            });
        });

        function handleNavClick(clickedIcon, href) {
            if (clickedIcon.classList.contains('active')) return;

            const currentActive = document.querySelector('.nav-icon.active');
            if (currentActive) {
                currentActive.classList.remove('active');
            }

            clickedIcon.classList.add('active');
            positionIndicator(clickedIcon);

            setTimeout(() => {
                window.location.href = href;
            }, 300);
        }

        function positionIndicator(targetIcon) {
            const rect = targetIcon.getBoundingClientRect();
            const navbarRect = document.querySelector('.vertical-navbar').getBoundingClientRect();
            const top = rect.top - navbarRect.top;
            indicator.style.top = top + 'px';
        }
    });
</script>
</body>
</html>
