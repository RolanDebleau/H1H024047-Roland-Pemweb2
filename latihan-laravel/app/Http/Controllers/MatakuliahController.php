<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
{
    $daftarMatakuliah = [
        ['kode' => 'IF101', 'nama' => 'Algoritma dan Pemrograman', 'sks' => 3],
        ['kode' => 'IF102', 'nama' => 'Struktur Data', 'sks' => 3],
        ['kode' => 'IF201', 'nama' => 'Basis Data', 'sks' => 3],
        ['kode' => 'IF202', 'nama' => 'Pemrograman Web II', 'sks' => 2],
        ['kode' => 'IF301', 'nama' => 'Kecerdasan Buatan', 'sks' => 3],
    ];

    $kataKunci = $request->query('q', '');

    if ($kataKunci !== '') {
        $daftarMatakuliah = array_filter($daftarMatakuliah, function ($mk) use ($kataKunci) {
            return stripos($mk['nama'], $kataKunci) !== false
                || stripos($mk['kode'], $kataKunci) !== false;
        });
    }

    return view('matakuliah.index', [
        'daftarMatakuliah' => $daftarMatakuliah,
        'kataKunci' => $kataKunci,
    ]);
}

    public function show(string $kode)
    {
        return view('matakuliah.show', ['kode' => $kode]);
    }
}