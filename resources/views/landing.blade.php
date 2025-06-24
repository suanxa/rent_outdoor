<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suanxa Rent Outdoor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .hero {
            background: url('https://images.unsplash.com/photo-1553440569-bcc63803a83d?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
            color: white;
            height: 100vh;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .section {
            padding: 80px 0;
        }
        .nav-link.active {
            color: #ffc107 !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#beranda">
            <img src="https://img.icons8.com/external-flat-juicy-fish/32/ffffff/external-backpack-travel-flat-flat-juicy-fish.png" alt="Logo" width="32" class="me-2">
            Suanxa Outdoor
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-semibold">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/items">Peralatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rentals">Rental</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ms-3" href="/login">
                        <img src="https://img.icons8.com/ios-glyphs/16/ffffff/user.png" class="me-1"> Login Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero pt-5 d-flex align-items-center justify-content-center text-center" id="beranda">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="display-3 fw-bold">Suanxa Rent Outdoor</h1>
        <p class="lead">Sewa perlengkapan camping, hiking, dan outdoor adventure terbaik di kota Anda!</p>
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

<!-- Footer -->
<footer class="bg-dark text-white py-4 text-center">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Suanxa Rent Outdoor. All Rights Reserved.</p>
    </div>
</footer>

<!-- Script Highlight Menu -->
<script>
    const sections = document.querySelectorAll(".hero, .section");
    const navLinks = document.querySelectorAll(".nav-link");

    window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop - 120;
        if (pageYOffset >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    // Kalau udah mentok bawah, paksa highlight menu Kontak
    if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 2) {
        current = "kontak";
    }

    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
