<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            min-height: 100vh;
            padding: 40px 0;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, rgba(0, 0, 255, 1), rgba(0, 0, 200, 1));
            border-radius: 3px;
        }

        .form-label {
            color: #34495e;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 2px solid #e9ecef;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: rgba(0, 0, 255, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 255, 0.15);
        }

        .form-select {
            cursor: pointer;
        }

        .btn-action-container {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(90deg, rgba(0, 0, 255, 1), rgba(0, 0, 200, 1));
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 255, 0.2);
        }

        .btn-danger {
            background: linear-gradient(90deg, #ff4757, #ff6b81);
            border: none;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 71, 87, 0.2);
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            min-width: 300px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Flatpickr Custom Styling */
        .flatpickr-calendar {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .flatpickr-day.selected {
            background: rgba(0, 0, 255, 1);
            border-color: rgba(0, 0, 255, 1);
        }

        .flatpickr-day:hover {
            background: rgba(0, 0, 255, 0.1);
        }

        .flatpickr-time input:hover,
        .flatpickr-time input:focus {
            background: rgba(0, 0, 255, 0.1);
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            .btn-action-container {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        .rows {
            display: flex;
            justify-content: center;
            gap: 20px
        }

        .rows .mb-4 {
            width: 100%
        }

        .rows input {
            width: 100%;
        }

        .rows select {
            width: 100%
        }
    </style>
</head>

<body>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="container">
        <h2>Tambah Data Peminjaman</h2>
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="jumlah" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="jumlah" name="nama_barang"
                    placeholder="Masukkan Nama Barang" value="{{ $data->nama_barang }}" required>
            </div>

            <div class="mb-4">
                <label for="dikembalikan" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" value="{{ $data->kode_barang }}" name="kode_barang"
                    placeholder="Pilih Tanggal dan Waktu" required>
            </div>

            
            <div class="mb-4">
                <label for="barang_id" class="form-label">Jenis Barang</label>
                <select name="kategori" id="" class="form-select">
                    <option value="">--Kategori--</option>
                    <option value="Perangkat Elektronik" {{ $data->kategori == 'Perangkat Elektronik' ? "selected" : "" }}>Perankat Elektronik</option>
                    <option value="Perangkat Multimedia" {{ $data->kategori == 'Perangkat Multimedia' ? "selected" : "" }}>Perankat Multimedia</option>
                    <option value="Perangkat Kantoran" {{ $data->kategori == 'Perangkat Kantoran' ? "selected" : "" }}>Perankat Kantoran</option>
                    <option value="Perangkat Audio" {{ $data->kategori == 'Perangkat Audio' ? "selected" : "" }}>Perankat Audio</option>
                    <option value="Perangkat Konektivitas" {{ $data->kategori == 'Perangkat Konektivitas' ? "selected" : "" }}>Perankat Konektivitas</option>
                    <option value="Perangkat Jaringan" {{ $data->kategori == 'Perangkat Jaringan' ? "selected" : "" }}>Perankat Jaringan</option>
                    <option value="Perangkat Penyimpanan" {{ $data->kategori == 'Perangkat Penyimpan' ? "selected" : "" }}>Perankat Penyimpanan</option>
                    <option value="Furnitur" {{ $data->kategori == 'Furnitur' ? "selected" : "" }}>Furnitur</option>
                    <option value="Aksesoris" {{ $data->kategori == 'Aksesoris' ? "selected" : "" }}>Aksesoris</option>
                    <option value="Elektronik" {{ $data->kategori == 'Elektronik' ? "selected" : "" }}>Elektronik</option>
                    <option value="Perlengkapan Sekolah" {{ $data->kategori == 'Perlengkapan Sekolah' ? "selected" : "" }}>Perlengkapan Sekolah</option>
                </select>
            </div>
            <div class="rows">
            <div class="mb-4">
                <label for="dikembalikan" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="dikembalikan" name="jumlah"
                    placeholder="Masukan Jumlah Barang" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-4">
                <label for="dikembalikan" class="form-label">Lokasi</label>
                <select name="lokasi" id="" class="form-select">
                    <option value="">--Lokasi--</option>
                    <option value="Lab RPL" {{ $data->lokasi == "Lab RPL" ? "selected" : "" }}>Lab RPL</option>
                    <option value="Sarana" {{ $data->lokasi == "Sarana" ? "selected" : "" }}>Sarana</option>
                </select>
            </div>
        </div>

            <div class="btn-action-container">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/tampilanSiswa" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
   
</body>

</html>

