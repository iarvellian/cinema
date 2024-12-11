<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login Page</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="username" placeholder="Username">
        @if ($errors->has('username'))
        <span>{{ $errors->first('username') }}</span>
        @endif

        <input type="password" name="password" placeholder="Password">
        @if ($errors->has('password'))
        <span>{{ $errors->first('password') }}</span>
        @endif

        <button type="submit">Login</button>
    </form>
</body>

</html>