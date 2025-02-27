<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enigma - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            animation: kelip 1s ease;
        }

        @keyframes kelip {
            from {
                opacity: 0;
            } 
            to {
                opacity: 1;
            }
        }

        body {
            margin: 0;
            padding: 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            padding: 0 100px;
            align-items: center;
            height: 80px;
            background-color: blue;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: navbar 1s ease;
        }


        a {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid white;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        nav .logo h2 {
            color: white;
            font-weight: 600;
            margin: 0;
        }

        .navbar {
            height: 80px;
            padding: 0 100px;
            display: flex;
            align-items: center;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: navbar 1s ease;
        }

        @keyframes navbar {
            from {
                position: relative;
                bottom: 200px;
                opacity: 0;
            }

            to {
                position: relative;
                bottom: 0;
                opacity: 1;
            }
        }

        .navbar h2 {
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        main {
            height: calc(100vh - 160px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 100px;
            background-color: white;
        }

        .content {
            max-width: 50%;
        }

        .content h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
        }

        .content a {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .content a:hover {
            background-color: #3700b3;
        }

        .image {
            max-width: 45%;
            object-fit: contain;
            width: 100%;
        }

        img {
            width: 550px;
        }

        @media (max-width: 768px) {
            nav, .navbar, main {
                padding: 0 20px;
            }

            main {
                flex-direction: column;
                text-align: center;
                padding-top: 50px;
                height: auto;
            }

            .content, .image {
                max-width: 100%;
            }

            .image {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>

    @if (session('success'))
        <script>
            alert('{{ session('success') }}')
        </script>
    @endif

    <nav>
        <div class="logo">
            <h2>Enigma</h2>
        </div>
        <div>
            <a href="/loginAdmin">Login</a>
        </div>
    </nav>
    <div class="navbar">
        <h2>SMKN 4 Padalarang</h2>
    </div>

    <main>
        <div class="content">
            <h2>Halo Selamat Datang</h2>
            <p>Web Inventaris ini memudahkan siswa siswi meminjam barang. Silahkan Login untuk mulai menggunakan layanan kami.</p>
            <a href="/pilihLogin">Login Sekarang</a>
        </div>
        <div class="image">
            <img src="{{ asset('gambar/image.png') }}">
        </div>
    </main>
    
</body>
</html>