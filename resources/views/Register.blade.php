<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse</title>
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

        form .form-control {
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

        form .form-help {
            display: flex;
            justify-content: space-between;
        }

        form .form-help :where(label, a) {
            font-size: 0.9rem;
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
    </style>
</head>
<body>
    <nav>
         <a href="#"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class="form-wrapper">
        <h2>Register</h2>
        <form id="registerForm">
            <div class="form-control">
                <input type="text" id="username">
                <label>Username</label>
                <div class="error-message" id="usernameError">Please enter a valid username.</div>
            </div>
            <div class="form-control">
                <input type="text" id="email">
                <label>Email</label>
                <div class="error-message" id="emailError">Please enter a valid email address.</div>
            </div>
            <div class="form-control">
                <input type="password" id="password">
                <label>Password</label>
                <div class="error-message" id="passwordError">Your password must contain between 5 and 12 characters.</div>
            </div>
            <div class="form-control">
                <input type="password" id="confirmPassword">
                <label>Confirm Password</label>
                <div class="error-message" id="confirmPasswordError">Passwords do not match.</div>
            </div>
            <button type="submit" id="signUpButton">Sign Up</button>

        </form>
        <p>Already have an account? <a href="{{ url('/') }}">Sign in</a></p>
    </div>
    <script>
    const form = document.getElementById('registerForm');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const usernameError = document.getElementById('usernameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const signUpButton = document.getElementById('signUpButton');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let valid = true;

       
        if (!username.value) {
            usernameError.style.display = 'block';
            valid = false;
        } else {
            usernameError.style.display = 'none';
        }

        if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
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

        if (password.value !== confirmPassword.value) {
            confirmPasswordError.style.display = 'block';
            valid = false;
        } else {
            confirmPasswordError.style.display = 'none';
        }

        if (valid) {
            
            const userData = {
                username: username.value,
                email: email.value,
                password: password.value
            };

            localStorage.setItem('user', JSON.stringify(userData));
            alert('Berhasil Registrasi');

            
            window.location.href = "{{ url('/') }}";
        }
    });
</script>
</body>
</html>