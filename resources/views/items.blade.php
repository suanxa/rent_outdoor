@extends('layouts.app')

@section('title', 'Daftar Peralatan')

@section('content')

<!-- Hero Banner -->
<div class="equipment-hero py-5">
    <div class="container py-5 text-center text-black">
        <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">Peralatan Outdoor Kami</h1>
        <p class="lead fs-4 animate__animated animate__fadeIn animate__delay-1s">Temukan perlengkapan premium untuk petualangan Anda</p>
        <div class="d-flex justify-content-center gap-3 mt-4 animate__animated animate__fadeInUp animate__delay-1s">
            <a href="#categories" class="btn btn-light btn-lg px-4 rounded-pill shadow-sm">
                <i class="fas fa-binoculars me-2"></i> Jelajahi Kategori
            </a>
            <a href="/rentals" class="btn btn-success btn-lg px-4 rounded-pill shadow-sm">
                <i class="fas fa-calendar-alt me-2"></i> Sewa Sekarang
            </a>
        </div>
    </div>
</div>

<!-- Equipment Categories -->
<div class="container py-5" id="categories">
    @foreach ($categories as $category)
    <div class="category-section mb-5">
        <div class="d-flex align-items-center mb-4">
            <div class="category-icon me-3">
                @switch($category->name)
                    @case('Tenda')
                        <i class="fas fa-campground"></i>
                        @break
                    @case('Sleeping Bag')
                        <i class="fas fa-bed"></i>
                        @break
                    @case('Peralatan Masak')
                        <i class="fas fa-utensils"></i>
                        @break
                    @case('Tas Gunung')
                        <i class="fas fa-hiking"></i>
                        @break
                    @case('Peralatan Pendakian')
                        <i class="fas fa-mountain"></i>
                        @break
                    @default
                        <i class="fas fa-hiking"></i>
                @endswitch
            </div>
            <h2 class="mb-0">{{ $category->name }}</h2>
        </div>
        
        <div class="row g-4">
            @foreach ($category->items as $item)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="equipment-card card h-100 border-0 shadow-sm overflow-hidden" style="background-color: #F5F5DC;">
                    <div class="equipment-image-container">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="price-badge">
                            Rp {{ number_format($item->rental_price, 0, ',', '.') }}<small>/malam</small>
                        </div>
                        <div class="equipment-overlay">
                            <a href="/rentals" class="btn btn-success btn-sm rounded-pill px-3">
                                <i class="fas fa-shopping-cart me-1"></i> Sewa Sekarang
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <div class="card-text equipment-description">
                            {{ $item->description }}
                        </div>
                        <div class="equipment-features mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <small>Kondisi {{ $item->condition }}</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-boxes text-warning me-2"></i>
                                <small>Stok: {{ $item->stock }} unit</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="/rentals" class="btn btn-success w-100 rounded-pill">
                            <i class="fas fa-cart-plus me-2"></i> Tambah ke Rental
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<!-- CTA Section -->
{{-- <div class="bg-dark py-5 text-white"> --}}
    <div class="container text-center py-4">
        <h2 class="display-5 fw-bold mb-4">Siap Memulai Petualangan Anda?</h2>
        <p class="lead mb-5">Dapatkan perlengkapan outdoor terbaik dengan harga terjangkau hanya di Suanxa Outdoor</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/rentals" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow">
                <i class="fas fa-shopping-cart me-2"></i> Sewa Sekarang
            </a>
            <a href="#categories" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow-sm">
                <i class="fas fa-search me-2"></i> Lihat Peralatan Lain
            </a>
        </div>
    </div>
{{-- </div> --}}

@push('styles')
<style>
    /* Custom Styles */
    .equipment-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1476&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding-top: 100px;
        padding-bottom: 100px;
    }
    
    .category-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #3a86ff, #8338ec);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    .equipment-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .equipment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .equipment-image-container {
        position: relative;
        overflow: hidden;
    }
    
    .equipment-card img {
        transition: transform 0.5s ease;
        height: 200px;
        object-fit: cover;
    }
    
    .equipment-card:hover img {
        transform: scale(1.05);
    }
    
    .price-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
    }
    
    .price-badge small {
        font-size: 0.7rem;
        opacity: 0.8;
    }
    
    .equipment-overlay {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.7));
        padding: 20px;
        text-align: center;
        transition: bottom 0.3s ease;
    }
    
    .equipment-card:hover .equipment-overlay {
        bottom: 0;
    }
    
    .equipment-description {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 60px;
    }
    
    .equipment-features {
        border-top: 1px solid #eee;
        padding-top: 10px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .equipment-hero {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        
        .equipment-hero h1 {
            font-size: 2.5rem;
        }
        
        .equipment-card {
            margin-bottom: 20px;
        }
    }
</style>
@endpush

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush

@endsection