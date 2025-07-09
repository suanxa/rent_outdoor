@extends('layouts.app')

@section('title', 'Booking Rental')

@section('content')

<!-- Hero Section -->
<div class="booking-hero py-5">
    <div class="container py-5 text-center text-black">
        <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">Booking Peralatan Outdoor</h1>
        <p class="lead fs-4 animate__animated animate__fadeIn animate__delay-1s">Siapkan petualangan Anda dengan perlengkapan terbaik</p>
    </div>
</div>

@guest
<!-- Membership Modal -->
<div class="modal fade" id="diskonModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-primary text-black border-0">
                <h5 class="modal-title w-100 text-center">
                    <i class="fas fa-gift me-2"></i> Diskon Spesial Member!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="discount-badge mb-4 mx-auto">
                    <span>25% OFF</span>
                </div>
                <h4 class="mb-3">Nikmati diskon eksklusif 25%!</h4>
                <p class="text-muted">Daftar sekarang sebagai member Suanxa Outdoor dan dapatkan diskon spesial untuk semua rental peralatan.</p>
                <div class="benefits-list text-start my-4">
                    <div class="d-flex mb-2">
                        <div class="benefit-icon me-3">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div>Diskon 25% semua rental</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="benefit-icon me-3">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div>Prioritas pemesanan</div>
                    </div>
                    <div class="d-flex">
                        <div class="benefit-icon me-3">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div>Update promo eksklusif</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 d-flex justify-content-center">
                <a href="/register" class="btn btn-success btn-lg rounded-pill px-4 shadow-sm">
                    <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                </a>
                <button type="button" class="btn btn-outline-secondary btn-lg rounded-pill px-4" data-bs-dismiss="modal">
                    Nanti Saja
                </button>
            </div>
        </div>
    </div>
</div>
@endguest

