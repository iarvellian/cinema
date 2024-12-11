<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse - Metode Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0a0a0a;
            color: #1a1a1a;
            overflow-x: hidden;
        }

        .navbar {
            background-color: #6A3EB9;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .booking-container {
            max-width: 800px;
            margin: 120px auto;
            padding: 30px;
            background: rgba(51, 51, 51, 0.8);
            border-radius: 20px;
            box-shadow: #0a0a0a;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .booking-header h2 {
            font-size: 32px;
            color: white;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .booking-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .booking-form input[type="number"],
        .booking-form select,
        .booking-form input[type="date"],
        .booking-form input[type="submit"],
        .booking-form input[type="radio"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 25px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .booking-form input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        .booking-form input[type="submit"] {
            background-color: #e94560;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .booking-form input[type="submit"]:hover {
            background-color: #d64161;
        }

        .payment-methods {
            margin: 20px 0;
        }

        .payment-methods label {
            font-size: 16px;
            color: white;
        }

        .booking-header button {
            background-color: #e94560;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .booking-header button:hover {
            background-color: #d64161;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Logo">
    </div>

    <!-- Booking Container -->
    <div class="booking-container">
        <div class="booking-header">
            <h2>Pilih Metode Pembayaran</h2>
        </div>
        <form class="booking-form">
            <div class="payment-methods">
                <label>
                    <input type="radio" name="payment-method" value="Credit Card"> Kartu Kredit
                </label>
                <label>
                    <input type="radio" name="payment-method" value="E-Wallet"> E-Wallet
                </label>
                <label>
                    <input type="radio" name="payment-method" value="Transfer Bank"> Transfer Bank
                </label>
            </div>
            <input type="submit" value="Bayar Sekarang" id="bayar-sekarang">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('bayar-sekarang').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedMethod = document.querySelector('input[name="payment-method"]:checked');
            
            if (selectedMethod) {
                Swal.fire(
                    'Pembayaran Berhasil!',
                    'Anda telah memilih metode pembayaran: ' + selectedMethod.value,
                    'success'
                );
            } else {
                Swal.fire(
                    'Gagal!',
                    'Silakan pilih metode pembayaran.',
                    'error'
                );
            }
        });
    </script>
</body>

</html>
