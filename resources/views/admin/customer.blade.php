@extends('admin.adminDashboard')

@section('content')
<h2 class="mb-4">Daftar Akun Customer</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Customer</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
