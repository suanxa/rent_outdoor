@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!-- Hero Section with Nature Background -->
<div class="hero-section position-relative overflow-hidden" id="beranda">
    <div class="image-background position-relative">
        <img src="{{ asset('images/dashboard.jpeg') }}" alt="Mountain Landscape" class="w-100" style="object-fit: cover; height: 100vh;">
        <div class="video-overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.3);"></div>
    </div>
    <div class="container position-absolute top-50 start-50 translate-middle hero-content text-center text-white">
        <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">SUANXA OUTDOOR</h1>
        <p class="lead fs-3 mb-5 animate__animated animate__fadeIn animate__delay-1s">Gear Terbaik untuk Petualangan Terbaik</p>
        <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-1s">
            <a href="/rentals" class="btn btn-success btn-lg px-4 py-3 rounded-pill shadow">
                <i class="fas fa-calendar-alt me-2"></i> Mulai Sewa Sekarang
            </a>
            <a href="#peralatan" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill shadow">
                <i class="fas fa-binoculars me-2"></i> Jelajahi Peralatan
            </a>
        </div>
    </div>
    <div class="scroll-down animate__animated animate__bounce animate__infinite animate__delay-2s position-absolute bottom-0 start-50 translate-middle-x mb-4">
        <a href="#peralatan"><i class="fas fa-chevron-down text-white"></i></a>
    </div>
</div>

<!-- Features Section with Icons -->
<div class="section py-5 bg-cream" id="peralatan">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="display-5 fw-bold text-forest">Kenapa Pilih Suanxa?</h2>
            <p class="lead text-muted">Kami memberikan pengalaman rental outdoor terbaik untuk petualangan Anda</p>
            <div class="divider mx-auto bg-success"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="feature-card p-4 h-100 rounded-4 shadow-sm bg-cream-light border-0 text-center">
                    <div class="feature-icon mx-auto mb-4 bg-success text-white">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="h4 mb-3 text-forest">Peralatan Premium</h3>
                    <p class="text-muted">Perlengkapan outdoor berkualitas tinggi dari brand ternama, dirawat secara profesional untuk performa optimal.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="feature-card p-4 h-100 rounded-4 shadow-sm bg-cream-light border-0 text-center">
                    <div class="feature-icon mx-auto mb-4 bg-success text-white">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3 class="h4 mb-3 text-forest">Harga Kompetitif</h3>
                    <p class="text-muted">Harga sewa terjangkau dengan berbagai paket menarik dan promo reguler untuk menghemat budget petualangan Anda.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="feature-card p-4 h-100 rounded-4 shadow-sm bg-cream-light border-0 text-center">
                    <div class="feature-icon mx-auto mb-4 bg-success text-white">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="h4 mb-3 text-forest">Layanan 24/7</h3>
                    <p class="text-muted">Tim support kami siap membantu kapan saja, termasuk konsultasi gratis untuk kebutuhan petualangan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Promo Banner with Countdown -->
<div class="promo-banner py-5 bg-forest text-black">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="mb-3"><span class="badge bg-success me-2">PROMO</span> AKHIR PEKAN!</h2>
                <p class="lead mb-4">Diskon 25% untuk semua paket camping minimal 2 malam sewa!</p>
                <div class="promo-countdown d-flex gap-3">
                    <div class="countdown-item bg-cream-light rounded-3 p-2 text-center text-forest">
                        <div class="countdown-value fw-bold" id="days">00</div>
                        <div class="countdown-label">Hari</div>
                    </div>
                    <div class="countdown-item bg-cream-light rounded-3 p-2 text-center text-forest">
                        <div class="countdown-value fw-bold" id="hours">00</div>
                        <div class="countdown-label">Jam</div>
                    </div>
                    <div class="countdown-item bg-cream-light rounded-3 p-2 text-center text-forest">
                        <div class="countdown-value fw-bold" id="minutes">00</div>
                        <div class="countdown-label">Menit</div>
                    </div>
                    <div class="countdown-item bg-cream-light rounded-3 p-2 text-center text-forest">
                        <div class="countdown-value fw-bold" id="seconds">00</div>
                        <div class="countdown-label">Detik</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <a href="/rentals" class="btn btn-success btn-lg rounded-pill px-4 py-3 shadow">
                    <i class="fas fa-arrow-right me-2"></i> Klaim Promo Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Equipment Gallery with Carousel -->
