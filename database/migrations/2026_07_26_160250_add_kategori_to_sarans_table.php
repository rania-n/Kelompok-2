<?php

// Menggunakan Migration bawaan Laravel
use Illuminate\Database\Migrations\Migration;

// Digunakan untuk mengatur tabel di database
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat migration untuk mengubah tabel
return new class extends Migration
{
    // up() dijalankan saat "php artisan migrate"
    // Fungsinya menambahkan atau mengubah struktur database
    public function up(): void
    {
        // Mengubah tabel "sarans"
        Schema::table('sarans', function (Blueprint $table) {

            // Menambahkan kolom baru bernama "kategori"
            // Kolom ini bertipe teks (string)
            // after() = diletakkan setelah nama_pengirim
            // nullable() = boleh kosong
            $table->string('kategori')->after('nama_pengirim')->nullable();
        });
    }

    // down() dijalankan saat "php artisan migrate:rollback"
    // Fungsinya membatalkan perubahan yang sudah dibuat
    public function down(): void
    {
        // Menghapus kolom "kategori"
        Schema::table('sarans', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
