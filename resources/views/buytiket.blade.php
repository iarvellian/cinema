<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse - Pemesanan Tiket</title>
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

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .order-food-btn {
            background-color: #4CAF50;
            color: white;
            width: 38px;
            height: 38px;
            font-size: 24px;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            margin-right: 15px;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .order-food-btn i {
            transition: all 0.3s ease;
        }

        .order-food-btn:hover {
            background-color: #45a049;
            transform: scale(1.1);
        }

        .dropbtn {
            background-color: #6A3EB9;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dropbtn i {
            font-size: 18px;
        }

        .dropbtn:hover {
            background-color: #5B31A3;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            overflow: hidden;
            opacity: 0;
            margin-right: 20px;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #6A3EB9;
            color: white;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
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

        .booking-header button {
            background-color: #e94560;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(233, 69, 96, 0.4);
        }

        .booking-header button:hover {
            background-color: #d64161;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 69, 96, 0.6);
        }

        .booking-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            /* Memastikan form menggunakan seluruh lebar container */
        }

        .booking-form input[type="number"],
        .booking-form select,
        .booking-form input[type="date"],
        .booking-form input[type="submit"] {
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
            /* Memastikan padding tidak menambah lebar total */
        }

        .booking-form input[type="number"]:focus,
        .booking-form select:focus,
        .booking-form input[type="date"]:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .booking-form input[type="submit"] {
            background-color: #e94560;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(233, 69, 96, 0.4);
        }

        .booking-form input[type="number"],
        .booking-form select {
            width: 100%;
            padding: 15px;
            margin-bottom: 25px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transition: all 0.3s ease;
        }

        .booking-form input[type="number"]:focus,
        .booking-form select:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .booking-form select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="white" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: 50%;
        }

        .booking-form input[type="submit"]:hover {
            background-color: #d64161;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 69, 96, 0.6);
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }

        .choose-seat-btn {
            background-color: gold;
            color: whitesmoke;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .booking-form input[type="submit"] {
            flex: 1;
            margin-left: 10px;
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
            <h2>Pemesanan Tiket</h2>
            <button>Reset</button>
        </div>
        <form class="booking-form" action="{{ route('pembayaran') }}" method="POST">
    @csrf
    <input type="number" name="jumlah_tiket" placeholder="Jumlah Tiket" min="1" max="10" required>
    <select name="showtime" required>
        <option value="">Pilih Jam Tayang</option>
        <option value="10:00">10:00</option>
        <option value="13:00">13:00</option>
        <option value="16:00">16:00</option>
        <option value="19:00">19:00</option>
        <option value="22:00">22:00</option>
    </select>
    <input type="date" name="tanggal" required>
    <div class="form-buttons">
        <a href="{{ route('kursi') }}" class="choose-seat-btn">Pilih Kursi</a>
    </div>
    <input id="pesantiket" type="submit" value="Pesan Tiket">
    
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       document.getElementById('pesantiket').addEventListener('click', function(event) {
        event.preventDefault(); 

        Swal.fire({
            title: 'Pemesanan Sudah sesuai',
            text: "Lanjutkan pembayaran!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Payment'
        }).then((result) => {
            if (result.isConfirmed) {
               
                window.location.href = '/pembayaran';
            }
        });
        });


    </script>
    
</body>

</html