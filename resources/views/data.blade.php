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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard Admin</title>
</head>
<style>
    body { font-family: 'Poppins', 'Roboto', -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif; }


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



    /* Fix for action buttons alignment */
    .action-buttons {
    text-align: center; /* td kembali normal */
}

.action-buttons > div {
    display: flex;
    gap: 8px;
    justify-content: center;
    align-items: center;
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

@if(session('success'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        icon: 'success',
        timer: 2000,
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: "{{ session('error') }}",
        icon: 'error',
        timer: 2000,
        confirmButtonText: 'OK'
    });
</script>
@endif

    <div class="vertical-navbar">
        <div class="nav-logo">
            <img src="{{ asset('image/logo_polije.png') }}" alt="Logo">
             <span class="nav-text">POLIJE SIP</span>
        </div>
        <div class="nav-icon">
            <a href="dashboard">
                <i class="fas fa-th-large"></i>
                 <span class="nav-text">Dashboard</span>
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
<ul class="nav nav-tabs" id="dataTabs" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#orangtua-content" type="button" role="tab">
      <i class="fas fa-user-friends me-2"></i>Orang Tua
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="anak-tab" data-bs-toggle="tab" data-bs-target="#anak-content" type="button" role="tab">
      <i class="fas fa-child me-2"></i>Anak
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pelayanan-tab" data-bs-toggle="tab" data-bs-target="#pelayanan-content" type="button" role="tab">
      <i class="fas fa-notes-medical me-2"></i>Pelayanan
    </button>
  </li>
</ul>
<!-- Tab content -->
<div class="tab-content" id="dataTabsContent">
  <!-- Orang Tua -->
  <div class="tab-pane fade show active" id="orangtua-content" role="tabpanel">
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title fw-bold">Data Orang Tua</h5>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="search-container" style="width: 250px;">
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Cari orang tua..." onkeyup="searchTable('orangtuaTable', this.value)">
          </div>
          <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalOrangtua">
            <i class="fas fa-plus"></i> Tambah Data
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0" id="orangtuaTable">
            <thead>
              <tr>
                <th>Nama Orang Tua</th>
                <th>NIK</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>Riwayat Penyakit</th>
                <th>Jenis Penyakit</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Loop data dari controller -->
              @foreach($orangtua as $ortu)
              <tr>
                <td>{{ $ortu->nama_orangtua }}</td>
                <td>{{ $ortu->nik }}</td>
                <td>{{ $ortu->usia_orangtua }}</td>
                <td>{{ $ortu->jenis_kelamin_orangtua }}</td>
                <td>{{ $ortu->pekerjaan }}</td>
                <td>{{ $ortu->alamat }}</td>
                <td>{{ $ortu->riwayat_penyakit }}</td>
                <td>{{ $ortu->jenis_penyakit }}</td>
                <td class="text-center action-buttons">
                 <button
                    class="btn btn-sm btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#editOrangtua{{ $ortu->id_orangtua }}">
                    <i class="fas fa-edit"></i>
                    </button>


                  <form action="{{ route('orangtua.destroy', $ortu->id_orangtua) }}" method="POST" class="d-inline delete-form">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination for orangtua -->
        @if($orangtua->hasPages())
        <div class="pagination-container">
            <nav aria-label="Page navigation for orangtua">
                <ul class="pagination">
                    {{-- Previous --}}
                    <li class="page-item {{ $orangtua->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                        href="{{ $orangtua->previousPageUrl() }}#orangtua-content"
                        aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>

                    {{-- Numbers --}}
                    @for($i = 1; $i <= $orangtua->lastPage(); $i++)
                        <li class="page-item {{ $orangtua->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link"
                            href="{{ $orangtua->url($i) }}#orangtua-content">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    {{-- Next --}}
                    <li class="page-item {{ $orangtua->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link"
                        href="{{ $orangtua->nextPageUrl() }}#orangtua-content"
                        aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        @endif

      </div>
    </div>
  </div>

<!-- Anak -->
<div class="tab-pane fade" id="anak-content" role="tabpanel">
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title fw-bold">Data Anak</h5>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="search-container" style="width: 250px;">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control"
                        placeholder="Cari anak..."
                        onkeyup="searchTable('anakTable', this.value)">
                </div>
                <button class="btn btn-success btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalAnak">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0" id="anakTable">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama Orang Tua</th>
                            <th>Nama Anak</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Imunisasi</th>
                            <th>Tanggal Imunisasi</th>
                            <th>Tinggi</th>
                            <th>Berat</th>
                            <th>Status Gizi</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $imunList = [
                            'hepatitis_b' => 'Hepatitis B',
                            'bcg' => 'BCG',
                            'polio' => 'Polio',
                            'dpt_hb_hib' => 'DPT-HB-HIB',
                            'pcv' => 'PCV',
                            'rota' => 'Rota Virus',
                            'campak_rubella' => 'Campak Rubella'
                        ];
                        @endphp

                        @foreach($anak as $child)
                        <tr>
                            <td>{{ $child->nik }}</td>
                            <td>{{ $child->nama_ortu }}</td>
                            <td>{{ $child->nama_anak }}</td>
                            <td>{{ $child->tanggal_lahir }}</td>
                            <td>{{ $child->usia_anak }}</td>
                            <td>{{ $child->jenis_kelamin_anak }}</td>

                            <td style="white-space: nowrap;">
                                @foreach($imunList as $key => $label)
                                @php
                                $status = $child->{'imunisasi_'.$key};
                                $icon = $status == 'ya' ? '✓' : '✗';
                                $color = $status == 'ya' ? '#0a8f35' : '#d00';
                                @endphp
                                <span style="color: {{ $color }}; font-weight:bold;">
                                    {{ $icon }}
                                </span>
                                {{ $label }} <br>
                                @endforeach
                            </td>

                            <td style="white-space: nowrap;">
                                @foreach($imunList as $key => $label)
                                {{ $child->{'tanggal_'.$key} ?? '-' }} <br>
                                @endforeach
                            </td>

                            <td>{{ $child->tinggi_badan }}</td>
                            <td>{{ $child->berat_badan }}</td>
                            <td>{{ $child->kesimpulan }}</td>

                            <td class="text-center action-buttons">
                                <button class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editAnak{{ $child->id_anak }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('anak.destroy',$child->id_anak) }}"
                                    method="POST"
                                    class="d-inline delete-form">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            @if($anak->hasPages())
            <div class="pagination-container">
                <nav aria-label="Page navigation for anak">
                    <ul class="pagination">
                        <li class="page-item {{ $anak->onFirstPage() ? 'disabled':'' }}">
                            <a class="page-link"
                                href="{{ $anak->previousPageUrl() }}#anak-content">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>

                        @for($i = 1; $i <= $anak->lastPage(); $i++)
                        <li class="page-item {{ $anak->currentPage()==$i?'active':'' }}">
                            <a class="page-link"
                                href="{{ $anak->url($i) }}#anak-content">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor

                        <li class="page-item {{ $anak->hasMorePages()?'':'disabled' }}">
                            <a class="page-link"
                                href="{{ $anak->nextPageUrl() }}#anak-content">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endif

        </div>
    </div>
