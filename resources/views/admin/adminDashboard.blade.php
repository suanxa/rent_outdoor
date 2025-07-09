<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suanxa | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-light: #4caf50;
            --primary-dark: #1b5e20;
            --secondary: #8bc34a;
            --accent: #689f38;
            --cream: #f5f5e9;
            --cream-light: #fafaf5;
            --cream-dark: #e8e8d8;
            --dark: #263238;
            --light: #ffffff;
            --gray: #757575;
            --success: #4caf50;
            --warning: #ff9800;
            --danger: #f44336;
            --sidebar-width: 280px;
            --topbar-height: 70px;
        }
        
        /* Base Styles */
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--cream);
            color: var(--dark);
            overflow-x: hidden;
        }
        
        /* Glass Morphism Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--primary-dark);
            color: white;
            height: 100vh;
            position: fixed;
            z-index: 100;
            transition: all 0.3s ease;
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            background-color: var(--primary);
        }
        
        .brand-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-bottom: 1rem;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
            transition: all 0.3s ease;
        }
        
        .brand-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: white;
            letter-spacing: 1px;
        }
        
        .sidebar-menu {
            padding: 1.5rem 0;
            background-color: var(--primary-dark);
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            margin: 0.25rem 1rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .menu-item:hover, .menu-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }
        
        .menu-item.active {
            background: linear-gradient(to right, rgba(255, 255, 255, 0.2), transparent);
            border-left: 3px solid var(--secondary);
        }
        
        .menu-icon {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            transition: all 0.3s ease;
        }
        
        .menu-item.active .menu-icon {
            background: var(--secondary);
            color: var(--primary-dark);
        }
        
        .menu-text {
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            background-color: var(--primary-dark);
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        .logout-btn {
            background: transparent;
            border: none;
            color: rgba(255,255,255,0.8);
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        /* Main Content */
        .admin-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
            background-color: var(--cream);
        }
        
        /* Topbar */
        .admin-topbar {
            height: var(--topbar-height);
            background: var(--light);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 90;
            border-bottom: 1px solid var(--cream-dark);
        }
        
        .search-box {
            position: relative;
            width: 300px;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        .search-box input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid var(--cream-dark);
            border-radius: 30px;
            transition: all 0.3s ease;
            background: var(--cream-light);
        }
        
        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            background: var(--light);
            outline: none;
        }
        
        .admin-profile {
            display: flex;
            align-items: center;
        }
        
        .profile-info {
            text-align: right;
            margin-right: 1rem;
        }
        
        .greeting {
            display: block;
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        .role {
            display: block;
            font-size: 0.8rem;
            background: var(--primary);
            color: white;
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--primary);
        }
        
        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Content Area */
        .content-wrapper {
            padding: 2rem;
        }
        
        /* Welcome Section */
        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }
        
        .welcome-section h1 span {
            color: var(--primary);
        }
        
        .welcome-text {
            color: var(--gray);
            margin-bottom: 2rem;
            font-size: 1.1rem;
            max-width: 600px;
            line-height: 1.6;
        }
        
        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .stats-card {
            background: var(--light);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
            display: flex;
            align-items: center;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        
        .stats-card:nth-child(1) .card-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .stats-card:nth-child(2) .card-icon {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }
        
        .stats-card:nth-child(3) .card-icon {
            background: linear-gradient(135deg, var(--accent), var(--secondary));
        }
        
        .card-content {
            flex: 1;
        }
        
        .stats-card h3 {
            font-size: 1rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .card-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .card-link:hover {
            color: var(--primary-dark);
        }
        
        .card-link i {
            margin-left: 0.5rem;
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }
        
        .card-link:hover i {
            transform: translateX(3px);
        }
        
        /* Recent Activity */
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 3px;
        }
        
        .activity-list {
            background: var(--light);
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        
        .activity-item {
            display: flex;
            padding: 1rem;
            border-bottom: 1px solid var(--cream-dark);
            transition: all 0.3s ease;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-item:hover {
            background: var(--cream-light);
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            background: rgba(76, 175, 80, 0.1);
            color: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-content p {
            margin-bottom: 0.3rem;
            color: var(--dark);
        }
        
        .activity-time {
            font-size: 0.8rem;
            color: var(--gray);
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .admin-sidebar {
                width: 80px;
                overflow: hidden;
            }
            
            .sidebar-header {
                padding: 1rem 0.5rem;
            }
            
            .brand-title, .menu-text {
                display: none;
            }
            
            .menu-icon {
                margin-right: 0;
            }
            
            .logout-btn span {
                display: none;
            }
            
            .admin-content {
                margin-left: 80px;
            }
        }
        
        @media (max-width: 768px) {
            .admin-topbar {
                flex-direction: column;
                height: auto;
                padding: 1rem;
            }
            
            .search-box {
                width: 100%;
                margin-bottom: 1rem;
            }
            
            .admin-profile {
                width: 100%;
                justify-content: space-between;
            }
            
            .content-wrapper {
                padding: 1rem;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .welcome-section h1 {
                font-size: 2rem;
            }
        }
        
        /* Animation Effects */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .stats-card {
            animation: fadeIn 0.5s ease forwards;
        }
        
        .stats-card:nth-child(1) { animation-delay: 0.1s; }
        .stats-card:nth-child(2) { animation-delay: 0.2s; }
        .stats-card:nth-child(3) { animation-delay: 0.3s; }
        
        .activity-item {
            animation: fadeIn 0.5s ease forwards;
        }
        
        .activity-item:nth-child(1) { animation-delay: 0.4s; }
        .activity-item:nth-child(2) { animation-delay: 0.5s; }
        .activity-item:nth-child(3) { animation-delay: 0.6s; }
    </style>
</head>
<body class="admin-body">

<!-- Main Wrapper -->
<div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/suanxashop.png') }}" alt="Suanxa Logo" class="brand-logo">
            <h3 class="brand-title">Suanxa <span>Admin</span></h3>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <div class="menu-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <span class="menu-text">Dashboard</span>
            </a>
            
            <a href="/admin/customers" class="menu-item {{ Request::is('admin/customers') ? 'active' : '' }}">
                <div class="menu-icon">
                    <i class="fas fa-users"></i>
                </div>
                <span class="menu-text">Customer</span>
            </a>
            
            <a href="/admin/items" class="menu-item {{ Request::is('admin/items') ? 'active' : '' }}">
                <div class="menu-icon">
                    <i class="fas fa-campground"></i>
                </div>
                <span class="menu-text">Item</span>
            </a>
            
            <a href="/admin/rentals" class="menu-item {{ Request::is('admin/rentals') ? 'active' : '' }}">
                <div class="menu-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <span class="menu-text">Rental</span>
            </a>
        </div>
        
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Kembali ke Beranda</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Navigation -->
        <div class="admin-topbar glass-card">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari sesuatu...">
            </div>
            <div class="admin-profile">
                <div class="profile-info">
                    <span class="greeting">Halo, Suanxa</span>
                    <span class="role">Admin</span>
                </div>
                <div class="profile-pic">
                    <img src="{{ asset('images/suanxashop.png') }}" alt="Admin Profile">
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-wrapper">
            {{-- Jika ada section content di child view --}}
            @yield('content')

            {{-- Default content dashboard admin kalau tidak ada yield content --}}
            @if (!View::hasSection('content'))
            <div class="welcome-section">
                <h1>Selamat Datang, <span>Admin Suanxa!</span></h1>
                <p class="welcome-text">Kelola sistem rental outdoor dengan mudah melalui dashboard ini. Pantau aktivitas terbaru, kelola item, dan lihat statistik penting untuk bisnis Anda.</p>
                
                <div class="stats-cards">
                    <div class="stats-card">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-content">
                            <h3>Total Customer</h3>
                            <p class="stat-number">6</p>
                            <a href="/admin/customers" class="card-link">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="card-icon">
                            <i class="fas fa-campground"></i>
                        </div>
                        <div class="card-content">
                            <h3>Total Item</h3>
                            <p class="stat-number">5</p>
                            <a href="/admin/items" class="card-link">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="card-content">
                            <h3>Total Rental</h3>
                            <p class="stat-number">129</p>
                            <a href="/admin/rentals" class="card-link">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="recent-activity">
                    <h2 class="section-title">Aktivitas Terkini</h2>
                    <div class="activity-list glass-card">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Customer baru</strong> mendaftar - CINOPS Tarandam</p>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Rental baru</strong> dibuat oleh DIMASSEH</p>
                                <span class="activity-time">5 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-campground"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Item baru</strong> ditambahkan - Tenda Dome 4P</p>
                                <span class="activity-time">Kemarin, 15:32</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Add active class to current menu item
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        document.querySelectorAll('.menu-item').forEach(item => {
            if (item.getAttribute('href') === currentPath) {
                item.classList.add('active');
            }
        });
        
        // Initialize charts
        const ctx = document.getElementById('statsChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Customer', 'Items', 'Rentals'],
                    datasets: [{
                        label: 'Statistics',
                        data: [1248, 86, 324],
                        backgroundColor: [
                            'rgba(46, 125, 50, 0.7)',
                            'rgba(76, 175, 80, 0.7)',
                            'rgba(139, 195, 74, 0.7)'
                        ],
                        borderColor: [
                            'rgba(46, 125, 50, 1)',
                            'rgba(76, 175, 80, 1)',
                            'rgba(139, 195, 74, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>
</body>
</html>