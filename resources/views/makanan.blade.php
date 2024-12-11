<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Makanan di Bioskop</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            margin: 0;
            overflow-x: hidden;
        }

        .navbar {
            background: linear-gradient(to right, #6A3EB9, #8A63D2);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 40px;
            margin-right: 10px;
        }

        .nav-items a {
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .nav-items a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }


        .menu-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        }

        .menu-section .container {

            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
            text-align: center;

        }

        .menu-section .container::-webkit-scrollbar {
            display: none;
        }

        .menu-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s ease;
            margin-right: 30px;
            margin-top: 20px;
        }

        .menu-section .menu-item {
            flex: 0 0 auto;
            width: 250px;
            margin-right: 30px;
            margin-bottom: 50px;
        }

        .menu-section h2 {
            margin-left: 450px;
            padding: 20px 0;
            font-weight: 600;
            color: #FF6B6B;
        }


        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(106, 62, 185, 0.3);
        }

        .menu-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .menu-item h4 {
            color: #FF6B6B;
            font-weight: 600;
        }

        .order-form {
            background: linear-gradient(45deg, #2a2a 2a, #3a3a3a);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;

            color: #ffffff;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(106, 62, 185, 0.25);
        }

        .btn-primary {
            background-color: #FF6B6B;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
        }

        footer {
            background: linear-gradient(45deg, #1a1a1a, #2a2a2a);
            padding: 20px 0;
            text-align: center;
            color: #ffffff;
        }

        main {
            position: relative;
            width: calc(min(90rem, 90%));
            margin: 0 auto;
            padding-block: min(20vh, 3rem);
        }

        .swiper {
            width: 100%;
            padding-top: 3rem;
        }

        .swiper-slide {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 500px;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            max-height: 400px;
            border-radius: 10px;
            object-fit: contain;
        }


        .swiper-slide h2 {
            color: white;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-size: 1.4rem;
            line-height: 1.4;
            margin-bottom: 0.625rem;
            padding: 0 0 0 1.563rem;
            text-transform: uppercase;
        }

        .swiper-slide p {
            color: white;
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            padding: 0 1.563rem;
            line-height: 1.6;
            font-size: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .swiper-slide a {
            margin: 1.25rem 1.563rem 3.438rem 1.563rem;
            padding: 0.438em 1.875rem;
            font-size: 0.9rem;
        }

        .swiper-slide .text-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
        }


        .swiper-slide--one {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn.idntimes.com/content-images/post/20220314/joyce-panda-lpsbmrrqmqw-unsplash-a39904772d8cc00b6a2fc049cb3b6416.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--two {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn.idntimes.com/content-images/post/20230308/306282266-10159987172125569-5019335170805071846-n-429772849fdc2b6dd798ed4ac1e78369.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--three {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn.idntimes.com/content-images/post/20230308/asian-food-2090943-960-720-a0de4ba54556e8f9d010af6c13aea5ed.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--four {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn.idntimes.com/content-images/post/20220314/nuggets-86d506b2004a5b141e8a79d689de5cf7.png") no-repeat 50% 50% / cover;
        }

        .swiper-slide--five {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn.idntimes.com/content-images/community/2022/12/nachos-4454941-1920-0dcc181682aeb0be40b6b459efb0f705-6fbbf51fb78d750873c4fdd6477ce4de.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #ffffff;
            width: 4em;
            height: 4em;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .futuristic-btn {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 11px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: 0.5s;
            letter-spacing: 2px;
            background: transparent;
            border: none;
            font-size: 0.6rem;
            font-weight: bold;
        }



        .futuristic-btn:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #6A3EB9,
                0 0 25px #6A3EB9,
                0 0 50px #6A3EB9,
                0 0 100px #6A3EB9;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu-section .container {
                display: flex;
                flex-wrap: nowrap;
                text-align: center;

            }

            .menu-section h2 {
                margin-left: 0;
                text-align: center;
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

            .tampilan-header {
                margin-top: 300px;
                background: linear-gradient(45deg, #000000, #1a1a1a);
                text-align: center;
                font-size: 1rem;
            }

            .uprcs {
                font-size: 15px;
            }

            .subtitle {
                font-size: 1.2rem;
            }

            body {
                word-wrap: break-word;
                overflow-wrap: break-word;
            }

            .tampilan-header {
                padding: 20px 10px;
            }

            .uprcs {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

        }

        .tampilan-header {
            margin-top: 80px;
            background: linear-gradient(45deg, #000000, #1a1a1a);
            text-align: center;
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
            transition: all 0.3s ease;
        }

        .subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            color: #fff;
            margin-top: 10px;
        }

        .uprcs {
            font-size: 4rem;
            font-weight: bold;
            text-transform: uppercase;
            position: relative;
            transition: font-size 0.3s ease;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Logo">
        <div class="nav-items">
            <a href="home" class="futuristic-btn">
                Home
            </a>
        </div>
    </div>

    <div class="tampilan-header">
        <h1 class="uprcs" data-text="Foodpage Bioskopverse">FoodPage Bioskopverse</h1>
        <p class="subtitle">Experience the taste of tomorrow, today!</p>
    </div>




    <main>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide--one">
                    <div class="text-container">
                        <h2>French Fries</h2>
                        <p>Kentang goreng atau french fries dengan rasa asin dan gurih. Kamu bisa memesannya selagi
                            hangat, lho</p>
                        <a href="#menu-section" class="btn btn-primary scroll-to-menu">Lihat Detail</a>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--two">
                    <div class="text-container">
                        <h2>Fried Fishball</h2>
                        <p>Fried fishball atau bakso ikan goreng menjadi favorit banyak orang karena teksturnya sangat
                            empuk dan rasanya gurih.</p>
                        <a href="#menu-section" class="btn btn-primary scroll-to-menu">Lihat Detail</a>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--three">
                    <div class="text-container">
                        <h2>Gorengan</h2>
                        <p>Gorengan yang paling dinikmati banyak orang adalah siomay gorengnya (fried siomay).
                            Teksturnya renyah dan garing di luar, tapi empuk di dalam.</p>
                        <a href="#menu-section" class="btn btn-primary scroll-to-menu">Lihat Detail</a>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--four">
                    <div class="text-container">
                        <h2>Chiken Nugget</h2>
                        <p>Chicken nugget biasanya dipadukan dengan kentang goreng. Serasa makan di rumah banget, nih.
                        </p>
                        <a href="#menu-section" class="btn btn-primary scroll-to-menu">Lihat Detail</a>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--five">
                    <div class="text-container">
                        <h2>Nachos</h2>
                        <p>Satu lagi camilan yang wajib dicicipi adalah nachos dengan kentang goreng. Renyahnya gak
                            ketulungan lho.</p>
                        <a href="#menu-section" class="btn btn-primary scroll-to-menu">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </main>

    <div id="menu-section" class="menu-section">
        <div class="container text-center">
            <h2>Daftar Menu</h2>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="menu-item">
            </div>
            <div class="menu-item">
                <img src="https://i.pinimg.com/control/564x/1c/87/68/1c8768ff8575c44ebd1df6141987bdbe.jpg"
                    alt="frenchfries">
                <h4>French Fries</h4>
                <p>French Fries renyah banget dengan berbagai pilihan saus.</p>
            </div>
            <div class="menu-item">
                <img src="https://i.pinimg.com/564x/d4/0e/2d/d40e2d3d9a94c346ef5eb675ed4e951c.jpg" alt="fishball">
                <h4>Fried Fishball</h4>
                <p>Fried Fishball dengan saus keju yang lezat.</p>
            </div>
            <div class="menu-item">
                <img src="https://i.pinimg.com/564x/58/35/5c/58355cf20b91baf2e7b774979d39cdc8.jpg" alt="gorengan">
                <h4>Gorengan</h4>
                <p>Gorengan lezat dengan berbagai pilihan saus.</p>
            </div>
            <div class="menu-item">
                <img src="https://i.pinimg.com/564x/01/36/ad/0136addea3b9c0e6170d5f485013d742.jpg" alt="chickennugget">
                <h4>Chicken Nugget</h4>
                <p>Chicken Nugget lezat dengan berbagai pilihan saus.</p>
            </div>
            <div class="menu-item">
                <img src="https://i.pinimg.com/control/564x/e6/85/ac/e685acc3bf2fe678ca9f59d410468e19.jpg" alt="nachos">
                <h4>Nachos</h4>
                <p>Nachos lezat dengan berbagai pilihan topping.</p>
            </div>
        </div>
    </div>

    <div class="order-section">
        <div class="container">
            <div class="text-center" style="margin-top: 40px;">
                <h2>Pesan Makanan Sekarang </h2>
            </div>
            <form action="/pesan-makanan" method="POST">
                <div class="form-group">
                    <label for="menu">Pilih Menu:</label>
                    <select class="form-control" id="menu" name="menu">
                        <option value="frenchfries">French Fries</option>
                        <option value="fishball">Fishball</option>
                        <option value="gorengan">Gorengan</option>
                        <option value="chickennugget">Chicken Nugget</option>
                        <option value="nachos">Nachos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1">
                </div>
                <div class="form-group">
                    <label for="nomor_kursi">Nomor Kursi:</label>
                    <input type="text" class="form-control" id="nomor_kursi" name="nomor_kursi"
                        placeholder="Masukkan nomor kursi">
                </div>
                <button type="submit" id="pesanskrg" class="btn btn-primary btn-block">Pesan Sekarang</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 BioskopVerse. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Smooth scroll function
        function smoothScroll(target) {
            const element = document.querySelector(target);
            if (element) {
                window.scrollTo({
                    behavior: 'smooth',
                    top: element.offsetTop - 100
                });
            }
        }

        // Add click event listener to all "Lihat Detail" buttons
        document.querySelectorAll('.scroll-to-menu').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                smoothScroll('#menu-section');
            });
        });

        // Swiper initialization
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        // Animate on scroll
        window.addEventListener('scroll', () => {
            const elements = document.querySelectorAll('.menu-item');
            elements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    el.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        });

        document.getElementById('pesanskrg').addEventListener('click', function(event) {
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
                window.location.href = '/pembayaranmkn'; // Ganti dengan URL logout yang benar
            }
        });
        });
    </script>
</body>

</html>