<!DOCTYPE html>
<html>

<head>
    <title>Update Profile</title>
</head>

<body>
    <h1>Update Profile</h1>

    <!-- Form untuk memperbarui profile -->
    <form action="{{ route('update-profile') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}">
        @error('nama')
        <p>{{ $message }}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
        @error('email')
        <p>{{ $message }}</p>
        @enderror

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}">
        @error('username')
        <p>{{ $message }}</p>
        @enderror

        <label for="password">Password (Optional):</label>
        <input type="password" name="password" id="password">

        <button type="submit">Update Profile</button>
    </form>
</body>

</html>