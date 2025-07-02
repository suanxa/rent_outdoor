@extends('layouts.app')
@section('title', 'Booking Rental')
@section('content')

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
      <form id="bookingForm" method="POST" action="/rentals">
        @csrf
<div class="mb-3">
  <label class="form-label">Nama Penyewa</label>
  <input type="text" class="form-control" name="customer_name" 
         value="@auth{{ auth()->user()->name }}@endauth"
         @auth readonly @endauth required>
</div>

<div class="mb-3">
  <label class="form-label">Email Penyewa (opsional)</label>
  <input type="email" class="form-control" name="customer_email"
         value="@auth{{ auth()->user()->email }}@endauth"
         @auth readonly @endauth>
</div>


        <div class="mb-3">
          <label class="form-label">No. HP Penyewa</label>
          <input type="text" class="form-control" name="customer_phone" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat Penyewa</label>
          <textarea class="form-control" name="customer_address" rows="2" required></textarea>
        </div>

        <div id="item-group">
          <div class="item-row mb-3 d-flex align-items-center">
            <select name="items[]" class="form-select me-2 item-select" required>
              <option value="" disabled selected>-- Pilih Barang --</option>
          @foreach($categories as $category)
  <optgroup label="{{ $category->name }}">
    @foreach($category->items as $item)
      @if($item->stock > 0)
        <option value="{{ $item->id }}" data-price="{{ $item->rental_price }}" data-stock="{{ $item->stock }}">
          {{ $item->name }}
        </option>
      @endif
    @endforeach
  </optgroup>
@endforeach


            </select>
            <input type="number" name="quantities[]" class="form-control me-2" placeholder="Jumlah" required>
            <input type="number" class="form-control me-2 stock-input" placeholder="Stok" readonly>
            <input type="number" class="form-control me-2 price-input" placeholder="Harga" readonly>
            <button type="button" class="btn btn-danger remove-item">Hapus</button>
          </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-item">+ Tambah Barang</button>

        <div class="mb-3">
          <label class="form-label">Tanggal Sewa</label>
          <input type="date" class="form-control" name="rental_date" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Kembali</label>
          <input type="date" class="form-control" name="return_date" required>
        </div>

        <div class="mb-3">
  <label class="form-label">Total Harga</label>
  <input type="text" class="form-control" id="total_price_display" readonly>
  <input type="hidden" id="total_price" name="total_price" required>
</div>


        <small class="text-muted">
          @auth
          Diskon member 25% sudah diterapkan otomatis.
          @endauth
        </small>

        <button type="submit" class="btn btn-primary w-100">Booking</button>
      </form>
      <!-- Modal Struk -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Struk Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="receiptContent">
        <!-- isi struk nanti diisi via JavaScript -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="window.print()">Print Struk</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

document.addEventListener('DOMContentLoaded', function () {
  var diskonModal = document.getElementById('diskonModal');
  if (diskonModal) {
    new bootstrap.Modal(diskonModal).show();
  }
});

setTimeout(() => {
  var alert = document.getElementById('success-alert');
  if (alert) {
    new bootstrap.Alert(alert).close();
  }
}, 6000);

// Format Rupiah tanpa desimal
function formatRupiah(angka) {
  return 'Rp ' + angka.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}


// Tambah barang
document.getElementById('add-item').addEventListener('click', function() {
  const itemGroup = document.getElementById('item-group');
  const newRow = itemGroup.firstElementChild.cloneNode(true);
  newRow.querySelector('select').value = '';
  newRow.querySelector('input[name="quantities[]"]').value = '';
  newRow.querySelector('.price-input').value = '';
  itemGroup.appendChild(newRow);
});

// Harga otomatis
document.addEventListener('change', function(e){
  if(e.target.classList.contains('item-select')){
    const selectedOption = e.target.selectedOptions[0];
    const price = selectedOption.getAttribute('data-price');
    const stock = selectedOption.getAttribute('data-stock');

    const row = e.target.closest('.item-row');
    row.querySelector('.price-input').value = price;
    row.querySelector('.stock-input').value = stock;

    hitungTotal();
  }
});


// Hapus barang
document.addEventListener('click', function(e){
  if(e.target.classList.contains('remove-item')){
    e.target.closest('.item-row').remove();
    hitungTotal();
  }
});

// Hitung total otomatis
document.addEventListener('input', function(e){
  if(e.target.name === 'quantities[]'){
    hitungTotal();
  }
});

function hitungTotal(){
  const itemRows = document.querySelectorAll('.item-row');
  let total = 0;

  itemRows.forEach(function(row){
    const price = parseFloat(row.querySelector('.price-input').value) || 0;
    const quantity = parseFloat(row.querySelector('input[name="quantities[]"]').value) || 0;
    total += price * quantity;
  });

  // Diskon kalau user login
  let finalTotal = total;
  if (isLoggedIn) {
    finalTotal = total - (total * 0.25);
  }

  // Tampilkan ke user
  document.getElementById('total_price_display').value = formatRupiah(finalTotal);

  // Simpan ke input hidden
  document.getElementById('total_price').value = finalTotal;
}

// Booking POP UP
document.getElementById('bookingForm').addEventListener('submit', function(e){
  e.preventDefault();

  let form = e.target;
  let formData = new FormData(form);

fetch('/rentals', {
  method: 'POST',
  headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    'X-Requested-With': 'XMLHttpRequest'  // <-- ini wajib biar $request->ajax() kebaca true
  },
  body: formData
})

  .then(response => {
    if (!response.ok) {
      throw new Error('Network response error');
    }
    return response.json();
  })
  .then(data => {
    // Tampilkan data ke modal struk
    let itemsHTML = '';
    data.items.forEach(item => {
      itemsHTML += `<p>${item.name} (x${item.quantity}) - Rp ${Number(item.subtotal).toLocaleString('id-ID')}</p>`;
    });

    let content = `
      <p><strong>Nama:</strong> ${data.customer_name}</p>
      <p><strong>Email:</strong> ${data.customer_email}</p>
      <p><strong>No HP:</strong> ${data.customer_phone}</p>
      <p><strong>Alamat:</strong> ${data.customer_address}</p>
      <p><strong>Tanggal Sewa:</strong> ${data.rental_date}</p>
      <p><strong>Tanggal Kembali:</strong> ${data.return_date}</p>
      <hr>
      <p><strong>Barang Disewa:</strong></p>
      ${itemsHTML}
      <hr>
      <p><strong>Total Harga:</strong> Rp ${Number(data.total_price).toLocaleString('id-ID')}</p>
    `;

    document.getElementById('receiptContent').innerHTML = content;

    let receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
    receiptModal.show();

    form.reset();
    document.getElementById('total_price_display').value = '';
  })
  .catch(error => {
    console.error('Gagal booking:', error);
    alert('Booking gagal. Coba lagi!');
  });
});




</script>
@endpush
