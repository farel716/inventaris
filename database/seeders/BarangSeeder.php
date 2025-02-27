<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Barang untuk Lab RPL
        Barang::insert([
            ['nama_barang' => 'Laptop', 'kode_barang' => 'LAP-001', 'kategori' => 'Perangkat Elektronik', 'jumlah' => 20, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Proyektor', 'kode_barang' => 'PROY-001', 'kategori' => 'Perangkat Multimedia', 'jumlah' => 5, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Printer', 'kode_barang' => 'PRNT-001', 'kategori' => 'Perangkat Perkantoran', 'jumlah' => 3, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Scanner', 'kode_barang' => 'SCAN-001', 'kategori' => 'Perangkat Elektronik', 'jumlah' => 2, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Mouse', 'kode_barang' => 'MSE-001', 'kategori' => 'Perangkat Komputer', 'jumlah' => 50, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Keyboard', 'kode_barang' => 'KYBD-001', 'kategori' => 'Perangkat Komputer', 'jumlah' => 30, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Headset', 'kode_barang' => 'HDT-001', 'kategori' => 'Perangkat Audio', 'jumlah' => 10, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Kabel HDMI', 'kode_barang' => 'KHD-001', 'kategori' => 'Perangkat Konektivitas', 'jumlah' => 25, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Modem', 'kode_barang' => 'MDM-001', 'kategori' => 'Perangkat Jaringan', 'jumlah' => 8, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Router', 'kode_barang' => 'RTR-001', 'kategori' => 'Perangkat Jaringan', 'jumlah' => 6, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Hard Drive', 'kode_barang' => 'HDD-001', 'kategori' => 'Perangkat Penyimpanan', 'jumlah' => 12, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Monitor', 'kode_barang' => 'MNT-001', 'kategori' => 'Perangkat Elektronik', 'jumlah' => 18, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Webcam', 'kode_barang' => 'WBC-001', 'kategori' => 'Perangkat Multimedia', 'jumlah' => 7, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Sound System', 'kode_barang' => 'SS-001', 'kategori' => 'Perangkat Audio', 'jumlah' => 4, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'UPS', 'kode_barang' => 'UPS-001', 'kategori' => 'Perangkat Elektronik', 'jumlah' => 6, 'lokasi' => 'Lab RPL', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Kursi', 'kode_barang' => 'KUR-001', 'kategori' => 'Furnitur', 'jumlah' => 30, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Meja', 'kode_barang' => 'MEJ-001', 'kategori' => 'Furnitur', 'jumlah' => 15, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Lemari', 'kode_barang' => 'LEM-001', 'kategori' => 'Furnitur', 'jumlah' => 10, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Papan Tulis', 'kode_barang' => 'PT-001', 'kategori' => 'Furnitur', 'jumlah' => 5, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Kabel Extension', 'kode_barang' => 'KE-001', 'kategori' => 'Aksesoris', 'jumlah' => 20, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Lampu LED', 'kode_barang' => 'LED-001', 'kategori' => 'Elektronik', 'jumlah' => 40, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Kipas Angin', 'kode_barang' => 'KA-001', 'kategori' => 'Elektronik', 'jumlah' => 6, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Proyektor', 'kode_barang' => 'PROY-002', 'kategori' => 'Elektronik', 'jumlah' => 3, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Papan Pengumuman', 'kode_barang' => 'PP-001', 'kategori' => 'Furnitur', 'jumlah' => 4, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Jam Dinding', 'kode_barang' => 'JD-001', 'kategori' => 'Aksesoris', 'jumlah' => 12, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Sofa', 'kode_barang' => 'SOF-001', 'kategori' => 'Furnitur', 'jumlah' => 8, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Meja Makan', 'kode_barang' => 'MM-001', 'kategori' => 'Furnitur', 'jumlah' => 6, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Buku Tulis', 'kode_barang' => 'BT-001', 'kategori' => 'Perlengkapan Sekolah', 'jumlah' => 100, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Pensil', 'kode_barang' => 'PNS-001', 'kategori' => 'Perlengkapan Sekolah', 'jumlah' => 150, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Penghapus', 'kode_barang' => 'PH-001', 'kategori' => 'Perlengkapan Sekolah', 'jumlah' => 50, 'lokasi' => 'Sarana', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
