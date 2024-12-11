<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse - Login</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: #000;
        }

        body::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.5;
            width: 100%;
            height: 100%;
            background: url("images/Picture.jpeg");
            background-position: center;
        }

        nav {
            position: fixed;
            padding: 25px 60px;
            z-index: 1;
        }

        nav a img {
            width: 167px;
        }

        .form-wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            border-radius: 4px;
            padding: 70px;
            width: 450px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .75);
        }

        .form-wrapper h2 {
            color: #fff;
            font-size: 2rem;
        }

        .form-wrapper form {
            margin: 25px 0 65px;
        }

        .form-control {
            height: 50px;
            position: relative;
            margin-bottom: 16px;
        }

        .form-control input {
            height: 100%;
            width: 100%;
            background: #333;
            border: none;
            outline: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            padding: 0 20px;
        }

        .form-control input:is(:focus, :valid) {
            background: #444;
            padding: 16px 20px 0;
        }

        .form-control label {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            pointer-events: none;
            color: #8c8c8c;
            transition: all 0.1s ease;
        }

        .form-control input:is(:focus, :valid)~label {
            font-size: 0.75rem;
            transform: translateY(-130%);
        }

        .error-message {
            color: #e50914;
            font-size: 0.875rem;
            margin-top: 1px;
            display: none;
        }

        form button {
            width: 100%;
            padding: 16px 0;
            font-size: 1rem;
            background: #e50914;
            color: #fff;
            font-weight: 500;
            border-radius: 4px;
            border: none;
            outline: none;
            margin: 25px 0 10px;
            cursor: pointer;
            transition: 0.1s ease;
        }

        form button:hover {
            background: #c40812;
        }

        .form-wrapper a {
            text-decoration: none;
        }

        .form-wrapper a:hover {
            text-decoration: underline;
        }

        .form-wrapper :where(label, p, small, a) {
            color: #b3b3b3;
        }

        .form-wrapper p a {
            color: #fff;
        }

        .form-wrapper small {
            display: block;
            margin-top: 15px;
            color: #b3b3b3;
        }

        .form-wrapper small a {
            color: #0071eb;
        }

        @media (max-width: 740px) {
            body::before {
                display: none;
            }

            nav, .form-wrapper {
                padding: 20px;
            }

            nav a img {
                width: 100px;
            }

            .form-wrapper {
                width: 100%;
                top: 43%;
            }

            .form-wrapper form {
                margin: 25px 0 40px;
            }
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav>
        <a href="#"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class="form-wrapper">
        <h2>Login</h2>
        <form id="loginForm">
            <div class="form-control">
                <input type="text" id="email">
                <label>Email or username</label>
                <div class="error-message" id="emailError">Please enter a valid email or username.</div>
            </div>
            <div class="form-control">
                <input type="password" id="password">
                <label>Password</label>
                <div class="error-message" id="passwordError">Your password must contain between 5 and 12 characters.</div>
            </div>
            <button type="submit">Sign In</button>
        </form>
        <p>Don’t have an account? <a href="{{ url('register') }}">Sign up now</a></p>
    </div>
    <script>
    const form = document.getElementById('loginForm');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    form.addEventListener('submit', (e) => {
        let valid = true;

        
        if (!email.value) {
            emailError.style.display = 'block';
            valid = false;
        } else {
            emailError.style.display = 'none';
        }

        
        if (password.value.length < 5 || password.value.length > 12) {
            passwordError.style.display = 'block';
            valid = false;
        } else {
            passwordError.style.display = 'none';
        }

        if (!valid) {
            e.preventDefault();
        } else {
            e.preventDefault(); 

            
            if (email.value === 'admin' && password.value === 'admin') {
                alert("Berhasil login sebagai admin");
                window.location.replace("{{ url('/home_admin') }}"); 
            } else {
                alert("Login berhasil");
                window.location.replace("{{ url('/home') }}"); 
            }
        }
    });
</script>
</body>
</html>