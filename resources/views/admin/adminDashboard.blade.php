<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suanxa | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h3 class="text-center mb-4">Admin Panel</h3>
        <a href="/admin-dashboard" class="{{ Request::is('admin-dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="/admin/customers" class="{{ Request::is('admin/customers') ? 'active' : '' }}">Customer</a>
        <a href="/admin/items" class="{{ Request::is('admin/items') ? 'active' : '' }}">Item</a>
        <a href="/admin/rentals" class="{{ Request::is('admin/rentals') ? 'active' : '' }}">Rental</a>
        <a href="/" class="mt-5 text-warning">← Kembali ke Beranda</a>
    </div>

    <!-- Main Content -->
    <div class="content flex-grow-1 p-4">
        {{-- Jika ada section content di child view --}}
        @yield('content')

        {{-- Default content dashboard admin kalau tidak ada yield content --}}
        @if (!View::hasSection('content'))
        <h2 class="mb-4">Selamat Datang, Admin Suanxa!</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom text-center p-4">
                    <img src="https://img.icons8.com/ios-filled/64/000000/user-group-man-man.png" alt="Customer">
                    <h4 class="mt-3">Customer</h4>
                    <p class="text-muted">Kelola data penyewa outdoor</p>
                    <a href="/admin/customers" class="btn btn-outline-primary">Lihat Data</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom text-center p-4">
                    <img src="https://img.icons8.com/ios-filled/64/000000/camping-tent.png" alt="Item">
                    <h4 class="mt-3">Item</h4>
                    <p class="text-muted">Kelola daftar barang rental</p>
                    <a href="/admin/items" class="btn btn-outline-primary">Lihat Data</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom text-center p-4">
                    <img src="https://img.icons8.com/ios-filled/64/000000/reservation.png" alt="Rental">
                    <h4 class="mt-3">Rental</h4>
                    <p class="text-muted">Kelola data pemesanan rental</p>
                    <a href="/admin/rentals" class="btn btn-outline-primary">Lihat Data</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
