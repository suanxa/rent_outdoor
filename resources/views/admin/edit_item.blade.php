@extends('admin.adminDashboard')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4">Edit Barang: {{ $item->name }}</h2>

    <form action="/admin/items/{{ $item->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $item->brand }}">
        </div>

        <div class="mb-3">
            <label for="rental_price" class="form-label">Harga Sewa (Rp)</label>
            <input type="number" name="rental_price" class="form-control" value="{{ $item->rental_price }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ $item->stock }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="2">{{ $item->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Barang</label>
            @if($item->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar Saat Ini" width="120">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
        </div>

        <!-- Preview Gambar Baru -->
        <div class="mb-3">
            <img id="preview" src="#" alt="Preview Gambar Baru" style="max-width: 200px; display: none; margin-top: 10px;">
        </div>

        <button type="submit" class="btn btn-primary">Update Barang</button>
        <a href="/admin/items" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- Script Preview Gambar -->
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.style.display = 'block';
    preview.src = URL.createObjectURL(event.target.files[0]);
}
</script>

@endsection
