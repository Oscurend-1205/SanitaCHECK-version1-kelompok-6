<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Petugas Area | SanitaCheck')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sanita-green: #1b5e3a;
            --sanita-green-light: #e8f5e9;
            --sanita-green-hover: #14492d;
            --bg-body: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: #333;
            /* Padding bottom agar konten tidak tertutup bottom navbar */
            padding-bottom: 80px; 
            padding-top: 60px; /* Ruang untuk top navbar */
        }

        /* Top Navbar Custom */
        .top-navbar {
            background-color: var(--sanita-green);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .top-navbar .navbar-brand {
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }

        /* Bottom Navigation Bar */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #ffffff;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-around;
            padding: 0.5rem 0;
            z-index: 1030;
            border-top: 1px solid #eaeaea;
        }

        .bottom-nav-item {
            text-decoration: none;
            color: #6c757d;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 500;
            width: 25%;
            transition: all 0.2s ease;
        }

        .bottom-nav-item i {
            font-size: 1.25rem;
            margin-bottom: 2px;
        }

        .bottom-nav-item.active {
            color: var(--sanita-green);
        }

        .bottom-nav-item.active i {
            font-weight: 800; /* Bikin icon terisi/bold */
        }

        /* Custom Flash Message */
        .alert-floating {
            position: fixed;
            top: 70px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar fixed-top top-navbar">
        <div class="container-fluid d-flex justify-content-center">
            <span class="navbar-brand mb-0 h1 d-flex align-items-center">
                <i class="bi bi-shield-check me-2"></i> SanitaCheck
            </span>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-floating" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-floating" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="container py-3">
        @yield('content')
    </main>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <!-- Tambahkan class 'active' sesuai logic request()->routeIs() nantinya -->
        <a href="{{ route('petugas.dashboard') ?? '#' }}" class="bottom-nav-item {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i>
            <span>Beranda</span>
        </a>
        <a href="{{ route('petugas.jadwal') ?? '#' }}" class="bottom-nav-item {{ request()->routeIs('petugas.jadwal') ? 'active' : '' }}">
            <i class="bi bi-calendar2-check"></i>
            <span>Jadwal</span>
        </a>
        <a href="{{ route('petugas.riwayat') ?? '#' }}" class="bottom-nav-item {{ request()->routeIs('petugas.riwayat') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat</span>
        </a>
        <a href="{{ route('petugas.profil') ?? '#' }}" class="bottom-nav-item {{ request()->routeIs('petugas.profil') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
    </nav>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Auto-hide flash messages after 4 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                let alerts = document.querySelectorAll('.alert-floating');
                alerts.forEach(function(alert) {
                    let bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 4000);
        });
    </script>
    
    @stack('scripts')
</body>
</html>