<div class="section py-5 bg-cream">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="display-5 fw-bold text-forest">Peralatan Kami</h2>
            <p class="lead text-muted">Temukan perlengkapan outdoor terbaik untuk petualangan Anda</p>
            <div class="divider mx-auto bg-success"></div>
        </div>
        
        <div class="equipment-carousel owl-carousel owl-theme">
            <div class="item">
                <div class="card equipment-card border-0 rounded-4 overflow-hidden shadow-sm bg-cream-light">
                    <div class="card-img-top position-relative overflow-hidden" style="height: 200px;">
                        <img src="{{ asset('images/5rJNEtr8aterhRH4kolvXBUZq9HjosHxrqEoY0Cn.jpg') }}" alt="Tenda Camping" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="card-badge bg-success text-white">Tersedia</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-forest">Tenda Premium</h5>
                        <div class="rating mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <span class="ms-2 text-muted">(24)</span>
                        </div>
                        <p class="card-text text-muted">Tenda 4 musim dengan bahan waterproof dan anti-angin.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp100.000/malam</span>
                            <a href="/items" class="btn btn-sm btn-outline-success">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="item">
                <div class="card equipment-card border-0 rounded-4 overflow-hidden shadow-sm bg-cream-light">
                    <div class="card-img-top position-relative overflow-hidden" style="height: 200px;">
                        <img src="{{ asset('images/abR4wCRz4a49sTlkrYIvXCV3ke8HMCLAKn1bl9am.jpg') }}" alt="Sleeping Bag" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="card-badge bg-success text-white">Tersedia</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-forest">Sleeping Bag</h5>
                        <div class="rating mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <span class="ms-2 text-muted">(18)</span>
                        </div>
                        <p class="card-text text-muted">Nyaman hingga suhu -10°C dengan bahan isolasi premium.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp100.000/malam</span>
                            <a href="/items" class="btn btn-sm btn-outline-success">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="item">
                <div class="card equipment-card border-0 rounded-4 overflow-hidden shadow-sm bg-cream-light">
                    <div class="card-img-top position-relative overflow-hidden" style="height: 200px;">
                        <img src="{{ asset('images/fthI7U6OWFxwtdGgbXxbASPoOjc0lorToufqFRZb.jpg') }}" alt="Hiking Backpack" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="card-badge bg-success text-white">Tersedia</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-forest">Tas Gunung</h5>
                        <div class="rating mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                            <span class="ms-2 text-muted">(12)</span>
                        </div>
                        <p class="card-text text-muted">Kapasitas 60L dengan sistem beban ergonomis.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp2.938/malam</span>
                            <a href="/items" class="btn btn-sm btn-outline-success">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="item">
                <div class="card equipment-card border-0 rounded-4 overflow-hidden shadow-sm bg-cream-light">
                    <div class="card-img-top position-relative overflow-hidden" style="height: 200px;">
                        <img src="{{ asset('images/Md1FHHYVhBwGc13k8xMWCbSpZMseXmKHGblZ3SJm.jpg') }}"  alt="Cooking Set" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="card-badge bg-success text-white">Tersedia</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-forest">Peralatan Masak</h5>
                        <div class="rating mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <span class="ms-2 text-muted">(30)</span>
                        </div>
                        <p class="card-text text-muted">Kompor portable + nesting lengkap untuk 4 orang.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp989.343/malam</span>
                            <a href="/items" class="btn btn-sm btn-outline-success">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="/items" class="btn btn-success btn-lg rounded-pill px-4 shadow">
                <i class="fas fa-arrow-right me-2"></i> Lihat Semua Peralatan
            </a>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="section py-5 bg-white">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="display-5 fw-bold text-forest">Apa Kata Mereka</h2>
            <p class="lead text-muted">Testimoni jujur dari pelanggan kami</p>
            <div class="divider mx-auto bg-success"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card p-4 h-100 rounded-4 shadow-sm bg-cream-light">
                    <div class="rating mb-3">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                    </div>
                    <blockquote class="mb-4 text-muted">"Peralatannya sangat berkualitas dan terawat baik. Tenda yang kami sewa masih seperti baru dan sangat nyaman dipakai camping di Ranah Bungso."</blockquote>
                    <div class="d-flex align-items-center">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="50" alt="Rina">
                        <div>
                            <h6 class="mb-0 text-forest">Disty, Kapau</h6>
                            <small class="text-muted">Pelanggan sejak 2022</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="testimonial-card p-4 h-100 rounded-4 shadow-sm bg-cream-light">
                    <div class="rating mb-3">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                    </div>
                    <blockquote class="mb-4 text-muted">"Sangat membantu perjalanan hiking kami ke Gunung Marapi. Tas gunungnya ergonomis dan tidak membuat pegal meski membawa beban banyak."</blockquote>
                    <div class="d-flex align-items-center">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" class="rounded-circle me-3" width="50" alt="Dedi">
                        <div>
                            <h6 class="mb-0 text-forest">Cinop, Tarandam</h6>
                            <small class="text-muted">Pelanggan sejak 2021</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="testimonial-card p-4 h-100 rounded-4 shadow-sm bg-cream-light">
                    <div class="rating mb-3">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <blockquote class="mb-4 text-muted">"Proses sewa mudah dan cepat. Adminnya sangat responsif. Sleeping bag-nya hangat banget dipakai di daerah dingin seperti Lembah Harau."</blockquote>
                    <div class="d-flex align-items-center">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" class="rounded-circle me-3" width="50" alt="Yoga">
                        <div>
                            <h6 class="mb-0 text-forest">Pall, Sisinga</h6>
                            <small class="text-muted">Pelanggan sejak 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section py-5 bg-forest text-black">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Siap Memulai Petualangan Anda?</h2>
        <p class="lead mb-5">Dapatkan perlengkapan outdoor terbaik dengan harga terjangkau hanya di Suanxa Outdoor</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/rentals" class="btn btn-success btn-lg px-4 py-3 rounded-pill shadow">
                <i class="fas fa-shopping-cart me-2"></i> Sewa Sekarang
            </a>
            <a href="#kontak" class="btn btn-success btn-lg px-4 py-3 rounded-pill shadow">
                <i class="fas fa-phone-alt me-2"></i> Hubungi Kami
            </a>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="section py-5 bg-cream" id="kontak">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="display-5 fw-bold mb-4 text-forest">Hubungi Kami</h2>
                <p class="lead text-muted mb-4">Punya pertanyaan atau butuh bantuan? Tim kami siap membantu Anda.</p>
                
                <div class="contact-info mb-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="contact-icon bg-success text-white rounded-circle me-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-forest">Alamat</h6>
                            <p class="text-muted mb-0">Jl. Raya Outdoor No. 123, Padang, Sumatera Barat</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-3">
                        <div class="contact-icon bg-success text-white rounded-circle me-3">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-forest">Telepon</h6>
                            <p class="text-muted mb-0">+62 812 3456 7890</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start">
                        <div class="contact-icon bg-success text-white rounded-circle me-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-forest">Email</h6>
                            <p class="text-muted mb-0">info@suanxaoutdoor.com</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle me-2"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="contact-form bg-white p-4 rounded-4 shadow-sm">
                    <h4 class="mb-4 text-forest">Kirim Pesan</h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                                    <label for="name">Nama Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email Anda">
                                    <label for="email">Email Anda</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subjek">
                                    <label for="subject">Subjek</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" style="height: 150px" placeholder="Pesan Anda"></textarea>
                                    <label for="message">Pesan Anda</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Custom Color Scheme */
    :root {
        --cream-color: #f5f5e9;
        --cream-light: #fffcf5;
        --forest-color: #2c5e1a;
        --forest-dark: #1e3f12;
        --success-color: #4a934a;
    }
    
    .bg-cream {
        background-color: var(--cream-color);
    }
    
    .bg-cream-light {
        background-color: var(--cream-light);
    }
    
    .bg-forest {
        background-color: var(--forest-color);
    }
    
    .bg-success {
        background-color: var(--success-color) !important;
    }
    
    .text-forest {
        color: var(--forest-color);
    }
    
    /* Custom Styles */
    .hero-section {
        height: 100vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        position: relative;
    }
    
    .image-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    
    .image-background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.3);
    }
    
    .hero-content {
        z-index: 1;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }
    
    .scroll-down {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }
    
    .scroll-down a {
        color: white;
        font-size: 1.5rem;
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
        40% {transform: translateY(-20px);}
        60% {transform: translateY(-10px);}
    }
    
    .section {
        padding: 5rem 0;
    }
    
    .section-header {
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .divider {
        width: 80px;
        height: 3px;
        background-color: var(--success-color);
        margin-top: 1rem;
    }
    
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        transition: transform 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: rotateY(180deg);
    }
    
    .promo-banner {
        background: linear-gradient(135deg, var(--forest-color), var(--forest-dark));
        color: white;
    }
    
    .countdown-item {
        min-width: 70px;
    }
    
    .countdown-value {
        font-size: 1.75rem;
        font-weight: bold;
    }
    
    .countdown-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        opacity: 0.8;
    }
    
    .equipment-card {
        transition: transform 0.3s ease;
    }
    
    .equipment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: bold;
    }
    
    .testimonial-card {
        transition: transform 0.3s ease;
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .rating {
        color: #ffc107;
    }
    
    .cta-section {
        background: linear-gradient(rgba(44, 94, 26, 0.9), rgba(44, 94, 26, 0.9)), url('https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1468&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .contact-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .contact-form .form-control {
        border-radius: 0.5rem;
        border: 1px solid #ddd;
    }
    
    .contact-form .form-control:focus {
        border-color: var(--success-color);
        box-shadow: 0 0 0 0.25rem rgba(74, 147, 74, 0.25);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2.5rem;
        }
        
        .section {
            padding: 3rem 0;
        }
        
        .promo-countdown {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>
@endpush

@push('scripts')
<!-- Include necessary JS libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        // Initialize equipment carousel
        $('.equipment-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        
        // Countdown timer for promo
        function updateCountdown() {
            const now = new Date();
            const endOfWeek = new Date();
            endOfWeek.setHours(23, 59, 59, 999);
            endOfWeek.setDate(now.getDate() + (6 - now.getDay()));
            
            const diff = endOfWeek - now;
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            $('#days').text(days.toString().padStart(2, '0'));
            $('#hours').text(hours.toString().padStart(2, '0'));
            $('#minutes').text(minutes.toString().padStart(2, '0'));
            $('#seconds').text(seconds.toString().padStart(2, '0'));
        }
        
        updateCountdown();
        setInterval(updateCountdown, 1000);
        
        // Smooth scrolling for anchor links
        $('a[href*="#"]').on('click', function(e) {
            e.preventDefault();
            
            $('html, body').animate(
                {
                    scrollTop: $($(this).attr('href')).offset().top,
                },
                500,
                'linear'
            );
        });
    });
</script>
@endpush

@endsection