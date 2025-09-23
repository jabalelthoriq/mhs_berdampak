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

    /* PERBAIKAN: CSS untuk gambar logo */
    .nav-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block; /* Pastikan gambar ditampilkan sebagai block */
    }

    /* Efek hover opsional */
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

        /* Perbaikan responsif untuk logo */
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
   </style>
<body>
   <div class="vertical-navbar">
        <div class="nav-logo" >
            <img src="{{ asset('image/logo polije.png') }}" alt="Logo">
             <span class="nav-text">POLIJE SIP</span>
        </div>

        <div class="nav-icon">
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

          <div class="nav-icon active">
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
            <h2 class="fs-3 fw-bold m-0">Pengaturan</h2>
        </div>

       <!-- Tab navigation -->
<ul class="nav nav-tabs" id="pengaturanTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-content" type="button" role="tab" aria-controls="profile-content" aria-selected="true">
            <i class="fas fa-user-circle me-2"></i>Profile
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security-content" type="button" role="tab" aria-controls="security-content" aria-selected="false">
            <i class="fas fa-shield-alt me-2"></i>Keamanan
        </button>
    </li>
</ul>

<div class="tab-content" id="pengaturanTabsContent">

    <!-- Tab Profile -->
    <div class="tab-pane fade show active" id="profile-content" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card p-4">
            <h5 class="fw-bold mb-4"><i class="fas fa-id-card me-2 text-primary"></i>Pengaturan Profile</h5>
            <div class="row">
                <!-- Foto Profil -->
                <div class="col-md-4 text-center border-end d-flex flex-column align-items-center justify-content-center">
                    <img id="previewFoto" src="https://via.placeholder.com/150" alt="Foto Profil" class="rounded-circle shadow mb-3" width="150" height="150">
                    <input type="file" class="form-control mt-2" onchange="previewImage(event)">
                </div>

                <!-- Data Profile -->
                <div class="col-md-8">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama lengkap" value="Admin SIP">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Masukkan email" value="admin@example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" placeholder="Masukkan nomor telepon" value="08123456789">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat anda">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 px-4">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab Keamanan -->
    <div class="tab-pane fade" id="security-content" role="tabpanel" aria-labelledby="security-tab">
        <div class="card p-4">
            <h5 class="fw-bold mb-4"><i class="fas fa-lock me-2 text-danger"></i>Pengaturan Keamanan</h5>
            <form>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 p-3 h-100">
                            <h6 class="fw-bold text-muted mb-3"><i class="fas fa-key me-2"></i>Password Lama</h6>
                            <input type="password" class="form-control" placeholder="Masukkan password lama">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 p-3 h-100">
                            <h6 class="fw-bold text-muted mb-3"><i class="fas fa-lock me-2"></i>Password Baru</h6>
                            <input type="password" class="form-control" placeholder="Masukkan password baru">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 p-3 h-100">
                            <h6 class="fw-bold text-muted mb-3"><i class="fas fa-check me-2"></i>Konfirmasi Password</h6>
                            <input type="password" class="form-control" placeholder="Ulangi password baru">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger mt-4 px-4">
                    <i class="fas fa-sync-alt me-2"></i>Ubah Password
                </button>
            </form>
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
        });




    // Preview Foto Profil
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById("previewFoto").src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    </script>
</body>
</html>
