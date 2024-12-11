<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Selamat Datang, {{ Auth::user()->nama }}</h1>
    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <button onclick="window.location.href='{{ route('update-profile-form') }}'">Update Profile</button>
    <button onclick="window.location.href='{{ route('admin.userlist') }}'">Daftar Pengguna</button>
    <button onclick="window.location.href='{{ route('admin.transaction-film-history') }}'">Histori Transaksi Film</button>
    <button onclick="window.location.href='{{ route('admin.transaction-makanan-history') }}'">Histori Transaksi Makanan</button>
    <br>
    <button onclick="window.location.href='{{ route('admin.film.index') }}'">Daftar Film</button>
    <button onclick="window.location.href='{{ route('admin.jadwal.index') }}'">Daftar Jadwal</button>
    <button onclick="window.location.href='{{ route('admin.kursi.index') }}'">Daftar Kursi</button>
    <button onclick="window.location.href='{{ route('admin.makanan.index') }}'">Daftar Makanan</button>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>