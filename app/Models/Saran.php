<?php

// File ini berada di folder Models
namespace App\Models;

// Menggunakan Model bawaan Laravel
use Illuminate\Database\Eloquent\Model;

// Membuat Model bernama Saran
// Model ini digunakan untuk menghubungkan aplikasi dengan tabel "sarans" di database
class Saran extends Model
{
    // Menentukan kolom yang boleh diisi oleh pengguna
    protected $fillable = [
        'nama_pengirim',
        'isi_saran'
    ];
}