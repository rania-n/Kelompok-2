<?php

// Menggunakan Migration bawaan Laravel
use Illuminate\Database\Migrations\Migration;

// Digunakan untuk membuat struktur tabel
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat migration untuk tabel sarans
return new class extends Migration
{
    // up() dijalankan saat "php artisan migrate"
    // Fungsinya membuat tabel baru
    public function up(): void
    {
        // Membuat tabel bernama "sarans"
        Schema::create('sarans', function (Blueprint $table) {

            // Membuat kolom id sebagai identitas setiap data
            $table->id();

            // Membuat kolom nama_pengirim
            $table->string('nama_pengirim');

            // Membuat kolom isi_saran
            $table->text('isi_saran');

            // Membuat kolom waktu data dibuat dan diubah
            $table->timestamps();
        });
    }

    // down() dijalankan saat rollback
    // Fungsinya menghapus tabel yang sudah dibuat
    public function down(): void
    {
        Schema::dropIfExists('sarans');
    }
};