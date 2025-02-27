<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [AllC::class, 'barang']);

Route::get('/createBarang', [AllC::class, 'createBarang']);

Route::post('/createBarang', [AllC::class, 'storeBarang']);

Route::get('/updateBarang/{id}', [AllC::class, 'createEditBarang']);

Route::put('/updateBarang/{id}', [AllC::class, 'storeEditBarang']);

Route::get('/deleteBarang/{id}', [AllC::class, 'deleteBarang']);




Route::get('/siswa', [AllC::class, 'siswa']);

Route::get('/createSiswa', [AllC::class, 'createSiswa']);

Route::post('/createSiswa', [AllC::class, 'storeSiswa']);

Route::get('/deleteSiswa/{id}', [AllC::class, 'deleteSiswa']);

Route::get('/updateSiswa/{id}', [AllC::class, 'updateSiswa']);

Route::put('/updateSiswa/{id}', [AllC::class, 'updateStoreSiswa']);





Route::get('/peminjaman', [AllC::class, 'peminjaman']);

Route::get('/createPeminjaman', [AllC::class, 'create']);

Route::post('/createPeminjaman', [AllC::class, 'store']);

Route::get('/deletePeminjaman/{id}', [AllC::class, 'deletePeminjaman']);

Route::get('/updatePeminjaman/{id}', [AllC::class, 'createUpdatePeminjaman']);

Route::put('/updatePeminjaman/{id}', [AllC::class, 'updateStore']);







Route::get('/pengembalian', [AllC::class, 'pengembalian']);

Route::get('/deletePengembalian', [AllC::class, 'createPengembalian']);

Route::post('/deletePengembalian', [AllC::class, 'hapusPengembalian']);







Route::get('/denda', [AllC::class, 'denda']);

Route::post('/denda', [AllC::class, 'denda']);

Route::get('/deleteDenda/{kode_unik}', [AllC::class, 'deleteDenda']);






Route::get('/registerAdmin', [AdminController::class, 'tampilRegister']);
Route::post('/registerAdmin', [AdminController::class, 'ambilRegister']);
Route::get('/loginAdmin', [AdminController::class, 'tampilLogin'])->name('login.admin');
Route::post('/loginAdmin', [AdminController::class, 'ambilLogin']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/siswaRegister', [AdminController::class, 'siswaRegister']);
Route::post('/siswaRegister', [AdminController::class, 'ambilRegisterSiswa']);
Route::get('/siswaLogin', [AdminController::class, 'siswaLogin'])->name('login.siswa');
Route::post('/siswaLogin', [AdminController::class, 'ambilSiswa']);
Route::get('/siswaLogout', [AdminController::class, 'logoutSiswa']);
Route::get('pilihLogin', function() {
    return view('login.pilihlogin');
});

Route::get('/tampilanSiswa', function() {
    return view('tampilanSiswa');
});


Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/print', [AllC::class, 'print']);
Route::post('/print', [AllC::class, 'ambilPrint']);