@extends('admin.adminDashboard')

@section('content')
<div class="container mt-1">
    <h1 class="mb-4">Data Barang Sewa</h1>

    <a href="/admin/items/create" class="btn btn-success mb-3">+ Tambah Barang</a>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Brand</th>
                <th>Harga Sewa (Rp)</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ number_format($item->rental_price, 0, ',', '.') }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar" width="60">
                    @else
                        <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image">
                    @endif
                </td>
                <td>
                    <a href="/admin/items/{{ $item->id }}/edit" class="btn btn-sm btn-primary mb-1">Edit</a>
                    <form action="/admin/items/{{ $item->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
