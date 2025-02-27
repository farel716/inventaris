<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        nav {
            display: flex;
            justify-content: space-between;
            padding: 0 100px;
            align-items: center;
            height: 80px;
            background-color: blue;
            z-index: 1000;
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



        .muncul {
            transition: 0.5s ease;
            opacity: 1;
        }

        nav .logo h2 {
            color: white;
        }

        .navbar {
            height: 80px;
            padding: 0 100px;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.329);
        }

        .navbar h2 {
            font-weight: bolder;
            color: rgba(0, 0, 0, 0.623);       
        }

        a {
            text-decoration: none;
        }

        .containerr {
            height: 75vh;
            padding: 30px 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .kotak-diagram {
            width: 80%;
            max-width: 1000px;
            height: 421px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        canvas {
            width: 100%;
            height: 100%;
        }

        .kotak-data {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 12px;
        }

        .kotak-dalam {
            border-radius: 10px;
            width: 200px;
            height: 75px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(0, 0, 255, 0.76);
            color: white;
        }

        .profil {
            border-radius: 50%;
            cursor: pointer;
        }


    </style>
</head>
<body>

    @if (! Auth::guard('admin')->check())
    <script>
        alert('Login Dulu Sat');
        window.location.href = "{{ route('login.admin') }}";
    </script>
    @elseif (session('success'))
    <script>
        alert('{{ session('success') }}')
    </script>
    @elseif (session('error'))
    <script>
        alert('{{ session('error') }}')
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
                <a href="/logout" class="logout" id="logout">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="navbar">
        <h2>SMKN 4 Padalarang</h2>
    </div>


    <div class="containerr d-grid gap-3 d-flex justify-content-center">
        <div class="kotak-diagram">
            <canvas id="myChart"></canvas>
        </div>

        <div class="kotak-data">
            <a href="/siswa">
            <div class="kotak-dalam">
                <h5>Data Siswa</h5>
            </div>
            </a>
            <a href="/barang">
            <div class="kotak-dalam">
                <h5>Data Barang</h5>
            </div>
            </a>
            <a href="/peminjaman">
            <div class="kotak-dalam">
                <h5>Data Peminjaman</h5>
            </div>
            </a>
            <a href="/denda">
            <div class="kotak-dalam">
                <h5>Data Denda</h5>
            </div>
            </a>
            <a href="/print">
            <div class="kotak-dalam">
                <h5>Print Data</h5>
            </div>
            </a>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Peminjaman Barang',
                    data: [12, 19, 3, 5, 2, 3, 38, 18, 19, 34, 2, 23],
                    backgroundColor: 'rgba(0, 0, 255, 0.5)',
                    borderColor: 'rgba(0, 0, 255, 1)',
                    borderWidth: 1
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        
        const logout = document.getElementById('logout');
        const profil = document.getElementById('profil');
        profil.addEventListener('click', function() {
            logout.classList.toggle('muncul')
        })



    </script>

</body>
</html>
