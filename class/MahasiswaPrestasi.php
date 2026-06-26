<?php
require_once 'Mahasiswa.php';
require_once 'src/Koneksi.php';

class MahasiswaPrestasi extends Mahasiswa {
    // Properti tambahan spesifik Tahap 4
    private string $namaInstitusiBeasiswa;
    private float $minimalIpkSyarat;

    // Constructor Kelas Anak
    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal, string $namaInstitusiBeasiswa, float $minimalIpkSyarat) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal);
        $this->namaInstitusiBeasiswa = $namaInstitusiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    /**
     * Metode dari Tahap 4: Query SELECT - WHERE untuk mengambil data tipe 'prestasi'
     */
    public static function dapatkanDataPrestasi(): array {
        $db = KoneksiDB::getKoneksi();
        $sql = "SELECT * FROM table_mahasiswa WHERE jenis_pembayaran = 'prestasi'";
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
                $row['nama_instansi_beasiswa'] ?? '',
                (float)($row['minimal_ipk_syarat'] ?? 0)
            );
        }
        return $daftarMahasiswa;
    }
    public function hitungTagihanSemester(): void {
        $totalTagihan = $this->tarifUktNominal * 0.25;
        
        echo "<h4>Perhitungan Tagihan:</h4>";
        echo "Tarif UKT Asli    : Rp " . number_format($this->tarifUktNominal, 0, ',', '.') . "<br>";
        echo "Diskon Prestasi   : 75%<br>";
        echo "<strong>Total Wajib Bayar (25%) : Rp " . number_format($totalTagihan, 0, ',', '.') . "</strong><br><hr>";
    }

    /**
     * Override Method - Tahap 5
     * Menampilkan spesifikasi data akademik khusus jalur prestasi
     */
    public function tampilkanSpesifikasiAkademik(): void {
        echo "<h3>=== Data Akademik Mahasiswa Prestasi ===</h3>";
        echo "ID Mahasiswa : " . $this->id_mahasiswa . "<br>";
        echo "Nama Lengkap : " . $this->nama_mahasiswa . "<br>";
        echo "NIM          : " . $this->nim . "<br>";
        echo "Semester     : " . $this->semester . "<br>";
        echo "Pemberi Beasiswa   : " . $this->namaInstitusiBeasiswa . "<br>";
        echo "Syarat Minimal IPK : " . number_format($this->minimalIpkSyarat, 2) . "<br>";
    }
}