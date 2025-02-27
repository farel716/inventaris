<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\denda;
use App\Models\siswa;
use App\Models\barang;
use App\Models\logAdmin;
use App\Models\logPengembalianBarang;
use App\Models\password;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\DB;
use Illuminate\Contracts\Database\Eloquent\Builder;

class AllC extends Controller
{


    public function checkAdmin() {
        if(!Auth::guard('admin')->check()) {
            return redirect('login.loginAdmin');
        }
    }


    //barang
    public function barang() {
        $data = barang::filterbarang(request(['search']))->get();
        return view('barang.barang', ['data' => $data]);
    }

    public function createBarang() {
        return view('barang.createBarang');
    }

    public function storeBarang(Request $request) {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|numeric',
            'lokasi' => 'required',
        ]);

        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Menambah Data Barang Dengan Kode Barang '. $request->kode_barang
        ]);

        barang::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return redirect('/barang')->with('success', 'Data Brerhasil Ditambahkan');
    }


    public function createEditBarang($id) {
        $data = barang::find($id);
        return view('barang.updateBarang', ['data' => $data]);
    }

    public function storeEditBarang(Request $request, $id) {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|numeric',
            'lokasi' => 'required',
        ]);

        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Mengedit Data Barang Dengan Kode Barang '. $request->kode_barang
        ]);

        $barang = barang::find($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->kategori = $request->kategori;
        $barang->jumlah = $request->jumlah;
        $barang->lokasi = $request->lokasi;

        $barang->save();

        return redirect('/barang')->with('edit', 'Data Berhasil Diubah');
    }

    public function deleteBarang($id) {
        $data = barang::find($id);

            logAdmin::create([
                'admin' => (Auth::guard('admin')->user()->username),
                'aksi' => 'Telah Menghapus Data Barang Dengan Kode Barang '. $data->kode_barang
            ]);

        $data->delete();
        return redirect('/barang')->with('delete', 'Data Berhasil Dihapus');
    }

    



    //siswa
    public function siswa() {
        $data = siswa::filter(request(['search']))->get();
        return view('siswa.siswa', ['data' => $data]);
    }

    public function deleteSiswa($id) {
        $data = siswa::find($id);

        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Menghapus Data Siswa Dengan NISN '. $data->nisn
        ]);

        $data->delete();

        return redirect('/siswa')->with('hapus', 'Data Berhasil Dihapus');
    }

    public function updateSiswa($id) {
        $data = siswa::find($id);
        return view('siswa.updateSiswa', ['data' => $data]);
    }

    public function updateStoreSiswa(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'gender' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
        ]);


        logAdmin::create([
            'admin' => Auth::guard('admin')->user()->username,
            'aksi' => 'Telang Mengedit Data Siswa Dengan NISN ' . $request->nisn,
        ]);

        $siswa = siswa::findOrFail($id);

        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->gender = $request->gender;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan = $request->jurusan;
        $siswa->alamat = $request->alamat;

        $siswa->save();

        return redirect('/siswa')->with('edit', 'Data Berhasil Di Edit');
    }
    
    public function createSiswa() {
        return view('siswa.createSiswa');
    }

    public function storeSiswa(Request $request) {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'gender' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
        ]);

        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Menambah Data Siswa Dengan NISN '. $request->nisn
        ]);

        siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'gender' => $request->gender,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ]);

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }








    //peminjaman
    public function peminjaman() {
        $data = peminjaman::filterpeminjaman(request(['search']))->get();
        return view('peminjaman', ['data' => $data]);
    }

    public function create() {
        $siswa = siswa::all(['nama', 'nisn']);
        $barang = barang::all(['kode_barang', 'nama_barang']);
        return view('createPeminjaman', ['siswa' => $siswa, 'barang' => $barang]);
    }
    
    public function updateStore(Request $request, $id) {
        $request->validate([
            'nisn' => 'required',
            'kode_barang' => 'required',
            'jumlah' => 'required|string|max:255',
            'dikembalikan' => 'required|date',
        ]);
        $barang = barang::where('kode_barang', $request->kode_barang)->first();
        $peminjaman = peminjaman::findOrFail($id);
        $barang->jumlah += $peminjaman->jumlah;

        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Menghapus Data Siswa Yang Terkena Denda Dengan NISN '.$request->nisn. ' Dan Kode Barang '.$request->kode_barang
        ]);
        

        $peminjaman->nisn = $request->nisn;
        $peminjaman->kode_barang = $request->kode_barang;
        $peminjaman->jumlah = $request->jumlah;
        $peminjaman->dikembalikan = $request->dikembalikan;


        $barang->jumlah -= $peminjaman->jumlah;
        $barang->save();
        $peminjaman->save();

        return redirect('/peminjaman')->with('edit', 'Data Berhasil Diedit');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nisn' => 'required',
            'kode_barang' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        
        $barang = barang::where('kode_barang', $request->kode_barang)->first();

        if($barang->jumlah < $request->jumlah) {
            return redirect('createPeminjaman')->with('error', 'Barang sudah habis di pinjam');
        }

        $barang->jumlah -= $request->jumlah;
        $barang->save();
        
        $kodeUnik = 'PMJ-' . now()->format('Ymd') . '-' . rand(1000, 9999);



        logPengembalianBarang::create([
            'nisn' => $request->nisn,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'aksi' => 'Telah Meminjam barang Dengan Kode Barang '.$request->kode_barang
        ]);

        peminjaman::create([
            'nisn' => $request->nisn,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'dikembalikan' => $request->dikembalikan ?? '3000-02-24 14:00:00',
            'kode_unik' => $kodeUnik,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        if(Auth::guard('loginSiswa')->check()) {
            return redirect('/tampilanSiswa')->with('success', 'Data peminjaman berhasil ditambahkan. Ingat Baik Baik kode ini : ' . $kodeUnik);
        } else {
            return redirect('/peminjaman')->with('success', 'Data peminjaman berhasil ditambahkan');

        }
    }

    public function createUpdatePeminjaman($id) {
        $data = peminjaman::find($id);
        $siswa = siswa::all(['nama', 'nisn']);
        $barang = barang::all(['kode_barang', 'nama_barang']);
        return view('updatePeminjaman', ['data' => $data, 'siswa' => $siswa, 'barang' => $barang]);
    }


    public function deletePeminjaman($id) {
        $data = peminjaman::find($id);
        


        $data->delete();

        return redirect('/peminjaman')->with('delete', 'Data Berhasil Dihapus');
    }







    
    //Pengembalian

    public function pengembalian() {
        $data = peminjaman::all();
        return view('pengembalian.pengembalian', ['data' => $data]);
    }

    public function createPengembalian() {
        $barang = barang::all(['kode_barang', 'nama_barang']);

        return view('pengembalian.deletePengembalian', ['barang' => $barang]);
    }

    public function hapusPengembalian(Request $request)
    {

        $now = Carbon::now();

        $request->validate([
            'kode_unik' => 'required',
            'password' => 'required',
        ]);

        $peminjaman = peminjaman::where('kode_unik', $request->kode_unik)->first();
        if($peminjaman) {
            $barang = barang::where('kode_barang', $peminjaman->kode_barang)->first();
        } else {
            return redirect('/deletePengembalian')->with('error', 'Kode Peminjaman salah');
        }
        $password = password::where('password', $request->password)->first();

        if(Carbon::parse($peminjaman->dikembalikan) < $now) {
            return redirect('/tampilanSiswa')->with('error', 'Peminjaman anda sudah terlambat segera datang ke sarana atau ke lab rpl');
        }
        else if ($peminjaman && $password) { 
            logPengembalianBarang::create([
                'nisn' => $peminjaman->nisn,
                'kode_barang' => $peminjaman->kode_barang,
                'jumlah' => $peminjaman->jumlah,
                'aksi' => 'Telah Mengembalikan barang Dengan Kode Barang '.$peminjaman->kode_barang
            ]);
            $barang->jumlah += $peminjaman->jumlah;
            $barang->save();
            $peminjaman->delete();
            return redirect('/tampilanSiswa')->with('success', 'Peminjaman berhasil dihapus!');
        } elseif (! $peminjaman) {
            return redirect('/deletePengembalian')->with('error', 'Kode unik tidak ditemukan!'); 
        } elseif(! $password) {
            return redirect('/deletePengembalian')->with('error', 'Password tidak ditemukan!'); 
        }
    }






    //denda 

    public function denda() {
        $now = Carbon::now();
        
        $pmjTerlambat = peminjaman::filterpeminjaman(request(['search']))->with('denda')
            ->where('dikembalikan', '<', $now) 
            ->get();
        
        foreach ($pmjTerlambat as $peminjaman) {
            if (!$peminjaman->denda) {
                $selisihJam = round(Carbon::parse($peminjaman->dikembalikan)->diffInHours($now));
                $denda = floor($selisihJam * 1000);
        
                denda::updateOrCreate(
                    ['kode_unik' => $peminjaman->kode_unik],
                    ['denda' => $denda]
                );
            }
            if ($peminjaman->denda) {
                $selisihJam = round(Carbon::parse($peminjaman->dikembalikan)->diffInHours($now));
                $denda = floor($selisihJam * 1000);
        
                denda::updateOrCreate(
                    ['kode_unik' => $peminjaman->kode_unik],
                    ['denda' => $denda]
                );
            }
        }
        
        return view('denda.denda', ['data' => $pmjTerlambat]);
    }

    public function deleteDenda($kode_unik) {
        $data = peminjaman::where('kode_unik', $kode_unik)->first();
        if($data) {
            $barang = barang::where('kode_barang', $data->kode_barang)->first();
        }

        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Menghapus Data Siswa Yang Terkena Denda Dengan NISN '.$data->nisn .' Dan Kode Barang '. $data->kode_barang
        ]);
        
        $barang->jumlah += $data->jumlah;
        $barang->save();
        $data->delete();
        return redirect('/denda')->with('hapus', 'Data Berhasil Dihapus');
    }








    //print
    public function print() {
        return view('print');
    }

    public function ambilPrint(Request $request) {
        $request->validate([
            'print' => 'required',
        ]);

        if($request->print == 'barang') {
            $barangs = Barang::all();
            
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            
            $section->addText("Data Barang", ['bold' => true, 'size' => 16]);
            $section->addTextBreak();
            
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(2000)->addText("Nama Barang", ['bold' => true]);
            $table->addCell(2000)->addText("Kode Barang", ['bold' => true]);
            $table->addCell(2000)->addText("Kategori", ['bold' => true]);
            $table->addCell(2000)->addText("Jumlah", ['bold' => true]);
            $table->addCell(2000)->addText("Lokasi", ['bold' => true]);
            
            foreach ($barangs as $barang) {
                $table->addRow();
                $table->addCell(2000)->addText($barang->nama_barang);
                $table->addCell(2000)->addText($barang->kode_barang);
                $table->addCell(2000)->addText($barang->kategori);
                $table->addCell(2000)->addText($barang->jumlah);
                $table->addCell(2000)->addText($barang->lokasi);
            }
        
            $filePath = storage_path('app/public/data_barang.docx');
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($filePath);
        
            return response()->download($filePath)->deleteFileAfterSend(true);
        }



        if($request->print == 'siswa') {
            $barangs = siswa::all();
            
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            
            $section->addText("Data Siswa", ['bold' => true, 'size' => 16]);
            $section->addTextBreak();
            
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(2000)->addText("NISN Siswa", ['bold' => true]);
            $table->addCell(2000)->addText("Nama Siswa", ['bold' => true]);
            $table->addCell(2000)->addText("Kelas", ['bold' => true]);
            $table->addCell(2000)->addText("Jurusan", ['bold' => true]);
            $table->addCell(2000)->addText("Gender", ['bold' => true]);
            $table->addCell(2000)->addText("Alamat", ['bold' => true]);
            
            foreach ($barangs as $barang) {
                $table->addRow();
                $table->addCell(2000)->addText($barang->nisn);
                $table->addCell(2000)->addText($barang->nama);
                $table->addCell(2000)->addText($barang->kelas);
                $table->addCell(2000)->addText($barang->jurusan);
                $table->addCell(2000)->addText($barang->gender);
                $table->addCell(2000)->addText($barang->alamat);
            }
        
            $filePath = storage_path('app/public/data_Siswa.docx');
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($filePath);
        
            return response()->download($filePath)->deleteFileAfterSend(true);
        }
        

    }
    


}