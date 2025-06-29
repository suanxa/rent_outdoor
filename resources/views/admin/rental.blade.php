@extends('admin.adminDashboard')

@section('content')
<h2 class="mb-4">Data Pemesanan Rental</h2>

{{-- Form Pencarian --}}
<div class="sticky-top bg-white py-2" style="z-index: 1020;">
  <div class="mb-3 d-flex">
      <input type="text" id="searchInput" class="form-control me-2" placeholder="Cari Nama Penyewa...">
  </div>
</div>

<table class="table table-hover table-bordered align-middle text-center mb-4" id="rentalTable">
    <thead class="table-dark">
        <tr>
            <th style="width: 12%;">Nama Penyewa</th>
            <th style="width: 10%;">No HP</th>
            <th style="width: 15%;">Alamat</th>
            <th style="width: 10%;">Tgl Sewa</th>
            <th style="width: 10%;">Tgl Kembali</th>
            <th style="width: 12%;">Status</th>
            <th style="width: 12%;">Total Harga</th>
            <th style="width: 18%;">Detail Barang</th>
            <th style="width: 10%;">Aksi</th>
        </tr>
    </thead>
    <tbody id="rentalTableBody">
        @forelse ($rentals as $rental)
        <tr>
            <td class="namaPenyewa">{{ $rental->customer->name }}</td>
            <td>{{ $rental->customer->phone }}</td>
            <td>{{ $rental->customer->address }}</td>
            <td>{{ $rental->rental_date }}</td>
            <td>{{ $rental->return_date }}</td>
            <td class="statusCol">
                <span class="badge bg-info text-dark">{{ ucfirst($rental->status) }}</span>
            </td>
            <td>Rp{{ number_format($rental->total_price, 0, ',', '.') }}</td>
            <td class="text-start">
                <ul class="mb-0">
                    @foreach ($rental->items as $item)
                    <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs x Rp{{ number_format($item->pivot->subtotal, 0, ',', '.') }})</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <button class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $rental->id }}">Edit</button>
                <form action="/admin/rentals/{{ $rental->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $rental->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $rental->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/admin/rentals/{{ $rental->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Status Pesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="booked" {{ $rental->status == 'booked' ? 'selected' : '' }}>Booked</option>
                                    <option value="ongoing" {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $rental->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @empty
        <tr>
            <td colspan="9">Data pemesanan belum tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- CSS Tambahan --}}
<style>
#rentalTable {
    table-layout: fixed;
    width: 100%;
}
.statusCol {
    max-width: 150px;
    word-wrap: break-word;
    word-break: break-word;
}
.statusCol .badge {
    display: inline-block;
    padding: 0.35em 0.6em;
    font-size: 0.75rem;
    white-space: normal;
}
</style>

{{-- Live Search --}}
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let keyword = this.value.toLowerCase();
    let rows = document.querySelectorAll('#rentalTableBody tr');

    rows.forEach(function(row) {
        let namaPenyewa = row.querySelector('.namaPenyewa').textContent.toLowerCase();
        if (namaPenyewa.includes(keyword)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>

@endsection
