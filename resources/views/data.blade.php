<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
       align-items: flex-start;
       padding-left: 16px;
       /* padding: 20px 0; */
       z-index: 1000;
       border-radius: 15px 15px 15px 15px;
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

    /* Font styling */
    font-family: 'Poppins', 'Roboto', sans-serif;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.3px;
     /* abu gelap elegan */
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

    .nav-tabs {
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 20px;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #777;
        font-weight: 600;
        padding: 12px 20px;
        margin-right: 5px;
        border-radius: 0;
    }

    .nav-tabs .nav-link.active {
        border-bottom: 3px solid #00b8d4;
        color: #00b8d4;
        background-color: transparent;
    }

    .nav-tabs .nav-link:hover:not(.active) {
        border-bottom: 3px solid #f0f0f0;
    }

    .tab-content {
        padding: 20px 0;
    }

    /* Fix for pagination alignment */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Fix for action buttons alignment */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }


     /* Pagination styling */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item .page-link {
            color: #00b8d4;
            border: 1px solid #dee2e6;
            margin: 0 2px;
            border-radius: 4px;
        }

        .pagination .page-item.active .page-link {
            background-color: #00b8d4;
            border-color: #00b8d4;
            color: white;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }

</style>
<body>
    <div class="vertical-navbar">
        <div class="nav-logo">
            <img src="{{ asset('image/logo polije.png') }}" alt="Logo">
             <span class="nav-text">POLIJE SIP</span>
        </div>
        <div class="nav-icon">
            <a href="dashboard">
                <i class="fas fa-th-large"></i>
                 <span class="nav-text">Dahboard</span>
            </a>
        </div>



        <div class="nav-icon active">
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

     <!-- Main Content -->
     <div class="main-content">
        <div class="header-container">
            <h2 class="fs-3 fw-bold m-0">Data Kesehatan</h2>
        </div>

        <!-- Tab navigation -->
        <ul class="nav nav-tabs" id="kesehatanTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="masyarakat-tab" data-bs-toggle="tab" data-bs-target="#masyarakat-content" type="button" role="tab" aria-controls="masyarakat-content" aria-selected="true">
                    <i class="fas fa-users me-2"></i>Masyarakat
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="kunjungan-tab" data-bs-toggle="tab" data-bs-target="#kunjungan-content" type="button" role="tab" aria-controls="kunjungan-content" aria-selected="false">
                    <i class="fas fa-hospital-user me-2"></i>Kunjungan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="kehamilan-tab" data-bs-toggle="tab" data-bs-target="#kehamilan-content" type="button" role="tab" aria-controls="kehamilan-content" aria-selected="false">
                    <i class="fas fa-baby me-2"></i>Kehamilan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="imunisasi-tab" data-bs-toggle="tab" data-bs-target="#imunisasi-content" type="button" role="tab" aria-controls="imunisasi-content" aria-selected="false">
                    <i class="fas fa-syringe me-2"></i>Imunisasi
                </button>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="kesehatanTabsContent">
            <!-- Masyarakat Content -->
            <div class="tab-pane fade show active" id="masyarakat-content" role="tabpanel" aria-labelledby="masyarakat-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Masyarakat</h5>
                            <div class="search-container" style="width: 250px;">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" id="searchmasyarakat" placeholder="Cari masyarakat..." onkeyup="searchTable('masyarakatTable', this.value)">
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive table-container" id="masyarakat-table-container">
                            <table class="table table-hover mb-0" id="masyarakatTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Nomor telepon</th>
                                        <th>Jenis kelamin</th>
                                        <th>Alamat</th>
                                        <th>Tanggal lahir</th>
                                        <th>Pekerjaan</th>
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
                                            <td class="text-truncate">{{ $warga->pekerjaan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data masyarakat</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination for masyarakat -->
                        @if($masyarakat->hasPages())
                        <div class="pagination-container">
                            <nav aria-label="Page navigation for masyarakat">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    <li class="page-item {{ $masyarakat->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $masyarakat->appends(['masyarakat_page' => $masyarakat->currentPage()])->previousPageUrl() }}#masyarakat-content"
                                           aria-label="Previous">
                                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                        </a>
                                    </li>

                                    {{-- Pagination Elements --}}
                                    @for($i = 1; $i <= $masyarakat->lastPage(); $i++)
                                        <li class="page-item {{ $masyarakat->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link"
                                               href="{{ $masyarakat->url($i) }}#masyarakat-content">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor

                                    {{-- Next Page Link --}}
                                    <li class="page-item {{ $masyarakat->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link"
                                           href="{{ $masyarakat->appends(['masyarakat_page' => $masyarakat->currentPage()])->nextPageUrl() }}#masyarakat-content"
                                           aria-label="Next">
                                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kunjungan Content -->
            <div class="tab-pane fade" id="kunjungan-content" role="tabpanel" aria-labelledby="kunjungan-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Kunjungan</h5>
                            <div class="search-container" style="width: 250px;">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" id="searchkunjungan" placeholder="Cari kunjungan..." onkeyup="searchTable('kunjunganTable', this.value)">
                            </div>
                        </div>

                        @if(session('kesehatan_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('kesehatan_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive table-container" id="kunjungan-table-container">
                            <table class="table table-hover mb-0" id="kunjunganTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa</th>
                                        <th>Tindakan</th>
                                        <th>Tanggal kunjungan</th>
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
                                            <td class="text-truncate">{{ $kesehatan->keluhan }}</td>
                                            <td class="text-truncate">{{ $kesehatan->diagnosa }}</td>
                                            <td class="text-truncate">{{ $kesehatan->tindakan }}</td>
                                            <td class="text-truncate">
                                                {{ \Carbon\Carbon::parse($kesehatan->tanggal_kunjungan)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data kunjungan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination for kunjungan -->
                        @if($kunjungan->hasPages())
                        <div class="pagination-container">
                            <nav aria-label="Page navigation for kunjungan">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    <li class="page-item {{ $kunjungan->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $kunjungan->appends(['kunjungan_page' => $kunjungan->currentPage()])->previousPageUrl() }}#kunjungan-content"
                                           aria-label="Previous">
                                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                        </a>
                                    </li>

                                    {{-- Pagination Elements --}}
                                    @for($i = 1; $i <= $kunjungan->lastPage(); $i++)
                                        <li class="page-item {{ $kunjungan->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link"
                                               href="{{ $kunjungan->url($i) }}#kunjungan-content">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor

                                    {{-- Next Page Link --}}
                                    <li class="page-item {{ $kunjungan->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link"
                                           href="{{ $kunjungan->appends(['kunjungan_page' => $kunjungan->currentPage()])->nextPageUrl() }}#kunjungan-content"
                                           aria-label="Next">
                                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kehamilan Content -->
            <div class="tab-pane fade" id="kehamilan-content" role="tabpanel" aria-labelledby="kehamilan-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Kehamilan</h5>
                            <div class="search-container" style="width: 250px;">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" id="searchKehamilan" placeholder="Cari kehamilan..." onkeyup="searchTable('kehamilanTable', this.value)">
                            </div>
                        </div>

                        @if(session('pregnancy_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('pregnancy_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive table-container" id="kehamilan-table-container">
                            <table class="table table-hover mb-0" id="kehamilanTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>HPL</th>
                                        <th>Usia kehamilan</th>
                                        <th>Catatan</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kehamilan as $hamil)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-primary">{{ substr($kesehatan->masyarakat->nama ?? '??', 0, 2) }}</div>
                                                    <span class="ms-2">{{ $kesehatan->masyarakat->nama ?? 'Data tidak tersedia' }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $hamil->hpl ?? '-' }}</td>
                                            <td>{{ $hamil->usia_kehamilan ?? '-' }}</td>
                                            <td>{{ $hamil->catatan ?? '-' }}</td>
                                            <td class="text-center action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data kehamilan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination for kehamilan -->
                        @if($kehamilan->hasPages())
                        <div class="pagination-container">
                            <nav aria-label="Page navigation for kehamilan">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    <li class="page-item {{ $kehamilan->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $kehamilan->appends(['kehamilan_page' => $kehamilan->currentPage()])->previousPageUrl() }}#kehamilan-content"
                                           aria-label="Previous">
                                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                        </a>
                                    </li>

                                    {{-- Pagination Elements --}}
                                    @for($i = 1; $i <= $kehamilan->lastPage(); $i++)
                                        <li class="page-item {{ $kehamilan->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link"
                                               href="{{ $kehamilan->url($i) }}#kehamilan-content">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor

                                    {{-- Next Page Link --}}
                                    <li class="page-item {{ $kehamilan->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link"
                                           href="{{ $kehamilan->appends(['kehamilan_page' => $kehamilan->currentPage()])->nextPageUrl() }}#kehamilan-content"
                                           aria-label="Next">
                                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Imunisasi Content -->
            <div class="tab-pane fade" id="imunisasi-content" role="tabpanel" aria-labelledby="imunisasi-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-bold">Tabel Data Imunisasi</h5>
                            <div class="search-container" style="width: 250px;">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" id="searchimunisasi" placeholder="Cari imunisasi..." onkeyup="searchTable('imunisasiTable', this.value)">
                            </div>
                        </div>

                        @if(session('imunisasi_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('imunisasi_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive table-container" id="imunisasi-table-container">
                            <table class="table table-hover mb-0" id="imunisasiTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis imunisasi</th>
                                        <th>Tanggal imunisasi</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($imunisasi as $imun)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-primary">{{ substr($imun->masyarakat->nama ?? '??', 0, 2) }}</div>
                                                    <span class="ms-2">{{ $imun->masyarakat->nama ?? 'Data tidak tersedia' }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $imun->jenis_imunisasi ?? '-' }}</td>
                                            <td>{{ isset($imun->tanggal_imunisasi) ? \Carbon\Carbon::parse($imun->tanggal_imunisasi)->format('d/m/Y') : '-' }}</td>
                                            <td class="text-center action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data imunisasi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination for imunisasi -->
                        @if($imunisasi->hasPages())
                        <div class="pagination-container">
                            <nav aria-label="Page navigation for imunisasi">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    <li class="page-item {{ $imunisasi->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $imunisasi->appends(['imunisasi_page' => $imunisasi->currentPage()])->previousPageUrl() }}#imunisasi-content"
                                           aria-label="Previous">
                                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                        </a>
                                    </li>

                                    {{-- Pagination Elements --}}
                                    @for($i = 1; $i <= $imunisasi->lastPage(); $i++)
                                        <li class="page-item {{ $imunisasi->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link"
                                               href="{{ $imunisasi->url($i) }}#imunisasi-content">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor

                                    {{-- Next Page Link --}}
                                    <li class="page-item {{ $imunisasi->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link"
                                           href="{{ $imunisasi->appends(['imunisasi_page' => $imunisasi->currentPage()])->nextPageUrl() }}#imunisasi-content"
                                           aria-label="Next">
                                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
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
            // Kirim POST request ke route logout
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
                }).then(() => {
                    window.location.href = '/';
                });
            })
            .catch((error) => {
                console.error("Logout error:", error);
            });
        }
    });
}

        // Add navbar animation code
        document.addEventListener('DOMContentLoaded', function() {
            // Get all nav icons except logo and logout
            const navIcons = document.querySelectorAll('.nav-icon:not(:first-child):not(.logout)');

            // Create the sliding indicator element
            const indicator = document.createElement('div');
            indicator.className = 'nav-indicator';
            document.querySelector('.vertical-navbar').appendChild(indicator);

            // Position the indicator at the currently active menu item on load
            const activeIcon = document.querySelector('.nav-icon.active');
            if (activeIcon) {
                positionIndicator(activeIcon);
            }

            // Add click event listeners to all nav icons
            navIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    // If clicking on the icon itself
                    if (e.target.tagName === 'I') {
                        e.preventDefault();

                        // Get the parent anchor href
                        const href = this.querySelector('a').getAttribute('href');

                        // Handle the active class and animation
                        handleNavClick(this, href);
                    }
                });
            });

            // Add click event listeners to all anchors within nav icons
            document.querySelectorAll('.nav-icon a').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const navIcon = this.parentElement;
                    const href = this.getAttribute('href');

                    // Handle the active class and animation
                    handleNavClick(navIcon, href);
                });
            });

            // Function to handle nav click animation and navigation
            function handleNavClick(clickedIcon, href) {
                // Skip if already active
                if (clickedIcon.classList.contains('active')) return;

                // Remove active class from current active icon
                const currentActive = document.querySelector('.nav-icon.active');
                if (currentActive) {
                    currentActive.classList.remove('active');
                }

                // Add active class to clicked icon
                clickedIcon.classList.add('active');

                // Animate the indicator
                positionIndicator(clickedIcon);

                // Navigate after animation completes
                setTimeout(() => {
                    window.location.href = href;
                }, 300);
            }

            // Function to position the indicator
            function positionIndicator(targetIcon) {
                const rect = targetIcon.getBoundingClientRect();
                const navbarRect = document.querySelector('.vertical-navbar').getBoundingClientRect();

                // Calculate position relative to navbar
                const top = rect.top - navbarRect.top;

                // Update indicator position
                indicator.style.top = top + 'px';
            }

            // Handle tab persistence on page reload
            const url = window.location.href;
            if (url.includes('#')) {
                const tabId = url.split('#')[1];
                const tabElement = document.querySelector(`button[data-bs-target="#${tabId}"]`);
                if (tabElement) {
                    const tabTrigger = new bootstrap.Tab(tabElement);
                    tabTrigger.show();
                }
            }
        });

        // Function for table search
        function searchTable(tableId, query) {
            const table = document.getElementById(tableId);
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(query.toLowerCase()) > -1) {
                        found = true;
                        break;
                    }
                }

                rows[i].style.display = found ? '' : 'none';
            }
        }
    </script>
</body>
</html>
