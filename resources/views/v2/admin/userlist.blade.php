<h1>Daftar Pengguna</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->nama }} - {{ $user->role->jenis_role }}
        </li>
    @endforeach
</ul>