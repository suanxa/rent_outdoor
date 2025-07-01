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
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="/items">Peralatan</a></li>
        <li class="nav-item"><a class="nav-link" href="/rentals">Rental</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#kontak">Kontak</a></li>

        @if(auth()->check())
        <li class="nav-item dropdown">
          <a class="btn btn-primary dropdown-toggle ms-3" href="#" role="button" data-bs-toggle="dropdown">
            <img src="{{ asset('images/suanxashop.png') }}" class="me-1 navbar-profile-pic">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">@csrf
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
</nav>
