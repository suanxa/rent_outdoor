@extends('admin.adminDashboard')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4">Tambah Barang Baru</h2>

    <form action="/admin/items" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="" disabled selected>-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-3">
            <label for="rental_price" class="form-label">Harga Sewa (Rp)</label>
            <input type="number" name="rental_price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Barang</label>
            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            <small class="text-muted">Format: jpg, jpeg, png. Maksimal 2MB.</small>
        </div>

        <!-- Preview Gambar -->
        <div class="mb-3">
            <img id="preview" src="#" alt="Preview Gambar" style="max-width: 200px; display: none; margin-top: 10px;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Barang</button>
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
