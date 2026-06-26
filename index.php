<?php
// Memuat semua berkas komponen OOP yang diperlukan
require_once 'src/KoneksiDb.php';
require_once 'class/MahasiswaMandiri.php';
require_once 'class/MahasiswaBidikmisi.php';
require_once 'class/MahasiswaPrestasi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik & Kategori Kelompok Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Daftar Spesifikasi Akademik & Tagihan Mahasiswa</h1>

    <div class="kategori-section mandiri">
        <h2 class="kategori-title">Kelompok Mahasiswa Jalur Mandiri</h2>
        <div class="grid-mahasiswa">
            <?php
            $dataMandiri = MahasiswaMandiri::dapatkanDataMandiri();
            if (empty($dataMandiri)) {
                echo "<p>Tidak ada data mahasiswa mandiri.</p>";
            } else {
                foreach ($dataMandiri as $mhs) {
                    echo "<div class='card-mahasiswa'>";
                    $mhs->tampilkanSpesifikasiAkademik(); 
                    $mhs->hitungTagihanSemester();        
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <div class="kategori-section bidikmisi">
        <h2 class="kategori-title">Kelompok Mahasiswa Jalur Bidikmisi / KIP-K</h2>
        <div class="grid-mahasiswa">
            <?php
            $dataBidikmisi = MahasiswaBidikmisi::dapatkanDataBidikmisi();
            if (empty($dataBidikmisi)) {
                echo "<p>Tidak ada data mahasiswa bidikmisi.</p>";
            } else {
                foreach ($dataBidikmisi as $mhs) {
                    echo "<div class='card-mahasiswa'>";
                    $mhs->tampilkanSpesifikasiAkademik(); 
                    $mhs->hitungTagihanSemester();        
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <div class="kategori-section prestasi">
        <h2 class="kategori-title">Kelompok Mahasiswa Jalur Prestasi</h2>
        <div class="grid-mahasiswa">
            <?php
            $dataPrestasi = MahasiswaPrestasi::dapatkanDataPrestasi();
            if (empty($dataPrestasi)) {
                echo "<p>Tidak ada data mahasiswa prestasi.</p>";
            } else {
                foreach ($dataPrestasi as $mhs) {
                    echo "<div class='card-mahasiswa'>";
                    $mhs->tampilkanSpesifikasiAkademik(); 
                    $mhs->hitungTagihanSemester();        
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

</div>

</body>
</html>