</div>



<!-- Pelayanan -->
  <div class="tab-pane fade" id="pelayanan-content" role="tabpanel">
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title fw-bold">Data Pelayanan</h5>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="search-container" style="width: 250px;">
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Cari pelayanan..." onkeyup="searchTable('pelayananTable', this.value)">
          </div>
          <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalPelayanan">
            <i class="fas fa-plus"></i> Tambah Data
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0" id="pelayananTable">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Tanggal Pelayanan</th>
                <th>Detail Pelayanan</th>
                <th>Jenis Pelayanan</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pelayanan as $layanan)
              <tr>
                <td>{{ $layanan->nama_pasien }}</td>
                <td>{{ $layanan->tanggal_pelayanan }}</td>
                <td>{{ $layanan->program_kesehatan }}</td>
                <td>{{ $layanan->jenis_pelayanan }}</td>
                <td class="text-center action-buttons">
                    <button
                    class="btn btn-sm btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#editPelayanan{{ $layanan->id_pelayanan }}">
                    <i class="fas fa-edit"></i>
                    </button>



                  <form action="{{ route('pelayanan.destroy', $layanan->id_pelayanan) }}" method="POST" class="d-inline delete-form">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination for pelayanan -->
        @if($pelayanan->hasPages())
        <div class="pagination-container">
            <nav aria-label="Page navigation for pelayanan">
                <ul class="pagination">
                    <li class="page-item {{ $pelayanan->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                        href="{{ $pelayanan->previousPageUrl() }}#pelayanan-content"
                        aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>

                    @for($i = 1; $i <= $pelayanan->lastPage(); $i++)
                        <li class="page-item {{ $pelayanan->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link"
                            href="{{ $pelayanan->url($i) }}#pelayanan-content">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    <li class="page-item {{ $pelayanan->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link"
                        href="{{ $pelayanan->nextPageUrl() }}#pelayanan-content"
                        aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
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

