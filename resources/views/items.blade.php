@extends('layouts.app')

@section('title', 'Daftar Peralatan')

@section('content')
<div class="container mt-5 pt-5">
  <h1 class="text-center mb-4">Daftar Peralatan Outdoor</h1>
  <p class="text-center mb-5">Temukan perlengkapan outdoor terbaik untuk petualangan Anda. Semua alat terawat dan siap pakai!</p>
  
  <div class="row">
    @foreach ($categories as $category)
    <h3 class="mt-5">{{ $category->name }}</h3>
    <div class="row">
      @foreach ($category->items as $item)
      <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <p class="fw-bold">Rp {{ number_format($item->rental_price, 0, ',', '.') }} / malam</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
  </div>

  <!-- Tombol Sewa Sekarang -->
  <div class="text-center mt-5">
    <a href="/rentals" class="btn btn-lg btn-primary px-5">Sewa Sekarang</a>
  </div>
</div>
@endsection
