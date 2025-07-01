@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}#beranda">
            <img src="{{ asset('images/suanxashop.png') }}" alt="Logo" width="40" class="me-1">
            Suanxa Outdoor
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-semibold">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/items">Peralatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rentals">Rental</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#kontak">Kontak</a>
                </li>

                @if(auth()->check())
                <li class="nav-item dropdown">
                    <a class="btn btn-primary dropdown-toggle ms-3" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="{{ asset('images/suanxashop.png') }}" class="me-1 navbar-profile-pic">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-primary ms-3" href="/login">
                        <img src="https://img.icons8.com/ios-glyphs/16/ffffff/user.png" class="me-1"> Login Admin
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav> --}}

<!-- Hero Section -->
<div class="hero pt-5 d-flex align-items-center justify-content-center text-center" id="beranda">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="display-3 fw-bold">Suanxa Rent Outdoor</h1>
        <p class="lead">Explore Nature Easily</p>
        <a href="/rentals" class="btn btn-primary btn-lg mt-3">Mulai Sewa Sekarang</a>
    </div>
</div>

<!-- Kenapa Pilih Kami -->
<div class="section text-center" id="peralatan">
    <div class="container">
        <h2 class="mb-4">Kenapa Pilih Suanxa?</h2>
        <div class="row">
            <div class="col-md-4">
                <h4>Peralatan Berkualitas</h4>
                <p>Semua alat outdoor kami terawat dengan baik dan rutin dicek sebelum disewakan.</p>
            </div>
            <div class="col-md-4">
                <h4>Harga Terjangkau</h4>
                <p>Dapatkan harga sewa paling kompetitif dengan promo menarik setiap minggunya.</p>
            </div>
            <div class="col-md-4">
                <h4>Layanan Ramah</h4>
                <p>Tim kami siap membantu Anda menemukan perlengkapan outdoor yang Anda butuhkan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Promo Section -->
<div class="section bg-light text-center" id="rental">
    <div class="container">
        <h2 class="mb-4">Promo Minggu Ini!</h2>
        <p class="lead">Dapatkan diskon 25% untuk semua paket camping minimal 2 malam sewa!</p>
        <a href="/items" class="btn btn-success btn-lg">Lihat Peralatan</a>
    </div>
</div>

<!-- Galeri Peralatan -->
<div class="section text-center">
    <div class="container">
        <h2 class="mb-5">Galeri Peralatan Outdoor</h2>
        <div class="row g-3">
            <div class="col-md-4"><img src="https://source.unsplash.com/featured/?tent" class="img-fluid rounded"></div>
            <div class="col-md-4"><img src="https://source.unsplash.com/featured/?hiking" class="img-fluid rounded"></div>
            <div class="col-md-4"><img src="https://source.unsplash.com/featured/?camping" class="img-fluid rounded"></div>
        </div>
    </div>
</div>

<!-- Testimoni -->
<div class="section bg-light text-center">
    <div class="container">
        <h2 class="mb-4">Apa Kata Pelanggan Kami</h2>
        <div class="row">
            <div class="col-md-4">
                <blockquote>"Peralatannya lengkap dan bersih, adminnya juga ramah banget!"</blockquote>
                <p>- Rina, Padang</p>
            </div>
            <div class="col-md-4">
                <blockquote>"Sangat membantu saat mendaki ke Gunung Marapi, recommended!"</blockquote>
                <p>- Dedi, Bukittinggi</p>
            </div>
            <div class="col-md-4">
                <blockquote>"Harga sewa oke, barangnya kualitas top. Sukses terus Suanxa!"</blockquote>
                <p>- Yoga, Solok</p>
            </div>
        </div>
    </div>
</div>

<!-- Kontak -->
<div class="section text-center" id="kontak">
    <div class="container">
        <h2 class="mb-4">Hubungi Kami</h2>
        <form class="row g-3 justify-content-center">
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Nama Anda">
            </div>
            <div class="col-md-5">
                <input type="email" class="form-control" placeholder="Email Anda">
            </div>
            <div class="col-md-10">
                <textarea class="form-control" rows="4" placeholder="Pesan Anda"></textarea>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-lg w-100">Kirim Pesan</button>
            </div>
        </form>
    </div>
</div>
{{-- 
<!-- Footer -->
<footer class="bg-dark text-white py-4 text-center">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Suanxa Rent Outdoor. All Rights Reserved.</p>
    </div>
</footer> --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('scriptJS/script.js') }}"></script>

<!-- Smooth scroll ke anchor jika ada -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash) {
        const target = document.querySelector(window.location.hash);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
</script> --}}

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash) {
      const target = document.querySelector(window.location.hash);
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
</script>
@endpush

@endsection

</body>
</html>
