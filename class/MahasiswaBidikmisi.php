<?php
require_once 'Mahasiswa.php';
require_once 'src/Koneksi.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // Properti tambahan spesifik Tahap 4
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    // Constructor Kelas Anak
    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    /**
     * Metode dari Tahap 4: Query SELECT - WHERE untuk mengambil data tipe 'bidikmisi'
     */
    public static function dapatkanDataBidikmisi(): array {
        $db = KoneksiDB::getKoneksi();
        $sql = "SELECT * FROM table_mahasiswa WHERE jenis_pembayaran = 'bidikmisi'";
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
                $row['nomer_kip_kuliah'] ?? '',
                (float)($row['dana_saku_subsidi'] ?? 0)
            );
        }
        return $daftarMahasiswa;
    }

    // Dikosongkan dulu, siap untuk di-override pada Tahap 5
    public function hitungTagihanSemester(): void {}
    public function tampilkanSpesifikasiAkademik(): void {}
}