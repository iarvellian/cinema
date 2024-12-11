<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
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

        .movies-section {

            padding: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        .movie-container {
            overflow-x: scroll;
            white-space: nowrap;
            padding: 10px 0;
            scrollbar-width: none;
            overflow-x: auto;
            overflow-y: auto;
        }

        .movie-container::-webkit-scrollbar {
            display: none;
        }

        .movie-grid {
            display: inline-flex;
            gap: 20px;
            scroll-snap-type: x mandatory;
        }

        .movie {
            background-color: #333;
            padding: 10px;
            border-radius: 10px;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
            scroll-snap-align: start;
        }

        .movie:hover {
            transform: scale(1.05);
        }

        .movie img {
            width: 100%;
            border-radius: 10px;
        }

        .recommended {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #6A3EB9;
            color: white;
            padding: 5px;
            font-size: 12px;
            border-radius: 5px;
        }

        .grid_movie {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 150px;
        }

        .title {
            text-align: center;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-group-sm {
            text-align: center;
            margin-top: 5px;
        }

        .btn {
            font-size: 12px;
        }




        .nowplaying {
            margin-left: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            padding-top: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-content {
            background-color: transparent;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 900px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            animation: fadeIn 1s ease;
            margin-bottom: 300px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #6A3EB9;
            padding-bottom: 10px;
            text-align: center;
        }

        .modal-title {
            font-size: 24px;
            color: #6A3EB9;
            margin: 0;
            flex: 1;
        }

        .close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close:hover {
            color: #bbb;
        }

        .modal-body {
            margin-top: 10px;
            color: white;
            text-align: center;
        }

        .image-container {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .image-container img {
            width: 80%;
            max-height: 400px;
        }

        .movie-info {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .modal-details {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .synopsis-container {
            max-width: 70%;
            color: white;
            font-size: 14px;
            line-height: 1.5;
            padding: 10px;
            text-align: justify;
        }

        .trailer-btn {
            background-color: #6A3EB9;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 30px;
        }

        .trailer-btn:hover {
            background-color: #5B31A3;
        }

        .ticket-btn {
            background-color: goldenrod;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 30px;
        }

        .ticket-btn:hover {
            background-color: gold;
        }

        /* recomended */
        .recommended-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: yellow;
            color: black;
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 15px;
        }

        .dropbtn {
            background-color: transparent;
            color: white;
            padding: 10px;
            font-size: 24px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 20px;
        }

        .dropbtn:hover {
            transform: scale(1.1);
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
            color: white;
            padding: 12px 16px;
            text-decoration: black;
            display: block;
            font-size: 14px;
            transition: background-color 0.3s ease;
            justify-content: center;

        }

        .dropdown-content a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .dropdown-content a:hover {
            background-color: #6A3EB9;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown:hover .dropdown-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
            animation: fadeIn 0.3s ease forwards;
        }
        


        /* Responsive */
        @media (max-width: 768px) {

            .movies-section {

                padding: 40px;
            }

            .modal-content {
                width: 95%;
                margin: 10px auto;
                padding: 10px;
            }

            .modal-title {
                font-size: 20px;
            }

            .image-container img {
                width: 100%;
                max-height: 300px;
            }

            .synopsis-container {
                max-width: 100%;
                font-size: 12px;
            }

            .modal-details {
                flex-direction: column;
            }

            .trailer-btn,
            .ticket-btn {
                margin: 10px;
                font-size: 14px;
            }

            .navbar {
                flex-direction: column;
                justify-content: space-between;
                align-items: flex-start;
            }

            .navbar .dropdown-content {
                margin-top: 10px;
                position: fixed;
                margin-right: 320px;
                display: block;
                background-color: transparent;
                box-shadow: none;
                padding-left: 0;
            }

            .dropdown:hover .dropdown-content {
                display: block;
                background-color: #f9f9f9;
            }

            .dropbtn {
                padding: 8px;
            }

            .dropbtn i {
                font-size: 16px;
            }

            .dropdown-content a {
                font-size: 14px;
            }
            

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

        .navbar-right {
            display: flex;
            align-items: center;
            margin-left: auto;
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

        .order-food-btn:hover i {
            animation: bounce 0.6s ease infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .order-food-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: all 0.5s ease;
            margin-left: 1110px;
        }

        .order-food-btn:active::after {
            width: 200%;
            height: 200%;
            opacity: 0;
            top: -50%;
            left: -50%;
        }

        
        
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <img src="{{ asset('images/Logo.png') }}" alt="Logo">

         <div class="navbar-right">
       <a href="{{ route('makanan') }}" class="order-food-btn" title="Order Food">
        <div class="fas fa-utensils"></div>
        </a>
       </div>


            <!-- Dropdown menu -->
            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="/profile"><i class="fas fa-user"></i> Profile</a>
                    <a href="#" id="logoutButton"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Movies Grid -->
    <div class="movies-section" style="margin-top: 40px;">
        <h2>Coming Soon</h2>
        <div class="movie-container">
            <div class="movie-grid">
                <!-- Boleh saja KUMENANGIS -->
                <div class="grid_movie movie"
                    onclick="openModal('BOLEHKAH SEKALI SAJA KUMENANGIS 17+', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/14BSSK.jpg', 
                    'https://www.youtube.com/watch?v=j-UOIJezxXo', '/buytiket',
                    'Film Bolehkah Sekali Saja Kumenangis menceritakan tentang kehidupan perempuan bernama Tari. Setelah kakaknya pergi meninggalkan rumah, Tari berjuang sendirian untuk menyelamatkan ibunya dari sang ayah yang abusive. Di sisi lain, Tari sendiri sudah menyimpan banyak sekali trauma sejak kecil dan kini ia merasa tak mampu lagi menahan semua bebannya. Suatu hari, dia menemukan Support Group, komunitas yang menjadi sebuah tempat untuk saling berbagi kisah. Di Support Group, Tari bertemu bernama Baskara, pria temperamental yang tidak bisa mengontrol emosinya. Mampukah kemudian Tari melewati semua traumanya dan tidak lagi menyimpan semua tangisnya sendiri?')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/14BSSK.jpg"
                        alt="BOLEHKAH SEKALI SAJA KUMENANGIS" style="max-height:280px">
                    <div class="title">BOLEHKAH SEKALI</div>
                    <div class="title">SAJA KUMENANGIS</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- TEYONG KOREA -->
                <div class="grid_movie movie"
                    onclick="openModal('TAEYONG TY TRACK IN CINEMA', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24TTTC.jpg', 
                    'https://www.youtube.com/watch?v=mzrPyEEm-qY', '/buytiket', 
                    'Taeyong TV Track In Cinemas akan memperlihatkan konser TY TRACK, di mana Taeyong sebagai solois dengan konsep yang memukau, menyuguhkan penampilan energik serta koreografi yang luar biasa.  Film ini akan menampilkan berbagai lagu dari album solo pertamanya, yang memperlihatkan beragam genre musik, mulai dari hip-hop, R&B, hingga elektronik.  Penonton dapat menikmati penampilan panggung spektakuler yang dikemas dengan pencahayaan artistik, efek visual yang memukau, dan koreografi yang penuh semangat. Tidak hanya konser solo, film dokumenter ini juga membawa penonton ke balik layar persiapan konser TY TRACK.')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24TTTC.jpg"
                        alt="TAEYONG TY TRACK IN CINEMAS" style="max-height:280px">
                    <div class="title">TAEYONG</div>
                    <div class="title">TY TRACK IN CINEMAS</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- JIGRA... -->
                <div class="grid_movie movie"
                    onclick="openModal('JIGRA', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24JIGA.jpg', 
                    'https://www.youtube.com/watch?v=OkpIoEC44kk', '/buytiket', 
                    'Film ini bercerita tentang Satya untuk memperjuangkan adiknya Ankur. Kisah keduanya bermula ketika mereka ditinggalkan oleh kedua orang tuanya. Saat itu, Satya dan Ankur harus tinggal bersama saudara mereka agar bisa bertahan hidup. Sayangnya, mereka harus membayar sewa atas pertolongan yang diberikan oleh saudaranya itu. Singkat cerita, Ankur harus berurusan dengan polisi karena kejahatannya atas kepemilikan narkoba dan dia mendapat hukuman mati. Satya yang mengetahui hal tersebut kemudian melakukan berbagai hal untuk membebaskan adiknya dari penjara. Perjuangan Satya tentunya tak mudah. Satya harus melewati berbagai tantangan yang menegangkan dan tentunya berbahaya. Beberapa kali Satya hampir kehilangan nyawanya. Namun, hal itu tak memudarkan semangatnya untuk bertemu kembali dengan sang adik. Penasaran dengan akhir kisah Satya dan Ankur?')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24JIGA.jpg"
                        alt="JIGRA" style="max-height:280px">
                    <div class="title">JIGRA</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- Canary Black... -->
                <div class="grid_movie movie"
                    onclick="openModal('CANARY BLACK', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/22CBLK.jpg', 
                    'https://www.youtube.com/watch?v=tSaw2HTVSsA', '/buytiket', 
                    'Canary Black mengisahkan tentang Avery Graves, seorang agen CIA yang sangat berpengalaman. Dalam film ini, Avery harus menghadapi pilihan hidup yang sulit ketika suaminya diculik oleh kelompok teroris. Para penculik menginginkan sebuah file berharga, dan Avery harus menemukan cara untuk mendapatkannya. Namun, misinya tak mudah-ia dituduh berkhianat kepada negaranya. Di sisi lain, kegagalannya berarti kematian suaminya.')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/22CBLK.jpg"
                        alt="CANARY BLACK" style="max-height:280px">
                    <div class="title">CANARY BLACK</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- Start up... -->
                <div class="grid_movie movie"
                    onclick="openModal('START UP NEVER GIVE UP', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/14SUNG.jpg', 
                    'https://www.youtube.com/watch?v=_jAqhTpOz_8', '/buytiket', 
                    'Film ini mengisahkan sosok Doni dan Rafi, dua orang kakak beradik yatim piatu yang hidup sederhana, cenderung pas-pasan. Hal ini terjadi karena Doni yang tidak cakap bekerja dan selalu dipecat oleh atasannya. Doni yang hidupnya sesah ternyata punya sifat buruk, yaitu playboy yang suka tebar pesona ke semua wanita cantik, termasuk ke tetangganya Dewi dan Pricila sekretaris kantor. Rafi yang kasihan melihat kakaknya selalu gagal dan menganggur aknhirnya membuat bisnis aplikasi start up berbasis angkutan online. Dua kakak beradik itu kemudian menggunakan mobil kijang butut peninggalan orang tua mereka sebagai modal usaha. Mereka bekerja keras mencari investor, menambah armada sampai pengalaman seru ketika mendapatkan penumpang dengan prilaku aneh bin ajaib. Bagaimana akhir dari usaha Doni dan Rafi? Apakah Doni akhinya dapat berubah menjadi orang yang sukses? ')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/14SUNG.jpg"
                        alt="START UP NEVER GIVE UP" style="max-height:280px">
                    <div class="title">START UP</div>
                    <div class="title">NEVER GIVE UP</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- Kemah terlrg... -->
                <div class="grid_movie movie"
                    onclick="openModal('KEMAH TERLARANG KESURUPAN MASAL', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/14KTKM.jpg', 
                    'https://www.youtube.com/watch?v=vjNwV4Wx5O0', '/buytiket', 
                    'Film ini diangkat dari kisah nyata yang terjadi pada tahun 2016 di Yogyakarta, mengisahkan sekelompok pelajar SMA yang mengadakan kegiatan berkemah di hutan Wana Alus. Di sana, mereka bertemu dengan Mbah Sonto, sosok penjaga hutan yang awalnya melarang kegiatan tersebut. Namun, akhirnya mereka diizinkan dengan satu syarat: tidak boleh mengganggu sesajen yang ada di area hutan.Selama tiga hari kegiatan berkemah, pada hari puncaknya, pementasan drama diadakan. Rini, salah satu pelajar, memerankan sosok Roro Putri dalam pementasan. Tak disangka, Rini mengalami kerasukan oleh jin yang mengaku sebagai Roro Putri. Kekacauan semakin memuncak ketika banyak peserta kemah mengalami kesurupan massal, menyebabkan beberapa terluka parah dan nyawa mereka terancam. Para pelajar yang tidak terkena kesurupan berupaya meminta pertolongan penduduk desa untuk mengatasi situasi tersebut. Apakah mereka bisa selamat?')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/14KTKM.jpg"
                        alt="KEMAH TERLARANG KESURUPAN MASAL" style="max-height:280px">
                    <div class="title">KEMAH TERLARANG</div>
                    <div class="title">KESURUPAN MASAL</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- The Wild Robot... -->
                <div class="grid_movie movie"
                    onclick="openModal('THE WILD ROBOT', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24WROT.jpg', 
                    'https://www.youtube.com/watch?v=67vbA5ZJdKQ', '/buytiket', 
                    'Film ini berkisah kisah sebuah robot, unit ROZZUM 7134, disingkat Roz, yang terdampar di sebuah pulau tak berpenghuni dan harus belajar beradaptasi dengan lingkungan yang keras dan perlahan membangun hubungan dengan hewan-hewan di pulau itu, serta menjadi orang tua angkat seekor angsa yatim piatu. Tidak hanya itu dia menghadapi ancaman dari lingkungan alam dan masa lalunya sendiri, hal yang tidak di sangka akan ada Kedatangan robot lain yang dikirim untuk mengambilnya menghadirkan konflik besar, memaksa Roz dan teman-teman hewannya mempertahankan cara hidup baru mereka, apakah mereka akan dapat mempertahankan lingkungannya?')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24WROT.jpg"
                        alt="THE WILD ROBOT" style="max-height:280px">
                    <div class="title">THE WILD ROBOT</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>

                <!-- Panda plan... -->
                <div class="grid_movie movie"
                    onclick="openModal('PANDA PLAN', 
                    'https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24PPLN.jpg', 
                    'https://www.youtube.com/watch?v=po5lQ05jiDI', '/buytiket', 
                    'Panda Plan berawal saat Jackie Chan mendapat undangan untuk mengadopsi seekor panda kebun binatang bernama Hu Hu. Situasi berubah drastis saat sindikat kriminal internasional menargetkan Hu Hu, dan menawarkan hadiah besar bagi siapa saja yang dapat menangkapnya. Melihat ancaman tersebut, Jackie Chan tidak tinggal diam. Ia segera meminta bantuan agennya, dan pengurus Hu Hu untuk melindungi panda tersebut. Mereka pun memulai petualangan penuh aksi dan humor, menghadapi beragam rintangan dengan kecerdikan, dan keterampilan bela diri Jackie Chan untuk menghadapi para penjahat. Dalam perjalanan ini, mereka tidak hanya berusaha menyelamatkan Huhu, tetapi juga belajar tentang persahabatan, dan tanggung jawab. Bagaimana kelanjutan film Panda Plan?')">
                    <img id='14BSSK' src="https://nos.jkt-1.neo.id/media.cinema21.co.id/movie-images/24PPLN.jpg"
                        alt="PANDA PLAN" style="max-height:280px">
                    <div class="title">PANDA PLAN</div>
                    <div class="btn-group-sm rating">
                        <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                        <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                        <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="movies-section">
        <h2>Now Playing</h2>
        <div class="movie-container">
            <div class="movie-grid">
                <!-- Venom: The Last Dance -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Venom: The Last Dance', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/17284681325846_405x594.jpg', 
                'https://www.youtube.com/watch?v=HyIyd9joTTc', '/buytiket', 
                'Venom: The Last Dance melanjutkan perjalanan Eddie Brock, yang kini berusaha mengatasi konflik internal dan eksternal dalam hidupnya. Setelah berbagai pertarungan dengan musuh-musuh sebelumnya, Eddie dan Venom harus menghadapi ancaman baru yang lebih kuat.Dalam film ini, sebuah organisasi jahat yang ingin menguasai kekuatan symbiote muncul, berusaha menciptakan symbiote-symbiote baru yang lebih berbahaya. Eddie menemukan bahwa mereka mengejar symbiote yang memiliki kemampuan yang bisa mengubah segalanya. Sementara itu, hubungan Eddie dengan Venom semakin rumit, di mana mereka berdua harus belajar untuk saling percaya dan bekerja sama lebih erat daripada sebelumnya. Lalu apakah kali ini Eddie dan Venom akan berpisah?')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/17284681325846_405x594.jpg"
                            alt="Venom: The Last Dance" style="max-height:280px">
                        <div class="title">Venom: </div>
                        <div class="title">The Last Dance</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!-- Smile 2 -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Smile 2', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172795133889258_405x594.jpg', 
                'https://www.youtube.com/watch?v=FU_bAopCcSE', '/buytiket', 
                'Skye Riley adalah seorang bintang pop terkenal yang akan melakukan tur dunia. Namun, tur dunia ini berjalan bak mimpi buruk bagi sang idol.Bermula dari kejadian menyeramkan nan misterius yang dialami oleh rekannya, Lewis (Lukas Cage). Ia tiba-tiba histeris melihat sesuatu yang tak kasat mata, lalu wajahnya berubah tersenyum menakutkan sambil melukai dirinya sendiri.Sejak kejadian itu, Skye Riley selalu dihantui oleh sosok misterius yang selalu tersenyum kepadanya. Sosok itu terus mengikutinya, termasuk saat sedang melakukan tur dunia.')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172795133889258_405x594.jpg"
                            alt="Smile 2" style="max-height:280px">
                        <div class="title">Smile 2</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!-- Sang Pengadil.. -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Sang Pengadil', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172744104317194_405x594.jpg', 
                'https://www.youtube.com/watch?v=vHm_pZTakiU', '/buytiket', 
                'Film ini mengisahkan tentang seorang hakim muda bernama Jojo yang pulang ke kampung halamannya setelah insiden yang mengganggu hidupnya.Dirinya harus berjuang dari bayang-bayang korupsi dan trauma masa lalu yang harus ia hadapi karena kematian tragis ayahnya yang juga seorang hakim. Dalam situasi yang rumit ini, Jojo mendapati dirinya terjebak dalam jaringan perdagangan manusia.Ini membuatnya harus bertarung melawan para koruptor yang mengancam keluarganya. Bersama dengan rekan-rekannya, termasuk hakim baru bernama Abigail, Jojo bertekad untuk menegakkan keadilan meski harus berurusan dengan kekuatan gelap yang dapat mengancam hidupnya dan keluarganya.')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172744104317194_405x594.jpg"
                            alt="Sang Pengadil" style="max-height:280px">
                        <div class="title">Sang Pengadil</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!-- Tebusan Dosa... -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Tebusan Dosa', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172733816680190_405x594.jpg', 
                'https://www.youtube.com/watch?v=cCILAXMXl-o', '/buytiket', 
                'Film ini mengikuti kisah seorang ibu bernama Wening. Dia mengalami kecelakaan sepeda motor ketika melewati sebuah jembatan. Dalam kecelakaan itu, Wening tidak sendiri. Dia bersama putrinya yang berusia 11 tahun, Nirmala, dan ibunya Uti Yah.Kejadian tragis itu membuat Nirmala jatuh ke sungai dan menghilang. Selain itu, kecelakaan tersebut juga merenggut nyawa Uti Yah. Setelah kejadian itu, Wening pun merasa sangat bersalah karena telah membuat ibunya meninggal dan anaknya hanyut di sungai. Meski begitu, Wening tetap yakin jika Nirmala masih hidup. Selain diliputi rasa bersalah, Wening juga mulai mengalami gangguan-gangguan mistis. Mulai dari bisikan-bisikan hantu hingga serangan fisik yang membahayakan nyawanya. Di sisi lain, ada seorang kreator podcast misteri perempuan bernama Tirta. Mengetahui kejadian yang dialami Wening, dia pun ingin membantu Wening dan mempublikasikan kehidupan wanita itu. Namun, bantuan itu ternyata membuat Tirta mengungkap rahasia kelam masa lalu Wening yang menyebabkan hilangnya Nirmala. ')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172733816680190_405x594.jpg"
                            alt="Tebusan Dosa" style="max-height:280px">
                        <div class="title">Tebusan Dosa</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!--Joker: Folie à Deux... -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Joker: Folie à Deux', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172663049483535_405x594.jpg', 
                'https://www.youtube.com/watch?v=_OKAwz2MsJs', '/buytiket', 
                'Joker: Folie à Deux melanjutkan kisah Arthur Fleck (Joaquin Phoenix) setelah rangkaian peristiwa dalam film pertamanya. Ia menjadi pasien di Rumah Sakit Jiwa Arkham sembari menunggu persidangan atas kejahatan yang dilakukan sebagai Joker.Di Arkham, Arthur Fleck bertemu seorang perempuan bernama Harleen Quinzel/Harley Quinn (Lady Gaga). Perempuan terapis musik itu mengaku memiliki masa lalu yang mirip dengan Arthur Fleck. Bahkan, Harleen menaruh ketertarikan pada Arthur Fleck. Menurutnya, kehadiran Joker membuatnya tidak kesepian lagi. Harleen mencoba membantu Arthur melarikan diri. Sayangnya, mereka gagal menjalankan misi tersebut. Arthur Fleck justru dipindahkan ke sel isolasi, sementara Harleen bebas. Meski begitu, Harleen berjanji akan hadir dalam persidangan Arthur Fleck.Joker: Folie à Deux juga memperlihatkan dukungan para pasien di Arkham untuk membebaskan Arthur Fleck. Terlebih setelah ia dinyatakan bersalah di persidangan. Para pengikut Joker lantas beramai-ramai membuat gerakan untuk membebaskannya dari tahanan.')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172663049483535_405x594.jpg"
                            alt="Joker: Folie à Deux" style="max-height:280px">
                        <div class="title">Joker: Folie à Deux</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!-- Weekend in Taipei... -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Weekend in Taipei', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172604662621812_405x594.jpg', 
                'https://www.youtube.com/watch?v=c9uL4TqDCjU', '/buytiket', 
                'Film ini mengikuti kisah seorang pria asing yang datang ke Taipei untuk menghabiskan akhir pekan.Namun, apa yang awalnya direncanakan sebagai liburan santai berubah menjadi mimpi buruk ketika ia terjebak dalam sebuah konspirasi yang berbahaya. Di tengah gemerlap kota, ia harus berjuang untuk bertahan hidup dan mengungkap kebenaran di balik kejadian-kejadian misterius yang menimpanya.')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172604662621812_405x594.jpg"
                            alt="Weekend in Taipei" style="max-height:280px">
                        <div class="title">Weekend in Taipei</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!-- Sumala... -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Sumala', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172345944024206_405x594.jpg', 
                'https://www.youtube.com/watch?v=aMaMeKHH6iM','/buytiket', 
                'Sumala menceritakan tentang dua anak kembar yang lahir dari pasangan Sulastri (Luna Maya) dan Soedjiman (Darius Sinathrya). Mereka telah lama ingin memiliki anak, tetapi tak kunjung diberikan. Akhirnya, mereka diam-diam melakukan perjanjian dengan iblis.Jauh sebelum anaknya lahir, Sulastri menjalankan rangkaian ritual untuk mendapatkan buah hati. Ia meminum beragam sesajen yang menjadi perantara proses perjanjian. Proses tersebut membuahkan hasil. Sulastri akhirnya mengandung anak kembar perempuan.Namun, hanya satu yang merupakan keturunan manusia. Ia diberi nama Sumala, putri yang memiliki keterbelakangan. Satu anak bernama Kumala adalah keturunan iblis. Ia tidak diperbolehkan hidup karena lahir dengan kondisi cacat fisik yang mengerikan. Nyawa Kumala diambil pada saat itu dengan cara yang tragis.')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172345944024206_405x594.jpg"
                            alt="Sumala" style="max-height:280px">
                        <div class="title">Sumala</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>

                <!-- Lembayung.. -->
                <div class="grid_movie movie" style="position: relative;">
                    <div class="recommended-badge">
                        Recommended
                    </div>
                    <div
                        onclick="openModal('Lembayung', 
                'https://media.21cineplex.com/webcontent/gallery/pictures/172309394512846_405x594.jpg', 
                'https://www.youtube.com/watch?v=DKzKQtC7E3M', '/buytiket', 
                'Film Lembayung dimulai dengan peristiwa naas yang menimpa seorang pasien di Klinik Lembayung. Pasien tersebut bernama Tantri (Anna Jobling) dan ia ditemukan meninggal gantung diri di sebuah bangsal poli gigi di klinik tersebut.Sesaat sebelum ditemukan meninggal, Tantri terlihat begitu ketakutan dan gerak geriknya mencurigakan karena cemas.Peristiwa naas tersebut kemudian cepat berubah menjadi gosip liar di kalangan masyarakat sekitar. Banyak bumbu-bumbu cerita yang dibubuhkan dan membuat banyak orang ogah berobat ke klinik tersebut.Pasca kasus bunuh diri tersebut, Klinik Lembayung seketika sepi pasien. Ingin mengenyahkan segala gosip liar tentang tempat kerjanya, dokter praktik di Klinik Lembayung, dr. Teto , memutar otak untuk mengatasinya.')">
                        <img id='14BSSK'
                            src="https://media.21cineplex.com/webcontent/gallery/pictures/172309394512846_405x594.jpg"
                            alt="Lembayung" style="max-height:280px">
                        <div class="title">Lembayung</div>
                        <div class="btn-group-sm rating">
                            <span class="btn btn-default btn-outline disabled" style="color: #005350;">2D</span>
                            <a class="btn btn-default btn-outline disabled" style="color: #005350;">D17+</a>
                            <span style="color:red; font-size:9px; margin-top:5px">*Advance Ticket Sales</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle" class="modal-title"></h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div class="modal-details">
                    <div class="image-container">
                        <img id="modalImage" src="" alt="">
                    </div>
                    <div class="synopsis-container">
                        <p id="modalSynopsis" class="description"></p>
                    </div>
                </div>
                <a id="trailerButton" href="#" target="_blank">
                    <button class="trailer-btn">Watch Trailer</button>
                </a>
                <a id="ticketButton" href="#" target="_blank">
                    <button class="ticket-btn">Buy Ticket</button>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function openModal(title, imageUrl, trailerUrl, buyTicketUrl, synopsis) {
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalImage").src = imageUrl;

            // Set the trailer button to link to the provided trailer URL
            const trailerButton = document.getElementById("trailerButton");
            trailerButton.setAttribute("href", trailerUrl);

            // Set the buy ticket button to link to the provided buyTicketUrl
            const ticketButton = document.getElementById("ticketButton");
            ticketButton.setAttribute("href", buyTicketUrl);

            document.getElementById("modalSynopsis").innerText = synopsis;
            document.getElementById("myModal").style.display = "block";

            const modal = document.getElementById("myModal");

            modal.style.display = "block";
            modal.querySelector('.modal-content').classList.add('fadeIn');


        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        window.onclick = function (event) {
            const modal = document.getElementById("myModal");
            if (event.target === modal) {
                closeModal();
            }
        }

        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }


        window.onclick = function (event) {
            const dropdownContent = document.querySelector('.dropdown-content');
            if (!event.target.matches('.dropbtn') && !event.target.closest('.dropdown')) {
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                }
            }
        }

        document.getElementById('logoutButton').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah aksi default dari link

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Logika logout di sini
                window.location.href = '/Login'; // Ganti dengan URL logout yang benar
            }
        });
        });
    </script>
</body>

</html>