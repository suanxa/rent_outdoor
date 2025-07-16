<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #F5F5DC;"> <!-- Hapus navbar-dark -->
  <div class="container">
    <!-- Brand Logo -->
    <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="color: #2E8B57;">
      <img src="{{ asset('images/suanxashop.png') }}" alt="Logo" height="30" class="d-inline-block align-top me-2">
      Suanxa Rental Outdoor
    </a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

     <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}#beranda">
            <i class="fas fa-home me-1"></i> Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/items">
            <i class="fas fa-campground me-1"></i> Peralatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rentals">
            <i class="fas fa-calendar-alt me-1"></i> Rental
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}#kontak">
            <i class="fas fa-envelope me-1"></i> Kontak
          </a>
        </li>

        <!-- Auth Section -->
        @if(auth()->check())
        <li class="nav-item dropdown ms-lg-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <img src="{{ asset('images/suanxashop.png') }}" alt="Profile" class="rounded-circle me-1" height="24">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i> Profil</a></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item ms-lg-2">
          <a class="btn btn-success btn-sm" href="/login">
            <i class="fas fa-user-circle me-1"></i> Login
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

@push('styles')
<style>
   nav.navbar {
    background-color: #F5F5DC !important;
    padding: 0.5rem 0 !important;
    box-shadow: 0 2px 15px rgba(0, 100, 0, 0.1) !important;
  }
  
  .navbar-brand {
    color: #2E8B57 !important;
  }
  
  
  .navbar-brand:hover {
    color: #3CB371 !important; /* Medium sea green */
  }
  
  .nav-link {
    padding: 0.5rem 1rem !important;
    font-weight: 500;
    transition: all 0.2s ease;
    color: #556B2F !important; /* Dark olive green */
  }
  
  .nav-link:hover, .nav-link:focus {
    color: #8FBC8F !important; /* Dark sea green */
    transform: translateY(-2px);
  }
  
  .nav-link i {
    transition: all 0.2s ease;
  }
  
  .nav-link:hover i {
    transform: scale(1.1);
  }
  
  .dropdown-menu {
    background: #F5F5DC; /* Cream background */
    border: 1px solid #8FBC8F; /* Dark sea green border */
    box-shadow: 0 4px 12px rgba(0, 100, 0, 0.15);
  }
  
  .dropdown-item {
    color: #556B2F !important; /* Dark olive green */
    transition: all 0.2s ease;
  }
  
  .dropdown-item:hover {
    background: #8FBC8F !important; /* Dark sea green */
    color: white !important;
  }
  
  .btn-success {
    background-color: #2E8B57; /* Sea green */
    border-color: #2E8B57;
  }
  
  .btn-success:hover {
    background-color: #3CB371; /* Medium sea green */
    border-color: #3CB371;
  }
  
  .navbar-toggler {
    border-color: #2E8B57; /* Sea green */
  }
  
  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2846, 139, 87, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
  }
  
  @media (max-width: 991px) {
    .navbar-collapse {
      background: #F5F5DC; /* Cream background */
      padding: 1rem;
      margin-top: 0.5rem;
      border-radius: 0 0 8px 8px;
      border: 1px solid #8FBC8F; /* Dark sea green border */
      border-top: none;
      box-shadow: 0 4px 12px rgba(0, 100, 0, 0.1);
    }
  }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Enhanced scroll effect
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('nav.navbar');
      if (window.scrollY > 20) {
        navbar.style.boxShadow = "0 4px 20px rgba(0, 100, 0, 0.15)";
        navbar.style.background = "rgba(245, 245, 220, 0.98) !important";
      } else {
        navbar.style.boxShadow = "0 2px 15px rgba(0, 100, 0, 0.1)";
        navbar.style.background = "#F5F5DC !important";
      }
    });
    
    // Add smooth scrolling to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  });
</script>
@endpush