<div class="container py-5">
    @if(session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="booking-card card border-0 shadow-lg overflow-hidden">
                <div class="card-header bg-gradient-primary text-black py-3">
                    <h2 class="h4 mb-0 text-center">
                        <i class="fas fa-calendar-alt me-2"></i> Form Booking Rental
                    </h2>
                </div>
                <div class="card-body p-4">
                    <form id="bookingForm" method="POST" action="/rentals">
                        @csrf
                        
                        <!-- Customer Info Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="fas fa-user-circle me-2"></i> Informasi Penyewa
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" name="customer_name" 
                                               value="@auth{{ auth()->user()->name }}@endauth"
                                               @auth readonly @endauth required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email (opsional)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" name="customer_email"
                                               value="@auth{{ auth()->user()->email }}@endauth"
                                               @auth readonly @endauth>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nomor HP</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control" name="customer_phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <textarea class="form-control" name="customer_address" rows="1" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Rental Items Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="fas fa-campground me-2"></i> Peralatan Disewa
                            </h5>
                            
                            <div id="item-group">
                                <div class="item-row mb-3 card p-3 shadow-sm">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-5">
                                            <label class="form-label small mb-1">Pilih Barang</label>
                                            <select name="items[]" class="form-select item-select" required>
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
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label small mb-1">Jumlah</label>
                                            <input type="number" name="quantities[]" class="form-control" placeholder="Qty" min="1" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label small mb-1">Stok</label>
                                            <input type="number" class="form-control stock-input" placeholder="Stok" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label small mb-1">Harga</label>
                                            <input type="number" class="form-control price-input" placeholder="Harga" readonly>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-outline-danger remove-item w-100">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-outline-primary" id="add-item">
                                <i class="fas fa-plus me-2"></i> Tambah Barang
                            </button>
                        </div>
                        
                        <!-- Rental Dates Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="far fa-calendar-alt me-2"></i> Periode Sewa
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Sewa</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                        <input type="date" class="form-control" name="rental_date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Kembali</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                        <input type="date" class="form-control" name="return_date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pricing Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="fas fa-receipt me-2"></i> Ringkasan Pembayaran
                            </h5>
                            <div class="pricing-summary p-3 bg-light rounded">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span id="subtotal-display">Rp 0</span>
                                </div>
                                @auth
                                <div class="d-flex justify-content-between mb-2 text-success">
                                    <span>Diskon Member (25%):</span>
                                    <span id="discount-display">-Rp 0</span>
                                </div>
                                @endauth
                                <div class="d-flex justify-content-between fw-bold fs-5 mt-3 pt-2 border-top">
                                    <span>Total:</span>
                                    <span id="total-display">Rp 0</span>
                                </div>
                                <input type="hidden" id="total_price" name="total_price" required>
                            </div>
                            
                            @auth
                            <div class="alert alert-success mt-3 d-flex align-items-center">
                                <i class="fas fa-check-circle me-2"></i>
                                <small>Diskon member 25% sudah diterapkan otomatis.</small>
                            </div>
                            @endauth
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill shadow">
                            <i class="fas fa-paper-plane me-2"></i> Proses Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow">

      <!-- Logo di tengah atas -->
      <div class="text-center pt-4">
        <img src="{{ asset('images/suanxashop.png') }}" alt="Logo" style="height: 100px; width: 100px;">
      </div>

      {{-- <div class="modal-header text-white justify-content-center" style="background-color: #00C853;">
        <h5 class="modal-title d-flex align-items-center">
          <i class="fas fa-receipt me-2"></i> Struk Booking
        </h5>
        <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}

      <div class="modal-body p-4" id="receiptContent">
        <!-- Receipt content will be inserted here -->
      </div>

      <div class="modal-footer">
        <button class="btn rounded-pill text-white" style="background-color: #0f9446; border: none;" onclick="window.print()">
          <i class="fas fa-print me-2"></i> Cetak Struk
        </button>
        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
          <i class="fas fa-times me-2"></i> Tutup
        </button>
      </div>
      
    </div>
  </div>
</div>


@push('styles')
<style>
    /* Custom Styles */
    .booking-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1468&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin-top: -20px;
    }
    
    .booking-card {
        border-radius: 12px;
        overflow: hidden;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a86ff, #8338ec);
    }
    
    .form-section {
        padding: 1.5rem;
        border-radius: 8px;
        background-color: #fff;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .section-title {
        color: #3a86ff;
        font-weight: 600;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .item-row {
        transition: all 0.3s ease;
        border-radius: 8px;
    }
    
    .item-row:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .remove-item {
        transition: all 0.3s ease;
    }
    
    .remove-item:hover {
        transform: scale(1.1);
    }
    
    .discount-badge {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.5rem;
        box-shadow: 0 10px 20px rgba(255,154,158,0.3);
    }
    
    .benefit-icon {
        color: #3a86ff;
        font-size: 1.2rem;
    }
    
    .pricing-summary {
        border-left: 4px solid #3a86ff;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .booking-hero {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        
        .booking-hero h1 {
            font-size: 2.5rem;
        }
        
        .item-row .col-md-2, .item-row .col-md-1 {
            margin-top: 10px;
        }
    }
</style>
@endpush

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

<script>
    var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

    // Show discount modal for guests
    document.addEventListener('DOMContentLoaded', function () {
        var diskonModal = document.getElementById('diskonModal');
        if (diskonModal) {
            new bootstrap.Modal(diskonModal).show();
        }
        
        // Auto close success alert
        setTimeout(() => {
            var alert = document.getElementById('success-alert');
            if (alert) {
                new bootstrap.Alert(alert).close();
            }
        }, 6000);
    });

    // Format Rupiah
    function formatRupiah(angka) {
        return 'Rp ' + angka.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Add item row
    document.getElementById('add-item').addEventListener('click', function() {
        const itemGroup = document.getElementById('item-group');
        const newRow = itemGroup.firstElementChild.cloneNode(true);
        newRow.querySelector('select').value = '';
        newRow.querySelector('input[name="quantities[]"]').value = '';
        newRow.querySelector('.price-input').value = '';
        newRow.querySelector('.stock-input').value = '';
        itemGroup.appendChild(newRow);
    });

    // Update price and stock when item selected
    document.addEventListener('change', function(e){
        if(e.target.classList.contains('item-select')){
            const selectedOption = e.target.selectedOptions[0];
            const price = selectedOption.getAttribute('data-price');
            const stock = selectedOption.getAttribute('data-stock');

            const row = e.target.closest('.item-row');
            row.querySelector('.price-input').value = price;
            row.querySelector('.stock-input').value = stock;

            calculateTotal();
        }
    });

    // Remove item row
    document.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-item') || e.target.closest('.remove-item')){
            const row = e.target.closest('.item-row');
            if (document.querySelectorAll('.item-row').length > 1) {
                row.remove();
                calculateTotal();
            } else {
                // Reset the single remaining row instead of removing it
                const select = row.querySelector('select');
                const quantityInput = row.querySelector('input[name="quantities[]"]');
                const priceInput = row.querySelector('.price-input');
                const stockInput = row.querySelector('.stock-input');
                
                select.value = '';
                quantityInput.value = '';
                priceInput.value = '';
                stockInput.value = '';
                
                calculateTotal();
            }
        }
    });

    // Calculate total when quantity changes
    document.addEventListener('input', function(e){
        if(e.target.name === 'quantities[]'){
            calculateTotal();
        }
    });

    // Calculate total price
    function calculateTotal(){
        const itemRows = document.querySelectorAll('.item-row');
        let subtotal = 0;

        itemRows.forEach(function(row){
            const price = parseFloat(row.querySelector('.price-input').value) || 0;
            const quantity = parseFloat(row.querySelector('input[name="quantities[]"]').value) || 0;
            subtotal += price * quantity;
        });

        // Apply discount if logged in
        let discount = 0;
        let total = subtotal;
        
        if (isLoggedIn) {
            discount = subtotal * 0.25;
            total = subtotal - discount;
        }

        // Update display
        document.getElementById('subtotal-display').textContent = formatRupiah(subtotal);
        if (isLoggedIn) {
            document.getElementById('discount-display').textContent = '- ' + formatRupiah(discount);
        }
        document.getElementById('total-display').textContent = formatRupiah(total);
        
        // Update hidden input
        document.getElementById('total_price').value = total;
    }

    // Form submission
    document.getElementById('bookingForm').addEventListener('submit', function(e){
        e.preventDefault();

        let form = e.target;
        let formData = new FormData(form);

        fetch('/rentals', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
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
            // Build receipt content
            let itemsHTML = data.items.map(item => `
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <div>${item.name} (x${item.quantity})</div>
                    <div>Rp ${Number(item.subtotal).toLocaleString('id-ID')}</div>
                </div>
            `).join('');

            let content = `
                <div class="receipt-header text-center mb-4">
                    <h4 class="text-success">Suanxa Outdoor Rental</h4>
                    <p class="text-muted">Struk Booking</p>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-success">Informasi Penyewa</h6>
                        <p><strong>Nama:</strong> ${data.customer_name}</p>
                        <p><strong>No HP:</strong> ${data.customer_phone}</p>
                        <p><strong>Email:</strong> ${data.customer_email || '-'}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">Detail Sewa</h6>
                        <p><strong>Tanggal Sewa:</strong> ${data.rental_date}</p>
                        <p><strong>Tanggal Kembali:</strong> ${data.return_date}</p>
                    </div>
                </div>
                
                <h6 class="text-success mt-4">Detail Barang</h6>
                ${itemsHTML}
                
                <div class="receipt-total mt-4 p-3 bg-light rounded">
                    <div class="d-flex justify-content-between">
                        <strong>Subtotal:</strong>
                        <strong>Rp ${Number(data.subtotal).toLocaleString('id-ID')}</strong>
                    </div>
                    ${isLoggedIn ? `
                    <div class="d-flex justify-content-between text-success">
                        <strong>Diskon Member (25%):</strong>
                        <strong>- Rp ${Number(data.discount).toLocaleString('id-ID')}</strong>
                    </div>
                    ` : ''}
                    <div class="d-flex justify-content-between mt-2 pt-2 border-top">
                        <strong class="fs-5">Total:</strong>
                        <strong class="fs-5">Rp ${Number(data.total_price).toLocaleString('id-ID')}</strong>
                    </div>
                </div>
                
                <div class="receipt-footer text-center mt-4 pt-3 border-top">
                    <p class="text-muted">Terima kasih telah memilih Suanxa Outdoor</p>
                    <p class="small text-muted">Silakan tunjukkan struk ini saat pengambilan barang</p>
                </div>
            `;

            document.getElementById('receiptContent').innerHTML = content;
            var receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
            receiptModal.show();

            form.reset();
            document.getElementById('total-display').textContent = 'Rp 0';
            document.getElementById('subtotal-display').textContent = 'Rp 0';
            if (isLoggedIn) {
                document.getElementById('discount-display').textContent = '-Rp 0';
            }
        })
        .catch(error => {
            console.error('Booking error:', error);
            alert('Terjadi kesalahan saat memproses booking. Silakan coba lagi.');
        });
    });
</script>
@endpush

@endsection