{{-- 
    [VIEW & LAYOUTING]
    - File ini adalah View, untuk halaman di browser dan daftar data dari database yang dikirim dari SaranController.
    - <x-layouts::app>: Ini cara manggil template / layout utama (file layouts/app.blade.php).
    - Semua kode di dalam tag ini otomatis masuk ke bagian {{ $slot }} di file template. 
      Jadi, Sidebar, Header, dan gaya desain (CSS) langsung terpasang tanpa perlu ngetik ulang dari nol.
    - Atribut title="Kotak Saran" dipakai untuk menganti judul tab di browser secara otomatis.
--}}

<x-layouts::app title="Kotak Saran">

    <div style="padding: 20px;">
        <h1 style="margin-bottom: 20px;">Kotak Saran </h1>
        
    {{-- 
        [FORM & @csrf]
        - <form action="/saran" method="POST">: Dipakai untuk mengirim data inputan baru ke rute /saran.
        - @csrf: Kode dari Laravel untuk keamanan pada metode pengiriman data seperti POST, PUT, PATCH, atau DELETE.
          Gunanya agar form kita tidak bisa dibajak atau 
          dikirim data palsu dari luar aplikasi Kalau dihapus, web akan error 419.
    --}}

        <form action="/saran" method="POST">
        @csrf
            <div style="margin-bottom: 10px;">
                <label>Nama:</label><br>
                <input type="text" name="nama_pengirim" required style="width: 100%; padding: 8px; background-color: #2d2d2d;">
            </div>
            
            <div style="margin-bottom: 10px;">
                <label>Isi Saran:</label><br>
                <textarea name="isi_saran" required style="width: 100%; padding: 8px; background-color: #2d2d2d;"></textarea>
            </div>
            
            <button type="submit" style="padding: 8px 0px; cursor: pointer; background-color: #4b4b4bff;">Kirim</button>
        </form>

        <hr style="margin: 20px 0;">

        <h2 style="margin-bottom: 20px;">Daftar Saran Masuk</h2>
        <ul>
    {{-- 
        [@foreach DAN DATA DINAMIS]
        - @foreach($daftar_saran as $s): Dipake untuk looping yang menampilkan semua data dari database.
        - Tampilannya fleksibel dan dinamis, artinya tinggi kotak list bakal otomatis memanjang atau memendek 
          mengikuti jumlah data yang ada di database.
    --}}

            @foreach($daftar_saran as $s)
                <li style="margin-bottom: 10px; background-color: #2d2d2dff;">
                    <strong>{{ $s->nama_pengirim }}:</strong> {{ $s->isi_saran }}
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts::app>
