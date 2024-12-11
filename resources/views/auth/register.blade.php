<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
</head>

<body>
    <h1>Register Page</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Nama -->
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama">
        @if ($errors->has('nama'))
        <span>{{ $errors->first('nama') }}</span>
        @endif

        <!-- Email -->
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
        @if ($errors->has('email'))
        <span>{{ $errors->first('email') }}</span>
        @endif

        <!-- Username -->
        <input type="text" name="username" value="{{ old('username') }}" placeholder="Username">
        @if ($errors->has('username'))
        <span>{{ $errors->first('username') }}</span>
        @endif

        <!-- Password -->
        <input type="password" name="password" placeholder="Password">
        @if ($errors->has('password'))
        <span>{{ $errors->first('password') }}</span>
        @endif

        <button type="submit">Register</button>
    </form>

    <!-- Pesan sukses -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

</body>

</html>