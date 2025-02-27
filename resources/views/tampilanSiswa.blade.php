<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        nav {
            display: flex;
            justify-content: space-between;
            padding: 0 100px;
            align-items: center;
            height: 80px;
            background: linear-gradient(90deg, rgba(0, 0, 255, 1), rgba(0, 0, 200, 1));
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .log {
            position: absolute;
            opacity: 0;
            right: 80px;
            top: 70px;
            z-index: 10000;
            transition: 0.5s ease;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.253);
            padding: 10px 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            gap: 10px
        }

        .log a {
            text-decoration: none;
            color: black
        }

        nav .logo h2 {
            color: white;
            margin: 0;
        }


        
        .muncul {
            transition: 0.5s ease;
            opacity: 1;
        }

        .navbar {
            height: 80px;
            padding: 0 100px;
            display: flex;
            align-items: center;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar h2 {
            color: rgba(0, 0, 0, 0.8);
            margin: 0;
        }

        .baris {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70vh;
            padding: 0 100px;
            gap: 30px;
        }

        .kartu-luar a {
            text-decoration: none;
        }

        .kartu {
            padding: 120px;
            background: linear-gradient(135deg, rgba(0, 0, 255, 0.8), rgba(0, 0, 200, 0.8));
            color: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .kartu:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
        }

        .kartu h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            nav,
            .navbar {
                padding: 0 20px;
            }

            .baris {
                flex-direction: column;
                padding: 0 20px;
                height: auto;
                gap: 20px;
                margin-top: 30px;
            }

            .kartu {
                padding: 80px;
            }
        }

        .lert {
            position: absolute;
            width: 100%
        }

        .profil {
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>

    @if (!Auth::guard('loginSiswa')->check())
        <script>
            alert('Login Dulu Sat');
            window.location.href = "{{ route('login.admin') }}";
        </script>
    @endif

    <nav>
        <div class="logo">
            <h2>Enigma</h2>
        </div>
        <div>
            <img id="profil" src="{{ asset('gambar/propil.png') }}" class="profil" width="50">
            <div class="log" id="logout">
                <a href="#">Edit</a>
                <a href="/siswaLogout" class="logout" id="logout">Logout</a>
            </div>
        </div>
    </nav>
    <div class="navbar">
        <h2>SMKN 4 Padalarang</h2>
    </div>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show lert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show lert" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif




    <main>

        <div class="baris">
            <div class="kartu-luar">
                <a href="/createPeminjaman">
                    <div class="kartu">
                        <h2>Peminjaman Barang</h2>
                    </div>
                </a>
            </div>
            <div class="kartu-luar">
                <a href="/deletePengembalian">
                    <div class="kartu">
                        <h2>Pengembalian Barang</h2>
                    </div>
                </a>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script>
        const logout = document.getElementById('logout');
        const profil = document.getElementById('profil');
        profil.addEventListener('click', function() {
            logout.classList.toggle('muncul')
        })
    </script>

</body>

</html>
