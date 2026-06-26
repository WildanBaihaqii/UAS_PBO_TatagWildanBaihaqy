<?php
require_once __DIR__ . '/Mahasiswa.php';
require_once __DIR__ . '/../src/KoneksiDb.php'; 

class MahasiswaMandiri extends Mahasiswa {
    private string $golonganUkt;
    private string $namaWali;

    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal, string $golonganUkt, string $namaWali) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    public function getGolonganUkt(): string {
        return $this->golonganUkt;
    }

    public function getNamaWali(): string {
        return $this->namaWali;
    }

    public static function dapatkanDataMandiri(): array {
        try {
            $db = KoneksiDB::getKoneksi();
            if (!$db) return [];

            $sql = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembayaran = 'mandiri'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            
            $daftarMahasiswa = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $daftarMahasiswa[] = new self(
                    (int)$row['id_mahasiswa'],
                    $row['nama_mahasiswa'],
                    $row['nim'],
                    (int)$row['semester'],
                    (float)$row['tarif_ukt_nominal'],
                    $row['golongan_ukt'] ?? '',
                    $row['nama_wali'] ?? ''
                );
            }
            return $daftarMahasiswa;
        } catch (Exception $e) {
            echo "<p style='color:red;'>Query Error (Mandiri): " . $e->getMessage() . "</p>";
            return [];
        }
    }

    public function hitungTagihanSemester(): void {
        $totalTagihan = $this->tarifUktNominal + 100000;
        echo "<h4>Perhitungan Tagihan:</h4>";
        echo "Tarif UKT Dasar : Rp " . number_format($this->tarifUktNominal, 0, ',', '.') . "<br>";
        echo "Biaya Operasional Flat : Rp 100.000<br>";
        echo "<strong>Total Wajib Bayar : Rp " . number_format($totalTagihan, 0, ',', '.') . "</strong><br><hr>";
    }

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