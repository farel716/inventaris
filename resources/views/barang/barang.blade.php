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
            justify-content: space-between;
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
            padding: 10px 0;
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
            alert('{{ session('success') }}')
        </script>
        @elseif (session('edit')) 
        <script>
            alert('{{ session('edit') }}')
        </script>
        @elseif (session('delete'))
        <script>
            alert('{{ session('delete') }}')
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
            <a href="/createBarang">Tambah Data</a>
            <div class="search">
                <form action="" method="get">
                <input type="text" id="search" name="search" placeholder="Cari Data">
                <button>Cari</button>
            </form>
            </div>
        </div>
        <table cellspacing="0" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1 ?>
            @foreach ($data as $da)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $da->nama_barang }}</td>
                <td>{{ $da->kode_barang }}</td>
                <td>{{ $da->kategori }}</td>
                <td>{{ $da->jumlah }}</td>
                <td>{{ $da->lokasi }}</td>
                <td>
                    <a href="/updateBarang/{{ $da->id }}">Edit</a> |
                    <a href="/deleteBarang/{{ $da->id }}" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </table>
    </div>

</body>
</html>

{{-- bab 1 pendahuluan
1.1 latar belakang = alasan kenapa kamu bikin project tersebut 
1.2 Rumusan Masalah = dibuat poin
batasan masalah = ruang lingkup aplikasi
1.3 Tujuan = apa yang ingin dicapai
propil perusahaan


Bab II perancangan dan pembahasan

2.1 perancangan
kebuatuhan fungsi
kebutuhan non fungsi
use case
struktur tabel
mock up

2.2 pembahasan
tampilan web
pengujuan
--}}