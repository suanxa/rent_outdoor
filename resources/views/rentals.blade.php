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

    <div class="container mt-5 pt-5">
        <h1 class="mt-4 text-center">Form Booking Rental Outdoor</h1>
        <p class="text-center">Silakan isi data berikut untuk melakukan pemesanan sewa alat outdoor.</p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/rentals" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama Penyewa</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>

<div id="item-group">
    <div class="item-row mb-3 d-flex">
        <select name="items[]" class="form-select me-2" required>
            <option value="" disabled selected>-- Pilih Barang --</option>
            @foreach($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }} - Rp {{ number_format($item->rental_price, 0, ',', '.') }}/malam</option>
            @endforeach
        </select>
        <input type="number" name="quantities[]" class="form-control me-2" placeholder="Jumlah" required>
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

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="booked">Booked</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Harga (Rp)</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Pemesanan</button>
                </form>
            </div>
        </div>

    </div>  
<script>
document.getElementById('add-item').addEventListener('click', function() {
    const itemGroup = document.getElementById('item-group');
    const newItemRow = itemGroup.firstElementChild.cloneNode(true);
    newItemRow.querySelector('select').value = '';
    newItemRow.querySelector('input').value = '';
    itemGroup.appendChild(newItemRow);
});

// Hapus row
document.addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove-item')){
        e.target.closest('.item-row').remove();
    }
});
</script>

</body>
</html>
