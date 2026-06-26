<?php
require_once __DIR__ . '/Mahasiswa.php';
require_once __DIR__ . '/../src/KoneksiDb.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    public function getNomorKipKuliah(): string {
        return $this->nomorKipKuliah;
    }

    public function getDanaSakuSubsidi(): float {
        return $this->danaSakuSubsidi;
    }

    public static function dapatkanDataBidikmisi(): array {
        try {
            $db = KoneksiDB::getKoneksi();
            if (!$db) return [];

            $sql = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembayaran = 'bidikmisi'";
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
                    $row['nomer_kip_kuliah'] ?? '',
                    (float)($row['dana_saku_subsidi'] ?? 0)
                );
            }
            return $daftarMahasiswa;
        } catch (Exception $e) {
            echo "<p style='color:red;'>Query Error (Bidikmisi): " . $e->getMessage() . "</p>";
            return [];
        }
    }

    public function hitungTagihanSemester(): void {
        echo "<h4>Perhitungan Tagihan:</h4>";
        echo "Status Biaya Kampus : Ditanggung Negara (KIP-Kuliah)<br>";
        echo "<strong>Total Wajib Bayar : Rp 0 (Gratis Penuh)</strong><br><hr>";
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "<h3>=== Data Akademik Mahasiswa Bidikmisi ===</h3>";
        echo "ID Mahasiswa : " . $this->id_mahasiswa . "<br>";
        echo "Nama Lengkap : " . $this->nama_mahasiswa . "<br>";
        echo "NIM          : " . $this->nim . "<br>";
        echo "Semester     : " . $this->semester . "<br>";
        echo "No KIP Kuliah      : " . $this->nomorKipKuliah . "<br>";
        echo "Subsidi Dana Saku  : Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.') . " / bulan<br>";
    }
}