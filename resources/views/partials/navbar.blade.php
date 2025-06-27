<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="https://img.icons8.com/external-flat-juicy-fish/32/ffffff/external-backpack-travel-flat-flat-juicy-fish.png" alt="Logo" width="32" class="me-2">
            Suanxa Outdoor
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-semibold">
                @if(Request::is('/'))
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#peralatan">Peralatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rental">Rental</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/items">Peralatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/rentals">Rental</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#kontak">Kontak</a>
                    </li>
                @endif

                @if(auth()->check())
                    <li class="nav-item dropdown">
                        <a class="btn btn-primary dropdown-toggle ms-3" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="https://img.icons8.com/ios-glyphs/16/ffffff/user.png" class="me-1">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="/admin-dashboard">
                            <img src="https://img.icons8.com/ios-glyphs/16/ffffff/user.png" class="me-1"> Login Admin
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
