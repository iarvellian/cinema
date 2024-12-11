<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #333;
            color: white;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
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
            width: 80px;
            height: auto;
        }

        .btn-group-sm {
            text-align: center;
            margin-top: 5px;
        }

        .btn {
            font-size: 12px;
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
            background-color: #444;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            animation: fadeIn 1s ease;
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

        .modal-details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-start;
        }

        .trailer-btn {
            background-color: #6A3EB9;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 20px 0;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #6A3EB9;
        }

        .dropbtn:hover+.dropdown-content,
        .dropdown-content:hover {
            display: block;
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
            /* Transisi untuk hover */

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
            /* Transisi muncul */
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .order-food-btn {
            background-color: grey;
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

        table {
            width: 100%;
            color: white;
            text-align: center;
        }

        table th,
        table td {
            padding: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar img {
                width: 60px;
            }

            .modal-content {
                width: 95%;
                max-width: 500px;
            }

            .dropbtn {
                font-size: 14px;
            }

            .trailer-btn {
                padding: 8px 12px;
                margin: 10px 0;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                width: 100%;
                padding: 10px;
            }

            .trailer-btn {
                font-size: 12px;
                padding: 5px 10px;
            }

            .dropbtn {
                font-size: 12px;
                padding: 8px;
            }
        }

        .welcome-message {
            text-align: center;
            padding: 70px 70px;
            background: linear-gradient(45deg, #6A3EB9, #9B59B6);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin: 20px;
            animation: gradientAnimation 5s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .welcome-message h2 {
            font-size: 48px;
            color: #FFFFFF;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
            margin: 0;
            font-family: 'Arial', sans-serif;
            animation: textPop 0.5s ease-out;
        }

        @keyframes textPop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .welcome-message::after {
            content: '👋';
            font-size: 36px;
            display: block;
            margin-top: 10px;
            animation: wave 1s ease-in-out infinite;
        }

        @keyframes wave {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(20deg);
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Logo">

        <div class="navbar-right">
            <button class="order-food-btn" title="Order Food">
                <i class="fas fa-user"></i>
            </button>

            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#" id="logoutButton"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <a href="#" onclick="openUserModal()"><i class="fas fa-users-cog"></i> User</a>
                    <a href="#" onclick="openSeatModal()"><i class="fas fa-chair"></i> Kursi</a>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="welcome-message">
            <h2>Welcome Admin</h2>
        </div>
    </div>

    <div id="userManagementModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User</h2>
                <span class="close" onclick="closeUserModal()">&times;</span>
            </div>
            <div class="modal-body">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">

                    </tbody>
                </table>

                <button class="trailer-btn" onclick="addUser()">Add New</button>
            </div>
        </div>
    </div>

    <div id="seatManagementModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Kursi</h2>
                <span class="close" onclick="closeSeatModal()">&times;</span>
            </div>
            <div class="modal-body">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nomor Kursi</th>
                            <th>Baris</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="seatTableBody">

                    </tbody>
                </table>

                <button class="trailer-btn" onclick="addSeat()">Add New</button>
            </div>
        </div>
    </div>

    <script>

        document.querySelector('.dropbtn').addEventListener('click', function () {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        });

        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }

        let users = [
            { id: 1, username: 'Cruaz', email: 'Cruaz@example.com' },
            { id: 2, username: 'Ardha', email: 'Ardha@example.com' },
        ];

        function openUserModal() {
            const modal = document.getElementById('userManagementModal');
            modal.style.display = 'block';
            displayUsers();
        }

        function closeUserModal() {
            document.getElementById('userManagementModal').style.display = 'none';
        }

        function displayUsers() {
            const userTableBody = document.getElementById('userTableBody');
            userTableBody.innerHTML = '';
            users.forEach(user => {
                userTableBody.innerHTML += `
            <tr>
                <td>${user.id}</td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>
                    <button class="trailer-btn" onclick="editUser(${user.id})">Edit</button>
                    <button class="trailer-btn" onclick="deleteUser(${user.id})">Delete</button>
                </td>
            </tr>
        `;
            });
        }

        function addUser() {
            const id = users.length + 1;
            const username = prompt('Enter username:');
            const email = prompt('Enter email:');
            if (username && email) {
                users.push({ id, username, email });
                displayUsers();
            }
        }

        let seats = [
            { id: 1, nomor: 'A1', baris: 'A' },
            { id: 2, nomor: 'A2', baris: 'A' },
        ];

        function openSeatModal() {
            const modal = document.getElementById('seatManagementModal');
            modal.style.display = 'block';
            displaySeats();
        }

        function closeSeatModal() {
            document.getElementById('seatManagementModal').style.display = 'none';
        }

        function displaySeats() {
            const seatTableBody = document.getElementById('seatTableBody');
            seatTableBody.innerHTML = '';
            seats.forEach(seat => {
                seatTableBody.innerHTML += `
            <tr>
                <td>${seat.id}</td>
                <td>${seat.nomor}</td>
                <td>${seat.baris}</td>
                <td>
                    <button class="trailer-btn" onclick="editSeat(${seat.id})">Edit</button>
                    <button class="trailer-btn" onclick="deleteSeat(${seat.id})">Delete</button>
                </td>
            </tr>
        `;
            });
        }
        function addSeat() {
            const id = seats.length + 1;
            const nomor = prompt('Enter seat number:');
            const baris = prompt('Enter row:');
            if (nomor && baris) {
                seats.push({ id, nomor, baris });
                displaySeats();
            }
        }
    </script>

</body>

</html><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiskopVerse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #333;
            color: white;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
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
            width: 80px;
            height: auto;
        }

        .btn-group-sm {
            text-align: center;
            margin-top: 5px;
        }

        .btn {
            font-size: 12px;
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
            background-color: #444;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            animation: fadeIn 1s ease;
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

        .modal-details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-start;
        }

        .trailer-btn {
            background-color: #6A3EB9;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 20px 0;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #6A3EB9;
        }

        .dropbtn:hover+.dropdown-content,
        .dropdown-content:hover {
            display: block;
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
            /* Transisi untuk hover */

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
            /* Transisi muncul */
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .order-food-btn {
            background-color: grey;
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

        table {
            width: 100%;
            color: white;
            text-align: center;
        }

        table th,
        table td {
            padding: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar img {
                width: 60px;
            }

            .modal-content {
                width: 95%;
                max-width: 500px;
            }

            .dropbtn {
                font-size: 14px;
            }

            .trailer-btn {
                padding: 8px 12px;
                margin: 10px 0;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                width: 100%;
                padding: 10px;
            }

            .trailer-btn {
                font-size: 12px;
                padding: 5px 10px;
            }

            .dropbtn {
                font-size: 12px;
                padding: 8px;
            }
        }

        .welcome-message {
            text-align: center;
            padding: 70px 70px;
            background: linear-gradient(45deg, #6A3EB9, #9B59B6);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin: 20px;
            animation: gradientAnimation 5s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .welcome-message h2 {
            font-size: 48px;
            color: #FFFFFF;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
            margin: 0;
            font-family: 'Arial', sans-serif;
            animation: textPop 0.5s ease-out;
        }

        @keyframes textPop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .welcome-message::after {
            content: '👋';
            font-size: 36px;
            display: block;
            margin-top: 10px;
            animation: wave 1s ease-in-out infinite;
        }

        @keyframes wave {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(20deg);
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Logo">

        <div class="navbar-right">
            <button class="order-food-btn" title="Order Food">
                <i class="fas fa-user"></i>
            </button>

            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#" id="logoutButton"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <a href="#" onclick="openUserModal()"><i class="fas fa-users-cog"></i> User</a>
                    <a href="#" onclick="openSeatModal()"><i class="fas fa-chair"></i> Kursi</a>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="welcome-message">
            <h2>Welcome Admin</h2>
        </div>
    </div>

    <div id="userManagementModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User</h2>
                <span class="close" onclick="closeUserModal()">&times;</span>
            </div>
            <div class="modal-body">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">

                    </tbody>
                </table>

                <button class="trailer-btn" onclick="addUser()">Add New</button>
            </div>
        </div>
    </div>

    <div id="seatManagementModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Kursi</h2>
                <span class="close" onclick="closeSeatModal()">&times;</span>
            </div>
            <div class="modal-body">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nomor Kursi</th>
                            <th>Baris</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="seatTableBody">

                    </tbody>
                </table>

                <button class="trailer-btn" onclick="addSeat()">Add New</button>
            </div>
        </div>
    </div>

    <script>

        document.querySelector('.dropbtn').addEventListener('click', function () {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        });

        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }

        let users = [
            { id: 1, username: 'Cruaz', email: 'Cruaz@example.com' },
            { id: 2, username: 'Ardha', email: 'Ardha@example.com' },
        ];

        function openUserModal() {
            const modal = document.getElementById('userManagementModal');
            modal.style.display = 'block';
            displayUsers();
        }

        function closeUserModal() {
            document.getElementById('userManagementModal').style.display = 'none';
        }

        function displayUsers() {
            const userTableBody = document.getElementById('userTableBody');
            userTableBody.innerHTML = '';
            users.forEach(user => {
                userTableBody.innerHTML += `
            <tr>
                <td>${user.id}</td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>
                    <button class="trailer-btn" onclick="editUser(${user.id})">Edit</button>
                    <button class="trailer-btn" onclick="deleteUser(${user.id})">Delete</button>
                </td>
            </tr>
        `;
            });
        }

        function addUser() {
            const id = users.length + 1;
            const username = prompt('Enter username:');
            const email = prompt('Enter email:');
            if (username && email) {
                users.push({ id, username, email });
                displayUsers();
            }
        }

        let seats = [
            { id: 1, nomor: 'A1', baris: 'A' },
            { id: 2, nomor: 'A2', baris: 'A' },
        ];

        function openSeatModal() {
            const modal = document.getElementById('seatManagementModal');
            modal.style.display = 'block';
            displaySeats();
        }

        function closeSeatModal() {
            document.getElementById('seatManagementModal').style.display = 'none';
        }

        function displaySeats() {
            const seatTableBody = document.getElementById('seatTableBody');
            seatTableBody.innerHTML = '';
            seats.forEach(seat => {
                seatTableBody.innerHTML += `
            <tr>
                <td>${seat.id}</td>
                <td>${seat.nomor}</td>
                <td>${seat.baris}</td>
                <td>
                    <button class="trailer-btn" onclick="editSeat(${seat.id})">Edit</button>
                    <button class="trailer-btn" onclick="deleteSeat(${seat.id})">Delete</button>
                </td>
            </tr>
        `;
            });
        }
        function addSeat() {
            const id = seats.length + 1;
            const nomor = prompt('Enter seat number:');
            const baris = prompt('Enter row:');
            if (nomor && baris) {
                seats.push({ id, nomor, baris });
                displaySeats();
            }
        }
    </script>

</body>

</html>