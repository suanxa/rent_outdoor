<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suanxa | Daftar Peralatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('partials.navbar')

<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Daftar Peralatan Outdoor</h1>
    <p class="text-center mb-5">Temukan perlengkapan outdoor terbaik untuk petualangan Anda. Semua alat terawat dan siap pakai!</p>
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="fw-bold">Rp {{ number_format($item->rental_price, 0, ',', '.') }} / malam</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <!-- Tombol Sewa Sekarang -->
    <div class="text-center mt-5">
        <a href="/rentals" class="btn btn-lg btn-primary px-5">Sewa Sekarang</a>
    </div>
</div>

<footer class="bg-dark text-white py-4 text-center mt-5">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Suanxa Rent Outdoor. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
