<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>

<body>
    <h1>Selamat Datang, {{ Auth::user()->nama }}</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <button onclick="window.location.href='{{ route('update-profile-form') }}'">Update Profile</button>
    <button onclick="window.location.href='{{ route('user.film.daftar-film') }}'">Daftar Film</button>
    <button onclick="window.location.href='{{ route('user.makanan.daftar-makanan') }}'">Daftar Makanan</button>
    <button onclick="window.location.href='{{ route('user.histori') }}'">Histori Transaksi</button>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>