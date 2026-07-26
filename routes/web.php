<?php

// 1. IMPORT CONTROLLER & FACADE
// Memanggil SaranController yang berisi fungsi logika (mengambil data & menyimpan ke DB)
use App\Http\Controllers\SaranController;
// Memanggil facade Route untuk mengatur URL dan menerima request dari browser
use Illuminate\Support\Facades\Route;

// 2. ROUTE PUBLIC (Bisa diakses siapa saja tanpa login)
// Mengarahkan URL utama ('/') langsung ke tampilan halaman welcome.blade.php
Route::view('/', 'welcome')->name('home');

// 3. GROUP ROUTE DENGAN MIDDLEWARE (Membutuhkan Login)
// Browser mengecek status akun user ('auth' & 'verified').
// Jika belum login, user otomatis ditendang/diarahkan ke halaman login.
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman Dashboard: Menampilkan tampilan dashboard.blade.php
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // PROSES 1: MENAMPILKAN HALAMAN SARAN (GET Request)
    // Browser minta URL /saran -> Route panggil method saran() di SaranController 
    // -> Controller ambil semua data dari DB (Saran::all()) -> Kirim ke view 'saran.blade.php'
    Route::get('/saran', [SaranController::class, 'saran'])->name('saran');

    // PROSES 2: MENYIMPAN SARAN BARU (POST Request)
    // User tekan tombol Submit Form -> Data dikirim via HTTP POST ke /saran 
    // -> Route mengarahkan ke method store() di SaranController -> Controller simpan ke DB (Saran::create)
    // -> Controller melakukan redirect (kembali) ke halaman /saran
    Route::post('/saran', [SaranController::class, 'store']);
});

// 4. ROUTE PENGATURAN AKUN
// Memuat route bawaan Laravel dari file settings.php (profil, password, dll)
require __DIR__.'/settings.php';



