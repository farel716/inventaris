<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
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
        <h2>Edit Data Siswa</h2>
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" placeholder="Masukkan Nama Siswa" required>
            </div>

            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $data->nisn }}" placeholder="Masukkan NISN" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="" class="form-select">
                        <option value="">--Gender--</option>
                        <option value="Laki-laki" {{ $data->gender == 'Laki-laki' ? 'selected' : "" }}>Laki-laki</option>
                        <option value="Perempuan" {{ $data->gender == 'Perempuan' ? 'selected' : "" }}>Perempuan</option>
                    </select>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="kelas" id="" class="form-select">
                        <option value="">--Kelas--</option>
                        <option value="X" {{ $data->kelas == 'X' ? 'selected' : "" }}>X</option>
                        <option value="XI" {{ $data->kelas == 'XI' ? 'selected' : "" }}>XI</option>
                        <option value="XII" {{ $data->kelas == 'XII' ? 'selected' : "" }}>XII</option>
                    </select>
                </div>
            </div>
            

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" id="" class="form-select">
                    <option value="">--Jurusan--</option>
                    <option value="Teknik Informatika" {{ $data->jurusan == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                    <option value="Akuntansi" {{ $data->jurusan == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                    <option value="Multimedia" {{ $data->jurusan == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                    <option value="Teknik Mesin" {{ $data->jurusan == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                    <option value="Farmasi" {{ $data->jurusan == 'Farmasi' ? 'selected' : '' }}>Farmasi</option>
                    <option value="Perhotelan" {{ $data->jurusan == 'Perhotelan' ? 'selected' : '' }}>Perhotelan</option>
                    <option value="Administrasi Perkantoran" {{ $data->jurusan == 'Administrasi Perkantoran' ? 'selected' : '' }}>Administrasi Perkantoran</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}" placeholder="Masukkan ID Barang" required>
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
