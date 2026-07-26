<?php

namespace App\Http\Controllers;

use App\Models\Saran; // Menggunakan Model Saran
use Illuminate\Http\Request; // Mengambil data yang dikirim dari form

class SaranController extends Controller
{
    // Menampilkan semua data saran
    public function saran()
    {
        // Mengambil semua data dari tabel sarans melalui Model
        $daftar_saran = Saran::all();

        // Mengirim data ke halaman saran
        return view('saran', compact('daftar_saran'));
    }

    // Menyimpan data saran yang dikirim pengguna
    public function store(Request $request)
    {
        // Menyimpan data ke database melalui Model
        Saran::create([
            'nama_pengirim' => $request->nama_pengirim,
            'isi_saran' => $request->isi_saran,
        ]);

        // Setelah berhasil disimpan, kembali ke halaman saran
        return redirect('/saran');
    }
}