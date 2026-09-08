<?php

use Illuminate\Support\Facades\Route;

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
