<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasiswaWebController;

Route::get('/data-matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/data-matakuliah/{kode}', [MatakuliahController::class, 'show'])->name('matakuliah.show');
Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/data-mahasiswa/{nim}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
Route::get('/cari-mahasiswa', [MahasiswaController::class, 'cari'])->name('mahasiswa.cari');
Route::get('/mahasiswa-data', [MahasiswaWebController::class, 'index'])->name('mahasiswa.data');

Route::get('/salam', function () {
    return 'Selamat Datang di sini';
});
    
Route::get('/mahasiswa/{nim}', function (string $nim) {
return 'Data mahasiswa dengan NIM ' . $nim;
});

Route::get('/matakuliah/{kode?}', function (?string $kode = null) {
if ($kode === null) {
return 'Menampilkan seluruh matakuliah';
}
return 'Menampilkan matakuliah kode ' . $kode;
});
