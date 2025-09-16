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
    margin: 0 0 12px 0; /* Hilangkan margin top */
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.2s ease;
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
   </style>
<body>
   <div class="vertical-navbar">
        <div class="nav-logo" >
            <img src="{{ asset('image/logo polije.png') }}" alt="Logo">
        </div>
        <div class="nav-icon">
            <a href="dashboard">
                <i class="fas fa-th-large"></i>
            </a>
        </div>

        <div class="nav-icon active">
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
            <h2 class="fs-3 fw-bold m-0">Input Data</h2>
        </div>

        <div class="row g-4 mb-4">
            <!-- Card 1 - Total Users -->
            <div class="col-md-4">
                <div class="card shadow-sm stats-card">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Total Users</p>
                            {{-- <h2 class="display-6 fw-bold mb-0">{{ number_format($totalUsers) }}</h2> --}}
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
                            <p class="text-muted small text-uppercase fw-semibold mb-2">User Pregnant</p>
                            {{-- <h2 class="display-6 fw-bold mb-0">{{ number_format($totalPregnant) }}</h2> --}}
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
                            <p class="text-muted small text-uppercase fw-semibold mb-2">Total Midwaves</p>
                            {{-- <h2 class="display-6 fw-bold mb-0">{{ number_format($totalMidwife) }}</h2> --}}
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
            // Tampilkan notifikasi berhasil logout
            Swal.fire({
                title: 'Berhasil Logout!',
                text: 'Anda telah keluar dari aplikasi',
                icon: 'success',
                timer: 2000,
                showConfirmButton: true
            }).then(() => {
                // Redirect setelah notifikasi selesai
                window.location.href = '/';
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
    </script>
</body>
</html>
