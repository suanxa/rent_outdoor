<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | Suanxa Rent Outdoor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="@yield('body-class')">

  @include('partials.navbar')

  <div class="container-fluid p-0">
    @yield('content') 
  </div>

  <footer class="bg-dark text-white py-4 text-center mt-5">
    <div class="container">
      <p class="mb-0">&copy; {{ date('Y') }} Suanxa Rent Outdoor. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('scriptJS/script.js') }}"></script>
  @stack('scripts')

</body>
</html>
