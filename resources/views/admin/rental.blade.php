@extends('admin.adminDashboard')

@section('content')
<h2 class="mb-4">Data Pemesanan Rental</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Penyewa</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Tgl Sewa</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Total Harga</th>
            <th>Detail Barang</th>
        </tr>
    </thead>
    <tbody>
@foreach ($rentals as $rental)
<tr>
    <td>{{ $rental->customer->name }}</td>
    <td>{{ $rental->customer->phone }}</td>
    <td>{{ $rental->customer->address }}</td>
    <td>{{ $rental->rental_date }}</td>
    <td>{{ $rental->return_date }}</td>
    <td>{{ ucfirst($rental->status) }}</td>
    <td>Rp{{ number_format($rental->total_price, 0, ',', '.') }}</td>
    <td>
        <ul>
            @foreach ($rental->items as $item)
            <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs x Rp{{ number_format($item->pivot->subtotal, 0, ',', '.') }})</li>
            @endforeach
        </ul>
    </td>
</tr>
@endforeach

    </tbody>
</table>
@endsection
