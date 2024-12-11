<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi - BiskopVerse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
        }

        .screen {
            width: 100%;
            height: 50px;
            background-color: #333;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 1.5em;
        }

        .seat-container {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 10px;
            margin: 20px;
        }

        .seat {
            width: 40px;
            height: 40px;
            background-color: #444;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .seat.selected {
            background-color: #e74c3c;
        }

        .seat.taken {
            background-color: #e74c3c;
            cursor: not-allowed;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e74c3c; 
            border: none;
            color: white;
            cursor: pointer;
        }

        button:disabled {
            background-color: #888;
            cursor: not-allowed;
        }

        .selected-seats {
            margin-top: 20px;
            font-size: 1.2em;
        }

        .tiket-btn {
            background-color: #f39c12;
            border: none;
            padding: 10px 20px;
            color: white;
            margin-top: 10px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .tiket-btn:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>

<div class="navbar">
    <img src="{{ asset('LogoBioskop.png') }}" alt="Logo" class="logo">
    <h2>Pilih Kursi Anda :</h2>
</div>

<div class="screen">Screen</div>

<div class="seat-container">
    <?php
    $taken_seats = ['A1', 'A3', 'B2', 'C4', 'D3', 'B1']; 
    
    for ($row = 'A'; $row <= 'G'; $row++) { 
        for ($col = 1; $col <= 10; $col++) {
            $seat_id = $row . $col;
            $class = 'seat';

            if (in_array($seat_id, $taken_seats)) {
                $class .= ' taken'; 
            }

            echo "<div class='$class' id='$seat_id' onclick='selectSeat(this)'>$seat_id</div>";
        }
    }
    ?>
</div>

<button id="confirm-button" disabled>Konfirmasi Pilihan</button>

<div class="selected-seats" id="selected-seats">
    <b>Kursi dipilih:</b> Anda belum memilih kursi 
</div>

<!-- Tambahan button Tiket -->
<button class="tiket-btn" id="tiket-button">Tiket</button>

<script>
    const selectedSeats = new Set();

    function selectSeat(seat) {
        if (seat.classList.contains('taken')) {
            alert("Kursi ini sudah terisi!");
            return;
        }

        seat.classList.toggle('selected');
        const seatId = seat.id;

        if (selectedSeats.has(seatId)) {
            selectedSeats.delete(seatId);
        } else {
            selectedSeats.add(seatId);
        }

        document.getElementById('confirm-button').disabled = selectedSeats.size === 0;
        updateSelectedSeats();
    }

    function updateSelectedSeats() {
        const selectedSeatsElement = document.getElementById('selected-seats');
        if (selectedSeats.size > 0) {
            selectedSeatsElement.textContent = "Kursi yang dipilih: " + Array.from(selectedSeats).join(', ');
        } else {
            selectedSeatsElement.textContent = "Kursi yang dipilih: Tidak ada";
        }
    }

    document.getElementById('confirm-button').addEventListener('click', () => {
        if (selectedSeats.size > 0) {
            alert("Kursi yang dipilih: " + Array.from(selectedSeats).join(', '));
        }
    });

    document.getElementById('tiket-button').addEventListener('click', () => {
        alert("Anda telah memilih kursi, Sekarang balik ke Pemesanan Tket");
        window.location.href = "{{ route('buytiket') }}";
    });
</script>

</body>
</html>
