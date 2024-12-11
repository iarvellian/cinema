<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment for Food - Bioskopverse</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: #ffffff;
            margin: 0;
            overflow-x: hidden;
        }

        .navbar {
            background: linear-gradient(to right, #6A3EB9, #8A63D2);
            padding: 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 40px;
            margin-right: 15px;
        }

        .nav-items a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-items a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .tampilan-header {
            margin-top: 100px;
            text-align: center;
            padding: 60px 20px;
            border-radius: 0 0 50% 50% / 20px;
        }

        .tampilan-header h1 {
            font-size: 3rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #8e2de2, 0 0 20px #8e2de2;
            }
            to {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #8e2de2, 0 0 40px #8e2de2;
            }
        }

        .subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            color: #b8c1ec;
        }

        .order-form {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135,  0.37);
        }

        .payment-header {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
            color: #8e2de2;
        }

        .payment-method {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .payment-method img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .payment-method label {
            font-size: 1.2rem;
            font-weight: 500;
            color: #b8c1ec;
        }

        .payment-method input[type="radio"] {
            display: none;
        }

        .payment-method input[type="radio"] + label {
            position: relative;
            padding-left: 25px;
            cursor: pointer;
        }

        .payment-method input[type="radio"] + label:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .payment-method input[type="radio"]:checked + label:before {
            background-color: #8e2de2;
            border-color: #8e2de2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1.2rem;
            font-weight: 500;
            color: #b8c1ec;
        }

        .form-group input[type="text"] {
            padding: 10px;
            font-size: 1.2rem;
            border: none;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .form-group input[type="text"]:focus {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        button[type="submit"] {
            background-color: #8e2de2;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: 500;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #4a00e0;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #1a1a2e;
            color: #b8c1ec;
        }

        footer p {
            margin-bottom: 10px;
        }

        .qr-code {
            width: 100px;
            height: 100px;
            margin: 20px auto;
            border-radius: 10px;
            background-color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qr-code img {
            width: 80px;
            height: 80px;
        }

        .futuristic-btn {
                overflow: hidden;
                transition: 0.5s;
                letter-spacing: 2px;
                background: transparent;
                border: none;
            }

        .futuristic-btn:hover {
                box-shadow: 0 0 5px #6A3EB9,
                    0 0 25px #6A3EB9,
                    0 0 50px #6A3EB9,
                    0 0 100px #6A3EB9;
            }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Logo">
        <div class="nav-items">
            <a href="home" class="futuristic-btn">Home</a>
        </div>
    </div>

    <div class="tampilan-header">
        <h1 class="uprcs" data-text="Payment for Food">Payment for Food</h1>
        <p class="subtitle">Selesaikan pembayaran untuk pesanan Anda!</p>
    </div>

    <main>
        <div class="container">
            <!-- Payment Form Section -->
            <div class="order-form" id="orderForm">
                <h2 class="payment-header">Pembayaran Anda</h2>
                <form action="/pesan-makanan" method="POST">
                    <div class="payment-method">
                        <input type="radio" id="creditCard" name="paymentMethod" value="creditCard">
                        <label for="creditCard"><img src="https://img.icons8.com/color/48/000000/visa.png" alt="Visa"> Kartu Kredit</label>
                        <input type="radio" id="debitCard" name="paymentMethod" value="debitCard">
                        <label for="debitCard"><img src="https://img.icons8.com/color/48/000000/mastercard.png" alt="Master card"> Kartu Debit</label>
                        <input type="radio" id="cash" name="paymentMethod" value="cash">
                        <label for="cash"><img src="https://img.icons8.com/color/48/000000/money.png" alt="Cash"> Tunai</label>
                        <input type="radio" id="qris" name="paymentMethod" value="qris">
                        <label for="qris"><img src="https://img.ssicons8.com/color/48/000000/qr-code.png" alt="QRIS"> QRIS</label>
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Nomor Kartu:</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Masukkan nomor kartu" required>
                    </div>
                    <div class="form-group">
                        <label for="expirationDate">Tanggal Kedaluwarsa:</label>
                        <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="MM/YY" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Masukkan CVV" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Konfirmasi Pembayaran</button>
                </form>
                <div class="qr-code">
                    <img src="https://niagaspace.sgp1.digitaloceanspaces.com/blog/wp-content/uploads/2021/02/02081213/tampilan-qr-code-768x768.jpg" alt="QRIS Code">
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 BioskopVerse. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>