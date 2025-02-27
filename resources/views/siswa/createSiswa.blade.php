<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>

        .row:last-child {
            display: flex;
            justify-content: space-between;
            padding: 0 100px
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Data Siswa</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Siswa" required>
            </div>

            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="" class="form-select">
                        <option value="">--Gender--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="kelas" id="" class="form-select">
                        <option value="">--Kelas--</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
            </div>
            

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" id="" class="form-select">
                    <option value="">--Jurusan--</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Farmasi">Farmasi</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
            </div>

            <div class="row">
            <button type="submit" class="btn btn-primary col-md-1">Submit</button>
            <a href="/siswa" class="btn btn-danger col-md-1">Kembali</a>
        </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
