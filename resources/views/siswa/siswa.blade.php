<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            text-decoration: none;
            list-style: none;
        }

        .rows {
            display: flex;
            justify-content: space-between;
            padding: 0 130px;
            align-items: center;
            height: 100px;
        }

        a {
            text-decoration: none;
        }

        .rows a {
            background-color: blue;
            padding: 10px 25px;
            border-radius: 5px;
            color: white;
            transition: 0.5s all ease;
            text-decoration: none;
        }

        .rows a:hover {
            background-color: rgb(0, 0, 141); 
        }

        .rows .search input {
            padding: 8px 15px;
            width: 300px;
            outline: none;
            border: 1px solid blue;
            border-radius: 5px;
            transform: translateX(50px)
        }

        .rows .search button {
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
            font-size: 12.5px;
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

        .alert {
            display: flex;
            justify-content: center;
        }

    </style>
</head>
<body>
    
    <x-navbar></x-navbar>
   
    @if(session('success'))
    <script>
        alert('{{ session('success') }}')
    </script>
    @elseif (session('edit'))
    <script>
        alert('{{ session('edit') }}')
    </script>
    @elseif (session('hapus'))
    <script>
        alert('{{ session('hapus') }}')
    </script>
    @endif

    @if (! Auth::guard('admin')->check()) 
    <script>
        alert('anda Belum Login Sebagai Admin');
        window.location.href = "{{ route('login.admin') }}";
    </script>
    @endif
    

    <div class="kotak">
        <div class="rows">
            <a href="/createSiswa">Tambah Data</a>
            <form action="" method="GET">
                <div class="search">
                
                    <input type="text" id="search" name="search" placeholder="Cari Data">
                    <button type="submit">Cari</button>
                </div>
                
        </form>
        </div>
        <table cellspacing="0" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Gender</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1 ?>
            @foreach ($data as $da)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $da->nama }}</td>
                <td>{{ $da->nisn }}</td>
                <td>{{ $da->gender }}</td>
                <td>{{ $da->kelas }}</td>
                <td>{{ $da->jurusan }}</td>
                <td>{{ $da->alamat }}</td>
                <td>
                    <a href="/updateSiswa/{{ $da->id }}">Edit</a> |
                    <a href="/deleteSiswa/{{ $da->id }}" onclick="return confirm('Apakah Data Benar benar ingin dihapus ? ')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
</html>