{{-- ================== MODALS ================== --}}
@include('partials.modal_orangtua')
@include('partials.modal_anak')
@include('partials.modal_pelayanan')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ===========================
// GLOBAL FUNCTIONS (bisa dipakai semua)
// ===========================
function hidePagination(){
    document.querySelectorAll('.pagination-container').forEach(el=>{
        el.style.display='none';
    });
}

function showPagination(){
    document.querySelectorAll('.pagination-container').forEach(el=>{
        el.style.display='';
    });
}

function searchTable(tableId,query){
    const table = document.getElementById(tableId);
    if(!table) return;

    const rows = table.tBodies[0].rows;
    const q = query.toLowerCase();

    if(q==='') showPagination();
    else hidePagination();

    for(let r of rows){
        let text = r.innerText.toLowerCase();
        r.style.display = text.includes(q) ? '' : 'none';
    }
}

// ===========================
// SAAT DOKUMEN SELESAI LOAD
// ===========================
document.addEventListener('DOMContentLoaded', function () {

    // ===========================
    // 1) Pagination hide saat fokus
    // ===========================
    const searchSelectors = [
        'input[placeholder="Cari orang tua..."]',
        'input[placeholder="Cari anak..."]',
        'input[placeholder="Cari pelayanan..."]'
    ];

    searchSelectors.forEach(sel=>{
        const input = document.querySelector(sel);
        if(input){
            input.addEventListener('focus', hidePagination);
        }
    });

    // ===========================
    // 2) Logout SweetAlert
    // ===========================
    window.handleLogout = function(){
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
                    }).then(() => {
                        window.location.href = '/';
                    });
                });
            }
        });
    };

    // ===========================
    // 3) Navbar indicator
    // ===========================
    const navbar = document.querySelector('.vertical-navbar');
    if(navbar){
        const indicator = document.createElement('div');
        indicator.className = 'nav-indicator';
        navbar.appendChild(indicator);

        function positionIndicator(icon){
            const rect = icon.getBoundingClientRect();
            const navbarRect = navbar.getBoundingClientRect();
            indicator.style.top = (rect.top - navbarRect.top) + 'px';
        }

        const activeIcon = document.querySelector('.nav-icon.active');
        if(activeIcon) positionIndicator(activeIcon);

        document.querySelectorAll('.nav-icon a').forEach(a=>{
            a.addEventListener('click',function(){
                const icon = this.closest('.nav-icon');
                document.querySelector('.nav-icon.active')?.classList.remove('active');
                icon.classList.add('active');
                positionIndicator(icon);
            });
        });
    }

    // ===========================
    // 4) Tab fragment URL
    // ===========================
    function activateTabFromHash() {
        const hash = window.location.hash;
        const btn = document.querySelector(`button[data-bs-target="${hash}"]`);
        if (btn) new bootstrap.Tab(btn).show();
    }

    activateTabFromHash();

    document.querySelectorAll('button[data-bs-toggle="tab"]').forEach(btn=>{
        btn.addEventListener('shown.bs.tab', (e)=>{
            const target = e.target.getAttribute('data-bs-target');
            const baseUrl = window.location.pathname + window.location.search;
            history.replaceState(null,'',baseUrl + target);
        });
    });

    window.addEventListener('hashchange', activateTabFromHash);

    // ===========================
    // 5) Delete confirm alert
    // ===========================
    document.querySelectorAll('.delete-form').forEach(form=>{
        form.addEventListener('submit',function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result)=>{
                if(result.isConfirmed){
                    form.submit();
                }
            });
        });
    });

});
</script>

</body>
</html>
