<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suanxa | Booking Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    <!-- Modal Diskon -->
    @guest
<div class="modal fade" id="diskonModal" tabindex="-1" aria-labelledby="diskonModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="diskonModalLabel">🎉 Diskon Spesial!</h5>
      </div>
      <div class="modal-body">
        <p>Dapatkan <strong>diskon spesial</strong> dengan menjadi member dari <strong>Suanxa Rent Outdoor</strong>!</p>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <a href="/register" class="btn btn-warning">Gabung Sekarang</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nanti Saja</button>
      </div>
    </div>
  </div>
</div>

@endguest   

    <div class="container mt-5 pt-5">
        <h1 class="mt-4 text-center">Form Booking Rental Outdoor</h1>
        <p class="text-center">Silakan isi data berikut untuk melakukan pemesanan sewa alat outdoor.</p>
@if(session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/rentals" method="POST">

    @csrf

    <div class="mb-3">
        <label for="customer_name" class="form-label">Nama Penyewa</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
    </div>

    <div class="mb-3">
        <label for="customer_email" class="form-label">Email Penyewa (opsional)</label>
        <input type="email" class="form-control" id="customer_email" name="customer_email">
    </div>

    <div class="mb-3">
        <label for="customer_phone" class="form-label">No. HP Penyewa</label>
        <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
    </div>

    <div class="mb-3">
        <label for="customer_address" class="form-label">Alamat Penyewa</label>
        <textarea class="form-control" id="customer_address" name="customer_address" rows="2" required></textarea>
    </div>

    <div id="item-group">
        <div class="item-row mb-3 d-flex align-items-center">
            <select name="items[]" class="form-select me-2 item-select" required>
                <option value="" disabled selected>-- Pilih Barang --</option>
                @foreach($categories as $category)
                    <optgroup label="{{ $category->name }}">
                        @foreach($category->items as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->rental_price }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <input type="number" name="quantities[]" class="form-control me-2" placeholder="Jumlah" required>
            <input type="number" name="prices[]" class="form-control me-2 price-input" placeholder="Harga" readonly>
            <button type="button" class="btn btn-danger remove-item">Hapus</button>
        </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" id="add-item">+ Tambah Barang</button>

    <div class="mb-3">
        <label for="rental_date" class="form-label">Tanggal Sewa</label>
        <input type="date" class="form-control" id="rental_date" name="rental_date" required>
    </div>

    <div class="mb-3">
        <label for="return_date" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" id="return_date" name="return_date" required>
    </div>

    {{-- <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="booked">Booked</option>
            <option value="ongoing">Ongoing</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div> --}}

    {{-- <div class="mb-3">
        <label for="total_price" class="form-label">Total Harga (Rp)</label>
        <input type="number" class="form-control" id="total_price" name="total_price" required>
    </div> --}}
    
    <div class="mb-3">
    <label for="total_price" class="form-label">Total Harga</label>
    <input type="text" class="form-control" id="total_price" name="total_price" readonly required>
</div>

<small class="text-muted">
    @auth
    Diskon member 25% sudah diterapkan secara otomatis.
    @endauth
</small>



    <button type="submit" class="btn btn-primary w-100">Booking</button>
</form>

            </div>
        </div>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

// Kirim status login dari Blade ke JavaScript
var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
// Tampilkan modal saat halaman load
document.addEventListener('DOMContentLoaded', function () {
    var diskonModal = new bootstrap.Modal(document.getElementById('diskonModal'));
    diskonModal.show();
});

setTimeout(function() {
    var alert = document.getElementById('success-alert');
    if (alert) {
        var bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }
}, 6000);

// Fungsi format Rupiah
function formatRupiah(angka) {
    return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Tambah item baru
document.getElementById('add-item').addEventListener('click', function() {
    const itemGroup = document.getElementById('item-group');
    const newItemRow = itemGroup.firstElementChild.cloneNode(true);

    newItemRow.querySelector('select').value = '';
    newItemRow.querySelector('input[name="quantities[]"]').value = '';
    newItemRow.querySelector('input[name="prices[]"]').value = '';

    itemGroup.appendChild(newItemRow);
});

// Update harga otomatis saat barang dipilih
document.addEventListener('change', function(e){
    if(e.target && e.target.classList.contains('item-select')){
        const selectedOption = e.target.selectedOptions[0];
        const price = selectedOption.getAttribute('data-price');
        const priceInput = e.target.closest('.item-row').querySelector('.price-input');
        priceInput.value = price;

        hitungTotal();
    }
});

// Hapus row item
document.addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove-item')){
        e.target.closest('.item-row').remove();
        hitungTotal();
    }
});

// Hitung total saat quantity diubah
document.addEventListener('input', function(e){
    if(e.target && e.target.name === 'quantities[]'){
        hitungTotal();
    }
});

// Fungsi hitung total harga
function hitungTotal(){
    const itemRows = document.querySelectorAll('.item-row');
    let total = 0;

    itemRows.forEach(function(row){
        const price = parseFloat(row.querySelector('.price-input').value) || 0;
        const quantity = parseFloat(row.querySelector('input[name="quantities[]"]').value) || 0;
        total += price * quantity;
    });

    // Hitung diskon kalau user login
    let finalTotal = total;
    if (isLoggedIn) {
        finalTotal = total - (total * 0.25);
    }

    document.getElementById('total_price').value = formatRupiah(finalTotal);
}


document.querySelector('form').addEventListener('submit', function(e) {
    const totalInput = document.getElementById('total_price');
    // Hapus "Rp " dan titik
    const cleanValue = totalInput.value.replace(/[^0-9]/g, '');
    totalInput.value = cleanValue;
});


</script>

</body>
</html>
