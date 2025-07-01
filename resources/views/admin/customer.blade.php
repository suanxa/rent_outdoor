@extends('admin.adminDashboard')

@section('content')
<h2 class="mb-4">Daftar Akun Customer</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Customer</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(auth()->user()->role === 'admin')
                <form action="{{ route('customers.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus akun ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
                @else
                <span class="text-muted">Tidak diizinkan</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
