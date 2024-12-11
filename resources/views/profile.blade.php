<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - CinemaVerse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #1a1a1a;
    color: white;
}

.container {
    padding: 20px;
    max-width: 800px;
    margin: auto;
}

.profile-header {
    text-align: center;
    margin-bottom: 40px;
}

.profile-header h1 {
    font-size: 3em;
    color: #6a0dad; 
}

.profile-header p {
    font-size: 1.2em;
    color: #ccc;
}

form {
    background-color: #333;
    padding: 20px;
    border-radius: 10px;
}

label {
    display: block;
    margin: 15px 0 5px;
    font-size: 1.1em;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 20px;
    background-color: #444;
    color: white;
    font-size: 1em;
}

.info-section {
    margin-top: 30px;
}

.info-section h2 {
    font-size: 1.5em;
    color: #6a0dad; 
    margin-bottom: 15px;
}

.info-section p {
    color: #ccc;
    line-height: 1.6;
}

button {
    padding: 10px 30px;
    background-color: #6a0dad; 
    border: none;
    color: white;
    cursor: pointer;
    font-size: 1.2em;
    border-radius: 5px;
    width: 100%;
}

button:hover {
    background-color: #4b0082; 
}

.footer {
    margin-top: 20px;
    text-align: center;
    color: #ccc;
}

.success-message {
    display: none;
    margin-top: 20px;
    padding: 15px;
    background-color: #27ae60;
    color: white;
    text-align: center;
    border-radius: 5px;
}

    </style>
</head>
<body>

<div class="container">
    <div class="profile-header">
        <h1>Profile </h1>
        <p>Kelola akun bioskop</p>
    </div>

  
    <div id="success-message" class="success-message">
        Perubahan berhasil disimpan!
    </div>

    <form id="profile-form">
        <label for="cinema-name">Username</label>
        <input type="text" id="cinema-name" name="cinema-name" placeholder="Masukkan Usernamae" value="Diko" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" value="dikodiko@gmail.com" required>

        <label for="password">Password Baru</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password baru">

        <button type="submit">Simpan Perubahan</button>
    </form>

    <div class="info-section">
        <h2>Informasi Akun</h2>
        <p>Nama Bioskop: <span id="info-cinema-name">Diko</span></p>
        <p>Email: <span id="info-email">dikodiko@gmail.com</span></p>
        <p>Deskripsi: Bioskop modern dengan berbagai pilihan Film, serta fasilitas premium seperti kursi recliner, kafe, dan Wi-Fi gratis untuk semua pengunjung.</p>
        <h3>Fasilitas</h3>
            <ul>
                <li><i class="fas fa-chair"></i> Kursi Recliner yang Nyaman</li>
                <li><i class="fas fa-wifi"></i> Wi-Fi Gratis di Semua Area</li>
                <li><i class="fas fa-parking"></i> Area Parkir Luas</li>
                <li><i class="fas fa-coffee"></i> Kafe dan Restoran</li>
                <li><i class="fas fa-ticket-alt"></i> Pemesanan Tiket Online</li>
            </ul>
    </div>

    <div class="footer">
        <p>&copy; 2024 CinemaVerse. All rights reserved.</p>
    </div>
</div>

<script>
 
    document.getElementById('profile-form').addEventListener('submit', function(e) {
        e.preventDefault();  

  
        var cinemaName = document.getElementById('cinema-name').value;
        var email = document.getElementById('email').value;

       
        document.getElementById('info-cinema-name').textContent = cinemaName;
        document.getElementById('info-email').textContent = email;


        var successMessage = document.getElementById('success-message');
        successMessage.style.display = 'block';

  
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 3000);
    });
</script>

</body>
</html>
