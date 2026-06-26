<?php
require_once 'Mahasiswa.php';
require_once 'src/Koneksi.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti tambahan spesifik Tahap 4
    private string $golonganUkt;
    private string $namaWali;

    // Constructor Kelas Anak
    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal, string $golonganUkt, string $namaWali) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    /**
     * Metode dari Tahap 4: Query SELECT - WHERE untuk mengambil data tipe 'mandiri'
     */
    public static function dapatkanDataMandiri(): array {
        $db = KoneksiDB::getKoneksi();
        $sql = "SELECT * FROM table_mahasiswa WHERE jenis_pembayaran = 'mandiri'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $daftarMahasiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarMahasiswa[] = new self(
                $row['id_mahasiswa'],
                $row['nama_mahasiswa'],
                $row['nim'],
                $row['semester'],
                (float)$row['tarif_ukt_nominal'],
                $row['golongan_ukt'] ?? '',
                $row['nama_wali'] ?? ''
            );
        }
        return $daftarMahasiswa;
    }
    public function hitungTagihanSemester(): void {
        $totalTagihan = $this->tarifUktNominal + 100000;
        
        echo "<h4>Perhitungan Tagihan:</h4>";
        echo "Tarif UKT Dasar : Rp " . number_format($this->tarifUktNominal, 0, ',', '.') . "<br>";
        echo "Biaya Operasional Flat : Rp 100.000<br>";
        echo "<strong>Total Wajib Bayar : Rp " . number_format($totalTagihan, 0, ',', '.') . "</strong><br><hr>";
    }

    /**
     * Override Method - Tahap 5
     * Menampilkan spesifikasi data akademik khusus jalur mandiri
     */
    public function tampilkanSpesifikasiAkademik(): void {
        echo "<h3>=== Data Akademik Mahasiswa Mandiri ===</h3>";
        echo "ID Mahasiswa : " . $this->id_mahasiswa . "<br>";
        echo "Nama Lengkap : " . $this->nama_mahasiswa . "<br>";
        echo "NIM          : " . $this->nim . "<br>";
        echo "Semester     : " . $this->semester . "<br>";
        echo "Nama Wali    : " . $this->namaWali . "<br>";
        echo "Golongan UKT : " . $this->golonganUkt . "<br>";
    }
}
