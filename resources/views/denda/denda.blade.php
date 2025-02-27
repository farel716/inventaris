<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            text-decoration: none;
            list-style: none;
        }

        .row {
            display: flex;
            justify-content: center;
            padding: 0 130px;
            align-items: center;
            height: 100px;
        }

        .row a {
            background-color: blue;
            padding: 10px 25px;
            border-radius: 5px;
            color: white;
            transition: 0.5s all ease
        }

        .row a:hover {
            background-color: rgb(0, 0, 141); 
        }

        .row .search input {
            padding: 8px 15px;
            width: 300px;
            outline: none;
            border: 1px solid blue;
            border-radius: 5px;
            transform: translateX(50px)
        }

        .row .search button {
            padding: 8px 10px;
            border-radius: 0 4px 4px 0;
            border: none;
            transform: translateX(.1px);
            background-color: blue;
            color: white;
            z-index: 10;
            cursor: pointer
        }

        .kotak {
            padding: 0 50px;
        }

        table {
            font-size: 13.3px;
            font-weight: lighter;
            position: relative;
            left: 50%;
            transform: translate(-50%);
            width: 100%;
        }

        table tr:first-child {
            background-color: blue;
            padding: 0 10px;
            color: white;
        }

        table tr td {
            padding: 20px 10px;
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: rgba(128, 0, 128, 0.116)
        }

        table tr td a:first-child {
            padding: 7px;
            background-color: blue;
            border-radius: 3px;
            cursor: pointer;
            color: white
            
        }

        table tr td a:last-child {
            padding: 7px;
            background-color: red;
            border-radius: 3px;
            cursor: pointer;
            color: white
        }

    </style>
</head>
<body>
    
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
            @elseif (session('hapus'))
            <script>
                alert("{{ session('hapus') }}")
            </script>
            @elseif (session('edit'))
            <script>
                alert("{{ session('edit') }}")
            </script>
        @endif

        @if (! Auth::guard('admin')->check())
            <script>
                alert('Anda belum login sebagai admin');
                window.location.href = '{{ route("login.admin") }}'
            </script>
        @endif
    
        <x-navbar></x-navbar>
    
        <div class="kotak">
            <div class="row">
                <form action="" method="get">
                <div class="search">
                    <input type="text" id="search" name="search" placeholder="Cari Data">
                    <button>Cari</button>
                </div>
            </form>
            </div>
            <table cellspacing="0" cellpadding="10">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Dipinjam</th>
                    <th>Dikembalikan</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1 ?>
                @foreach ($data as $da)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $da->siswa->nama }}</td>                  
                    <td>{{ $da->barang->nama_barang }}</td>
                    <td>{{ $da->barang->kode_barang }}</td>
                    <td>{{ $da->jumlah }}</td>
                    <td>{{ $da->dipinjam }}</td>
                    <td>{{ $da->dikembalikan }}</td>
                    <td>{{ optional($da->denda)->denda }}</td>
                    <td>
                        <a href="/deleteDenda/{{ $da->kode_unik }}" onclick="return confirm('Apakah siswa sudah membayar')">Hapus</a>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </table>
        </div>
    
    
    </body>

</body>
</html>